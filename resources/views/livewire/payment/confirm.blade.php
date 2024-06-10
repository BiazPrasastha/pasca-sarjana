<div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form wire:submit='confirm'>
                        <div class="form-group mb-4">
                            <label class="fs-5" for="code">Kode Pembayaran</label>
                            <input class="form-control @error('code') is-invalid @enderror" name="code"
                                wire:model='code'>
                            @error('code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <button class="btn btn-dark text-white w-100">
                                Konfirmasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
