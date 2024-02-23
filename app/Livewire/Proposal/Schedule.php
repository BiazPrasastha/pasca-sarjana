<?php

namespace App\Livewire\Proposal;

use App\Livewire\Forms\Proposal\ScheduleForm;
use App\Models\DocumentFile;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Jadwal Ujian Proposal')]
class Schedule extends Component
{
    public ScheduleForm $form;
    public $examiners;
    public DocumentFile $document;

    public function mount()
    {
        $this->document->load('Document');
        $this->examiners = User::with('role')->whereRelation('role', 'name', 'dosen')->get();
    }

    public function render()
    {
        return view('livewire.proposal.schedule');
    }

    public function submit()
    {
        $this->form->create($this->document);
    }
}
