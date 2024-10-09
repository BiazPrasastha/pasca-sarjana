<?php

namespace App\Livewire\Payment;

use App\Models\Payment;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Konfirmasi Pembayaran')]
class Confirm extends Component
{
    #[Validate('required')]
    public $code;
    public Payment $payment;

    public function render()
    {
        return view('livewire.payment.confirm');
    }

    public function confirm()
    {
        $validated = $this->validate();
        if ($this->payment->code == $this->code) {
            $this->payment->update([
                'status' => 'success'
            ]);

            return redirect(route('student.payment.index'));
        } else {
            throw ValidationException::withMessages(['code' => 'The payment code is incorrect.']);
        }
    }
}
