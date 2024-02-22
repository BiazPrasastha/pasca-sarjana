<?php

namespace App\Livewire\Proposal;

use App\Models\Document;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Verifikasi Judul Proposal')]
class Verification extends Component
{
    public Document $document;

    public function mount()
    {
        $this->document->load('files');
        $this->document->load('User.student');
        $this->document->load('User.student.studyprogram');
    }

    public function render()
    {
        return view('livewire.proposal.verification');
    }

    public function verification()
    {
        $this->form->approve();
    }
}
