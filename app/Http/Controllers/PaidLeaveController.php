<?php

namespace App\Http\Controllers;

class PaidLeaveController extends Controller
{
    public function requestList()
    {
        return view('supervisor.pages.cuti.pengajuan-cuti.index');
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
        return view('workers.pages.cuti.pengajuanCuti');

    }
}
