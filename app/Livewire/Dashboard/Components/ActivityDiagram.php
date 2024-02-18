<?php

namespace App\Livewire\Dashboard\Components;

use App\Models\Document;
use Carbon\CarbonPeriod;
use Livewire\Component;

class ActivityDiagram extends Component
{
    public function render()
    {
        $period = CarbonPeriod::create(now()->startOfYear(), '1 month', now());
        foreach ($period as $month) {
            $months[] = $month->format('M Y');
            $data_proposal[] = Document::where('type', 'proposal')
                ->where('status', 'accept')
                ->where('timestamp', 'like', $month->format('Y-m') . '%')
                ->count();
            $data_plagiarism[] = Document::where('type', 'plagiarism')
                ->where('status', 'accept')
                ->where('timestamp', 'like', $month->format('Y-m') . '%')
                ->count();
            $data_theses[] = Document::where('type', 'theses')
                ->where('status', 'accept')
                ->where('timestamp', 'like', $month->format('Y-m') . '%')
                ->count();
        }

        $data = [];
        $data['month'] = $months;
        $data['data_proposal'] = $data_proposal;
        $data['data_plagiarism'] = $data_plagiarism;
        $data['data_theses'] = $data_theses;
        $data = json_encode($data);

        return view('livewire.dashboard.components.activity-diagram', compact('data'));
    }
}
