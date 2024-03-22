<div>
    <div class="row g-4">
        <div class="col-md-6">
            <div>
                <label class="form-label" for="file">File (.pdf)</label>
                <input class="form-control" id="file" type="file" accept=".pdf" wire:model.blur='form.file'>
                @error('form.file')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <label class="form-label" for="date">Hari/Tanggal</label>
                <input class="form-control" id="date" type="date" wire:model.blur='form.date'>
                @error('form.date')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <label class="form-label" for="title">Judul</label>
                <input class="form-control" id="title" type="text" wire:model.blur='form.title'>
                @error('form.title')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <label class="form-label" for="text">Text</label>
                <textarea class="form-control" id="text" rows="5" wire:model.blur='form.content'></textarea>
                @error('form.content')
                    <div class="invalid-feedback" style="display: block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="card h-100">
                <div class="card-header">
                    <div class="card-text d-flex justify-content-between align-items-center">
                        <p>
                            Preview
                            <button class="btn btn-light btn-icon waves-effect rounded-pill ms-2" wire:click='preview'>
                                <i class="ri-refresh-line"></i>
                            </button>
                        </p>
                    </div>
                </div>
                <div class="card-body text-center">
                    <iframe class="card-img-top img-fluid" src="{{ $form?->file?->temporaryUrl() }}"
                        style="height: 300px" frameborder="0"></iframe>
                    <p class="card-text" style="text-align: justify">
                        {{ $form?->content }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <p class="card-text">
                        <small class="text-muted">{{ $form?->date }}</small>
                    </p>
                    <div class="d-flex">
                        <button class="btn btn-primary btn-label right ms-2" wire:click='store'>
                            <i class="ri-send-plane-line label-icon align-middle fs-16 ms-2"></i>
                            Kirim
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
