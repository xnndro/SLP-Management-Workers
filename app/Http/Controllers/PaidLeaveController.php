<?php

namespace App\Http\Controllers;

use App\Models\PaidLeaveCategory;
use App\Models\PaidLeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon; 

class PaidLeaveController extends Controller
{
    private $param = 0;

    public function requestList()
    {
        $data = PaidLeaveRequest::where('status', '1')->get(); // ini cara yang lebi bersih, jangan lupa user _id diganti
        $request = PaidLeaveRequest::whereYear('start_date', '2023')->get();
        if ($request->isEmpty()) {
            $request = null;
        }
        $total = count($request);
        $setuju = count($request->where('status', '2'));
        $tolak = count($request->where('status', '3'));
        return view('supervisor.pages.cuti.pengajuan-cuti.index', compact('data', 'total', 'setuju', 'tolak'));
    }

    public function paidLeaveList()
    {
        $data = PaidLeaveRequest::where('status', '2')->get(); 
        $umum = count($data->where('category_id', '1'));
        $mm = count($data->where('category_id', '2'));
        $kesehatan = count($data->where('category_id', '3'));
        $kedukaan = count($data->where('category_id', '4'));
        return view('supervisor.pages.cuti.daftar-cuti.index', compact('data', 'umum', 'mm', 'kesehatan', 'kedukaan'));
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
        $request = PaidLeaveRequest::where('user_id', '1')->whereYear('start_date', '2023')->get();
        if ($request->isEmpty()) {
            $request = null;
        }
        $proses = count($request->where('status', '1'));
        $setuju = count($request->where('status', '2'));

        // return view('workers.pages.cuti.pengajuanCuti')->with("requests", $request->get());
        return view('workers.pages.cuti.pengajuanCuti', compact('request', 'proses','setuju')); // ini cara yang lebi bersih
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
            //return dd($category);
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

    public function setuju($id)
    {
        $data = PaidLeaveRequest::find($id); 
        $data->status = 2; 
        $data->save();
        return redirect()->back()->with('success', 'Pengajuan cuti disetujui'); 
    }
    public function tolak($id)
    {
        $data = PaidLeaveRequest::find($id); 
        $data->status = 3; 
        $data->save();
        return redirect()->back()->with('success', 'Pengajuan cuti ditolak'); 
    }

    public function deletePengajuan($id)
    {
        $data = PaidLeaveRequest::where('id', $id)->get();
        if ($data) {
            $data[0]->delete();
            return redirect()->route('pengajuanCuti')->with('success', 'Pengajuan Cuti Berhasil Dihapus');
        }
    }
    public function deleteCuti($id)
    {
        $data = PaidLeaveRequest::where('id', $id)->get();
        if ($data) {
            $data[0]->delete();
            return redirect()->route('paidLeaveList')->with('success', 'Pengajuan Cuti Berhasil Dihapus');
        }
    
    }
}
