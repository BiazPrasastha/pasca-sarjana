<?php

namespace App\Livewire\Payment\Components;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Number;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class DataTable extends DataTableComponent
{
    public function builder(): Builder
    {
        return Payment::query()
            ->where('user_id', auth()->id());
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
            SelectFilter::make('Jenis Pembayaran', 'type')
                ->options(
                    [
                        '' => 'Semua',
                        'martikulasi' => 'Martikulasi',
                        'ekskursi' => 'Ekskursi',
                        'proposal' => 'Proposal'
                    ]
                )
                ->setFirstOption('Semua')
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('type', '=', $value);
                })
                ->hiddenFromMenus(),
            DateRangeFilter::make('Tanggal', 'created_at')
                ->filter(function (Builder $builder, array $dateRange) {
                    $builder
                        ->whereDate('created_at', '>=', $dateRange['minDate'])
                        ->whereDate('created_at', '<=', $dateRange['maxDate']);
                })->hiddenFromMenus(),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('id', 'id')
                ->hideIf(true),
            Column::make("Jenis Pembayaran", 'type')
                ->hideIf(true)
                ->sortable(),
            LinkColumn::make("Jenis Pembayaran", 'type')
                ->title(fn ($row) => $row['type'])
                ->location(function ($row) {
                    switch ($row['status']) {
                        case 'pending';
                            return route('student.payment.process', ['id' => $row['id']]);
                            break;
                        case 'accept':
                            return route('student.payment.confirm', ['id' => $row['id']]);
                            break;
                        default:
                            return '#';
                            break;
                    }
                })
                ->secondaryHeaderFilter('type')
                ->sortable(),
            Column::make("Jumlah", 'amount')
                ->format(fn ($value) => Number::format($value))
                ->sortable(),
            Column::make("Tanggal", 'created_at')
                ->format(fn ($value) => $value->format('Y-m-d'))
                ->secondaryHeaderFilter('created_at')
                ->sortable(),
            Column::make("Status", 'status')
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
                ->html()
                ->secondaryHeaderFilter('status')
                ->sortable(),
        ];
    }
}
