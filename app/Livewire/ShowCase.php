<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class ShowCase extends Component
{
    use WithPagination;

    public $caseModel= "";
    public $step = 1;

    public function render()
    {
        return view('livewire.show-case', [
            'caseModel' => $this->caseModel,
        ]);
    }
    
}
