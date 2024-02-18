<?php

namespace App\Livewire\Dashboard\Components;

use App\Models\StudyProgram;
use Livewire\Component;

class StudyProgramDiagram extends Component
{
    public function render()
    {
        $study_program = StudyProgram::select('name')->withCount('Students')->get();
        $studies_program = $study_program->pluck('name')->toArray();
        $students_count = $study_program->pluck('students_count')->toArray();

        $data = [];
        $data['studies_program'] = $studies_program;
        $data['students_count'] = $students_count;
        $data = json_encode($data);

        return view('livewire.dashboard.components.study-program-diagram', compact('data'));
    }
}
