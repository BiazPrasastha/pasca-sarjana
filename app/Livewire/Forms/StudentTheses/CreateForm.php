<?php

namespace App\Livewire\Forms\StudentTheses;

use App\Models\Document;
use App\Models\DocumentFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateForm extends Form
{
    public $title;
    public $pengesahan_pembimbing;
    public $transkrip;
    public $plagiasi;
    public $pembayaran_semester;

    public function rules(): array
    {
        return [
            'title' => ['required'],
            'pengesahan_pembimbing' => ['required', 'extensions:pdf', 'file'],
            'transkrip' => ['required', 'extensions:pdf', 'file'],
            'plagiasi' => ['required', 'extensions:pdf', 'file'],
            'pembayaran_semester' => ['required', 'extensions:pdf', 'file'],
        ];
    }

    public function create()
    {
        $this->validate();
        $document = Document::create([
            'title' => $this->title,
            'timestamp' => now(),
            'user_id' => auth()->id(),
            'type' => 'theses',
            'status' => 'pending'
        ]);

        DocumentFile::create([
            'document_id' => $document->id,
            'title' => $this->title,
            'type' => 'theses',
            'status' => 'pending'
        ]);

        $pengesahan_pembimbing = Storage::disk('public')->put('pengesahan_pembimbing', $this->pengesahan_pembimbing);
        DocumentFile::create([
            'document_id' => $document->id,
            'title' => $this->title,
            'file' => $pengesahan_pembimbing,
            'type' => 'pengesahan_pembimbing'
        ]);

        $transkrip = Storage::disk('public')->put('transkrip', $this->transkrip);
        DocumentFile::create([
            'document_id' => $document->id,
            'title' => $this->title,
            'file' => $transkrip,
            'type' => 'transkrip'
        ]);

        $plagiasi = Storage::disk('public')->put('plagiarism', $this->plagiasi);
        DocumentFile::create([
            'document_id' => $document->id,
            'title' => $this->title,
            'file' => $plagiasi,
            'type' => 'plagiarism'
        ]);

        $pembayaran_semester = Storage::disk('public')->put('pembayaran_semester', $this->pembayaran_semester);
        DocumentFile::create([
            'document_id' => $document->id,
            'title' => $this->title,
            'file' => $pembayaran_semester,
            'type' => 'pembayaran_semester'
        ]);
    }
}
