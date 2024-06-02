<div>
    <div class="mb-4">
        <a class="btn btn-secondary btn-label waves-effect waves-light" href="{{ route('student.payment.index') }}">
            <i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Kembali
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            @livewire('Payment.Components.DataTable', ['status' => ['accept']])
        </div>
    </div>
</div>
