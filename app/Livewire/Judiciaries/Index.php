<?php

namespace App\Livewire\Judiciaries;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Daftar Yudisium')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.judiciaries.index');
    }
}
