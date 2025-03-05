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
    public $activeLet = 'all';
    public $totalCount = 0;
    public $perPage = 25;
    public $numOrLet = 3;

    public function mount()
    {
      $this->rry = range("A","Z");
      $this->filterAll();
    }

    public function mergeSort($cols, $ents) {
        $this->all_browse = array_merge($cols->toArray(), $ents->toArray());
        array_multisort(array_column($this->all_browse, 'title'), SORT_ASC,SORT_STRING|SORT_FLAG_CASE, $this->all_browse);
        $this->totalCount = count($this->all_browse);
        $this->all_browse = array_slice($this->all_browse,0,$this->perPage);
    }

    public function filterAll() {
        $this->activeLet = 'all';
        $this->numOrLet = 3;
        $this->query = '';
        $this->all_ents = Entity::where('collection_id', '=', null)->orderBy('title', 'asc')->get();
        $this->all_cols = Collection::where('collection_id', '=', null)->orderBy('name', 'asc')->get(['name AS title', 'collections.*']);
        $this->mergeSort($this->all_cols, $this->all_ents);

    }

    public function filterNumber() {
        if($this->activeLet != 'num') {
            $this->perPage = 25;
        }
        $this->numOrLet = 1;
        $this->activeLet =  'num';
        $this->query = '';
        $this->all_ents = Entity::where('title', 'regexp', '^[0-9]+')->where('collection_id', '=', null)->orderBy('title', 'asc')->take($this->perPage)->get();
        $this->all_cols = Collection::where('name', 'regexp', '^[0-9]+')->where('collection_id', '=', null)->orderBy('name', 'asc')->take($this->perPage)->get(['name AS title', 'collections.*']);
        $this->mergeSort($this->all_cols, $this->all_ents);

    }

    public function filterByLetter($letter) {
        if($this->activeLet != $letter) {
            $this->perPage = 25;
        }
        $this->numOrLet = 2;
        $this->activeLet =  $letter;
        $this->query = '';
        $this->all_ents = Entity::where('title', 'like', $letter.'%')->where('collection_id', '=', null)->orderBy('title', 'asc')->take($this->perPage)->get();
        $this->all_cols = Collection::where('name', 'like', $letter.'%')->where('collection_id', '=', null)->orderBy('name', 'asc')->take($this->perPage)->get(['name AS title', 'collections.*']);
        $this->mergeSort($this->all_cols, $this->all_ents);
    }

    public function filterBySearch() {
        $this->all_ents = Entity::where('collection_id', '=', null)->where('title', 'like', '%'.$this->query.'%')->orderBy('title', 'asc')->get();
        $this->all_cols = Collection::where('collection_id', '=', null)->where('name', 'like', '%'.$this->query.'%')->orderBy('name', 'asc')->get(['name AS title', 'collections.*']);
        $this->mergeSort($this->all_cols, $this->all_ents);

    }

    public function loadMore() {
        $this->perPage +=25;
        if($this->query != '') {
            $this->filterBySearch();
        } else {
            if($this->numOrLet == 1) {
                $this->filterNumber();
            } elseif($this->numOrLet == 2) {
                $this->filterByLetter($this->activeLet);
            } else {
                $this->filterAll();
            }
        }

    }
    
    public function goToEnt($id, $slug=null) {
        $this->redirectRoute('entity', ['entity' => $id, 'slug' => $slug]);
    }

    public function goToCol($id, $slug=null) {
        $this->redirectRoute('collection', ['collection' => $id, 'slug' => $slug]);
    }

    public function render()
    {
        if($this->query !== '') {
            $this->activeLet = '?';
            $this->filterBySearch();
        }
        return view('livewire.browse-entity')->layout('layouts.app');
    }
}
