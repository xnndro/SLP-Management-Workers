<?php

namespace App\Http\Controllers;

use App\Models\PaidLeaveCategory;
use App\Models\PaidLeaveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $total = PaidLeaveRequest::whereYear('start_date', '2023')->get()->groupBy('status')->map->count();
        $total_pengajuan = PaidLeaveRequest::all()->count();

        return view('supervisor.pages.cuti.pengajuan-cuti.index', compact('data', 'total','total_pengajuan'));
    }

    public function paidLeaveList(Request $request)
    {
        $data = PaidLeaveRequest::where('status', '2')->get();
        $keyword1 = $request->search_nama_posisi;
        $keyword2 = $request->search_tanggal;
        $umum = count($data->where('category_id', '1'));
        $mm = count($data->where('category_id', '2'));
        $kesehatan = count($data->where('category_id', '3'));
        $kedukaan = count($data->where('category_id', '4'));
        if ($keyword1 == '') {
            $data = PaidLeaveRequest::where('status', '2')->get();
        } elseif ($keyword1 != '') {
            $data = PaidLeaveRequest::where('status', '2')->get();
            $data = $data->where('user.name', 'LIKE', $keyword1);
            if (count($data) == 0) {
                $data = PaidLeaveRequest::where('status', '2')->get();
                $data = $data->where('user.roles.role_name', 'LIKE', $keyword1);
            }
        }
        if ($keyword2 == '') {
            $data = PaidLeaveRequest::where('status', '2')->get();
        } elseif ($keyword2 != '') {
            $data = PaidLeaveRequest::where('status', '2')->get();
            $data = $data->where('start_date', '<=', $keyword2);
            $data = $data->where('end_date', '>=', $keyword2);
        }

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
        $request = PaidLeaveRequest::where('user_id', Auth::user()->id)->whereYear('start_date', '2023')->get();
        $proses = 0;
        $setuju = 0;
        if ($request->isEmpty()) {
            $request = null;
            $proses = 0;
            $setuju = 0;
        } else {
            $setuju = count($request->where('status', '2'));
            $proses = count($request->where('status', '1'));
        }

        return view('workers.pages.cuti.pengajuanCuti', compact('request', 'proses', 'setuju')); // ini cara yang lebi bersih
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
            $cuti->user_id = Auth::user()->id;
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
