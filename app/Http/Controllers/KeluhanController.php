<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\ComplainAssignment;
use App\Models\ComplainCategory;
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
        $complains = Complain::all();
        $users = User::where('role_id', '!=', 1)->get();
        $urgencies = ComplainUrgency::where('id', '!=', 1)->get();

        return view('supervisor.pages.keluhan.index', compact('complains', 'users', 'urgencies'));
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

            session()->flash('success', 'Penugasan berhasil dibuat!');

            return redirect()->route('keluhan');
        }
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
        $complains = Complain::all();

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

            session()->flash('success', 'Laporan berhasil dibuat!');

            return redirect()->route('keluhanPelaporan');
        }
    }

    // public function edit(string $id)
    public function editPelaporan() // sementara
    {
        return view('workers.pages.keluhan.pelaporan.edit');
    }

    // --------------------------------- Penanganan ---------------------------------
    public function daftarPenanganan()
    {
        $user = auth()->user();
        $assignments = ComplainAssignment::where('user_id', $user->id)->get();

        return view('workers.pages.keluhan.penanganan.index', compact('assignments'));
    }

    public function terimaPenugasan(ComplainAssignment $ca)
    {
        $complainAssignment = ComplainAssignment::findOrFail($ca);

        $complainAssignment->assign_status = 2;
        $complainAssignment->updated_at = now();
        $complainAssignment->save();

        return redirect()->back();
    }

    public function tolakPenugasan(ComplainAssignment $ca)
    {
        $complainAssignment = ComplainAssignment::findOrFail($ca);

        $complainAssignment->assign_status = 3;
        $complainAssignment->updated_at = now();
        $complainAssignment->save();

        return redirect()->back();
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
