<?php

namespace App\Livewire\Payment;

use App\Livewire\Forms\Payment\CreateForm;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Daftar Pembayaran Baru')]
class Create extends Component
{
    public CreateForm $form;

    public function render()
    {
        return view('livewire.payment.create');
    }

    public function submit()
    {
        $this->form->create();
        return redirect(route('student.payment.process-list'));
    }
}
