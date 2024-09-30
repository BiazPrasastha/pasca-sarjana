<div>
    <form wire:submit='insert'>
        <div class="card">
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-12">
                        <div>
                            <label class="form-label" for="name">Nama</label>
                            <input class="form-control" id="name" type="text"
                                value="{{ auth()->user()->student->name }}" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="nim">NIM</label>
                            <input class="form-control" id="nim" type="text"
                                value="{{ auth()->user()->student->nim }}" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="title">Judul Tesis</label>
                            <input class="form-control form-control-md" id="title" type="text"
                                wire:model='form.title'>
                            @error('form.title')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="pengesahan_pembimbing">Lembar Pengesahan Pembimbing</label>
                            <input class="form-control form-control-md" id="pengesahan_pembimbing" type="file"
                                wire:model='form.pengesahan_pembimbing'>
                            @error('form.pengesahan_pembimbing')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="transkrip">Transkrip Nilai</label>
                            <input class="form-control form-control-md" id="transkrip" type="file"
                                wire:model='form.transkrip'>
                            @error('form.transkrip')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="plagiasi">Bukti Plagiasi</label>
                            <input class="form-control form-control-md" id="plagiasi" type="file"
                                wire:model='form.plagiasi'>
                            @error('form.plagiasi')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="pembayaran_semester">Bukti Pembayaran Semester</label>
                            <input class="form-control form-control-md" id="pembayaran_semester" type="file"
                                wire:model='form.pembayaran_semester'>
                            @error('form.pembayaran_semester')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <button class="btn btn-primary btn-label right" type="submit">
                        <i class="ri-send-plane-line label-icon align-middle fs-16 ms-2"></i>
                        Kirim
                    </button>
                </div>
            </div>
        </div>
    </form>

    <div class="card">
        <div class="card-header">
            Riwayat Pendaftaran Tesis
        </div>
        <div class="card-body">
            @livewire('StudentTheses.Components.DataTable')
        </div>
    </div>
</div>
