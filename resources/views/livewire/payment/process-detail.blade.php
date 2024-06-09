<div>
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <div class="avatar-lg mx-auto mb-3">
                    <div style="font-size: 30pt" @class([
                        'avatar-title rounded-circle',
                        'bg-dark text-white' => $payment->status == 'pending',
                        'bg-success text-white' => $payment->status == 'accept',
                    ])>

                        <i @class([
                            'bx',
                            'bxs-hourglass' => $payment->status == 'pending',
                            'bx-check' => $payment->status == 'accept',
                        ])></i>
                    </div>
                </div>

                @switch($payment->status)
                    @case('pending')
                        <h2>Menuggu Pembayaran</h2>
                        <h1>23:59:17</h1>
                    @break

                    @case('accept')
                        <h2>Pembayaran Berhasil</h2>
                        <h1>{{ $payment->code }}</h1>
                        <p class="text-muted">Kode Pembayaran</p>
                    @break
                @endswitch
            </div>
            <div class="card-text my-4">
                <div class="row fs-4 text-muted gx-5">
                    <div class="col text-end">Nominal Pembayaran: </div>
                    <div class="col">Rp. {{ Number::format($payment->amount, 0) }}</div>
                </div>
                <div class="row fs-4 text-muted gx-5">
                    <div class="col text-end">Biaya Admin: </div>
                    <div class="col">Rp. {{ Number::format($payment->admin_fee, 0) }}</div>
                </div>
            </div>
            <hr>
            <div class="card-text my-4">
                <div class="row fs-4 text-muted gx-5 fw-bold">
                    <div class="col text-end">Total: </div>
                    <div class="col">Rp. {{ Number::format($payment->amount + $payment->admin_fee, 0) }}</div>
                </div>
                <div class="row fs-4 text-muted gx-5">
                    <div class="col text-end">Metode Pembayaran: </div>
                    <div class="col fw-bold">{{ \App\Enums\PaymentMethod::fromName($payment->method) }}</div>
                </div>
                <div class="row fs-4 text-muted gx-5">
                    <div class="col text-end">Pasca Sarjana: </div>
                    <div class="col fw-bold">XXXX-XXXX-XXXX</div>
                </div>
            </div>

        </div>
        <div class="card-footer text-end">
            @switch($payment->status)
                @case('pending')
                    <form wire:submit='accept'>
                        <button class="btn btn-soft-dark btn-label waves-effect right waves-light" type="submit"><i
                                class="ri-arrow-right-s-line label-icon align-middle fs-16 ms-2"></i> SKIP PAGE</button>
                    </form>
                @break

                @case('accept')
                    <a class="btn btn-dark" type="submit" href="{{ route('student.payment.index') }}"> Selesai</a>
                @break
            @endswitch
        </div>
    </div>
</div>
