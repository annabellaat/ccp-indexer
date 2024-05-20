<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entity;
use App\Models\Collection;

class UnderCollection extends Component
{
    public $id;
    public $slug;
    public $title;
    public $collections = [];
    public $entities = [];
    public $all = [];

    public function goToEnt($id, $slug) {
        $this->redirectRoute('entity', ['entity' => $id, 'slug' => $slug]);
    }

    public function goToCol($id, $slug) {
        $this->redirectRoute('collection', ['collection' => $id, 'slug' => $slug]);
    }
    // public function mount() {

    //     $this->entities = Entity::where('collection_id', '=', $this->id)->orderBy('title', 'asc')->get()->toArray();
    //     $this->collections = Collection::where('collection_id', '=', $this->id)->orderBy('name', 'asc')->get(['name AS title', 'collections.*'])->toArray();
    //     $this->all = array_merge($this->entities, $this->collections);
    //     array_multisort(array_column($this->all, 'title'), $this->all);
    //     // dd($this->all);

    // }

    public function render()
    {
        $this->entities = Entity::where('collection_id', '=', $this->id)->orderBy('title', 'asc')->get()->toArray();
        $this->collections = Collection::where('collection_id', '=', $this->id)->orderBy('name', 'asc')->get(['name AS title', 'collections.*'])->toArray();
        $this->all = array_merge($this->entities, $this->collections);
        array_multisort(array_column($this->all, 'title'), $this->all);
        return view('livewire.under-collection');
    }
}
