<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\ComplainAssignment;
use App\Models\ComplainCategory;
use App\Models\ComplainDecline;
use App\Models\ComplainUrgency;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KeluhanController extends Controller
{
    // ================================== SUPERVISOR ==================================
    public function daftarKeluhan()
    {
        $complains = Complain::where('report_status','!=',3)->get();
        $users = User::where('role_id', '!=', 1)->get();
        $urgencies = ComplainUrgency::where('id', '!=', 1)->get();
        
        $title = 'Konfirmasi';
        $text = 'Apakah anda yakin?';
        confirmDelete($title, $text);

        return view('supervisor.pages.keluhan.index', compact('complains', 'users', 'urgencies'));
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
            'user' => 'required',
            'urgency' => 'required',
            'description' => 'required',
        ];

        $msg = [
            // 'required' => ':attribute wajib diisi',
            // 'min' => ':attribute minimal berisi :min karakter',
            // 'max' => ':attribute maksimal berisi :max karakter'
        ];

        $validator = Validator::make($request->all(), $rules, $msg);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            //update
            $complain->complain_urgency = $request->urgency;
            $complain->report_status = 2;
            $complain->save();

            //simpan
            $asg = new ComplainAssignment();
            $asg->complain_id = $complain->id;
            $asg->user_id = $request->user;
            $asg->assign_description = $request->description;
            $asg->assign_status = 1;

            $asg->save();

            return redirect()->route('keluhan')->with('success', 'Penugasan berhasil dibuat!');
        }
    }

    public function updatePenugasan(Request $request, ComplainAssignment $asg)
    {
        $rules = [
            'user' => 'required',
            'urgency' => 'required',
            'description' => 'required',
        ];

        $msg = [
            // 'required' => ':attribute wajib diisi',
            // 'min' => ':attribute minimal berisi :min karakter',
            // 'max' => ':attribute maksimal berisi :max karakter'
        ];

        $validator = Validator::make($request->all(), $rules, $msg);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $complain = Complain::findOrFail($asg->complain->id);
            $complain->complain_urgency = $request->urgency;
            $complain->save();
            
            $asg->user_id = $request->user;
            $asg->assign_description = $request->description;
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

        $asg->delete();
        return redirect()->route('keluhan')->with('success', 'Penugasan berhasil dibatalkan!');

    }

    public function verifikasi()
    {
        return view('supervisor.pages.keluhan.verification');
    }

    public function ulasan()
    {
        return view('supervisor.pages.keluhan.feedback');
    }

    // public function show(string $id)
    public function detailKeluhan() // sementara
    {
        return view('supervisor.pages.keluhan.view');
    }

    // ================================== WORKERS ==================================
    // --------------------------------- Pelaporan ---------------------------------
    public function daftarPelaporan()
    {
        $user = auth()->user();
        $complains = Complain::where('user_id',$user->id)->get();

        return view('workers.pages.keluhan.pelaporan.index', compact('complains'));
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
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'place' => 'required',
        ];

        $msg = [
            // 'required' => ':attribute wajib diisi',
            // 'min' => ':attribute minimal berisi :min karakter',
            // 'max' => ':attribute maksimal berisi :max karakter'
        ];

        $validator = Validator::make($request->all(), $rules, $msg);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            //simpan
            $user = auth()->user();
            $complain = new Complain;
            $complain->user_id = $user->id;
            $complain->place_id = $request->place;
            $complain->complain_title = $request->title;
            $complain->complain_description = $request->description;
            $complain->complain_category = $request->category;
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
            'category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'place' => 'required',
        ];

        $msg = [
            // 'required' => ':attribute wajib diisi',
            // 'min' => ':attribute minimal berisi :min karakter',
            // 'max' => ':attribute maksimal berisi :max karakter'
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

        // $title = 'Tolak Penugasan!';
        // $text = 'Apakah anda yakin menolak tugas ini?';
        // confirmDelete($title, $text);

        return view('workers.pages.keluhan.penanganan.index', compact('assignments'));
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
            'description' => 'required',
        ];

        $msg = [
            'required' => ':attribute wajib diisi',
            // 'min' => ':attribute minimal berisi :min karakter',
            // 'max' => ':attribute maksimal berisi :max karakter'
        ];

        $validator = Validator::make($request->all(), $rules, $msg);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $declined = new ComplainDecline;
            $declined->complain_assignment_id = $asg->id;
            $declined->decline_description = $request->description;
            $declined->save();
    
            $asg->assign_status = 3;
            $asg->save();
    
            return redirect()->route('keluhanPenanganan')->with('success', 'Penugasan telah ditolak!');
        }
    }

    public function buatPenanganan()
    {
        
        return view('workers.pages.keluhan.penanganan.create');
    }

    // public function show(string $id)
    public function detailKeluhanPenanganan() //sementara
    {
        return view('workers.pages.keluhan.penanganan.view');
    }

    // public function edit(string $id)
    public function editPenanganan() // sementara
    {
        return view('workers.pages.keluhan.penanganan.edit');
    }

}
