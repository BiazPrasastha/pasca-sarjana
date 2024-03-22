<?php

namespace App\Livewire\Forms\Announcement;

use App\Models\Announcement;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditForm extends Form
{
    public $announcement;
    public $file;
    public $file_placeholder;
    public $date;
    public $title;
    public $content;

    public function rules(): array
    {
        return [
            'file' => ['nullable', 'extensions:pdf', 'file'],
            'date' => ['required', 'date'],
            'title' => ['required'],
            'content' => ['required'],
        ];
    }

    public function setAnnouncement(Announcement $announcement)
    {
        $this->announcement = $announcement;
        $this->file_placeholder = $announcement->url;
        $this->date = $announcement->timestamp->format('Y-m-d');
        $this->title = $announcement->title;
        $this->content = $announcement->content;
    }

    public function update($file_changed)
    {
        $this->validate();

        if ($file_changed) {
            Storage::disk('public')->delete($this->announcement->url);
            $file = Storage::disk('public')->put('announcement', $this->file);
            $this->announcement->update([
                'url' => $file,
            ]);
        }
        $this->announcement->update([
            'title' => $this->title,
            'content' => $this->content,
            'timestamp' => $this->date
        ]);
    }

    public function destroy()
    {
        $this->announcement->delete();
    }
}
