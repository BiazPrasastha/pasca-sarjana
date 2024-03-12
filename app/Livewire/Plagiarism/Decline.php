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
        $this->document->load(['Document', 'Document.User', 'Document.User.Student']);
        $this->document->update([
            'status' => 'decline'
        ]);

        $this->document->Document->update([
            'status' => 'decline'
        ]);
    }

    public function render()
    {
        $decline_count = DocumentFile::where('document_id', $this->document->document_id)
            ->where('type', $this->document->type)
            ->where('status', 'decline')
            ->count();

        return view('livewire.plagiarism.decline', compact('decline_count'));
    }

    public function sendEmail()
    {
        dd('email sent');
    }
}
