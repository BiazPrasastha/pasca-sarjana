<div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-body">
                <h3 class="my-3">Pembayaran Baru</h3>
                <a class="btn btn-primary" href="{{ route('student.payment.create') }}">Daftar</a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-body">
                <h3 class="my-3">Proses Pembayaran</h3>
                <a class="btn btn-success" href="{{ route('student.payment.process-list') }}">Proses</a>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-body">
                <h3 class="my-3">Konfirmasi Pembayaran</h3>
                <a class="btn btn-danger" href="{{ route('student.payment.confirm-list') }}">Konfirmasi</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Riwayat Pembayaran</h4>
    </div>
    <div class="card">
        <div class="card-body">
            @livewire('Payment.Components.DataTable', ['status' => ['success', 'decline']])
        </div>
    </div>
</div>
