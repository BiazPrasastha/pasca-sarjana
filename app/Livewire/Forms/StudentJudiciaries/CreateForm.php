<?php

namespace App\Livewire\Forms\StudentJudiciaries;

use App\Models\Document;
use App\Models\DocumentFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateForm extends Form
{
    public $bimbingan_terakhir;
    public $title;
    public $theses;

    public function rules(): array
    {
        return [
            'title' => ['required'],
            'bimbingan_terakhir' => ['required', 'extensions:pdf', 'file'],
            'theses' => ['required', 'extensions:pdf', 'file']
        ];
    }

    public function create()
    {
        $this->validate();

        $document = Document::create([
            'title' => $this->title,
            'timestamp' => now(),
            'user_id' => auth()->id(),
            'type' => 'judiciaries',
            'status' => 'pending'
        ]);

        $theses = Storage::disk('public')->put('theses', $this->theses);
        DocumentFile::create([
            'document_id' => $document->id,
            'title' => $this->title,
            'file' => $theses,
            'type' => 'judiciaries',
            'status' => 'pending'
        ]);
    }
}
