<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entity;
use App\Models\Collection;

class OpenAccess extends Component
{
    public $all_ents = [];
    public $all_cols = [];
    public $all_browse = [];

    public function mount() {
        $cc = 0;
        $query = new Collection();
        $this->all_ents = Entity::where('open_access_link', '!=', NULL)->where('open_access_link', '!=', '')->get();
        if($this->all_ents->count() != 0) {
            $query = Collection::where('id', '=', $this->all_ents[0]->collection_id);
        }

        foreach($this->all_ents as $ent) {
            if($ent->collection_id != null) {
                if($cc == 0) {
                    continue;
                }
                else {
                    $query->orWhere('id', '=', $ent->collection_id);
                }
            }
            $cc++;
        }
        $this->all_ents = $this->all_ents->where('collection_id', '=', null);
        if( $this->all_ents->count() != 0) {
            if(($query)->count() == 0) {
                $this->all_cols = $query->orderBy('name', 'asc')->get();
            } else {
                $this->all_cols = $query->get();
            }
        }
    }

    public function render()
    {
        return view('livewire.open-access')->layout('layouts.app');
    }
}
