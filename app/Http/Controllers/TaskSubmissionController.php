<?php

namespace App\Http\Controllers;

use App\Imports\TasksImport;
use App\Models\Roles;
use App\Models\ScheduleForm;
use App\Models\TaskManagement;
use App\Models\TaskSubmission;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class TaskSubmissionController extends Controller
{
    // Supervisor

    // Jadwal
    public function schedule()
    {
        $title = 'Hapus Jadwal!';
        $text = 'Apakah anda yakin ingin menghapus jadwal ini?';
        confirmDelete($title, $text);

        $form = ScheduleForm::all();

        return view('supervisor.pages.task-submission.schedule.index', compact('form'));
    }

    public function scheduleUpload(Request $request)
    {
        $month = date('F');
        $filename = $month.'.csv';
        $destination_path = 'public/uploads/tasks';
        $path = $request->file('formFile')->storeAs($destination_path, $filename);

        Excel::import(new TasksImport, $path);

        $form = new ScheduleForm();
        $form->form_month = $month;
        $form->form_file = $path;
        $form->save();

        return redirect()->route('schedule')->with('success', 'Data berhasil diupload');
    }

    public function scheduleEdit(Request $request, $id)
    {
        $form = ScheduleForm::find($id);
        $form->touch();
        $form->save();

        $month = date('F');
        $filename = $month.'.csv';

        if (Storage::exists('public/uploads/tasks/'.$filename)) {
            $data = TaskManagement::whereMonth('work_date', date('m'))->get();
            foreach ($data as $task) {
                $task->delete();
            }
            Storage::delete('public/uploads/tasks/'.$filename);
        }

        $destination_path = 'public/uploads/tasks';
        $path = $request->file('formFile')->storeAs($destination_path, $filename);

        Excel::import(new TasksImport, $path);

        return redirect()->route('schedule')->with('success', 'Data berhasil diubah');
    }

    public function scheduleDelete($id)
    {
        $form = ScheduleForm::find($id);
        $form->delete();

        $month = date('F');
        $filename = $month.'.csv';

        if (Storage::exists('public/uploads/tasks/'.$filename)) {
            $data = TaskManagement::whereMonth('work_date', date('m'))->get();
            foreach ($data as $task) {
                $task->delete();
            }
            Storage::delete('public/uploads/tasks/'.$filename);
        }

        return redirect()->route('schedule');
    }

    // Data pekerja
    public function workers()
    {
        $title = 'Hapus Pekerja!';
        $text = 'Apakah anda yakin ingin menghapus pekerja ini?';
        confirmDelete($title, $text);

        $total_workers_cuti = User::where('status', 'cuti')
        ->where('roles_id', '!=', '1')
        ->count();
        $total_workers_aktif = User::where('status', 'active')->where('roles_id', '!=', '1')->count();
        $workers = User::where('roles_id', '!=', '1')->get();
        return view('supervisor.pages.task-submission.workers.index',compact('total_workers_cuti','total_workers_aktif','workers'));
    }

    public function workersCreate()
    {
        $role = Roles::all();
        return view('supervisor.pages.task-submission.workers.create',compact('role'));
    }

    public function workersStore(Request $request)
    {
        $worker = new User();
        $worker->name = $request->name;
        $worker->email = $request->email;
        $worker->password = Hash::make($request->password);
        $worker->roles_id = $request->role;
        $worker->user_nik = $request->nik;
        $worker->user_join_date = date('Y-m-d');
        $worker->save();

        return redirect()->route('workers')->with('success', 'Data berhasil ditambahkan');
    }

    public function workersEdit($id)
    {
        $worker = User::find($id);
        $role = Roles::all();
        return view('supervisor.pages.task-submission.workers.edit',compact('worker','role'));
    }

    public function workersUpdate(Request $request, $id)
    {
        $worker = User::find($id);
        $worker->name = $request->nama;
        $worker->email = $request->email;
        $worker->roles_id = $request->role;
        $worker->user_nik = $request->nik;
        $worker->save();

        return redirect()->route('workers')->with('success', 'Data berhasil diubah');
    }

    public function workersDelete($id)
    {
        $worker = User::find($id);
        $worker->delete();

        return redirect()->route('workers')->with('success', 'Data berhasil dihapus');
    }

    public function workersSchedule($id) //jangan lupa tambah id juga
    {
        $task = TaskManagement::where('user_id', $id)->get();
        // make to json data for fullcalendar
        $events = [];
        foreach ($task as $t) {
            $events[] = [
                'title' => $t->task_category->task_category_name,
                'start' => $t->work_date,
                'end' => $t->work_date,
            ];
        }
        $name = User::find($id);
        return view('supervisor.pages.task-submission.workers.workersSchedule',compact('events','name'));
    }


    // Laporan kerja
    public function tasksReport()
    {
        $title = 'Hapus Laporan!';
        $text = 'Apakah anda yakin ingin menghapus laporan pekerjaan ini?';
        confirmDelete($title, $text);

        $submission = TaskSubmission::where('task_status', 'submitted')->get();
        // get total task submission by mapping the task_status
        $total_submission = TaskSubmission::all()->groupBy('task_status')->map->count();
        // dd($total_submission['commented']);
        return view('supervisor.pages.task-submission.tasksReport.index',compact('submission','total_submission'));
    }

    // Workers
    public function taskSubmission()
    {
        $tasks = TaskManagement::where('user_id', Auth::user()->id)->where('work_date', date('Y-m-d'))->get();
    
        $task_submission = TaskSubmission::where('task_status', 'commented')
            ->whereHas('task_management', function($query) {
                $query->where('user_id', Auth::user()->id);
            })->get();
        return view('workers.pages.task',compact('tasks','task_submission'));
    }

    public function tasksUpload(Request $request, $id)
    {
        $filename = $id.'-'.Auth::user()->id.'-'.date('Y-m-d').'.jpg';
        $destination_path = 'public/uploads/tasks';
        $path = $request->file('task_image')->storeAs($destination_path, $filename);

        $task = new TaskSubmission();
        $task->task_management_id = $id;
        $task->task_report = $path;
        $task->save();

        return redirect()->route('tasks')->with('success', 'Data berhasil ditambahkan');
    }

    public function tasksComment(Request $request, $id)
    {
        $task = TaskSubmission::find($id);
        $task->task_comment = $request->comment;
        $task->task_status = 'commented';
        $task->save();

        return redirect()->route('tasksReport')->with('success', 'Data berhasil ditambahkan');
    }
    public function scheduleWorkers()
    {
        $events = [];
        $task = TaskManagement::where('user_id', '2')->get(); //ini jangan lupa diganti user_id
        foreach ($task as $t) {
            $events[] = [
                'title' => $t->task_category->task_category_name,
                'start' => $t->work_date,
                'end' => $t->work_date,
            ];
        }

        return view('workers.pages.schedule', compact('events'));
    }
}
