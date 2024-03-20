<?php

namespace App\Livewire\Forms\News;

use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateForm extends Form
{
    public $picture;
    public $date;
    public $title;
    public $content;

    public function rules(): array
    {
        return [
            'picture' => ['required', 'extensions:jpg,png,jpeg', 'file'],
            'date' => ['required', 'date'],
            'title' => ['required'],
            'content' => ['required'],
        ];
    }


    public function store()
    {
        $this->validate();

        $file = Storage::disk('public')->put('news', $this->picture);
        News::create([
            'title' => $this->title,
            'content' => $this->content,
            'url' => $file,
            'timestamp' => $this->date
        ]);
    }
}
