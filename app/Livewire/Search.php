<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Collection;
use App\Models\Entity;

class Search extends Component
{
    public $searchItem = '';
    public $ents = [];
    public $cols = [];
    public $all_search = [];
    public $searchIs = false;
    public $seOp = 'mr-3 pt-7';
    public $seCl = 'mr-3';
    public $entC = 0;
    public $colC = 0;
    public $columns = [
         'place', 'description','alternate-title', 'company', 'series', 'speaker', 'lecturer', 'moderator', 'participants', 'play', 'screenwriter', 'scriptwriter', 'writer', 'playwright', 'librettist', 'adaptor', 'translator', 'director', 'associate_director', 'assistant_director', 'assistant_to_the_director', 'direction_consultant', 'program_director', 'project_director', 'artistic_director', 'artistic_consultant', 'fashion_director', 'ballet_master', 'regisseur', 'dramaturg', 'creative_director', 'director_of_photography', 'camera', 'musical_director', 'musical_arranger', 'stage_director', 'assistant_stage_director', 'composer', 'music', 'lyricist', 'performers', 'ventriloquist', 'cast', 'narrator', 'host', 'executive_producer', 'associate_producer', 'producer', 'production_designer', 'production_supervisor', 'production_manager', 'associate_production_manager', 'deputy_production_manager', 'assistant_production_manager', 'production_coordinator', 'editor', 'visual_effects', 'production_and_costume_consultant', 'set_consultant', 'set_designer', 'set_design_assistant', 'costume_designer', 'costume_consultant', 'make_up_artist', 'production_stylist', 'fashion_designer', 'lighting_designer', 'associate_lighting_designer', 'lighting_design_consultant', 'lighting_design_assistant', 'sound_designer', 'assistant_sound_designer', 'sound_engineer', 'choreographer', 'guest_faculty', 'technical_director', 'assistant_technical_director', 'technical_direction_assistant', 'stage_manager', 'assistant_stage_manager', 'deputy_stage_manager', 'stage_management_assistant', 'audio_visual_designer', 'video_projection_designer', 'video_projection_design_assistant', 'video_operator', 'music_director', 'assistant_music_director', 'arranger', 'conductor', 'choirmaster', 'orchestra', 'tenor', 'countertenor', 'soprano', 'bass_baritone', 'baritone', 'mezzo_soprano', 'alto', 'bandurria', 'bass', 'bass_guitar', 'bassoon', 'cello', 'clarinet', 'contrabass', 'drums', 'english_horn', 'flute', 'french_horn', 'guitar', 'harp', 'keyboard', 'oboe', 'marimba', 'percussion', 'piano', 'viola', 'violin', 'saxophone', 'string_quartet', 'timpani', 'trombone', 'trumpet', 'tuba', 'vocals', 'musicians', 'artist', 'curator', 'author', 'project_coordinator', 'publisher', 'contributing_writer', 'photographer', 'camera_operator'
    ];

    public function goToEnt($id, $slug) {
        $this->redirectRoute('entity', ['entity' => $id, 'slug' => $slug]);
    }

    public function goToCol($id, $slug) {
        $this->redirectRoute('collection', ['collection' => $id, 'slug' => $slug]);
    }

    public function close() {
        $this->searchIs = $this->searchIs ? false : true;
        $this->searchItem = "";
    }

    public function goSearch() {
        $this->redirectRoute('search', ['searchTerm' => $this->searchItem]);
    }
    public function render()
    {
        // return view('livewire.search', [
        //     'results' => Entity::whereLike('title', $this->searchItem ?? ''),
        // ]);


        // $this->allCols = Entity::all();
        // foreach($this->columns as $column) {
        //     $this->results = Entity::where($column, 'like', '%'.$this->searchItem.'%')->get();
        //     if ($this->results != '[]') {
        //         array_push($this->resultsArray, $this->results);
        //     }
        // }



        // if(strlen($this->searchItem) >= 1) {

        //     $query = Entity::where('title', 'like', '%'.$this->searchItem.'%');
        //     foreach($this->columns as $column) {
        //         $query->orWhere($column, 'LIKE', '%'.$this->searchItem.'%');
        //     }
        //     $this->ents = $query->orderBy('title', 'asc')->get();
        //     $this->entC = $this->ents->count();
        //     $this->ents = $query->orderBy('title', 'asc')->limit(3)->get();
            
        //     $this->cols = Collection::where('collection_id', '=', null)->where('name', 'like', '%'.$this->searchItem.'%')->orWhere('description', 'like', '%'.$this->searchItem.'%')->orderBy('name', 'asc')->get();
        //     $this->colC = $this->cols->count();
        //     $this->cols = Collection::where('collection_id', '=', null)->where('name', 'like', '%'.$this->searchItem.'%')->orWhere('description', 'like', '%'.$this->searchItem.'%')->orderBy('name', 'asc')->limit(3)->get();

        // }
        return view('livewire.search');

    }
}
