<?php

namespace App\Livewire\Judiciaries;

use App\Models\DocumentFile;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Yudisium Gagal')]
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
        return view('livewire.judiciaries.decline');
    }

    public function sendEmail()
    {
        dd('email sent');
    }
}
