<?php

namespace App\Livewire\Proposal;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Daftar Pengajuan Proposal')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.proposal.index');
    }
}
