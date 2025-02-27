<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entity;
use App\Models\Collection;
use Illuminate\Http\Request;

class Hometabs extends Component
{

    public $test;
    public $random_collections;
    public $actual_collections;
    public $perPage = 8;
    public $colsperPage = 4;
    public $activeTab = 'Music';
    public $count = 0;
    public $colcount = 0;
    public $collection_array = [];
    public $collection_output;

    public function sessionRand(Request $request) {
        if ($request->session()->has('session_rand')) {

            if((time() - $request->session()->get('session_rand')) > 60){
                $request->session()->put('session_rand', time());
            }
        }else{
            $request->session()->put('session_rand', time());
        }
    }

    // when changing tabs, randomize output
    // public function clickedNew(Request $request, string $activeTab, string $second = null, string $third = null) {
    //     $this->perPage = 8;
    //     $this->sessionRand($request);
    //     if($activeTab == "Literary Arts") {
    //         $first = Entity::whereNull('collection_id')->where('category', 'like', $activeTab)->orWhere('category', 'like', $second);
    //         $this->count = $first->count();
    //         $this->random_collections = $first->inRandomOrder('RAND('.$request->session()->get('session_rand').')')->take($this->perPage)->get();
    //     } elseif($activeTab == 'Event') {
    //         $first = Entity::whereNull('collection_id')->where('category', 'like', $activeTab)->orWhere('category', 'like', $second)->orWhere('category', 'like', $third);
    //         $this->count = $first->count();
    //         $this->random_collections = $first->inRandomOrder('RAND('.$request->session()->get('session_rand').')')->take($this->perPage)->get();
    //         $this->test = Entity::where('category', 'like', $activeTab)->orWhere('category', 'like', $second)->orWhere('category', 'like', $third)->inRandomOrder('RAND('.$request->session()->get('session_rand').')')->get();
    //     } else {
    //         $first = Entity::whereNull('collection_id')->where('category', 'like', $activeTab);
    //         $this->count = $first->count();
    //         $this->random_collections = $first->inRandomOrder('RAND('.$request->session()->get('session_rand').')')->take($this->perPage)->get();
    //     }

    // }

    public function clickedNew(Request $request, string $activeTab, string $second = null, string $third = null) {
            $this->perPage = 8;
            $this->colsperPage = 4;
            $this->actual_collections = null;
            $this->collection_output = null;
            $this->collection_array = [];

            $this->sessionRand($request);
            if($activeTab == "Literary Arts") {
                // getting arts homepage entities
                $first = Entity::whereNull('collection_id')->where('category', 'like', $activeTab)->orWhere('category', 'like', $second);
                $this->count = $first->count();
                $this->random_collections = $first->orderBy('date', 'DESC')->take($this->perPage)->get();

                // getting arts homepage collections
                $takingcollections = Entity::where('category', 'like', $activeTab)->whereNotNull('collection_id')->orWhere('category', 'like', $second)->whereNotNull('collection_id');
                $this->actual_collections = $takingcollections->select('collection_id')->distinct()->get();

                $this->getParentCols($this->colsperPage);

            } elseif($activeTab == 'Event') {
                // getting event homepage entities
                $first = Entity::whereNull('collection_id')->where('category', 'like', $activeTab)->orWhere('category', 'like', $second)->orWhere('category', 'like', $third);
                $this->count = $first->count();
                $this->random_collections = $first->orderBy('date', 'DESC')->take($this->perPage)->get();

                // getting event homepage collections
                $takingcollections = Entity::where('category', 'like', $activeTab)->whereNotNull('collection_id')->orWhere('category', 'like', $second)->whereNotNull('collection_id')->orWhere('category', 'like', $third)->whereNotNull('collection_id');
                $this->actual_collections = $takingcollections->select('collection_id')->distinct()->get();

                $this->getParentCols($this->colsperPage);

            } else {
                // getting else homepage entities
                $first = Entity::whereNull('collection_id')->where('category', 'like', $activeTab);
                $this->count = $first->count();
                $this->random_collections = $first->orderBy('date', 'DESC')->take($this->perPage)->get();

                // getting else homepage collections
                $takingcollections = Entity::where('category', 'like', $activeTab)->whereNotNull('collection_id');
                $this->actual_collections = $takingcollections->select('collection_id')->distinct()->get();

                $this->test = $this->actual_collections;
                $this->getParentCols($this->colsperPage);
            }

    }

