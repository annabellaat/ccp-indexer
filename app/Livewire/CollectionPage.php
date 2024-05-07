<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Collection;
use App\Models\Entity;

class CollectionPage extends Component
{
    public $collection;
    public $entsUnderCollection = [];
    public $colsUnderCollection = [];

    public function mount(Collection $collection) {
        $this->entsUnderCollection = Entity::where('collection_id', '=', $collection->id)->get();
        $this->colsUnderCollection = Collection::where('collection_id', '=', $collection->id)->get();
    }

    public function render()
    {
        return view('livewire.collection-page')->layout('layouts.app');
    }
}
