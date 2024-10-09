<?php

namespace App\Livewire\Forms\Payment;

use App\Models\Payment;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateForm extends Form
{
    public $type = '';
    public $method = null;


    public function rules(): array
    {
        return [
            'type' => ['required'],
            'method' => ['required'],
        ];
    }

    public function create()
    {
        $this->validate();
        Payment::create([
            'user_id' => auth()->id(),
            'type' => $this->type,
            'status' => 'pending',
            'admin_fee' => 2500,
            'method' => $this->method,

        ]);
    }
}
