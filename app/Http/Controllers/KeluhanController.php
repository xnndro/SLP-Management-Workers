<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KeluhanController extends Controller
{
    // SUPERVISOR
    public function daftarKeluhan()
    {
        return view('supervisor.pages.keluhan.index');
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

    // WORKERS
    // -- Pelaporan
    public function daftarPelaporan()
    {
        return view('workers.pages.keluhan.pelaporan.index');
    }

    public function buatPelaporan()
    {
        return view('workers.pages.keluhan.pelaporan.create');
    }

    // public function edit(string $id)
    public function editPelaporan() // sementara
    {
        return view('workers.pages.keluhan.pelaporan.edit');
    }

    // -- Penanganan
    public function daftarPenanganan()
    {
        return view('workers.pages.keluhan.penanganan.index');
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
