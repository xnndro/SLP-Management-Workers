<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventarisController extends Controller
{
    // Supervisor
    public function supervisorInventaris()
    {
        $title = 'Hapus Inventaris!';
        $text = 'Apakah anda yakin ingin menghapus inventaris ini?';
        confirmDelete($title, $text);

        $inventories = Inventaris::all();
        $count = Inventaris::with('role')->get()->groupBy('role_id')->map->count();

        return view('supervisor.pages.inventaris.index', compact('inventories', 'count'));
    }

    public function createInventaris()
    {
        $roles = Roles::all();

        return view('supervisor.pages.inventaris.create', compact('roles'));
    }

    public function editInventaris(Request $request) //jangan lupa tambah id disini nanti
    {
        $id = $request->id;
        return view('supervisor.pages.inventaris.edit', [
            'inventory' => Inventaris::find($id)
        ]);
    }

    //Workers
    public function workersInventaris()
    {
        $inventories = Inventaris::all();
        $count = Inventaris::with('role')->get()->groupBy('role_id')->map->count();

        return view('workers.pages.inventaris.index', compact('inventories', 'count'));
    }

    public function updateInventaris(Request $request, $id)
    {
        $rules = [
            'nama' => 'required',
            'total' => 'required|min:1',
            'deskripsi' => 'required',
            'role_id' => 'required',
            // 'filegambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
        $message = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal berisi :min karakter',
        ];
        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $inventaris = Inventaris::find($id);
        $inventaris->inventaris_name = $request->nama;
        // $inventaris->inventaris_image = $request->image;
        $inventaris->role_id = $request->role_id;
        $inventaris->inventaris_description = $request->deskripsi;
        $inventaris->inventaris_total = $request->total;
        $inventaris->update();

        return redirect()->route('supervisorInventaris')->with('success', 'Data berhasil diupdate');
    }

    public function deleteInventaris($id)
    {
        $inventaris = Inventaris::find($id);
        $inventaris->delete();

        return redirect()->route('supervisorInventaris')->with('success', 'Data berhasil dihapus');
    }

    public function add(Request $request)
    {
        // {"_token":"8CYrqA3TKQT9Ux8Sy7xQ6UT26SryElapEMG2LYKZ","nama":"a","deskripsi":"aaa","total":"1","role_id":"1"}
        $rules = [
            'nama' => 'required',
            'total' => 'required|min:1',
            'deskripsi' => 'required',
            'role_id' => 'required',
            'filegambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ];
        $id = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal berisi :min karakter',
        ];
        $validator = Validator::make($request->all(), $rules, $id);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $filename = $request->file('filegambar')->getClientOriginalName();
            $destination_path = 'public/uploads/inventaris';
            $path = $request->file('filegambar')->storeAs($destination_path, $filename);

            $link = '../storage/uploads/inventaris/'.$filename;

            $inventaris = new Inventaris();
            $inventaris->inventaris_name = $request->nama;
            $inventaris->inventaris_image = $link;
            $inventaris->inventaris_description = $request->deskripsi;
            $inventaris->inventaris_total = $request->total;
            $inventaris->role_id = $request->role_id;
            $inventaris->save();

            return redirect()->route('supervisorInventaris')->with('success', 'Berhasil menanmbahkan inventaris');
        }
    }
}