    public function loadMore(Request $request) {
        $this->perPage +=8;
        
        // $this->sessionRand($request);
        // if($this->activeTab == "Literary Arts") {
        //     $this->random_collections = Entity::whereNull('collection_id')->where('category', 'like', $this->activeTab)->orWhere('category', 'like', 'Arts Education')->inRandomOrder('RAND('.$request->session()->get('session_rand').')')->take($this->perPage)->get();
        // } elseif($this->activeTab == 'Event') {
        //     $this->random_collections = Entity::whereNull('collection_id')->where('category', 'like', $this->activeTab)->orWhere('category', 'like', 'Program')->orWhere('category', 'like', 'Festivals')->inRandomOrder('RAND('.$request->session()->get('session_rand').')')->take($this->perPage)->get();
        // } else {
        //     $this->random_collections = Entity::whereNull('collection_id')->where('category', 'like', $this->activeTab)->inRandomOrder('RAND('.$request->session()->get('session_rand').')')->take($this->perPage)->get();
        // }

        if($this->activeTab == "Literary Arts") {
            $this->random_collections = Entity::where('category', 'like', $this->activeTab)->whereNull('collection_id')->orWhere('category', 'like', 'Arts Education')->whereNull('collection_id')->orderBy('date', 'DESC')->take($this->perPage)->get();
        } elseif($this->activeTab == 'Event') {
            $this->random_collections = Entity::where('category', 'like', $this->activeTab)->whereNull('collection_id')->orWhere('category', 'like', 'Program')->whereNull('collection_id')->orWhere('category', 'like', 'Festivals')->whereNull('collection_id')->orderBy('date', 'DESC')->take($this->perPage)->get();
        } else {
            $this->random_collections = Entity::where('category', 'like', $this->activeTab)->whereNull('collection_id')->orderBy('date', 'DESC')->take($this->perPage)->get();
        }
    }

    public function loadMoreCol() {
        $this->colsperPage +=4;

        if($this->activeTab == "Literary Arts") {
            // getting arts homepage collections
            $takingcollections = Entity::where('category', 'like', $this->activeTab)->whereNotNull('collection_id')->orWhere('category', 'like', 'Arts Education')->whereNotNull('collection_id');
            $this->actual_collections = $takingcollections->select('collection_id')->distinct()->get();

            $this->getParentCols($this->colsperPage);

        } elseif($this->activeTab == 'Event') {
            // getting event homepage collections
            $takingcollections = Entity::where('category', 'like', $this->activeTab)->whereNotNull('collection_id')->orWhere('category', 'like', 'Program')->whereNotNull('collection_id')->orWhere('category', 'like', 'Festivals')->whereNotNull('collection_id');
            $this->actual_collections = $takingcollections->select('collection_id')->distinct()->get();

            $this->getParentCols($this->colsperPage);

        } else {
            $takingcollections = Entity::whereNotNull('collection_id')->where('category', 'like', $this->activeTab);
            $this->actual_collections = $takingcollections->select('collection_id')->distinct()->get();
            
            $this->getParentCols($this->colsperPage);
        }
    }

    // check if has parent collection
    public function hasParentCol($val) {
        $rcol = Collection::find($val);
        return $rcol->collection_id != null;
            
        // $this->colcount = $val;
    }

    // get root collections for homepage
    public function getParentCols(int $colsperpage = null) {    

        $i = 0;
        if($this->actual_collections->count() > 0) {
            $e = $this->actual_collections->count();
            do {
                if($this->hasParentCol($this->actual_collections[$i]->collection_id)) {
                    $this->actual_collections[$i]->collection_id = Collection::find($this->actual_collections[$i]->collection_id)->collection_id;
                    continue;
                } else{
                    $this->collection_array[$i] = $this->actual_collections[$i]->collection_id;
                }
                $i++;
            } while ($i < $e);
            $this->collection_array = array_unique($this->collection_array);
            
            $this->colcount = Collection::whereIn('id', $this->collection_array)->count();

            $this->collection_output = Collection::whereIn('id', $this->collection_array)->take($colsperpage)->get();
        } else {
            $this->collection_output = null;
        }
    }

    public function music(Request $request) {
        $this->activeTab = 'Music';
        $this->clickedNew($request, $this->activeTab);
    }
    public function dance(Request $request) {
        $this->activeTab = 'Dance';
        $this->clickedNew($request, $this->activeTab);
    }
    public function theater(Request $request) {
        $this->activeTab = 'Theater';
        $this->clickedNew($request, $this->activeTab);
    }
    public function visualarts(Request $request) {
        $this->activeTab = 'Visual Arts';
        $this->clickedNew($request, $this->activeTab);
    }
    public function film(Request $request) {
        $this->activeTab = 'Film & Broadcast';
        $this->clickedNew($request, $this->activeTab);
    }
    public function literature(Request $request) {
        $this->activeTab = 'Literary Arts';
        $this->clickedNew($request, $this->activeTab, 'Arts Education');
    }
    public function events(Request $request) {
        $this->activeTab = 'Event';
        $this->clickedNew($request, $this->activeTab, 'Program', 'Festivals');
    }

    public function mount(Request $request)
    {
        $this->clickedNew($request, 'Music');
    }

    public function render()
    {
        // $trial = Entity::where('category', 'like', 'Music')->inRandomOrder()->paginate($this->perPage);

        // return view('livewire.hometabs', ['trial' => $trial]);
        return view('livewire.hometabs');
    }
}
