<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Berita')]
class Index extends Component
{
    public function render()
    {
        $news = News::get();
        return view('livewire.news.index', compact('news'));
    }
}
