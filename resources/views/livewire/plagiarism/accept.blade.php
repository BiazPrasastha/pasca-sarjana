<div>
    <div class="mb-4">
        <!-- Buttons with Label -->
        <a class="btn btn-secondary btn-label waves-effect waves-light"
            href="{{ route('plagiarism.verification', ['document' => $file->Document->id]) }}">
            <i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Kembali
        </a>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>
                Kirim ke : {{ $file->Document->User->email }}
            </h5>
        </div>
        <div class="card-body">
            <h5>Subjek : Cek Plagiasi</h5>
            <div class="container mt-5">
                <p>
                    Assalamualaikum Warahmatullahi Wabarakatuh. Saudara
                    {{ $file->Document->User->Student->name }}.
                </p>
                <p>
                    Hasil dari cek plagiasi tesis milik anda sudah kami periksa dan hasilnya <b>LULUS</b>.
                </p>
                <p>
                    Wassalamualaikum Warahmatullahi Wabarakatuh.
                </p>
                <br><br>
                <p>
                    Admin Program Pasca Sarjana
                </p>
            </div>
        </div>
        <div class="card-footer">
            <p class="text-end">
                Copyright {{ now()->format('Y') }} | Program Pasca Sarjana Universitas Sains Al-Qur'an
            </p>
        </div>
    </div>
    <div class="d-flex justify-content-end gap-2">
        <a
            class="btn btn-outline-dark btn-lg"
            href="{{ route('plagiarism.verification', ['document' => $file->Document->id]) }}">
            Batal
        </a>
        <form wire:submit='sendEmail'>
            <button class="btn btn-dark btn-lg" type="submit">Kirim</button>
        </form>
    </div>
</div>
