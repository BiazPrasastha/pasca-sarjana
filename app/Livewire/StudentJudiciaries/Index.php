<?php

namespace App\Livewire\StudentJudiciaries;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Formulir Pendaftaran Yudisium')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.student-judiciaries.index');
    }
}
