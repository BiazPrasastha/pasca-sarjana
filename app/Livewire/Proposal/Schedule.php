<?php

namespace App\Livewire\Proposal;

use App\Livewire\Forms\Proposal\ScheduleForm;
use App\Models\Document;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Jadwal Ujian Proposal')]
class Schedule extends Component
{
    public ScheduleForm $form;
    public $examiners;
    public Document $document;

    public function mount()
    {
        $this->document->load('test.examiners');
        if ($this->document->has('test')->exists()) {
            $this->form->datetime = $this->document->test->timestamp;
            $this->form->location = $this->document->test->location;
            $this->form->examiners = $this->document->test->examiners->pluck('lecturer')->toArray();
        }

        $this->examiners = User::with('role')->whereRelation('role', 'name', 'dosen')->get();
    }

    public function render()
    {
        $already_exists = $this->document->has('test')->exists();
        return view('livewire.proposal.schedule', compact('already_exists'));
    }

    public function validation()
    {
        $this->validate();
        $this->dispatch('show-confirmation');
    }

    public function submit()
    {
        if (!$this->document->has('test')->exists()) {
            $this->form->create($this->document);
            $this->dispatch('hide-confirmation');
        }
    }
}
