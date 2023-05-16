<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanduanController extends Controller
{
    // Supervisor
    public function supervisorPanduan()
    {
        return view('supervisor.pages.panduan.panduan');
    }

    public function createPanduan()
    {
        return view('supervisor.pages.panduan.createPanduan');
    }

    public function supervisorDetailPanduan()
    {
        return view('supervisor.pages.panduan.detailPanduan');
    }

    public function editPanduan() # id nya 
    {
        $title = "Hapus Panduan!";
        $text = "Apakah anda yakin ingin menghapus panduan ini?";
        confirmDelete($title, $text);
        return view('supervisor.pages.panduan.editPanduan');
    }

    // public function updatePanduan(Request $request, $id)
    // {
    //     $this->validate($request, [
    //                 'title' => 'required',
    //                 'role' => 'required',
    //                 'content' => 'required',
    //             ]);
        
    //             $panduan = Panduan::find($id);
    //             $panduan->title = $request->title;
    //             $panduan->content = $request->content;
    //             $panduan->save();
        
    //             return redirect()->route('supervisorPanduan')->with('success', 'Data berhasil diupdate');
    // }

    // public function deletePanduan($id)
    // {
    //     $panduan = Panduan::find($id);
    //     $panduan->delete();

    //     return redirect()->route('panduan')->with('success', 'Data berhasil dihapus');
    // }

    // Workers
    public function workersPanduan()
    {
        return view('workers.pages.panduan.panduan');
    }

    public function workersDetailPanduan()
    {
        return view('workers.pages.panduan.detailPanduan');
    }

}
