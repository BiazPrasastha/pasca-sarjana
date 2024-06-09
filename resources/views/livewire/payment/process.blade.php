<div>
    <h5>Pilih Metode Pembayaran</h5>
    <hr>
    <div class="row">
        @foreach (\App\Enums\PaymentMethod::cases() as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div style="height: 60px; cursor: pointer;" @class([
                    'card border border-dark text-center justify-content-center',
                    'bg-dark text-white' => $method == $item->name,
                ])
                    wire:click="$set('method',  '{{ $item->name }}')">
                    {{ $item->value }}
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mt-4">
        <div class="col">
            @error('method')
                <b class="text-danger">{{ $message }}</b>
            @enderror
        </div>
        <div class="col text-end">
            <button class="btn btn-soft-dark" wire:click='submit'>Lanjutkan</button>
        </div>
    </div>
</div>
