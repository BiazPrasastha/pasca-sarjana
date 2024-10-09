<div>
    <div class="mb-4">
        <a class="btn btn-secondary btn-label waves-effect waves-light" href="{{ route('student.payment.index') }}">
            <i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Kembali
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <h5>Jenis Pembayaran</h5>
            <hr>
            <div class="form-group">
                <select class="form-select" wire:model='form.type'>
                    <option value='' disabled selected>-- Pilih Jenis Pembayaran --</option>
                    <option value="martikulasi">Martikulasi</option>
                    <option value="ekskursi">Ekskursi</option>
                    <option value="proposal">Proposal</option>
                </select>
                @error('form.type')
                    <b class="text-danger">{{ $message }}</b>
                @enderror
            </div>
            <h5 class="mt-4">Pilih Metode Pembayaran</h5>
            <hr>
            <div class="row">
                @foreach (\App\Enums\PaymentMethod::cases() as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div style="height: 60px; cursor: pointer;" @class([
                            'card border border-dark text-center justify-content-center',
                            'bg-dark text-white' => $form->method == $item->name,
                        ])
                            wire:click="$set('form.method',  '{{ $item->name }}')">
                            {{ $item->value }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row mt-4">
                <div class="col">
                    @error('form.method')
                        <b class="text-danger">{{ $message }}</b>
                    @enderror
                </div>
                <div class="col text-end">
                    <button class="btn btn-soft-dark" wire:click='submit'>Lanjutkan</button>
                </div>
            </div>
        </div>
    </div>
</div>
