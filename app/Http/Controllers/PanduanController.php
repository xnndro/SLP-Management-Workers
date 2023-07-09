<?php

namespace App\Http\Controllers;

use App\Models\Panduan;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PanduanController extends Controller
{
    // Supervisor
    public function supervisorPanduan(Request $request)
    {
        if ($request->search) {
            $panduans = Panduan::where('panduan_title', 'LIKE', '%'.$request->search.'%')->get();
        } else {
            $panduans = Panduan::all();
        }

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

    public function editPanduan($id)
    {
        $title = 'Hapus Panduan!';
        $text = 'Apakah anda yakin ingin menghapus panduan ini?';
        confirmDelete($title, $text);

        return view('supervisor.pages.panduan.editPanduan', [
            'panduan' => Panduan::find($id),
        ]);
    }

    public function updatePanduan(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'role_id' => 'required|numeric',
            'content' => 'required',
        ];
        $message = [
            'required' => ':attribute wajib diisi',
            'numeric' => 'Posisi wajib dipilih',
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $panduan = Panduan::find($id);
        $panduan->panduan_title = $request->title;
        $panduan->panduan_content = $request->content;
        $panduan->role_id = $request->roleId;
        $panduan->update();

        return redirect()->route('supervisorPanduan')->with('success', 'Data berhasil diupdate');
    }

    public function deletePanduan($id)
    {
        $panduan = Panduan::find($id);
        $panduan->delete();

        return redirect()->route('supervisorPanduan')->with('success', 'Data berhasil dihapus');
    }

    // Workers
    public function workersPanduan(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        if ($request->search) {
            $panduans = Panduan::where('panduan_title', 'LIKE', '%'.$request->search.'%')->where('role_id', $user->roles_id)->get();
        } else {
            $panduans = Panduan::where('role_id', $user->roles_id)->get();
        }

        return view('workers.pages.panduan.panduan', compact('panduans'));
    }

    public function workersDetailPanduan($id)
    {
        $panduan = Panduan::find($id);

        return view('workers.pages.panduan.detailPanduan', compact('panduan'));
    }

    public function searchPanduan(Request $request)
    {
        if ($request->search) {
            $searchPanduan = Panduan::where('name', 'LIKE', '%'.$request->search.'%')->latest();

            return view('workers.page.panduan', compact('searchPanduan'));
        } else {
            return redirect()->back()->with('message', 'Tidak ada Panduan yang dicari');
        }
    }

    public function add(Request $request)
    {
        $rules = [
            'judul' => 'required',
            'role_id' => 'required|numeric',
            'content' => 'required',
        ];
        $id = [
            'required' => ':attribute wajib diisi',
            'numeric' => 'Posisi wajib dipilih',
        ];
        $validator = Validator::make($request->all(), $rules, $id);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $link = '/assets/images/random-panduan/'.mt_rand(1, 17).'.png';

            $panduan = new Panduan();
            $panduan->panduan_title = $request->judul;
            $panduan->panduan_content = $request->content;
            $panduan->panduan_image = $link;
            $panduan->role_id = $request->role_id;
            $panduan->save();

            return redirect()->route('supervisorPanduan')->with('success', 'Berhasil menambahkan panduan');
        }
    }
}
