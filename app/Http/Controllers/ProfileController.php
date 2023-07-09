<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $data = Auth::user();
        if ($data->roles_id == 1) {
            $values = 'supervisor.layouts.master';
        } else {
            $values = 'workers.layouts.master';
        }

        return view('profile.index', compact('data', 'values'));
    }

    public function edit()
    {
        $data = Auth::user();
        if ($data->roles_id == 1) {
            $values = 'supervisor.layouts.master';
        } else {
            $values = 'workers.layouts.master';
        }

        return view('profile.edit', compact('data', 'values'));
    }

    public function update(Request $request)
    {
        $data = Auth::user();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->user_nik = $request->nik;
        $data->save();

        return redirect()->route('profile')->with('success', 'Data berhasil diupdate');
    }
}
