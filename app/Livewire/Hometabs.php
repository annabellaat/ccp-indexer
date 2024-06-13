<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entity;
use Illuminate\Http\Request;

class Hometabs extends Component
{

    public $random_collections;
    public $perPage = 8;
    public $activeTab = 'Music';
    public $count = 0;

    public function sessionRand(Request $request) {
        if ($request->session()->has('session_rand')) {

            if((time() - $request->session()->get('session_rand')) > 60){
                $request->session()->put('session_rand', time());
            }
        }else{
            $request->session()->put('session_rand', time());
        }
    }

    public function clickedNew(Request $request, string $activeTab, string $second = null, string $third = null) {
        $this->perPage = 8;
        $this->sessionRand($request);
        if($activeTab == "Literary Arts") {
            $this->random_collections = Entity::where('category', 'like', $activeTab)->orWhere('category', 'like', $second)->inRandomOrder('RAND('.$request->session()->get('session_rand').')')->take($this->perPage)->get();
            $this->count = Entity::where('category', 'like', $activeTab)->count();
        } elseif($activeTab == 'Event') {
            $this->random_collections = Entity::where('category', 'like', $activeTab)->orWhere('category', 'like', $second)->orWhere('category', 'like', $third)->inRandomOrder('RAND('.$request->session()->get('session_rand').')')->take($this->perPage)->get();
            $this->count = Entity::where('category', 'like', $activeTab)->count();
        } else {
            $this->random_collections = Entity::where('category', 'like', $activeTab)->inRandomOrder('RAND('.$request->session()->get('session_rand').')')->take($this->perPage)->get();
            $this->count = Entity::where('category', 'like', $activeTab)->count();
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

    public function loadMore(Request $request) {
        $this->perPage +=4;
        $this->sessionRand($request);
        $this->random_collections = Entity::where('category', 'like', $this->activeTab)->inRandomOrder('RAND('.$request->session()->get('session_rand').')')->take($this->perPage)->get();
        
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
