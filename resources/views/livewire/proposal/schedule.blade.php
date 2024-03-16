<div>
    <div class="mb-4">
        <!-- Buttons with Label -->
        <a class="btn btn-secondary btn-label waves-effect waves-light"
            href="{{ route('proposal.verification', ['document' => $document->id]) }}">
            <i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Kembali
        </a>
    </div>
    <div class="card">
        <form wire:submit='validation'>
            <div class="card-body">
                <div class="row gy-2">
                    <div class="col-12">
                        <div wire:ignore>
                            <label class="form-label" for="datetime">Hari/Tanggal & Waktu</label>
                            <input class="form-control" id="datetime" type="text" value="{{ $form->datetime }}"
                                {{ $already_exists ? 'readonly' : '' }}>
                        </div>
                        @error('form.datetime')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div>
                            <label class="form-label" for="location">Tempat</label>
                            <input class="form-control" id="location" type="text" wire:model='form.location'
                                {{ $already_exists ? 'readonly' : '' }}>
                        </div>
                        @error('form.location')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <div wire:ignore>
                            <label class="form-label" for="examiner">
                                Dosen Penguji
                            </label>
                            <select class="js-example-basic-multiple" id="examiner" multiple="multiple"
                                {{ $already_exists ? 'readonly' : '' }}>
                                @foreach ($examiners as $examiner)
                                    <option value="{{ $examiner->id }}"
                                        {{ in_array($examiner->id, $form->examiners) ? 'selected' : '' }}>
                                        {{ $examiner->username }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('form.examiners')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                        @error('form.examiners.*')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            @if (!$already_exists)
                <div class="card-footer">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                </div>
            @endif
        </form>
    </div>

    <div class="modal fade" id="acceptConfirmationModal" aria-labelledby="confirmationLabel" aria-hidden="true"
        tabindex="-1" style="display: none;" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationLabel"> Konfirmasi Jadwal Ujian Proposal</h5>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close">
                    </button>
                </div>
                <form wire:submit='submit'>
                    <div class="modal-body">
                        <div class="text-center my-3">
                            <h4 class="fw-bold">{{ $document->title }}</h4>
                            <p class="text-muted mb-4"> Apakah anda mengatur jadwal ujian proposal diajukan?
                            </p>
                            <div class="hstack gap-2 justify-content-center">
                                <button class="btn btn-light" data-bs-dismiss="modal" type="button">Close</button>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <!--jquery cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('assets/js/pages/select2.init.js') }}"></script>
    <script src="{{ asset('assets/js/pages/moment.js') }}"></script>
    <!-- init js -->
    <script src="{{ asset('assets/js/pages/form-pickers.init.js') }}"></script>
    <script>
        $('.js-example-basic-multiple').on('change', function() {
            let item = $('.js-example-basic-multiple').val();
            @this.set('form.examiners', item, false);
        });
    </script>
    <script>
        flatpickr("#datetime", {
            dateFormat: 'Y-m-d H:i',
            enableTime: true,
            time_24hr: true,
            onChange: function(selectedDates) {
                let date = moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss');
                @this.set('form.datetime', date, false)
            }
        });
    </script>
    <script>
        let acceptConfirmationModal = new bootstrap.Modal(document.getElementById('acceptConfirmationModal'));
        document.addEventListener('livewire:init', () => {
            Livewire.on('show-confirmation', (event) => {
                acceptConfirmationModal.show()
            });
            Livewire.on('hide-confirmation', (event) => {
                acceptConfirmationModal.hide()
            });
        });
    </script>
@endpush
