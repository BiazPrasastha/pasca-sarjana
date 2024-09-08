<?php

namespace App\Livewire\StudentPlagiarism;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Formulir Pengecekan Plagiasi')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.student-plagiarism.index');
    }

    public function insert() {}
}
