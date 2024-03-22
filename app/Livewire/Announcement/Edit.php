<?php

namespace App\Livewire\Announcement;

use App\Livewire\Forms\Announcement\EditForm;
use App\Models\Announcement;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Edit Pengumuman')]
class Edit extends Component
{
    use WithFileUploads;
    public EditForm $form;
    public $file_changed = false;

    public function mount(Announcement $announcement)
    {
        $this->form->setAnnouncement($announcement);
    }

    public function render()
    {
        return view('livewire.announcement.edit');
    }

    public function preview()
    {
        $this->dispatch('$refresh');
    }

    public function updated($name, $value)
    {
        if ($name == "form.file") {
            $this->form->validate();
            $this->file_changed = true;
        }
    }

    public function update()
    {
        $this->form->update($this->file_changed);
        return redirect(route('announcement.index'));
    }

    public function destroy()
    {
        $this->form->destroy();
        return redirect(route('announcement.index'));
    }
}
