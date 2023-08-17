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

    public function openModal($formPath)
    {
        $this->isOpen = true;
        $this->formPath = $formPath;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('components.modal');
    }
}
