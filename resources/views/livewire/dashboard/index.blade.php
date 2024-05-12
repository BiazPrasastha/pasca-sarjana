<div>
    <div class="row">
        @can('user-admin')
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Aktivitas Terkini
                    </div>
                    <div class="card-body">
                        @livewire('Dashboard.Components.ActivityDiagram')
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        Data Program Studi Mahasiswa
                    </div>
                    <div class="card-body">
                        @livewire('Dashboard.Components.StudyProgramDiagram')
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Notifikasi</h5>
            </div>
            <div class="card-body">
                @livewire('Dashboard.Components.NotificationTable')
            </div>
        </div>
    @endcan
    @can('user-student')
        <div class="card">
            <div class="card-header">
                <h4>Panduan Mahasiswa</h4>
            </div>
            <div class="card-body">
                @livewire('Dashboard.Components.UserGuidance')
            </div>
        </div>
    @endcan
</div>
