<?php

namespace App\Livewire\Forms\News;

use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EditForm extends Form
{
    public $news;
    public $picture;
    public $picture_placeholder;
    public $date;
    public $title;
    public $content;

    public function rules(): array
    {
        return [
            'picture' => ['nullable', 'extensions:jpg,png,jpeg', 'file'],
            'date' => ['required', 'date'],
            'title' => ['required'],
            'content' => ['required'],
        ];
    }

    public function setNews(News $news)
    {
        $this->news = $news;
        $this->picture_placeholder = $news->url;
        $this->date = $news->timestamp->format('Y-m-d');
        $this->title = $news->title;
        $this->content = $news->content;
    }

    public function update($picture_changed)
    {
        $this->validate();

        if ($picture_changed) {
            Storage::disk('public')->delete($this->news->url);
            $file = Storage::disk('public')->put('news', $this->picture);
            $this->news->update([
                'url' => $file,
            ]);
        }
        $this->news->update([
            'title' => $this->title,
            'content' => $this->content,
            'timestamp' => $this->date
        ]);
    }

    public function destroy()
    {
        $this->news->delete();
    }
}
