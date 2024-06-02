<?php

namespace App\Livewire\Payment;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Transaksi Menunggu Proses Pembayaran')]
class ProcessList extends Component
{
    public function render()
    {
        return view('livewire.payment.process-list');
    }
}
