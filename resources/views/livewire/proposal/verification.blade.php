<div>
    <div class="mb-4">
        <!-- Buttons with Label -->
        <a class="btn btn-secondary btn-label waves-effect waves-light" href="{{ route('admin.proposal.index') }}">
            <i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Kembali
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th style="width: 15%" scope="col">Nama</th>
                            <th style="width: 15%" scope="col">NIM</th>
                            <th style="width: 15%" scope="col">Tanggal</th>
                            <th style="width: 15%" scope="col">Program Studi</th>
                            <th style="width: 20%" scope="col">Transkrip Nilai</th>
                            <th style="width: 20%" scope="col">Bukti Pembayaran Ekskursi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $document->user->student->name }}</td>
                            <td>{{ $document->user->student->nim }}</td>
                            <td>{{ $document->timestamp->format('Y-m-d') }}</td>
                            <td>{{ $document->user->student->studyprogram->name }}</td>
                            <td>
                                <div class="row my-2">
                                    <div class="col">
                                        <a class="btn btn-primary w-100" href="#">Periksa</a>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col">
                                        <a class="btn btn-success w-100" href="#">Unduh</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row my-2">
                                    <div class="col">
                                        <a class="btn btn-primary w-100" href="#">Periksa</a>
                                    </div>
                                </div>
                                <div class="row my-2">
                                    <div class="col">
                                        <a class="btn btn-success w-100" href="#">Unduh</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Data Proposal yang diajukan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th style="width: 15%" scope="col">No</th>
                            <th style="width: 15%" scope="col">Judul</th>
                            <th style="width: 15%" scope="col">Status</th>
                            <th style="width: 15%" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($document->files as $file)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $file->title }}</td>
                                <td>
                                    @switch($file->status)
                                        @case('pending')
                                            <button class="btn btn-warning w-100 text-dark"> Menunggu Persetujuan </button>
                                        @break

                                        @case('accept')
                                            <a class="btn btn-success w-100"
                                                href="{{ route('admin.proposal.schedule', ['document' => $file->Document->id]) }}">
                                                Diterima
                                            </a>
                                        @break

                                        @case('decline')
                                            <button class="btn btn-danger w-100"> Ditolak </button>
                                        @break

                                        @default
                                            <button class="btn btn-secondary w-100"> Unknown </button>
                                    @endswitch
                                </td>
                                @if ($file->status == 'pending')
                                    <td>
                                        <div class="row my-2">
                                            <div class="col-6">
                                                <button class="btn btn-primary w-100" data-bs-toggle="modal"
                                                    data-bs-target="#acceptConfirmationModal"
                                                    @click="$dispatch('accept', {file: {{ $file->id }}})">
                                                    <i class="ri-check-line"></i>
                                                </button>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-danger w-100" data-bs-toggle="modal"
                                                    data-bs-target="#declineConfirmationModal"
                                                    @click="$dispatch('decline', {file: {{ $file->id }}})">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                @else
                                    <td></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if ($file->status == 'pending')
        <div class="modal fade" id="declineConfirmationModal" aria-labelledby="confirmationLabel" aria-hidden="true"
            tabindex="-1" style="display: none;" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationLabel"> Konfirmasi Tolak Proposal</h5>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"> </button>
                    </div>
                    <form wire:submit='destroy'>
                        <div class="modal-body">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border text-warning my-4" role="status" wire:loading>
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            <div wire:loading.remove>
                                <div class="text-center my-3">
                                    <h4 class="fw-bold">{{ $file?->title }}</h4>
                                    <p class="text-muted mb-4"> Apakah anda yakin akan menolak proposal
                                        yang diajukan?
                                    </p>
                                    <div class="hstack gap-2 justify-content-center">
                                        <button class="btn btn-light" data-bs-dismiss="modal"
                                            type="button">Close</button>
                                        <button class="btn btn-danger" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="acceptConfirmationModal" aria-labelledby="confirmationLabel" aria-hidden="true"
            tabindex="-1" style="display: none;" wire:ignore.self>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationLabel"> Konfirmasi Terima Proposal</h5>
                        <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close">
                        </button>
                    </div>
                    <form wire:submit='store'>
                        <div class="modal-body">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border text-warning my-4" role="status" wire:loading>
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            <div wire:loading.remove>
                                <div class="text-center my-3">
                                    <h4 class="fw-bold">{{ $file?->title }}</h4>
                                    <p class="text-muted mb-4"> Apakah anda yakin akan menerima proposal
                                        yang diajukan?
                                    </p>
                                    <div class="hstack gap-2 justify-content-center">
                                        <button class="btn btn-light" data-bs-dismiss="modal"
                                            type="button">Close</button>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>

@push('scripts')
    <script>
        let declineConfirmationModal = new bootstrap.Modal(document.getElementById('declineConfirmationModal'));
        document.addEventListener('livewire:init', () => {
            Livewire.on('hide-confirmation', (event) => {
                declineConfirmationModal.hide()
            });
        });
    </script>
@endpush
