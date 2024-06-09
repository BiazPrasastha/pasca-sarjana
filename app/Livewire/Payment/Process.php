<?php

namespace App\Livewire\Payment;

use App\Models\Payment;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Lakukan Pembayaran')]
class Process extends Component
{
    #[Validate('required', message: 'Pilih metode pembayaran terlebih dahulu.')]
    public $method;
    public Payment $payment;

    public function render()
    {
        return view('livewire.payment.process');
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->payment->update([
            'method' => $validated['method'],
            'admin_fee' => 2500
        ]);

        return $this->redirect(route('student.payment.process-detail', ['payment' => $this->payment->id]));
    }
}
