<div>
    <div class="mb-4">
        <!-- Buttons with Label -->
        <a class="btn btn-secondary btn-label waves-effect waves-light"
            href="{{ route('plagiarism.verification', ['document' => $document->Document->id]) }}">
            <i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>
                Kirim ke : {{ $document->Document->User->email }}
            </h5>
        </div>
        <div class="card-body">
            <h5>Subjek : Cek Plagiasi</h5>
            <div class="container mt-5">
                <p>
                    Assalamualaikum Warahmatullahi Wabarakatuh. Saudara
                    {{ $document->Document->User->Student->name }}.
                </p>
                <p>
                    Hasil dari cek plagiasi tesis milik anda sudah kami periksa dan hasilnya <b>TIDAK LULUS</b>.
                    Silahkan merevisi, terima kasih.
                </p>
                @if ($decline_count >= 3)
                    <p>
                        Dikarenakan anda sudah melakukan cek plagiasi sebanyak 2 kali namun tetap gagal, anda dikenakan
                        denda sebesar <b>Rp. 50.000</b>. Silahkan menghubungi Administrator untuk melakukan pembayaran.
                    </p>
                @endif
                <p>
                    Wassalamualaikum Warahmatullahi Wabarakatuh.
                </p>
                <br><br>
                <p>
                    Admin Program Pasca Sarjana
                </p>
                @if ($decline_count < 3)
                    <br><br>
                    <p class="text-end">
                        <small>
                            Catatan: Apabila sudah 2 kali pengecekan namun masih gagal akan dikenakan denda sebesar
                            <b>Rp.
                                50.000</b>
                        </small>
                    </p>
                @endif
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
            href="{{ route('plagiarism.verification', ['document' => $document->Document->id]) }}">
            Batal
        </a>
        <form wire:submit='sendEmail'>
            <button class="btn btn-dark btn-lg" type="submit">Kirim</button>
        </form>
    </div>
</div>
