<?php

namespace App\Http\Controllers;

use App\Imports\TasksImport;
use App\Models\ScheduleForm;
use App\Models\TaskManagement;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;
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

        return view('supervisor.pages.task-submission.workers.index');
    }

    public function workersCreate()
    {
        return view('supervisor.pages.task-submission.workers.create');
    }

    public function workersEdit() //jangan lupa buat tambah id disini nanti
    {
        return view('supervisor.pages.task-submission.workers.edit');
    }

    public function workersSchedule() //jangan lupa tambah id juga
    {
        return view('supervisor.pages.task-submission.workers.workersSchedule');
    }

    // Laporan kerja
    public function tasksReport()
    {
        $title = 'Hapus Laporan!';
        $text = 'Apakah anda yakin ingin menghapus laporan pekerjaan ini?';
        confirmDelete($title, $text);

        return view('supervisor.pages.task-submission.tasksReport.index');
    }

    // Workers
    public function taskSubmission()
    {
        return view('workers.pages.task');
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

    // public function __invoke()
    // {
    //     $events =[];
    //     $task = TaskManagement::where('user_id','2')->get(); //ini jangan lupa diganti user_id
    //     foreach($task as $t){
    //         $events[] =[
    //             'title' => $t->task_category->task_category_name,
    //             'start' => $t->work_date,
    //             'end' => $t->work_date,
    //         ];
    //     }

    //     return view('workers.pages.schedule', compact('events'));
    // }
}
