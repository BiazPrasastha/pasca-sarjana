<div>
    <form wire:submit='search'>
        <div class="row mb-4 g-4">
            <div class="col-md-6">
                <div class="input-group">
                    <input class="form-control" type="text" aria-describedby="search-button"
                        placeholder="Nama, Judul, atau Lainnya" wire:model='query'>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <span wire:ignore>
                        <input class="form-control" id="datetime" type="text" aria-describedby="search-date">
                    </span>
                    <button class="btn btn-primary" id="search-submit" type="submit">Search</button>
                    @if ($this->filtered)
                        <button class="btn btn-danger" id="search-reset" type="reset"
                            wire:click='resetSearch'>Reset</button>
                    @endif
                </div>
            </div>
        </div>
    </form>
    <div class="row g-3">
        <div class="col-md-4">
            <a href="{{ route('admin.news.create') }}">
                <div class="card h-100" style="height: 500px!important; max-height:500px">
                    <div class="card-body d-flex align-items-center justify-content-center flex-column">
                        <button class="btn btn-light btn-icon waves-effect my-4 rounded-pill fs-3" type="button">
                            <i class="ri-add-fill"></i>
                        </button>
                        <h4 class="card-title">Tambahkan Berita Baru</h4>
                    </div>
                </div>
            </a>
        </div>
        @foreach ($news as $item)
            <div class="col-md-4">
                <div class="card h-100" style="height: 500px!important; max-height:500px">
                    <img class="card-img-top img-fluid" src="{{ asset("storage/$item->url") }}" alt="Card image cap" />
                    <div class="card-body">
                        <h4 class="card-title">{{ $item->title }}</h4>
                        <p class="card-text" style="text-align: justify; height: 50px!important; max-height:50px">
                            {{ Str::words($item->content, 25, '...') }}</p>
                    </div>
                    <div class="card-footer">
                        <p class="card-text d-flex justify-content-between align-items-center">
                            <small class="text-muted">{{ $item->timestamp->format('d F Y') }}</small>
                            <small class="text-muted">
                                <a class="btn btn-light btn-icon waves-effect rounded-pill" type="button"
                                    href="{{ route('admin.news.edit', ['news' => $item->id]) }}">
                                    <i class="ri-edit-fill"></i>
                                </a>
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@push('scripts')
    <script src="{{ asset('assets/js/pages/form-pickers.init.js') }}"></script>
    <script src="{{ asset('assets/js/pages/moment.js') }}"></script>
    <script>
        flatpickr("#datetime", {
            dateFormat: 'Y-m-d',
            mode: "range",
            onChange: function(selectedDates, dateStr) {
                @this.set('range', dateStr, false)
            }
        });
    </script>
@endpush
