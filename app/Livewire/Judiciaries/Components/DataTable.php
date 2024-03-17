<?php

namespace App\Livewire\Judiciaries\Components;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Document;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;

class DataTable extends DataTableComponent
{
    public function builder(): Builder
    {
        return Document::query()
            ->where('type', 'judiciaries')
            ->with(['user', 'user.student']);
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchDisabled();
        $this->setColumnSelectDisabled();
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
            DateRangeFilter::make('Tanggal', 'timestamp')
                ->filter(function (Builder $builder, array $dateRange) {
                    $builder
                        ->whereDate('timestamp', '>=', $dateRange['minDate'])
                        ->whereDate('timestamp', '<=', $dateRange['maxDate']);
                })->hiddenFromMenus(),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('id', 'id')
                ->hideIf(true),
            Column::make('name', 'user.student.name')
                ->hideIf(true),
            LinkColumn::make('Nama', 'user.student.name')
                ->title(fn ($row) => $row['user.student.name'])
                ->location(fn ($row) => route('judiciaries.verification', ['document' => $row->id]))
                ->secondaryHeaderFilter('name')
                ->sortable(),
            Column::make("NIM", "user.student.nim")
                ->secondaryHeaderFilter('nim')
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
