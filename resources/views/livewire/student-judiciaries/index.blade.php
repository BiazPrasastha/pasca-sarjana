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
                            <label class="form-label" for="bt">Bimbingan Terakhir (Setelah Ujian)</label>
                            <input class="form-control form-control-md" id="bt" type="file">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="theses">Dokumen Tesis</label>
                            <input class="form-control form-control-md" id="theses" type="file">
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
            Riwayat Pendaftaran Yudisium
        </div>
        <div class="card-body">
            @livewire('StudentJudiciaries.Components.DataTable')
        </div>
    </div>
</div>
