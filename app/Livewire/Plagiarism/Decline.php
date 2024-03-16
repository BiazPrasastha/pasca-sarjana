<?php

namespace App\Livewire\Plagiarism;

use App\Models\DocumentFile;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Cek Plagiasi')]
class Decline extends Component
{
    public DocumentFile $file;

    public function mount()
    {
        $this->file->load('Document.User.Student');
        $this->file->update([
            'status' => 'decline'
        ]);

        $this->file->Document->update([
            'status' => 'decline'
        ]);
    }

    public function render()
    {
        $decline_count = DocumentFile::where('document_id', $this->file->document_id)
            ->where('type', $this->file->type)
            ->where('status', 'decline')
            ->count();

        return view('livewire.plagiarism.decline', compact('decline_count'));
    }

    public function sendEmail()
    {
        dd('email sent');
    }
}
