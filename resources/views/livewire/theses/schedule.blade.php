<div>
    <div class="mb-4">
        <!-- Buttons with Label -->
        <a class="btn btn-secondary btn-label waves-effect waves-light"
            href="{{ route('theses.verification', ['document' => $document->Document->id]) }}">
            <i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Kembali
        </a>
    </div>
    <div class="card">
        <form wire:submit='submit'>
            <div class="card-body">
                <div class="row gy-2">
                    <div class="col-12">
                        <div wire:ignore>
                            <label class="form-label" for="datetime">Hari/Tanggal & Waktu</label>
                            <input class="form-control" id="datetime" type="text">
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
                            <input class="form-control" id="location" type="text" wire:model='form.location'>
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
                            <select class="js-example-basic-multiple" id="examiner" multiple="multiple">
                                @foreach ($examiners as $examiner)
                                    <option value="{{ $examiner->id }}">{{ $examiner->username }}</option>
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
            <div class="card-footer">
                <button class="btn btn-primary " type="submit">Save Changes</button>
            </div>
        </form>
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
@endpush
