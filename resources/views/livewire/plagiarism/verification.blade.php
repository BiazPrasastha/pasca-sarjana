<div>
    <div class="mb-4">
        <a class="btn btn-secondary btn-label waves-effect waves-light" href="{{ route('plagiarism.index') }}">
            <i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Kembali
        </a>
    </div>
    <div class="card">
        <div class="card-header">
            Data Plagiasi yang diajukan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th style="width: 5%" scope="col">No</th>
                            <th style="width: 15%" scope="col">Nama</th>
                            <th style="width: 15%" scope="col">NIM</th>
                            <th style="width: 15%" scope="col">Tanggal</th>
                            <th style="width: 15%" scope="col">Dokumen</th>
                            <th style="width: 15%" scope="col">Status</th>
                            <th style="width: 15%" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($document->files as $file)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $document->user->student->name }}</td>
                                <td>{{ $document->user->student->nim }}</td>
                                <td>{{ $document->timestamp->format('Y-m-d') }}</td>
                                <td>{{ $file->title }}</td>
                                <td>
                                    @switch($file->status)
                                        @case('pending')
                                            <button class="btn btn-warning w-100 text-dark"> Menunggu Persetujuan </button>
                                        @break

                                        @case('accept')
                                            <button class="btn btn-success w-100"> Diterima </button>
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
                                                <a class="btn btn-primary w-100" type="button"
                                                    href="{{ route('plagiarism.accept', ['document' => $file->id]) }}">
                                                    <i class="ri-check-line"></i>
                                                </a>
                                            </div>
                                            <div class="col-6">
                                                <a class="btn btn-danger w-100" type="button"
                                                    href="{{ route('plagiarism.decline', ['document' => $file->id]) }}">
                                                    <i class="ri-close-line"></i>
                                                </a>
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
</div>
