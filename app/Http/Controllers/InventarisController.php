<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventarisController extends Controller
{
    // Supervisor
    public function supervisorInventaris()
    {
        $title = 'Hapus Inventaris!';
        $text = 'Apakah anda yakin ingin menghapus inventaris ini?';
        confirmDelete($title, $text);

        return view('supervisor.pages.inventaris.index');
    }

    public function createInventaris()
    {
        return view('supervisor.pages.inventaris.create');
    }

    public function editInventaris() //jangan lupa tambah id disini nanti
    {
        return view('supervisor.pages.inventaris.edit');
    }

    //Workers
    public function workersInventaris()
    {
        return view('workers.pages.inventaris.index');
    }

    // public function updateInventaris(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'image' => 'required',
    //         'description' => 'required',
    //         'total' => 'required',
    //     ]);

    //     $inventaris = Inventaris::find($id);
    //     $inventaris->name = $request->name;
    //     $inventaris->image = $request->image;
    //     $inventaris->description = $request->description;
    //     $inventaris->total = $request->total;
    //     $inventaris->save();

    //     return redirect()->route('supervisorInventaris')->with('success', 'Data berhasil diupdate');
    // }

    // public function deleteInventaris($id)
    // {
    //     $inventaris = Inventaris::find($id);
    //     $inventaris->delete();

    //     return redirect()->route('supervisorInventaris')->with('success', 'Data berhasil dihapus');
    // }

}
