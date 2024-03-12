<?php

namespace App\Livewire\Theses;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Daftar Tesis')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.theses.index');
    }
}
