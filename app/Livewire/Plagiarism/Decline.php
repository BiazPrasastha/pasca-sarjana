<?php

namespace App\Livewire\Plagiarism;

use App\Models\DocumentFile;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Cek Plagiasi')]
class Decline extends Component
{
    public DocumentFile $document;

    public function mount()
    {
        $this->document->load('Document');
        $this->document->update([
            'status' => 'decline'
        ]);

        $this->document->Document->update([
            'status' => 'decline'
        ]);
    }

    public function render()
    {
        return view('livewire.plagiarism.decline');
    }
}
