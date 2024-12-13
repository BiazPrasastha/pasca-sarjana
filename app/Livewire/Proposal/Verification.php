<?php

namespace App\Livewire\Proposal;

use App\Models\Document;
use App\Models\DocumentFile;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Verifikasi Judul Proposal')]
class Verification extends Component
{
    public Document $document;
    public $file;

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

    #[On('decline')]
    public function delete(DocumentFile $file)
    {
        $this->file = $file;
    }

    public function destroy()
    {
        $this->file->load('Document');

        $this->file->update([
            'status' => 'decline'
        ]);

        $this->file->Document->update([
            'status' => 'decline'
        ]);

        $this->dispatch('hide-confirmation');
    }

    #[On('accept')]
    public function create(DocumentFile $file)
    {
        $this->file = $file;
    }

    public function store()
    {
        $this->file->load('Document');

        $this->file->update([
            'status' => 'accept'
        ]);

        $this->file->Document->update([
            'status' => 'accept'
        ]);

        return redirect(route('admin.proposal.schedule', ['document' => $this->file->Document->id]));
    }
}
