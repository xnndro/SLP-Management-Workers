<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskSubmissionController extends Controller
{
    // Supervisor
    public function schedule()
    {
        $title = 'Hapus Jadwal!';
        $text = 'Apakah anda yakin ingin menghapus jadwal ini?';
        confirmDelete($title, $text);

        return view('supervisor.pages.task-submission.schedule.index');
    }

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

    // public function workersUpdate(Request $request, $id)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'nik' => 'required',
    //         'email' => 'required',
    //         'phone' => 'required',
    //         'address' => 'required',
    //     ]);

    //     $workers = Workers::find($id);
    //     $workers->name = $request->name;
    //     $workers->nik = $request->nik;
    //     $workers->email = $request->email;
    //     $workers->phone = $request->phone;
    //     $workers->address = $request->address;
    //     $workers->save();

    //     return redirect()->route('workers')->with('success', 'Data berhasil diupdate');
    // }

    // public function workersDelete($id)
    // {
    //     $workers = Workers::find($id);
    //     $workers->delete();

    //     return redirect()->route('workers')->with('success', 'Data berhasil dihapus');
    // }

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

    // public function taskSubmissionStore(Request $request)
    // {
    //     $this->validate($request, [
    //         'task' => 'required',
    //         'description' => 'required',
    //         'date' => 'required',
    //         'time' => 'required',
    //         'location' => 'required',
    //         'photo' => 'required',
    //     ]);

    //     $taskSubmission = new TaskSubmission;
    //     $taskSubmission->task = $request->task;
    //     $taskSubmission->description = $request->description;
    //     $taskSubmission->date = $request->date;
    //     $taskSubmission->time = $request->time;
    //     $taskSubmission->location = $request->location;
    //     $taskSubmission->photo = $request->photo;
    //     $taskSubmission->save();

    //     return redirect()->route('taskSubmission')->with('success', 'Data berhasil ditambahkan');
    // }

    public function scheduleWorkers()
    {
        return view('workers.pages.schedule');
    }
}
