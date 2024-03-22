<?php

namespace App\Livewire\Announcement;

use App\Models\Announcement;
use Carbon\Carbon;
use Livewire\Attributes\Title;
use Illuminate\Support\Str;
use Livewire\Component;

#[Title('Pengumuman')]
class Index extends Component
{
    public $query;
    public $range;
    public $announcements;
    public $filtered = false;

    public function rules()
    {
        return [
            'query' => ['nulled', 'string'],
            'range' => ['nulled', 'string']
        ];
    }

    public function mount()
    {
        $this->announcements = Announcement::all();
    }

    public function render()
    {
        return view('livewire.announcement.index');
    }

    public function search()
    {
        $is_range = Str::contains($this->range, ' to ');
        $arr =  explode(' to ', $this->range);

        $this->announcements = Announcement::when($this->query != null, function ($query) {
            $query->where(function ($q) {
                $q->where('title', 'like', "%$this->query%")
                    ->orWhere('content', 'like', "%$this->query%");
            });
        })->when($this->range != null, function ($query) use ($is_range, $arr) {
            $startDate = Carbon::createFromFormat('Y-m-d', $arr[0])->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', ($is_range ? $arr[1] : $arr[0]))->endOfDay();

            $query->whereBetween('timestamp', [$startDate, $endDate]);
        })
            ->get();

        $this->filtered = true;
    }

    public function resetSearch()
    {
        $this->reset('query', 'range');
        $this->announcements = Announcement::all();
        $this->filtered = false;
    }
}
