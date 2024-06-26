<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Collection;
use App\Models\Entity;

class EntityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entity::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'archivist' => $this->faker->word(),
            'thumbnail' => $this->faker->word(),
            'work' => $this->faker->text(),
            'material' => $this->faker->text(),
            'code' => $this->faker->word(),
            'category' => $this->faker->text(),
            'title' => $this->faker->sentence(4),
            'slug' => $this->faker->slug(),
            'alternate-title' => $this->faker->text(),
            'date' => $this->faker->dateTime(),
            'place' => $this->faker->word(),
            'description' => $this->faker->text(),
            'reference' => $this->faker->word(),
            'open_access_link' => $this->faker->word(),
            'language' => $this->faker->text(),
            'company' => $this->faker->company(),
            'series' => $this->faker->text(),
            'opening_remarks' => $this->faker->text(),
            'closing_remarks' => $this->faker->text(),
            'speaker' => $this->faker->text(),
            'lecturer' => $this->faker->text(),
            'moderator' => $this->faker->word(),
            'participants' => $this->faker->text(),
            'film' => $this->faker->word(),
            'play' => $this->faker->word(),
            'screenwriter' => $this->faker->word(),
            'scriptwriter' => $this->faker->word(),
            'writer' => $this->faker->word(),
            'playwright' => $this->faker->word(),
            'librettist' => $this->faker->word(),
            'adaptor' => $this->faker->word(),
            'adapted_from' => $this->faker->text(),
            'based_on' => $this->faker->text(),
            'translator' => $this->faker->word(),
            'concept' => $this->faker->word(),
            'director' => $this->faker->text(),
            'associate_director' => $this->faker->text(),
            'assistant_director' => $this->faker->text(),
            'assistant_to_the_director' => $this->faker->text(),
            'direction_consultant' => $this->faker->text(),
            'program_director' => $this->faker->text(),
            'project_director' => $this->faker->text(),
            'artistic_director' => $this->faker->text(),
            'artistic_consultant' => $this->faker->text(),
            'fashion_director' => $this->faker->text(),
            'ballet_master' => $this->faker->text(),
            'regisseur' => $this->faker->text(),
            'dramaturg' => $this->faker->text(),
            'creative_director' => $this->faker->text(),
            'director_of_photography' => $this->faker->text(),
            'camera' => $this->faker->text(),
            'musical_director' => $this->faker->text(),
            'musical_arranger' => $this->faker->text(),
            'stage_director' => $this->faker->text(),
            'assistant_stage_director' => $this->faker->text(),
            'composer' => $this->faker->text(),
            'music' => $this->faker->text(),
            'lyricist' => $this->faker->text(),
            'performers' => $this->faker->text(),
            'ventriloquist' => $this->faker->text(),
            'cast' => $this->faker->text(),
            'narrator' => $this->faker->text(),
            'host' => $this->faker->text(),
            'executive_producer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'associate_producer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'producer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'production_designer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'production_supervisor' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'production_manager' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'associate_production_manager' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'deputy_production_manager' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'assistant_production_manager' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'production_coordinator' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'editor' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'visual_effects' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'production_and_costume_consultant' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'set_consultant' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'set_designer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'set_design_assistant' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'costume_designer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'costume_consultant' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'make_up_artist' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'production_stylist' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'fashion_designer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'lighting_designer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'associate_lighting_designer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'lighting_design_consultant' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'lighting_design_assistant' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'sound_designer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'assistant_sound_designer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'sound_engineer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'choreographer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'guest_faculty' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'technical_director' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'assistant_technical_director' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'technical_direction_assistant' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'stage_manager' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'assistant_stage_manager' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'deputy_stage_manager' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'stage_management_assistant' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'audio_visual_designer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'video_projection_designer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'video_projection_design_assistant' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'video_operator' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'music_director' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'assistant_music_director' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'arranger' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'conductor' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'choirmaster' => $this->faker->text(),
            'orchestra' => $this->faker->text(),
            'tenor' => $this->faker->text(),
            'countertenor' => $this->faker->text(),
            'soprano' => $this->faker->text(),
            'bass_baritone' => $this->faker->text(),
            'baritone' => $this->faker->text(),
            'mezzo_soprano' => $this->faker->text(),
            'alto' => $this->faker->text(),
            'bandurria' => $this->faker->text(),
            'bass' => $this->faker->text(),
            'bass_guitar' => $this->faker->text(),
            'bassoon' => $this->faker->text(),
            'cello' => $this->faker->text(),
            'clarinet' => $this->faker->text(),
            'contrabass' => $this->faker->text(),
            'drums' => $this->faker->text(),
            'english_horn' => $this->faker->text(),
            'flute' => $this->faker->text(),
            'french_horn' => $this->faker->text(),
            'guitar' => $this->faker->text(),
            'harp' => $this->faker->text(),
            'keyboard' => $this->faker->text(),
            'oboe' => $this->faker->text(),
            'marimba' => $this->faker->text(),
            'percussion' => $this->faker->text(),
            'piano' => $this->faker->text(),
            'viola' => $this->faker->text(),
            'violin' => $this->faker->text(),
            'saxophone' => $this->faker->text(),
            'string_quartet' => $this->faker->text(),
            'timpani' => $this->faker->text(),
            'trombone' => $this->faker->text(),
            'trumpet' => $this->faker->text(),
            'tuba' => $this->faker->text(),
            'vocals' => $this->faker->text(),
            'musicians' => $this->faker->text(),
            'artist' => $this->faker->text(),
            'curator' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'author' => $this->faker->text(),
            'project_coordinator' => $this->faker->text(),
            'publisher' => $this->faker->text(),
            'contributing_writer' => $this->faker->text(),
            'photographer' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'camera_operator' => $this->faker->word(),
            'camera_setup' => $this->faker->text(),
            'shooting_schedule' => $this->faker->text(),
            'format' => $this->faker->text(),
            'technique' => $this->faker->text(),
            'measurement' => $this->faker->text(),
            'edition' => $this->faker->word(),
            'color' => $this->faker->text(),
            'inscription' => $this->faker->text(),
            'extension' => $this->faker->text(),
            'resolution' => $this->faker->regexify('[A-Za-z0-9]{25}'),
            'frame_rate' => $this->faker->regexify('[A-Za-z0-9]{25}'),
            'aspect_ratio' => $this->faker->regexify('[A-Za-z0-9]{25}'),
            'audio' => $this->faker->regexify('[A-Za-z0-9]{25}'),
            'duration' => $this->faker->regexify('[A-Za-z0-9]{25}'),
            'wholeness' => $this->faker->text(),
            'file_count' => $this->faker->randomNumber(),
            'total_size' => $this->faker->regexify('[A-Za-z0-9]{25}'),
            'color_space' => $this->faker->text(),
            'video_description' => $this->faker->text(),
            'audio_description' => $this->faker->text(),
            'notes' => $this->faker->text(),
            'accession_year' => $this->faker->year(),
            'loan_history' => $this->faker->text(),
            'ccp_collection' => $this->faker->text(),
            'shelf_number' => $this->faker->regexify('[A-Za-z0-9]{25}'),
            'inventory_number' => $this->faker->regexify('[A-Za-z0-9]{25}'),
            'tape_number' => $this->faker->regexify('[A-Za-z0-9]{25}'),
            'hard_drive' => $this->faker->regexify('[A-Za-z0-9]{25}'),
            'server' => $this->faker->regexify('[A-Za-z0-9]{25}'),
            'access' => $this->faker->text(),
            'citation' => $this->faker->word(),
            'credit_line' => $this->faker->word(),
            'precup' => $this->faker->word(),
            'collection_id' => Collection::factory(),
        ];
    }
}
