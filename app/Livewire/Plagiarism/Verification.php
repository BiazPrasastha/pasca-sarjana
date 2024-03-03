<?php

namespace App\Livewire\Plagiarism;

use App\Models\Document;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Verifikasi Plagiasi')]
class Verification extends Component
{
    public Document $document;

    public function mount()
    {
        $this->document->load('files');
        $this->document->load('User.student');
    }

    public function render()
    {
        return view('livewire.plagiarism.verification');
    }
}
