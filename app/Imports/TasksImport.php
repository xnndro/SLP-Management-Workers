<?php

namespace App\Imports;

use App\Models\TaskManagement;
use Maatwebsite\Excel\Concerns\ToModel;

class TasksImport implements ToModel, \Maatwebsite\Excel\Concerns\WithHeadingRow
{
    /**
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new TaskManagement([
            'user_id' => \App\Models\User::where('name', $row['user_id'])->first()->id,
            'work_date' => $row['work_date'],
            'place_id' => \App\Models\Place::firstOrCreate(['place_name' => $row['place_id']])->id,
            'task_category_id' => \App\Models\TaskCategory::firstOrCreate(['task_category_name' => $row['task_category_id']])->id,
            'task_status' => $row['work_date'] < date('Y-m-d') ? 'done' : $row['task_status'],
        ]);
    }
}
