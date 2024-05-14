<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Collection;
use App\Models\Entity;

class Hometabs extends Component
{

    public $random_collections = [];

    public function music() {
        $this->random_collections = Entity::where('category', 'like', 'Music')->inRandomOrder()->take(8)->get();
    }
    public function dance() {
        $this->random_collections = Entity::where('category', 'like', 'Dance')->inRandomOrder()->take(8)->get();
    }
    public function theater() {
        $this->random_collections = Entity::where('category', 'like', 'Theater')->inRandomOrder()->take(8)->get();
    }
    public function visualarts() {
        $this->random_collections = Entity::where('category', 'like', 'Visual Arts')->inRandomOrder()->take(8)->get();
    }
    public function film() {
        $this->random_collections = Entity::where('category', 'like', 'Film')->inRandomOrder()->take(8)->get();
    }
    public function literature() {
        $this->random_collections = Entity::where('category', 'like', 'literary arts')->inRandomOrder()->take(8)->get();
    }
    public function events() {
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
