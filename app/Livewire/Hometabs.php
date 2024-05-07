<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Collection;
use App\Models\Entity;

class Hometabs extends Component
{
    public $activeTab = 1;
    public $isactive = false;

    public $random_collections = [];

    public function music() {

        $this->activeTab = 1;
        $this->isactive = true;
        $this->random_collections = Entity::where('category', 'like', 'Music')->inRandomOrder()->take(8)->get();
    }
    public function dance() {
        $this->activeTab = 2;
        $this->random_collections = Entity::where('category', 'like', 'Dance')->inRandomOrder()->take(8)->get();
    }
    public function theater() {
        $this->activeTab = 3;
        $this->random_collections = Entity::where('category', 'like', 'Theater')->inRandomOrder()->take(8)->get();
    }
    public function visualarts() {
        $this->activeTab = 4;
        $this->random_collections = Entity::where('category', 'like', 'Visual Arts')->inRandomOrder()->take(8)->get();
    }
    public function film() {
        $this->activeTab = 5;
        $this->random_collections = Entity::where('category', 'like', 'Film')->inRandomOrder()->take(8)->get();
    }
    public function literature() {
        $this->activeTab = 6;
        $this->random_collections = Entity::where('category', 'like', 'literary arts')->inRandomOrder()->take(8)->get();
    }
    public function events() {
        $this->activeTab = 7;
        $this->random_collections = Entity::where('category', 'like', 'Event')->inRandomOrder()->take(8)->get();
    }

    public function mount()
    {
      $this->random_collections = Entity::where('category', 'like', 'Music')->inRandomOrder()->take(8)->get();
    }

    public function render()
    {
        return view('livewire.hometabs');
    }
}
