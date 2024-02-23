<div>
    <div class="mb-4">
        <!-- Buttons with Label -->
        <a class="btn btn-secondary btn-label waves-effect waves-light" href="{{ route('proposal.index') }}">
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
                            <th style="width: 15%" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($document->files as $file)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $file->title }}</td>
                                <td>
                                    <div class="row my-2">
                                        <div class="col-6">
                                            <a class="btn btn-primary w-100" type="button"
                                                href="{{ route('proposal.schedule', ['document' => $file->id]) }}">
                                                <i class="ri-check-line"></i>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a class="btn btn-danger w-100" href="#">
                                                <i class="ri-close-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
