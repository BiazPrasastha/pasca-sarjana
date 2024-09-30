<?php

namespace App\Livewire\StudentJudiciaries;

use App\Livewire\Forms\StudentJudiciaries\CreateForm;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Formulir Pendaftaran Yudisium')]
class Index extends Component
{
    use WithFileUploads;
    public CreateForm $form;
    public function render()
    {
        return view('livewire.student-judiciaries.index');
    }

    public function insert()
    {
        $this->form->create();
        return redirect(route('student.judiciaries.index'));
    }
}
