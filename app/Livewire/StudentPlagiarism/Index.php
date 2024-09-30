<?php

namespace App\Livewire\StudentPlagiarism;

use App\Livewire\Forms\StudentPlagiarism\CreateForm;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Formulir Pengecekan Plagiasi')]
class Index extends Component
{
    use WithFileUploads;
    public CreateForm $form;

    public function render()
    {
        return view('livewire.student-plagiarism.index');
    }

    public function insert()
    {
        $this->form->create();
        return redirect(route('student.plagiarism.index'));
    }
}
