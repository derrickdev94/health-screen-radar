<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ReactiveHeader extends Component
{
    public $riskScore = 0;
    protected $listeners = ['riskScoreChanged'];

    public function riskScoreChanged($newScore){
        $this->riskScore = $newScore;
    }

    public function render(){
        return view('livewire.reactive-header');
    }
}
