<?php

namespace App\Livewire\Payment;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Transaksi Menunggu Proses Konfirmasi')]
class ConfirmList extends Component
{
    public function render()
    {
        return view('livewire.payment.confirm-list');
    }
}
