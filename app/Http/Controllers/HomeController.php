<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\ComplainAssignment;
use App\Models\PaidLeaveRequest;
use App\Models\TaskManagement;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->roles_id == 1) {
            $task = TaskManagement::where('task_status', 'submitted')->count();
            $report = Complain::where('report_status', '1')->count();
            $cuti = PaidLeaveRequest::where('status', '1')->count();

            return view('supervisor.pages.dashboard', compact('task', 'report', 'cuti'));
        } else {
            $task = TaskManagement::where('user_id', auth()->user()->id)->where('task_status', 'commented')->whereMonth('created_at', date('m'))->count();
            $count_verified = ComplainAssignment::whereHas('submissions', function ($query) {
                $query->where('submission_status', 2);
            })->where('user_id', Auth::user()->id)
                ->count();
            $count_process = ComplainAssignment::whereHas('submissions', function ($query) {
                $query->where('submission_status', 1);
            })->where('user_id', Auth::user()->id)
                ->count();
            $report = (ComplainAssignment::where('user_id', Auth::user()->id)
                ->where('assign_status', '!=', 3)->count()) - ($count_verified + $count_process);
            $cuti = PaidLeaveRequest::where('user_id', auth()->user()->id)->where('status', '2')->whereMonth('created_at', date('m'))->count();

            return view('workers.pages.dashboard', compact('task', 'report', 'cuti'));
        }
    }
}
