<?php

namespace App\Livewire\Theses;

use App\Livewire\Forms\Theses\ScheduleForm;
use App\Models\DocumentFile;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Ujian Tesis')]
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
        return view('livewire.theses.schedule');
    }

    public function submit()
    {
        $this->form->create($this->document);
    }
}
