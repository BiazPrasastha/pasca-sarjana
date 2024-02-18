<?php

namespace App\Livewire\Dashboard\Components;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Document;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class NotificationTable extends DataTableComponent
{
    protected $model = Document::class;

    public function mount()
    {
        $this->setSort('timestamp', 'desc');
    }


    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectDisabled();
        $this->setSearchDisabled();
        $this->setEagerLoadAllRelationsEnabled();
    }

    public function filters(): array
    {
        return [
            TextFilter::make('Nama', 'name')
                ->config([
                    'placeholder' => 'Search'
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereRelation('user.student', 'name', 'like', '%' . $value . '%');
                })->hiddenFromMenus(),
            TextFilter::make('NIM', 'nim')
                ->config([
                    'placeholder' => 'Search'
                ])
                ->filter(function (Builder $builder, string $value) {
                    $builder->whereRelation('user.student', 'nim', 'like', '%' . $value . '%');
                })->hiddenFromMenus(),
            SelectFilter::make('Status', 'status')
                ->options(
                    [
                        '' => 'Semua',
                        'pending' => 'Menunggu Persetujuan',
                        'accept' => 'Diterima',
                        'decline' => 'Ditolak',
                    ]
                )
                ->setFirstOption('Semua')
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('status', '=', $value);
                })
                ->hiddenFromMenus(),
            SelectFilter::make('Type', 'type')
                ->options(
                    [
                        '' => 'Semua',
                        'proposal' => 'Pengajuan Proposal',
                        'plagiarism' => 'Plagiasi',
                        'theses' => 'Tesis',
                        'judiciaries' => 'Yudisium',
                    ]
                )
                ->setFirstOption('Semua')
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('type', '=', $value);
                })
                ->hiddenFromMenus(),
            DateRangeFilter::make('Tanggal', 'timestamp')
                ->filter(function (Builder $builder, array $dateRange) {
                    $builder
                        ->whereDate($builder->getModel()->getTable() . '.timestamp', '>=', $dateRange['minDate'])
                        ->whereDate($builder->getModel()->getTable() . '.timestamp', '<=', $dateRange['maxDate']);
                })->hiddenFromMenus(),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Nama", "user.student.name")
                ->sortable()
                ->secondaryHeaderFilter('name')
                ->eagerLoadRelations(),
            Column::make("NIM", "user.student.nim")
                ->secondaryHeaderFilter('nim')
                ->sortable()
                ->eagerLoadRelations(),
            Column::make("Type", "type")
                ->secondaryHeaderFilter('type')
                ->format(
                    function ($value, $row, Column $column) {
                        switch ($value) {
                            case 'proposal':
                                return 'Pengajuan Proposal';
                                break;
                            case 'plagiarism':
                                return 'Plagiasi';
                                break;
                            case 'theses':
                                return 'Tesis';
                                break;
                            case 'judiciaries':
                                return 'Yudisium';
                                break;

                            default:
                                return $value;
                                break;
                        }
                    }
                )
                ->sortable(),
            Column::make("Tanggal", "timestamp")
                ->secondaryHeaderFilter('timestamp')
                ->sortable(),
            Column::make("Status", "status")
                ->secondaryHeaderFilter('status')
                ->format(
                    function ($value, $row, Column $column) {
                        switch ($value) {
                            case 'pending':
                                return '<button class="btn btn-warning w-100 text-dark"> Menunggu Persetujuan </button>';
                                break;
                            case 'accept':
                                return '<button class="btn btn-success w-100"> Diterima </button>';
                                break;
                            case 'decline':
                                return '<button class="btn btn-danger w-100"> Ditolak </button>';
                                break;
                            default:
                                return '<button class="btn btn-secondary w-100"> Unknown </button>';
                                break;
                        }
                    }
                )
                ->html(),
        ];
    }
}
