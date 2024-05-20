<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entity;
use App\Models\Collection;
use Livewire\WithPagination;
use PHPUnit\TestRunner\TestResult\Collector;

class BrowseEntity extends Component
{
    public $rry = [];
    public $all_ents = [];
    public $all_cols = [];
    public $all_browse = [];
    public $query = '';
    public $activeLet = 'num';
    protected $searching = true;
    public $showmoreB = false;
    public $moreEnts = [];

    public function mount()
    {
      $this->rry = range("A","Z");
    //   $this->all_ents = Entity::where('collection_id', '=', null)->orderBy('title', 'asc')->take(20)->get();
    //   $this->all_cols = Collection::where('collection_id', '=', null)->orderBy('name', 'asc')->take(20)->get(['name AS title', 'collections.*']);
    //   $this->all_browse = array_merge($this->all_cols->toArray(), $this->all_ents->toArray());
    //   array_multisort(array_column($this->all_browse, 'title'), $this->all_browse);
    }

    public function filterNumber() {
        $this->activeLet =  'num';
        $this->searching = false;
        $this->query = '';
        $this->all_ents = Entity::where('title', 'regexp', '^[0-9]+')->where('collection_id', '=', null)->orderBy('title', 'asc')->take(50)->get();
        $this->all_cols = Collection::where('name', 'regexp', '^[0-9]+')->where('collection_id', '=', null)->orderBy('name', 'asc')->take(50)->get(['name AS title', 'collections.*']);
        $this->all_browse = array_merge($this->all_cols->toArray(), $this->all_ents->toArray());
        array_multisort(array_column($this->all_browse, 'title'), $this->all_browse);

    }

    public function filterByLetter($letter) {
        $this->activeLet =   $letter;
        $this->searching = false;
        $this->query = '';
        $this->all_ents = Entity::where('title', 'like', $letter.'%')->where('collection_id', '=', null)->orderBy('title', 'asc')->take(50)->get();
        $this->all_cols = Collection::where('name', 'like', $letter.'%')->where('collection_id', '=', null)->orderBy('name', 'asc')->take(50)->get(['name AS title', 'collections.*']);
        $this->all_browse = array_merge($this->all_cols->toArray(), $this->all_ents->toArray());
        array_multisort(array_column($this->all_browse, 'title'), $this->all_browse);
        // dd($this->all_browse);
    }
    
    public function goToEnt($id, $slug) {
        $this->redirectRoute('entity', ['entity' => $id, 'slug' => $slug]);
    }

    public function goToCol($id, $slug) {
        $this->redirectRoute('collection', ['collection' => $id, 'slug' => $slug]);
    }

    // public function showMore($id) {
    //     $this->moreEnts = Entity::where('collection_id', '=', $id)->orderBy('title', 'asc')->get()->toArray();
    //     $this->showmoreB = true;
    // }

    // use WithPagination;
    public function render()
    {
        
        if($this->query !== '') {
            $this->searching = true;
            $this->all_ents = Entity::where('collection_id', '=', null)->where('title', 'like', '%'.$this->query.'%')->orderBy('title', 'asc')->get();
            $this->all_cols = Collection::where('collection_id', '=', null)->where('name', 'like', '%'.$this->query.'%')->orderBy('name', 'asc')->get(['name AS title', 'collections.*']);
            $this->all_browse = array_merge($this->all_cols->toArray(), $this->all_ents->toArray());
            array_multisort(array_column($this->all_browse, 'title'), $this->all_browse);
        } else{
            if($this->searching == true) {
                $this->all_ents = Entity::where('collection_id', '=', null)->orderBy('title', 'asc')->take(50)->get();
                $this->all_cols = Collection::where('collection_id', '=', null)->orderBy('name', 'asc')->take(50)->get(['name AS title', 'collections.*']);
                $this->all_browse = array_merge($this->all_cols->toArray(), $this->all_ents->toArray());
                array_multisort(array_column($this->all_browse, 'title'), $this->all_browse);
            }
            // dd($this->all_browse);
        }
        return view('livewire.browse-entity')->layout('layouts.app');
    }
}
