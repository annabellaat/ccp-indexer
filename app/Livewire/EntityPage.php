<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entity;
use App\Models\EntityTag;

class EntityPage extends Component
{
    public $entity;
    public $ent_tag = [];

    public function mount(Entity $entity) {
        // $ent_tag = EntityTag::where->$entity->tag;

        //  dd($this->ent_tag);
    }
    public function render()
    {
        return view('livewire.entity-page')->layout('layouts.app');
    }
}