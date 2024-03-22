<?php

namespace App\Livewire\Announcement;

use App\Livewire\Forms\Announcement\CreateForm;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Tambah Pengumuman')]
class Create extends Component
{
    use WithFileUploads;
    public CreateForm $form;

    public function render()
    {
        return view('livewire.announcement.create');
    }

    public function preview()
    {
        $this->dispatch('$refresh');
    }

    public function store()
    {
        $this->form->store();
        return redirect(route('announcement.index'));
    }
}
