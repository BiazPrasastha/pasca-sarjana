<?php

namespace App\Livewire\News;

use App\Livewire\Forms\News\EditForm;
use App\Models\News;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Edit Berita')]
class Edit extends Component
{
    use WithFileUploads;
    public EditForm $form;
    public $picture_changed = false;

    public function mount(News $news)
    {
        $this->form->setNews($news);
    }

    public function render()
    {
        return view('livewire.news.edit');
    }

    public function preview()
    {
        $this->dispatch('$refresh');
    }

    public function updated($name, $value)
    {
        if ($name == "form.picture") {
            $this->form->validate();
            $this->picture_changed = true;
        }
    }

    public function update()
    {
        $this->form->update($this->picture_changed);
        return redirect(route('news.index'));
    }

    public function destroy()
    {
        $this->form->destroy();
        return redirect(route('news.index'));
    }
}
