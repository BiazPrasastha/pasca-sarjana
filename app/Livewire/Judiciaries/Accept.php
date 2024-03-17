<?php

namespace App\Livewire\Judiciaries;

use App\Models\DocumentFile;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Yudisium Lulus')]
class Accept extends Component
{
    public DocumentFile $file;

    public function mount()
    {
        $this->file->load('Document.User.Student');
        $this->file->update([
            'status' => 'accept'
        ]);

        $this->file->Document->update([
            'status' => 'accept'
        ]);
    }

    public function render()
    {
        return view('livewire.judiciaries.accept');
    }

    public function sendEmail()
    {
        dd('email sent');
    }
}
