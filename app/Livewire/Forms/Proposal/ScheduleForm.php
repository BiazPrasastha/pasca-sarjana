<?php

namespace App\Livewire\Forms\Proposal;

use App\Models\DocumentExaminer;
use App\Models\DocumentTest;
use Livewire\Form;

class ScheduleForm extends Form
{
    public $datetime;
    public $location;
    public $examiners = [];

    public function rules(): array
    {
        return [
            'datetime' => ['required', 'date_format:Y-m-d H:i:s', 'after_or_equal:now'],
            'location' => ['required'],
            'examiners' => ['required', 'array', 'size:2'],
            'examiners.*' => ['exists:App\Models\User,id'],
        ];
    }

    public function create($file)
    {
        $this->validate();

        $file->update([
            'status' => 'accept'
        ]);

        $file->Document->update([
            'status' => 'accept'
        ]);

        $test = DocumentTest::create([
            'document_id' => $file->Document->id,
            'timestamp' => $this->datetime,
            'location' => $this->location,
            'status' => 'pending',
        ]);
        foreach ($this->examiners as $examiner) {
            DocumentExaminer::create([
                'document_test_id' => $test->id,
                'lecturer' => $examiner,
                'status' => 'pending',
            ]);
        }
    }
}
