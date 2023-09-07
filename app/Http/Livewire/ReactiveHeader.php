<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ReactiveHeader extends Component
{
    public $riskScore = 0;
    public $eligiblityStatus = array(
        'general'=>array(
            'type'=>'General Eligiblity',
            'statusText'=>"Ineligible",
            'status'=>false
        ),
        'current'=>array(
            'type'=>'Current Eligiblity',
            'statusText'=>"Ineligible",
            'status'=>false
        )

    );
    protected $listeners = ['riskScoreChanged','updateEligiblityStatus'];

    public function riskScoreChanged($newScore){
        $this->riskScore = $newScore;
    }

    public function updateEligiblityStatus($eligiblity){
        $this->eligiblityStatus = $eligiblity;
    }

    public function render(){
        return view('livewire.reactive-header');
    }
}
