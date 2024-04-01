<?php

namespace App\Livewire\News;

use App\Livewire\Forms\News\CreateForm;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Tambah Berita')]
class Create extends Component
{
    use WithFileUploads;
    public CreateForm $form;

    public function render()
    {
        return view('livewire.news.create');
    }

    public function preview()
    {
        $this->dispatch('$refresh');
    }

    public function store()
    {
        $this->form->store();
        return redirect(route('admin.news.index'));
    }
}
