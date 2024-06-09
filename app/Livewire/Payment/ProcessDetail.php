<?php

namespace App\Livewire\Payment;

use App\Models\Payment;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detail Pembayaran')]
class ProcessDetail extends Component
{
    public Payment $payment;

    public function render()
    {
        return view('livewire.payment.process-detail');
    }

    public function accept()
    {
        $this->payment->update([
            'status' => 'accept',
            'code' => Str::upper(Str::random(5))
        ]);
    }
}
