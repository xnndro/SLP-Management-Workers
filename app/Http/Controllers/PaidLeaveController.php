<?php

namespace App\Http\Controllers;

use App\Models\PaidLeaveCategory;
use App\Models\PaidLeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaidLeaveController extends Controller
{
    private $param = 0;

    public function requestList()
    {
        $data = PaidLeaveRequest::where('status', '1')->get(); // ini cara yang lebi bersih, jangan lupa user _id diganti

        return view('supervisor.pages.cuti.pengajuan-cuti.index', compact('data'));
    }

    public function paidLeaveList()
    {
        return view('supervisor.pages.cuti.daftar-cuti.index');
    }

    public function paidLeaveCategory()
    {
        return view('supervisor.pages.cuti.pengajuan-cuti.paidLeaveCategory');
    }

    public function kategoriCuti()
    {
        return view('workers.pages.cuti.kategoriCuti');
    }

    public function paidLeaveRequest()
    {
        $request = PaidLeaveRequest::where('user_id', '1')->get();

        if ($request->isEmpty()) {
            $request = null;
        }
        // return view('workers.pages.cuti.pengajuanCuti')->with("requests", $request->get());
        return view('workers.pages.cuti.pengajuanCuti', compact('request')); // ini cara yang lebi bersih
    }

    public function createCuti(Request $request)
    {
        $rules = [
            'Nama_lengkap' => 'required',
            'posisi' => 'required',
            'tanggalMulai' => 'required',
            'tanggalAkhir' => 'required',
            'pesan' => 'required',
            'category' => 'not_in:pilih',
        ];
        $id = [
            'required' => ':attribute wajib diisi',
            'category' => 'Kategori cuti wajib dipilih',
        ];
        $validator = Validator::make($request->all(), $rules, $id);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $category = PaidLeaveCategory::where('name', $request->category);
            $category = $category->get();

            $cuti = new PaidLeaveRequest();
            $cuti->user_id = '1'; // ini jangan lupa di ubah, di assign ke user yang request
            $cuti->category_id = $category[0]->id;
            $cuti->start_date = $request->tanggalMulai;
            $cuti->end_date = $request->tanggalAkhir;
            $cuti->status = '1';
            $cuti->message = $request->pesan;
            $cuti->save();

            return redirect()->back()->with('success', 'Pengajuan cuti berhasil dibuat');
        }
    }

    public function lihat_detail(Request $request)
    {
        $data = PaidLeaveRequest::where('id', $request->id)->get();

        return view('supervisor.pages.cuti.pengajuan-cuti.index', compact('data'));
        // return view('supervisor.pages.cuti.pengajuan-cuti.index')->with("data", $request->get());
    }
}
