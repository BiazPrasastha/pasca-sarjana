<?php

namespace App\Livewire\Payment;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Pembayaran')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.payment.index');
    }
}
