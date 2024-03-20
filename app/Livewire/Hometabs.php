<?php

namespace App\Livewire;

use Livewire\Component;

class Hometabs extends Component
{
    public $activeTab = 1;
    public $isactive = false;

    public function music() {
        $this->activeTab = 1;
        $this->isactive = true;
    }
    public function dance() {
        $this->activeTab = 2;
    }
    public function theater() {
        $this->activeTab = 3;
    }
    public function visualarts() {
        $this->activeTab = 4;
    }
    public function film() {
        $this->activeTab = 5;
    }
    public function literature() {
        $this->activeTab = 6;
    }
    public function events() {
        $this->activeTab = 7;
    }

    public function render()
    {
        $this->activeTab = $this->activeTab + 5 - 5;
        return view('livewire.hometabs');
    }
}
