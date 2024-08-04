<?php

namespace App\Livewire\Pages;

use App\Models\TotalParticipant as ModelsTotalParticipant;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Total Participant')]
class TotalParticipant extends Component
{
    public function render()
    {
        $totals = ModelsTotalParticipant::where('is_active', true)->orderBy('total', 'desc')->get();
        return view('livewire.pages.total-participant', ['totals' => $totals]);
    }
}
