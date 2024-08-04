<?php

namespace App\Livewire\Pages;

use App\Models\Workshop as ModelsWorkshop;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Workshops')]
class Workshop extends Component
{
    public function render()
    {
        $workshops = ModelsWorkshop::where('is_active', true)->orderBy('no_urut', 'asc')->get();
        return view('livewire.pages.workshop', ['workshops' => $workshops]);
    }
}
