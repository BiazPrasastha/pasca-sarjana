<?php

namespace App\Livewire\Plagiarism;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Daftar Plagiasi')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.plagiarism.index');
    }
}
