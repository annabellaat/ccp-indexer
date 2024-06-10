<?php

namespace App\Filament\Imports;

use App\Models\Entity;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Contracts\Support\Jsonable;
use PhpParser\Node\Stmt\Label;
use Illuminate\Support\Str;
use League\CommonMark\Delimiter\Delimiter;

use function League\Csv\delimiter_detect;
use function PHPUnit\Framework\isNull;

class EntityImporter extends Importer
{
    protected static ?string $model = Entity::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('archivist')
                ->rules(['max:255']),
                // ->requiredMapping(),
            // ImportColumn::make('thumbnail')
            //     ->label('Legacy Thumbnail')
            //     ->castStateUsing(function (string $state): ?int {
            //         if ($state == 'TRUE') {
            //             return 1;
            //         }else {
            //             return 0;
            //         }
            //     }),
            ImportColumn::make('work')
                ->rules(['max:65535']),
            ImportColumn::make('material')
                ->rules(['max:65535']),
            ImportColumn::make('code')
                ->rules(['max:255']),
            ImportColumn::make('category')
                ->rules(['max:65535']),
            ImportColumn::make('title')
                ->rules(['max:255']),
            // ImportColumn::make('slug')
            //     ->rules(['max:255']),
            ImportColumn::make('alternate-title')
                ->rules(['max:65535']),
            ImportColumn::make('date')
                ->rules(['date']),
            ImportColumn::make('place')
                ->rules(['max:255']),
            ImportColumn::make('description')
                ->rules(['max:65535']),
            ImportColumn::make('reference')
                ->rules(['max:65535']),
            ImportColumn::make('open_access_link')
                ->rules(['max:65535']),
            ImportColumn::make('language')
                ->rules(['max:65535'])
                ->array(','),
                // separate by comma
            ImportColumn::make('company')
                ->rules(['max:65535']),
            ImportColumn::make('series')
                ->rules(['max:65535']),
            ImportColumn::make('opening_remarks')
                ->rules(['max:65535']),
            ImportColumn::make('closing_remarks')
                ->rules(['max:65535']),
            ImportColumn::make('speaker')
                ->rules(['max:65535']),
            ImportColumn::make('lecturer')
                ->rules(['max:65535']),
            ImportColumn::make('moderator')
                ->rules(['max:255']),
            ImportColumn::make('participants')
                ->rules(['max:65535']),
            ImportColumn::make('film')
                ->rules(['max:65535']),
            ImportColumn::make('play')
                ->rules(['max:65535']),
            ImportColumn::make('screenwriter')
                ->rules(['max:65535']),
            ImportColumn::make('scriptwriter')
                ->rules(['max:65535']),
            ImportColumn::make('writer')
                ->rules(['max:65535']),
            ImportColumn::make('playwright')
                ->rules(['max:65535']),
            ImportColumn::make('librettist')
                ->rules(['max:65535']),
            ImportColumn::make('adaptor')
                ->rules(['max:65535']),
            ImportColumn::make('adapted_from')
                ->rules(['max:65535']),
            ImportColumn::make('based_on')
                ->rules(['max:65535']),
            ImportColumn::make('translator')
                ->rules(['max:65535']),
            ImportColumn::make('concept')
                ->rules(['max:65535']),
            ImportColumn::make('director')
                ->rules(['max:65535']),
            ImportColumn::make('associate_director')
                ->rules(['max:65535']),
            ImportColumn::make('assistant_director')
                ->rules(['max:65535']),
            ImportColumn::make('assistant_to_the_director')
                ->guess(['Assistant to the Director'])
                ->rules(['max:65535']),
            ImportColumn::make('direction_consultant')
                ->rules(['max:65535']),
            ImportColumn::make('program_director')
                ->rules(['max:65535']),
            ImportColumn::make('project_director')
                ->rules(['max:65535']),
            ImportColumn::make('artistic_director')
                ->rules(['max:65535']),
            ImportColumn::make('artistic_consultant')
                ->rules(['max:65535']),
            ImportColumn::make('fashion_director')
                ->rules(['max:65535']),
            ImportColumn::make('ballet_master')
                ->rules(['max:65535']),
            ImportColumn::make('regisseur')
                ->rules(['max:65535']),
            ImportColumn::make('dramaturg')
                ->rules(['max:65535']),
            ImportColumn::make('creative_director')
                ->rules(['max:65535']),
            ImportColumn::make('director_of_photography')
                ->rules(['max:65535']),
            ImportColumn::make('camera')
                ->rules(['max:65535']),
            ImportColumn::make('musical_director')
                ->rules(['max:65535']),
            ImportColumn::make('musical_arranger')
                ->rules(['max:65535']),
            ImportColumn::make('stage_director')
                ->rules(['max:65535']),
            ImportColumn::make('assistant_stage_director')
                ->rules(['max:65535']),
            ImportColumn::make('composer')
                ->rules(['max:65535']),
            ImportColumn::make('music')
                ->rules(['max:65535']),
            ImportColumn::make('lyricist')
                ->rules(['max:65535']),
            ImportColumn::make('performers')
                ->rules(['max:65535']),
            ImportColumn::make('ventriloquist')
                ->rules(['max:65535']),
            ImportColumn::make('cast')
                ->rules(['max:65535']),
            ImportColumn::make('narrator')
                ->rules(['max:65535']),
            ImportColumn::make('host')
                ->rules(['max:65535']),
            ImportColumn::make('executive_producer')
                ->rules(['max:65535']),
            ImportColumn::make('associate_producer')
                ->rules(['max:65535']),
            ImportColumn::make('producer')
                ->rules(['max:65535']),
            ImportColumn::make('production_designer')
                ->rules(['max:65535']),
            ImportColumn::make('production_supervisor')
                ->rules(['max:65535']),
            ImportColumn::make('production_manager')
                ->rules(['max:65535']),
            ImportColumn::make('associate_production_manager')
                ->rules(['max:65535']),
            ImportColumn::make('deputy_production_manager')
                ->rules(['max:65535']),
            ImportColumn::make('assistant_production_manager')
                ->rules(['max:65535']),
            ImportColumn::make('production_coordinator')
                ->rules(['max:65535']),
            ImportColumn::make('editor')
                ->rules(['max:65535']),
            ImportColumn::make('visual_effects')
                ->rules(['max:65535']),
            ImportColumn::make('production_and_costume_consultant')
                ->rules(['max:65535']),
            ImportColumn::make('set_consultant')
                ->rules(['max:65535']),
            ImportColumn::make('set_designer')
                ->rules(['max:65535']),
            ImportColumn::make('set_design_assistant')
                ->rules(['max:65535']),
            ImportColumn::make('costume_designer')
                ->rules(['max:65535']),
            ImportColumn::make('costume_consultant')
                ->rules(['max:65535']),
            ImportColumn::make('make_up_artist')
                ->rules(['max:65535'])
                ->label('Make-up Artist'),
            ImportColumn::make('production_stylist')
                ->rules(['max:65535']),
            ImportColumn::make('fashion_designer')
                ->rules(['max:65535']),
            ImportColumn::make('lighting_designer')
                ->rules(['max:65535']),
            ImportColumn::make('associate_lighting_designer')
                ->rules(['max:65535']),
            ImportColumn::make('lighting_design_consultant')
                ->rules(['max:65535']),
            ImportColumn::make('lighting_design_assistant')
                ->rules(['max:65535']),
            ImportColumn::make('sound_designer')
                ->rules(['max:65535']),
            ImportColumn::make('assistant_sound_designer')
                ->rules(['max:65535']),
            ImportColumn::make('sound_engineer')
                ->rules(['max:65535']),
            ImportColumn::make('choreographer')
                ->rules(['max:65535']),
            ImportColumn::make('guest_faculty')
                ->rules(['max:65535']),
            ImportColumn::make('technical_director')
                ->rules(['max:65535']),
            ImportColumn::make('assistant_technical_director')
                ->rules(['max:65535']),
            ImportColumn::make('technical_direction_assistant')
                ->rules(['max:65535']),
            ImportColumn::make('stage_manager')
                ->rules(['max:65535']),
            ImportColumn::make('assistant_stage_manager')
                ->rules(['max:65535']),
            ImportColumn::make('deputy_stage_manager')
                ->rules(['max:65535']),
            ImportColumn::make('stage_management_assistant')
                ->rules(['max:65535']),
            ImportColumn::make('audio_visual_designer')
                ->label('Audio-Visual Designer')
                ->rules(['max:65535']),
            ImportColumn::make('video_projection_designer')
                ->rules(['max:65535']),
            ImportColumn::make('video_projection_design_assistant')
                ->rules(['max:65535']),
            ImportColumn::make('video_operator')
                ->rules(['max:65535']),
            ImportColumn::make('music_director')
                ->rules(['max:65535']),
            ImportColumn::make('assistant_music_director')
                ->rules(['max:65535']),
            ImportColumn::make('arranger')
                ->rules(['max:65535']),
            ImportColumn::make('conductor')
                ->rules(['max:65535']),
            ImportColumn::make('choirmaster')
                ->rules(['max:65535']),
            ImportColumn::make('orchestra')
                ->rules(['max:65535']),
            ImportColumn::make('tenor')
                ->rules(['max:65535']),
            ImportColumn::make('countertenor')
                ->rules(['max:65535']),
            ImportColumn::make('soprano')
                ->rules(['max:65535']),
            ImportColumn::make('bass_baritone')
                ->rules(['max:65535']),
            ImportColumn::make('baritone')
                ->rules(['max:65535']),
            ImportColumn::make('mezzo_soprano')
                ->rules(['max:65535']),
            ImportColumn::make('alto')
                ->rules(['max:65535']),
            ImportColumn::make('bandurria')
                ->rules(['max:65535']),
            ImportColumn::make('bass')
                ->rules(['max:65535']),
            ImportColumn::make('bass_guitar')
                ->rules(['max:65535']),
            ImportColumn::make('bassoon')
                ->rules(['max:65535']),
            ImportColumn::make('cello')
                ->rules(['max:65535']),
            ImportColumn::make('clarinet')
                ->rules(['max:65535']),
            ImportColumn::make('contrabass')
                ->rules(['max:65535']),
            ImportColumn::make('drums')
                ->rules(['max:65535']),
            ImportColumn::make('english_horn')
                ->rules(['max:65535']),
            ImportColumn::make('flute')
                ->rules(['max:65535']),
            ImportColumn::make('french_horn')
                ->rules(['max:65535']),
            ImportColumn::make('guitar')
                ->rules(['max:65535']),
            ImportColumn::make('harp')
                ->rules(['max:65535']),
            ImportColumn::make('keyboard')
                ->rules(['max:65535']),
            ImportColumn::make('oboe')
                ->rules(['max:65535']),
            ImportColumn::make('marimba')
                ->rules(['max:65535']),
            ImportColumn::make('percussion')
                ->rules(['max:65535']),
            ImportColumn::make('piano')
                ->rules(['max:65535']),
            ImportColumn::make('viola')
                ->rules(['max:65535']),
            ImportColumn::make('violin')
                ->rules(['max:65535']),
            ImportColumn::make('saxophone')
                ->rules(['max:65535']),
            ImportColumn::make('string_quartet')
                ->rules(['max:65535']),
            ImportColumn::make('timpani')
                ->rules(['max:65535']),
            ImportColumn::make('trombone')
                ->rules(['max:65535']),
            ImportColumn::make('trumpet')
                ->rules(['max:65535']),
            ImportColumn::make('tuba')
                ->rules(['max:65535']),
            ImportColumn::make('vocals')
                ->rules(['max:65535']),
            ImportColumn::make('musicians')
                ->rules(['max:65535']),
            ImportColumn::make('artist')
                ->rules(['max:65535']),
            ImportColumn::make('curator')
                ->rules(['max:65535']),
            ImportColumn::make('author')
                ->rules(['max:65535']),
            ImportColumn::make('project_coordinator')
                ->rules(['max:65535']),
            ImportColumn::make('publisher')
                ->rules(['max:65535']),
            ImportColumn::make('contributing_writer')
                ->rules(['max:65535']),
            ImportColumn::make('photographer')
                ->rules(['max:65535']),
            ImportColumn::make('camera_operator')
                ->rules(['max:65535']),
            ImportColumn::make('camera_setup')
                ->rules(['max:65535']),
            ImportColumn::make('shooting_schedule')
                ->rules(['max:65535']),
            ImportColumn::make('format')
                ->rules(['max:65535']),
            ImportColumn::make('technique')
                ->rules(['max:65535']),
            ImportColumn::make('measurement')
                ->rules(['max:65535']),
            ImportColumn::make('edition')
                ->rules(['max:255']),
            ImportColumn::make('color')
                ->rules(['max:65535']),
            ImportColumn::make('inscription')
                ->rules(['max:65535']),
            ImportColumn::make('extension')
                ->rules(['max:65535']),
            ImportColumn::make('resolution')
                ->rules(['max:25']),
            ImportColumn::make('frame_rate')
                ->rules(['max:25']),
            ImportColumn::make('aspect_ratio')
                ->rules(['max:25']),
            ImportColumn::make('audio')
                ->rules(['max:25']),
            ImportColumn::make('duration')
                ->rules(['max:25']),
            ImportColumn::make('wholeness')
                ->rules(['max:65535']),
            ImportColumn::make('file_count')
                ->numeric()
                // ->rules(['integer'])
                ->ignoreBlankState(),
            ImportColumn::make('total_size')
                ->rules(['max:25']),
            ImportColumn::make('color_space')
                ->rules(['max:65535']),
            ImportColumn::make('video_description')
                ->rules(['max:65535']),
            ImportColumn::make('audio_description')
                ->rules(['max:65535']),
            ImportColumn::make('notes')
                ->rules(['max:65535']),
            ImportColumn::make('accession_year')
                // ->rules(['date'])
                ->ignoreBlankState(),
            ImportColumn::make('loan_history')
                ->rules(['max:65535']),
            ImportColumn::make('ccp_collection')
                ->label('Collection')
                ->rules(['max:65535']),
            ImportColumn::make('shelf_number')
                ->rules(['max:25']),
            ImportColumn::make('inventory_number')
                ->rules(['max:25']),
            ImportColumn::make('tape_number')
                ->rules(['max:25']),
            ImportColumn::make('hard_drive')
                ->rules(['max:25']),
            ImportColumn::make('server')
                ->rules(['max:25']),
            ImportColumn::make('access')
                ->rules(['max:65535']),
            ImportColumn::make('citation')
                ->rules(['max:255']),
            ImportColumn::make('credit_line')
                ->rules(['max:255']),
            ImportColumn::make('precup')
                ->rules(['max:255']),
            // ImportColumn::make('collection')
            //     ->relationship(),
        ];
    }

    public function fillRecord(): void
    {
        parent::fillRecord(); // Call the parent method to fill standard fields

        // Manually fill additional fields
        $additionalFields = [
            'slug',
        ];
        foreach ($additionalFields as $field) {
            if (array_key_exists($field, $this->data)) {
                $this->record->{$field} = $this->data[$field];
            }
        }
    }

    protected function beforeFill(): void
    {
        $this->data['slug'] = Str::slug($this->data['code']);
        // $this->data['language'] = preg_replace('/[\n]/', '", "', $this->data['language']);
    }

    public function resolveRecord(): ?Entity
    {
        // return Entity::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Entity();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your entity import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
