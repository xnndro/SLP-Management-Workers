<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\ComplainAssignment;
use App\Models\ComplainCategory;
use App\Models\ComplainDecline;
use App\Models\ComplainSubmission;
use App\Models\ComplainUrgency;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Strings;

class KeluhanController extends Controller
{
    // ================================== SUPERVISOR ==================================
    public function daftarKeluhan()
    {
        $complains = Complain::where('report_status','!=',3)->get();
        $users = User::where('roles_id', '!=', 1)->get();
        $urgencies = ComplainUrgency::where('id', '!=', 1)->get();
        
        $title = 'Konfirmasi';
        $text = 'Apakah anda yakin?';
        confirmDelete($title, $text);

        $count_wait = Complain::where('report_status',1)->count();
        $count_finished = Complain::whereHas('latestAssigned.submissions', function ($query) {
                                    $query->where('submission_status', 2);
                                })->count();
        $count_process = (Complain::where('report_status',2)->count()) - $count_finished;

        return view('supervisor.pages.keluhan.index', compact('complains', 'users', 'urgencies', 'count_wait', 'count_finished', 'count_process'));
    }

    public function tolakLaporan(Complain $complain)
    {
        $complain->report_status = 3;
        $complain->save();

        return redirect()->route('keluhan')->with('success', 'Laporan telah ditolak!');
    }

