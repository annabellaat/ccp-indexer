<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entity;
use App\Models\Collection;
use App\Models\EntityTag;

class EntityPage extends Component
{
    public $entity;
    public $ent_tag = [];
    public $readmore = false;
    public $columns = [
        'company', 'series', 'speaker', 'lecturer', 'moderator', 'participants', 'play', 'screenwriter', 'scriptwriter', 'writer', 'playwright', 'librettist', 'adaptor', 'translator', 'director', 'associate_director', 'assistant_director', 'assistant_to_the_director', 'direction_consultant', 'program_director', 'project_director', 'artistic_director', 'artistic_consultant', 'fashion_director', 'ballet_master', 'regisseur', 'dramaturg', 'creative_director', 'director_of_photography', 'camera', 'musical_director', 'musical_arranger', 'stage_director', 'assistant_stage_director', 'composer', 'music', 'lyricist', 'performers', 'ventriloquist', 'cast', 'narrator', 'host', 'executive_producer', 'associate_producer', 'producer', 'production_designer', 'production_supervisor', 'production_manager', 'associate_production_manager', 'deputy_production_manager', 'assistant_production_manager', 'production_coordinator', 'editor', 'visual_effects', 'production_and_costume_consultant', 'set_consultant', 'set_designer', 'set_design_assistant', 'costume_designer', 'costume_consultant', 'make_up_artist', 'production_stylist', 'fashion_designer', 'lighting_designer', 'associate_lighting_designer', 'lighting_design_consultant', 'lighting_design_assistant', 'sound_designer', 'assistant_sound_designer', 'sound_engineer', 'choreographer', 'guest_faculty', 'technical_director', 'assistant_technical_director', 'technical_direction_assistant', 'stage_manager', 'assistant_stage_manager', 'deputy_stage_manager', 'stage_management_assistant', 'audio_visual_designer', 'video_projection_designer', 'video_projection_design_assistant', 'video_operator', 'music_director', 'assistant_music_director', 'arranger', 'conductor', 'choirmaster', 'orchestra', 'tenor', 'countertenor', 'soprano', 'bass_baritone', 'baritone', 'mezzo_soprano', 'alto', 'bandurria', 'bass', 'bass_guitar', 'bassoon', 'cello', 'clarinet', 'contrabass', 'drums', 'english_horn', 'flute', 'french_horn', 'guitar', 'harp', 'keyboard', 'oboe', 'marimba', 'percussion', 'piano', 'viola', 'violin', 'saxophone', 'string_quartet', 'timpani', 'trombone', 'trumpet', 'tuba', 'vocals', 'musicians', 'artist', 'curator', 'author', 'project_coordinator', 'publisher', 'contributing_writer', 'photographer', 'camera_operator'
   ];

    public function goSearch($tag) {
        // $this->redirectRoute('home');
        //  dd($tag);
        $this->redirectRoute('search', ['searchTerm' => $tag]);
    }

    public function readMore() {

        $this->readmore == true ? $this->readmore = false :  $this->readmore = true;
    }
    public function mount(Entity $entity) {
        // $ent_tag = EntityTag::where->$entity->tag;

        //  dd($this->ent_tag);
    }
    public function render()
    {
        return view('livewire.entity-page')->layout('layouts.app');
    }
}
