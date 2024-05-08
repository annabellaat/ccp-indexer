<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entity;
// use Livewire\WithPagination;

class BrowseEntity extends Component
{
    public $rry = [];
    public $all_ents = [];
    public $query = '';
    public $activeLet = 'A';
    protected $searching = true;

    public function mount()
    {
        
      $this->rry = range("A","Z");
      $this->all_ents = Entity::orderBy('title', 'asc')->take(20)->get();
    }

    
    public function filterByLetter($letter) {
        $this->activeLet = $letter;
        $this->searching = false;
        $this->query = '';
        $this->all_ents = Entity::where('title', 'like', $letter.'%')->orderBy('title', 'asc')->take(50)->get();
        // $this->all_ents = Entity::where('title', 'like', $letter.'%')->orderBy('title', 'asc')->paginate(5);
        
    }

    // use WithPagination;
    public function render()
    {
        // dd($this->rry);
        if($this->query !== '') {
            $this->searching = true;
            $this->all_ents = Entity::where('title', 'like', '%'.$this->query.'%')->orderBy('title', 'asc')->take(50)->get();
        } else{
            if($this->searching == true) $this->all_ents = Entity::orderBy('title', 'asc')->take(50)->get();
        }
        return view('livewire.browse-entity')->layout('layouts.app');
    }
}
