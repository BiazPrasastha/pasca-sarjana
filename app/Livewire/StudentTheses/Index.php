<?php

namespace App\Livewire\StudentTheses;

use App\Livewire\Forms\StudentTheses\CreateForm;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Formulir Pendaftaran Tesis')]
class Index extends Component
{
    use WithFileUploads;
    public CreateForm $form;

    public function render()
    {
        return view('livewire.student-theses.index');
    }

    public function insert()
    {
        $this->form->create();
        return redirect(route('student.theses.index'));
    }
}
