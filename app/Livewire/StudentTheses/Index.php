<?php

namespace App\Livewire\StudentTheses;

use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Formulir Pendaftaran Tesis')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.student-theses.index');
    }

    public function insert() {}
}
