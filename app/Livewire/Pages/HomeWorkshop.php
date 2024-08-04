<?php

namespace App\Livewire\Pages;

use App\Models\Workshop as ModelsWorkshop;
use Livewire\Component;

class HomeWorkshop extends Component
{
    public function render()
    {
        $workshops = ModelsWorkshop::where('is_active', true)->orderBy('no_urut', 'asc')->get();
        return view('livewire.pages.home-workshop', ['workshops' => $workshops]);
    }
}
