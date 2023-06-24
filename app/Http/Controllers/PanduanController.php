<?php

namespace App\Http\Controllers;

use App\Models\Panduan;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PanduanController extends Controller
{
    // Supervisor
    public function supervisorPanduan()
    {
        $panduans = Panduan::all();

        return view('supervisor.pages.panduan.panduan', compact('panduans'));
    }

    public function createPanduan()
    {
        $roles = Roles::all();

        return view('supervisor.pages.panduan.createPanduan', compact('roles'));
    }

    public function supervisorDetailPanduan($id)
    {
        $panduan = Panduan::find($id);

        return view('supervisor.pages.panduan.detailPanduan', compact('panduan'));
    }

    public function editPanduan() // id nya
    {
        $title = 'Hapus Panduan!';
        $text = 'Apakah anda yakin ingin menghapus panduan ini?';
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
        $panduans = Panduan::all();

        return view('workers.pages.panduan.panduan', compact('panduans'));
    }

    public function workersDetailPanduan($id)
    {
        $panduan = Panduan::find($id);

        return view('workers.pages.panduan.detailPanduan', compact('panduan'));
    }

    public function add(Request $request)
    {
        // {"_token":"8CYrqA3TKQT9Ux8Sy7xQ6UT26SryElapEMG2LYKZ","judul":"bakso","role_id":"3","content":"bersihin yang benar"}
        $rules = [
            'judul' => 'required',
            'role_id' => 'required',
            'content' => 'required',
            'filegambar' => 'required|mimes:jpeg,jpg,png|max:2048',
        ];
        $id = [
            'required' => ':attribute wajib diisi',
            // 'image' => ':attribute wajib berupa file gambar',
            'mimes' => 'format jpg, jpeg, png',
        ];
        $validator = Validator::make($request->all(), $rules, $id);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $filename = $request->file('filegambar')->getClientOriginalName();
            $destination_path = 'public/uploads/panduan';
            $path = $request->file('filegambar')->storeAs($destination_path, $filename);

            $panduan = new Panduan();
            $panduan->panduan_title = $request->judul;
            $panduan->panduan_content = $request->content;
            $panduan->panduan_image = $path;
            $panduan->inventaris_role_id = $request->role_id;
            $panduan->save();

            return redirect()->route('supervisorPanduan')->with('success', 'Berhasil menanmbahkan panduan');
        }
    }
}