    public function simpanPenugasan(Request $request, Complain $complain)
    {
        $rules = [
            'pekerja' => 'not_in:pilih',
            'urgensi' => 'not_in:pilih',
            'catatan_penugasan' => 'required',
        ];

        $msg = [
            'required' => 'Kolom '.str_replace('_', ' ', ':attribute').' wajib diisi',
            'pekerja' => 'Kolom pekerja wajib dipilih',
            'urgensi' => 'Kolom pekerja wajib dipilih'
        ];

        $validator = Validator::make($request->all(), $rules, $msg);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            //update
            $complain->complain_urgency = $request->urgensi;
            $complain->report_status = 2;
            $complain->save();

            //simpan
            $asg = new ComplainAssignment();
            $asg->complain_id = $complain->id;
            $asg->user_id = $request->pekerja;
            $asg->assign_description = $request->catatan_penugasan;
            $asg->assign_status = 1;

            $asg->save();

            return redirect()->route('keluhan')->with('success', 'Penugasan berhasil dibuat!');
        }
    }

    public function updatePenugasan(Request $request, ComplainAssignment $asg)
    {
        $rules = [
            'pekerja' => 'not_in:pilih',
            'urgensi' => 'not_in:pilih',
            'catatan_penugasan' => 'required',
        ];

        $msg = [
            'required' => 'Kolom '.str_replace('_', ' ', ':attribute').' wajib diisi',
            'pekerja' => 'Kolom pekerja wajib dipilih',
            'urgensi' => 'Kolom pekerja wajib dipilih'
        ];

        $validator = Validator::make($request->all(), $rules, $msg);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $complain = Complain::findOrFail($asg->complain->id);
            $complain->complain_urgency = $request->urgensi;
            $complain->save();
            
            $asg->user_id = $request->pekerja;
            $asg->assign_description = $request->catatan_penugasan;
            $asg->assign_status = 1;

            $asg->save();

            return redirect()->route('keluhan')->with('success', 'Penugasan berhasil diubah!');
        }
    }

    public function hapusPenugasan(Request $request, ComplainAssignment $asg)
    {
        $complain = Complain::findOrFail($asg->complain->id);
        $complain->report_status = 1;
        $complain->save();

        if(is_null($asg->latestDeclined)){
            $asg->delete();
        }
        
        return redirect()->route('keluhan')->with('success', 'Penugasan berhasil dibatalkan!');
    }

    public function verifikasi(ComplainAssignment $asg)
    {
        $title = 'Tolak Penanganan!';
        $text = 'Apakah anda yakin ingin menolak penanganan ini?';
        confirmDelete($title, $text);
        return view('supervisor.pages.keluhan.verification', compact('asg'));
    }

    public function simpanVerifikasi(Request $request, ComplainAssignment $asg){
        $rules = [
            'ulasan' => 'required',
        ];

        $msg = [
            'required' => 'Kolom '.str_replace('_', ' ', ':attribute').' wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $msg);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $submission = ComplainSubmission::findOrFail($asg->submissions->id);
            $submission->submission_feedback = $request->ulasan;
            if($request->has('Terima')){
                $submission->submission_status = 2;
            }
            elseif ($request->has('Tolak')){
                $submission->submission_status = 3;
            }
            $submission->save();
    
            return redirect()->route('keluhan')->with('success', 'Penanganan telah diverifikasi!');
        }
    }


    public function ulasan(ComplainAssignment $asg)
    {
        $user = auth()->user();
        if($user->id != $asg->user_id && $user->roles_id != 1){
            return redirect()->back();
        }
        return view('supervisor.pages.keluhan.feedback', compact('asg', 'user'));
    }

    // public function show(string $id)
    public function detailKeluhan(Complain $complain) // sementara
    {
        return view('supervisor.pages.keluhan.view', compact('complain'));
    }

    // ================================== WORKERS ==================================
    // --------------------------------- Pelaporan ---------------------------------
    public function daftarPelaporan()
    {
        $user = auth()->user();
        $complains = Complain::where('user_id',$user->id)->get();
        $count_wait = Complain::where('user_id',$user->id)
                                ->where('report_status',1)->count();
        $count_finished = Complain::whereHas('latestAssigned.submissions', function ($query) {
                                    $query->where('submission_status', 2);
                                })->where('user_id',$user->id)
                                  ->count();
        $count_process = (Complain::where('user_id',$user->id)
                                    ->where('report_status',2)->count()) - $count_finished;

        return view('workers.pages.keluhan.pelaporan.index', compact('complains', 'count_wait', 'count_finished', 'count_process'));
    }

    public function buatPelaporan()
    {
        $categories = ComplainCategory::all();
        $places = Place::all();

        return view('workers.pages.keluhan.pelaporan.create', compact('categories', 'places'));
    }

    public function simpanPelaporan(Request $request)
    {
        $rules = [
            'jenis_keluhan' => 'not_in:pilih',
            'judul_keluhan' => 'required',
            'deskripsi_keluhan' => 'required',
            'lokasi' => 'not_in:pilih',
        ];

        $msg = [
            'required' => 'Kolom '.str_replace('_', ' ', ':attribute').' wajib diisi',
            'jenis_keluhan' => 'Kolom jenis keluhan wajib dipilih',
            'lokasi' => 'Kolom lokasi wajib dipilih',
        ];

        $validator = Validator::make($request->all(), $rules, $msg);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            //simpan
            $user = auth()->user();
            $complain = new Complain;
            $complain->user_id = $user->id;
            $complain->place_id = $request->lokasi;
            $complain->complain_title = $request->judul_keluhan;
            $complain->complain_description = $request->deskripsi_keluhan;
            $complain->complain_category = $request->jenis_keluhan;
            $complain->complain_urgency = 1;
            $complain->report_status = 1;

            $complain->save();

            // session()->flash('success', 'Laporan berhasil dibuat!');

            return redirect()->route('keluhanPelaporan')->with('success', 'Laporan berhasil dibuat!');
        }
    }

    // public function edit(string $id)
    public function editPelaporan(Complain $complain) // sementara
    {
        $categories = ComplainCategory::all();
        $places = Place::all();

        $title = 'Hapus Laporan!';
        $text = 'Apakah anda yakin ingin menghapus laporan ini?';
        confirmDelete($title, $text);

        return view('workers.pages.keluhan.pelaporan.edit', compact('complain', 'categories', 'places'));
    }

    public function updatePelaporan(Request $request, Complain $complain)
    {
        $rules = [
            'jenis_keluhan' => 'not_in:pilih',
            'judul_keluhan' => 'required',
            'deskripsi_keluhan' => 'required',
            'lokasi' => 'not_in:pilih',
        ];

        $msg = [
            'required' => 'Kolom '.str_replace('_', ' ', ':attribute').' wajib diisi',
            'jenis_keluhan' => 'Kolom jenis keluhan wajib dipilih',
            'lokasi' => 'Kolom lokasi wajib dipilih',
        ];

        $validator = Validator::make($request->all(), $rules, $msg);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            //simpan
            $complain->place_id = $request->place;
            $complain->complain_title = $request->title;
            $complain->complain_description = $request->description;
            $complain->complain_category = $request->category;

            $complain->save();

            return redirect()->route('keluhanPelaporan')->with('success', 'Laporan berhasil diubah!');
        }
    }

    public function hapusPelaporan(Complain $complain)
    {
        $complain->delete();
        return redirect()->route('keluhanPelaporan')->with('success', 'Laporan berhasil dihapus!');
    }

    // --------------------------------- Penanganan ---------------------------------
    public function daftarPenanganan()
    {
        $user = auth()->user();
        $assignments = ComplainAssignment::where('user_id', $user->id)
                                        ->where('assign_status','!=',3)
                                        ->get();
        $count_verified = ComplainAssignment::whereHas('submissions', function ($query) {
                                    $query->where('submission_status', 2);
                                })->where('user_id',$user->id)
                                    ->count();
        $count_process = ComplainAssignment::whereHas('submissions', function ($query) {
                                    $query->where('submission_status', 1);
                                })->where('user_id',$user->id)
                                    ->count();
        $count_assigned = (ComplainAssignment::where('user_id',$user->id)
                                    ->where('assign_status','!=',3)->count()) - ($count_verified + $count_process);

        // $title = 'Tolak Penugasan!';
        // $text = 'Apakah anda yakin menolak tugas ini?';
        // confirmDelete($title, $text);

        return view('workers.pages.keluhan.penanganan.index', compact('assignments','count_assigned','count_process','count_verified'));
    }

    public function terimaPenugasan(ComplainAssignment $asg)
    {
        $asg->assign_status = 2;
        $asg->save();

        return redirect()->route('keluhanPenanganan')->with('success', 'Penugasan telah diterima!');
    }

    public function tolakPenugasan(Request $request, ComplainAssignment $asg)
    {
        $rules = [
            'alasan_penolakan' => 'required',
        ];

        $msg = [
            'required' => 'Kolom '.str_replace('_', ' ', ':attribute').' wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $msg);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $declined = new ComplainDecline;
            $declined->complain_assignment_id = $asg->id;
            $declined->decline_description = $request->alasan_penolakan;
            $declined->save();
    
            $asg->assign_status = 3;
            $asg->save();
    
            return redirect()->route('keluhanPenanganan')->with('success', 'Penugasan telah ditolak!');
        }
    }

    public function buatPenanganan(ComplainAssignment $asg)
    {    
        return view('workers.pages.keluhan.penanganan.create', compact('asg'));
    }

    public function simpanPenanganan(Request $request, ComplainAssignment $asg)
    {
        $rules = [
            'bukti_penanganan' => 'required|image|mimes:jpg,jpeg,png',
            'catatan_penanganan' => 'required'
        ];
        $msg = [
            'required' => 'Kolom '.str_replace('_', ' ', ':attribute').' wajib diisi',
            // 'min' => 'Kolom '.str_replace('_', ' ', ':attribute').' minimal berisi :min karakter'),
            'image'=> 'Kolom '.str_replace('_', ' ', ':attribute').' harus berupa gambar',
            'mimes'=> 'File harus dalam format jpg, jpeg, dan png'
        ];
        $validator = Validator::make($request->all(), $rules, $msg);
        if ($validator->fails()) {
            // echo $request->input('Catatan');
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $img = $request->file('bukti_penanganan');
            $filename = 'Penanganan_'.str_replace(' ', '_', $asg->complain->complain_title).'_'.str_replace(array(" ", ":"), array("_","-"), date('Y-m-d H:i:s')).'.'.$img->getClientOriginalExtension();
            $destination_path = 'public/uploads/penanganan';
            $path = $img->storeAs($destination_path, $filename);

            // $link = Storage::url($path);
            $link = '/storage/uploads/penanganan/'.$filename;
    
            $submission = new ComplainSubmission();
            $submission->complain_assignment_id = $asg->id;
            $submission->submission_img = $link;
            $submission->submission_description = $request->catatan_penanganan;
            $submission->submission_feedback = 'Belum diverifikasi';
            $submission->submission_status = 1;
            $submission->save();

            return redirect()->route('keluhanPenanganan')->with('success', 'Berhasil mengunggah penanganan');
        }
    }

    // public function show(string $id)
    public function detailKeluhanPenanganan(ComplainAssignment $asg) //sementara
    {
        return view('workers.pages.keluhan.penanganan.view', compact('asg'));
    }

    // public function edit(string $id)
    public function editPenanganan(ComplainAssignment $asg)
    {
        $title = 'Hapus Penanganan!';
        $text = 'Apakah anda yakin ingin menghapus penanganan ini?';
        confirmDelete($title, $text);
        return view('workers.pages.keluhan.penanganan.edit', compact('asg'));
    }

    public function updatePenanganan(Request $request, ComplainAssignment $asg)
    {
        $rules = [
            'bukti_penanganan' => 'required|image|mimes:jpg,jpeg,png',
            'catatan_penanganan' => 'required'
        ];
        $msg = [
            'required' => 'Kolom '.str_replace('_', ' ', ':attribute').' wajib diisi',
            // 'min' => 'Kolom '.str_replace('_', ' ', ':attribute').' minimal berisi :min karakter'),
            'image'=> 'Kolom '.str_replace('_', ' ', ':attribute').' harus berupa gambar',
            'mimes'=> 'File harus dalam format jpg, jpeg, dan png'
        ];
        $validator = Validator::make($request->all(), $rules, $msg);
        if ($validator->fails()) {
            // echo $request->input('Catatan');
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $img = $request->file('bukti_penanganan');
            $filename = 'Penanganan_'.str_replace(' ', '_', $asg->complain->complain_title).'_'.str_replace(array(" ", ":"), array("_","-"), date('Y-m-d H:i:s')).'.'.$img->getClientOriginalExtension();
            $destination_path = 'public/uploads/penanganan';
            $path = $img->storeAs($destination_path, $filename);

            // $link = Storage::url($path);
            $link = '/storage/uploads/penanganan/'.$filename;
            
            $submission = ComplainSubmission::findOrFail($asg->submissions->id);
            $submission->submission_img = $link;
            $submission->submission_description = $request->catatan_penanganan;
            // Edit kalo ditolak
            if ($submission->submission_status == 3) {
                $submission->submission_status = 1;
            }
            $submission->save();

            return redirect()->route('keluhanPenanganan')->with('success', 'Berhasil memperbarui penanganan');
        }
    }

    public function hapusPenanganan(ComplainAssignment $asg)
    {
        $submission = ComplainSubmission::findOrFail($asg->submissions->id);
        $submission->delete();
        return redirect()->route('keluhanPenanganan')->with('success', 'Penanganan berhasil dihapus!');
    }

}
