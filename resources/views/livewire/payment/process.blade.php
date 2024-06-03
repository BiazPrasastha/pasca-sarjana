<div>
    <h5>Pilih Metode Pembayaran</h5>
    <hr>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div style="height: 60px; cursor: pointer;" @class([
                'card border border-dark text-center justify-content-center',
                'bg-dark text-white' => $method == 'gopay',
            ]) wire:click="$set('method', 'gopay')">
                GOPAY
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div style="height: 60px; cursor: pointer;" @class([
                'card border border-dark text-center justify-content-center',
                'bg-dark text-white' => $method == 'spay',
            ]) wire:click="$set('method', 'spay')">
                SHOPEE PAY
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div style="height: 60px; cursor: pointer;" @class([
                'card border border-dark text-center justify-content-center',
                'bg-dark text-white' => $method == 'ovo',
            ]) wire:click="$set('method', 'ovo')">
                OVO
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div style="height: 60px; cursor: pointer;" @class([
                'card border border-dark text-center justify-content-center',
                'bg-dark text-white' => $method == 'dana',
            ])
                wire:click="$set('method', 'dana')">
                DANA
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div style="height: 60px; cursor: pointer;" @class([
                'card border border-dark text-center justify-content-center',
                'bg-dark text-white' => $method == 'indomaret',
            ])
                wire:click="$set('method', 'indomaret')">
                INDOMARET
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div style="height: 60px; cursor: pointer;" @class([
                'card border border-dark text-center justify-content-center',
                'bg-dark text-white' => $method == 'alfamart',
            ])
                wire:click="$set('method', 'alfamart')">
                ALFAMART
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div style="height: 60px; cursor: pointer;" @class([
                'card border border-dark text-center justify-content-center',
                'bg-dark text-white' => $method == 'bjateng',
            ])
                wire:click="$set('method', 'bjateng')">
                BANK JATENG
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div style="height: 60px; cursor: pointer;" @class([
                'card border border-dark text-center justify-content-center',
                'bg-dark text-white' => $method == 'btransfer',
            ])
                wire:click="$set('method', 'btransfer')">
                TRANSFER BANK
            </div>
        </div>
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
