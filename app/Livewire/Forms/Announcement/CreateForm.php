<?php

namespace App\Livewire\Forms\Announcement;

use App\Models\Announcement;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateForm extends Form
{
    public $file;
    public $date;
    public $title;
    public $content;

    public function rules(): array
    {
        return [
            'file' => ['required', 'extensions:pdf', 'file'],
            'date' => ['required', 'date'],
            'title' => ['required'],
            'content' => ['required'],
        ];
    }

    public function store()
    {
        $this->validate();

        $file = Storage::disk('public')->put('announcement', $this->file);
        Announcement::create([
            'title' => $this->title,
            'content' => $this->content,
            'url' => $file,
            'timestamp' => $this->date
        ]);
    }
}
