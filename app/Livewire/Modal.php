<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{

    public $isOpen = false;
    public $formPath = '';

    protected $listeners = [
        'openModal' => 'openModal',
        'closeModal' => 'closeModal',
    ];

    public function openModal(String $path)
    {
        error_log('modal openx:'. $this->isOpen);
        $this->isOpen = true;
        $this->formPath = $path;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        error_log('modal open:'. $this->isOpen);
        return view('components.modal');
    }
}
