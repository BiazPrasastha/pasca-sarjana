<?php

namespace App\Livewire\Plagiarism;

use App\Models\DocumentFile;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Cek Plagiasi')]
class Accept extends Component
{
    public DocumentFile $document;

    public function mount()
    {
        $this->document->load('Document');
        $this->document->update([
            'status' => 'accept'
        ]);

        $this->document->Document->update([
            'status' => 'accept'
        ]);
    }

    public function render()
    {
        return view('livewire.plagiarism.accept');
    }
}