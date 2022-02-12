<?php

namespace App\Http\Livewire;

use App\Models\Track;
use Livewire\Component;
use Livewire\WithPagination;

class ActivityStats extends Component
{
    use WithPagination;

    public $perPage = 10;

    public function render()
    {
        $tracks = Track::query()->paginate($this->perPage);

        $coordinates = [];
        foreach($tracks as $track) {
            $coordinates[] = [(float)$track->lon, $track->lat];
        }

        return view('livewire.activity-stats', compact('tracks','coordinates'));
    }
}
