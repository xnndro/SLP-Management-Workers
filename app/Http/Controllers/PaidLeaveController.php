<?php

namespace App\Http\Controllers;

use App\Models\PaidLeaveRequest;
use App\Models\PaidLeaveCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class PaidLeaveController extends Controller
{
    private $param = 0;
    public function requestList()
    {
        $data = PaidLeaveRequest::where('status', '1');
        $data = $data->get();
        return view('supervisor.pages.cuti.pengajuan-cuti.index')->with("data", $data); 
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
        $request = PaidLeaveRequest::where('user_id','1');
        return view('workers.pages.cuti.pengajuanCuti')->with("requests", $request->get());   
    }
    public function createCuti(Request $request)
    {
        $rules=[
            'Nama_lengkap' => 'required',
            'posisi' => 'required',
            'tanggalMulai' => 'required',
            'tanggalAkhir'=> 'required',
            'pesan' => 'required',
            'category' => 'not_in:pilih'
        ];
        $id =[
            'required' => ":attribute wajib diisi",
            'category' => "Kategori cuti wajib dipilih"
        ];
        $validator = Validator::make($request->all(), $rules, $id);
        if($validator->fails()){
            //dd($validator);
            return redirect()->back()->withInput()->withErrors($validator);
        }else{
            $category = PaidLeaveCategory::where('name', $request->category);
            $category = $category->get(); 
            //return dd($category[0]->id);
            $mhs = PaidLeaveRequest::create([
                'user_id' => '1',
                'category_id' => $category[0]->id,
                'start_date' => $request->tanggalMulai, 
                'end_date' => $request->tanggalAkhir, 
                'status' => '1', 
                'message' => $request->pesan
            ]);
            return redirect()->back();
        }
    }

    public function lihat_detail(PaidLeaveRequest $request){
        return view('supervisor.pages.cuti.pengajuan-cuti.index')->with("data", $request->get());
    }
}
