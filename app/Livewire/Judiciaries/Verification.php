<?php

namespace App\Livewire\Judiciaries;

use App\Models\Document;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Verifikasi Yudisium')]
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
        return view('livewire.judiciaries.verification');
    }
}
