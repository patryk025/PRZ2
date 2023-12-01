<?php

namespace App\Http\Livewire\Teachers;

use Livewire\Component;
use App\Models\Teacher;

class TeachersTableView extends Component
{
    public function render()
    {
        $teachers = Teacher::all();

        return view('livewire.teachers.teachers-table-view', ['teachers' => $teachers]);
    }
}