<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\EntityResource\Pages;
use App\Filament\Resources\EntityResource\RelationManagers;
use App\Models\{Entity,Collection, Tag};
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class EntityResource extends Resource
{
    protected static ?string $model = Entity::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Archives';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                ->schema([
                    Forms\Components\TextInput::make('archivist')
                        ->default(auth()->user()->name)
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\Section::make('Classification')
                    ->schema ([
                        Forms\Components\Select::make('category')
                            ->options([
                                'Architecture' => 'Architecture',
                                'Film & Broadcast' => 'Film & Broadcast',
                                'Dance' => 'Dance',
                                'Event' => 'Event',
                                'Literature' => 'Literature',
                                'Music' => 'Music',
                                'Theater' => 'Theater',
                                'Visual Arts' => 'Visual Arts',
                                'Arts Eduction' =>'Arts Eduction',
                                'Literary Arts' => 'Literary Arts'
                            ]),
                        Forms\Components\Select::make('work')
                            ->options([
                                'Audio' => 'Audio',
                                'Moving Image' => 'Moving Image',
                                'Multisensory' => 'Multisensory',
                                'Photo, Print, Paper' => 'Photo, Print, Paper',
                                'Plastic Arts' => 'Plastic Arts',
                                'Publication' => 'Publication',
                                'Fabric, Weave' => 'Fabric, Weave',
                                'Web' => 'Web',
                                'Painting' => 'Painting'
                            ])
                            ->searchable()
                            ->columnSpan(1),
                        Forms\Components\Select::make('material')
                            ->options([
                                'Music track' => 'Music track',
                                'Podcast' => 'Podcast',
                                'Other Recording' => 'Other Recording',
                                'Documentation' => 'Documentation',
                                'Film' => 'Film',
                                'Promotions' => 'Promotions',
                                'Series' => 'Series',
                                'Installation' => 'Installation',
                                'Multimedia' => 'Multimedia',
                                'Performance art' => 'Performance art',
                                'Sound art' => 'Sound art',
                                'Video art' => 'Video art',
                                'Drawing' => 'Drawing',
                                'Ephemera' => 'Ephemera',
                                'Painting collage' => 'Painting collage',
                                'Photo' => 'Photo',
                                'Print' => 'Print',
                                'Record' => 'Record',
                                'Assemblage' => 'Assemblage',
                                'Bamboo art' => 'Bamboo art',
                                'Effigy' => 'Effigy',
                                'Furniture' => 'Furniture',
                                'Instrument' => 'Instrument',
                                'Leaf art' => 'Leaf art',
                                'Metalcraft' => 'Metalcraft',
                                'Personal ornament' => 'Personal ornament',
                                'Pottery' => 'Pottery',
                                'Sculpture' => 'Sculpture',
                                'Artist book' => 'Artist book',
                                'Catalogue' => 'Catalogue',
                                'Chart' => 'Chart',
                                'Comics, graphic novel' => 'Comics, graphic novel',
                                'Dictionary' => 'Dictionary',
                                'Directory' => 'Directory',
                                'Encyclopedia' => 'Encyclopedia',
                                'Essay biography' => 'Essay biography',
                                'Journal' => 'Journal',
                                'Magazine, zine' => 'Magazine, zine',
                                'Manual, guide' => 'Manual, guide',
                                'Map' => 'Map',
                                'Monograph' => 'Monograph',
                                'Newsletter' => 'Newsletter',
                                'Newspaper' => 'Newspaper',
                                'Novel' => 'Novel',
                                'Photo book' => 'Photo book',
                                'Poetry' => 'Poetry',
                                'Report' => 'Report',
                                'Score' => 'Score',
                                'Short story' => 'Short story',
                                'Thesis dissertation' => 'Thesis dissertation',
                                'Basketry' => 'Basketry',
                                'Dress' => 'Dress',
                                'Embroidery' => 'Embroidery',
                                'Textile weaving' => 'Textile weaving',
                                'Mat weaving' => 'Mat weaving',
                                'Webpage' => 'Webpage',
                                'Painting' => 'Painting'
                            ])
                            // ->createOptionForm([
                            //     Forms\Components\TextInput::make('Material')
                            //         ->required(),
                            //     ])
                            ->searchable()
                            ->columnSpan(1),
                        Forms\Components\Select::make('tags')
                            ->relationship('tags', 'name') 
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->multiple()
                            ->searchable()
                            ->options(Tag::take(10)->get()->pluck('name', 'id')),
                        Forms\Components\TextInput::make('code')
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->required()
                        ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                            if ($operation !== 'create') {
                                return;
                            }

                            $set('slug', Str::slug($state));
                        }),
                        Forms\Components\TextInput::make('slug')
                        ->disabled()
                        ->dehydrated()
                        ->required()
                        ->maxLength(255)
                        ->unique(Entity::class, 'slug', ignoreRecord: true),
                    ])
                    ->columns(2)
                    ->collapsible()
                    ->compact(),

                    Forms\Components\Section::make('Identification')
                    ->schema ([
                        Forms\Components\Textarea::make('title')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('alternate-title')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        Forms\Components\DateTimePicker::make('date')
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('place')
                            ->maxLength(255)
                            ->columnSpan(1),
                        Forms\Components\MarkdownEditor::make('description')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('reference')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('open_access_link')
                            ->maxLength(255),
                        Forms\Components\select::make('language')
                            ->options([
                                'Agusanon' => 'Agusanon',
                                'Aklanon' => 'Aklanon',
                                'Basque' => 'Basque',
                                'Batak' => 'Batak',
                                'Bikol' => 'Bikol',
                                'Binukid' => 'Binukid',
                                'Boholano' => 'Boholano',
                                'Bontok' => 'Bontok',
                                'Bugkalot' => 'Bugkalot',
                                'Cantonese' => 'Cantonese',
                                'Capiznon' => 'Capiznon',
                                'Catalan' => 'Catalan',
                                'Cebuano' => 'Cebuano',
                                'Chavacano' => 'Chavacano',
                                'Cuyunon' => 'Cuyunon',
                                'Danish' => 'Danish',
                                'Dutch' => 'Dutch',
                                'English' => 'English',
                                'Finallig' => 'Finallig',
                                'French' => 'French',
                                'Gaddang' => 'Gaddang',
                                'German' => 'German',
                                'Greek' => 'Greek',
                                'Hebrew' => 'Hebrew',
                                'Hiligaynon' => 'Hiligaynon',
                                'Hungarian' => 'Hungarian',
                                'Ibaloy' => 'Ibaloy',
                                'Ibanag' => 'Ibanag',
                                'Ifugao' => 'Ifugao',
                                'Ilocano' => 'Ilocano',
                                'Indonesian' => 'Indonesian',
                                'Isinay' => 'Isinay',
                                'Isneg' => 'Isneg',
                                'Italian' => 'Italian',
                                'Itawit' => 'Itawit',
                                'Ivatan' => 'Ivatan',
                                'Kalinga' => 'Kalinga',
                                'Kapampangan' => 'Kapampangan',
                                'Karay-a' => 'Karay-a',
                                'Korean' => 'Korean',
                                'Japanese' => 'Japanese',
                                'Latin' => 'Latin',
                                'Maguindanaon' => 'Maguindanaon',
                                'Malay' => 'Malay',
                                'Mandarin' => 'Mandarin',
                                'Mandaya' => 'Mandaya',
                                'Mangyan' => 'Mangyan',
                                'Mankayan' => 'Mankayan',
                                'Manobo' => 'Manobo',
                                'Mansaka' => 'Mansaka',
                                'Maranao' => 'Maranao',
                                'Palawan' => 'Palawan',
                                'Pangasinan' => 'Pangasinan',
                                'Polish' => 'Polish',
                                'Portuguese' => 'Portuguese',
                                'Pullun Mapun' => 'Pullun Mapun',
                                'Romblomanon' => 'Romblomanon',
                                'Russian' => 'Russian',
                                'Sambal' => 'Sambal',
                                'Sinama' => 'Sinama',
                                'Spanish' => 'Spanish',
                                'Subanon' => 'Subanon',
                                'Tagalog' => 'Tagalog',
                                'Tagbanwa' => 'Tagbanwa',
                                'Tausug' => 'Tausug',
                                'Tboli' => 'Tboli',
                                'Tinguian' => 'Tinguian',
                                'Tiruray' => 'Tiruray',
                                'Vietnamese' => 'Vietnamese',
                                'Waray' => 'Waray',
                                'Yakan' => 'Yakan'
                            ])
                            ->multiple()
                            ->columnSpan(1),
                    ])
                    ->columns(2)
                    ->collapsible()
                    ->compact(),
                ])
                ->columnSpan(['lg' => 2]),

                Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make('From Collection')
                    ->schema([
                        Forms\Components\Select::make('collection_id')
                        ->relationship('collection', 'name')
                        ->label('Select the closest parent collection')
                        ->searchable()
                        ->options(Collection::take(10)->get()->pluck('name', 'id')),

                    Forms\Components\FileUpload::make('image')
                    ->label('Thumbnails')
                    ->multiple()
                    ->reorderable()
                    ->appendFiles()
                    ->directory('entity-images')
                    ->getUploadedFileNameForStorageUsing(
                        fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                            ->prepend('Ent-')
                    ),
                    Forms\Components\Textarea::make('image')
                        ->maxLength(65535)
                        ->columnSpanFull(),
                    ])
                ])
                ->columnSpan(['lg' => 1]),

                Forms\Components\Group::make()
                ->schema([

                    Forms\Components\Tabs::make('Meta (Fill up if applicable)')
                    ->tabs([
                        Tab::make('Creation')
                        ->schema ([
                            Forms\Components\Select::make('company')
                                ->options([
                                    'Ballet Philippines' => 'Ballet Philippines',
                                    'Bayanihan Dance Company' => 'Bayanihan Dance Company',
                                    'Philippine Ballet Theatre' => 'Philippine Ballet Theatre',
                                    'Philippine Madrigal Singers' => 'Philippine Madrigal Singers',
                                    'Philippine Philharmonic Orchestra' => 'Philippine Philharmonic Orchestra',
                                    'Ramon Obusan Folkloric Group' => 'Ramon Obusan Folkloric Group',
                                    'Tanghalang Pilipino' => 'Tanghalang Pilipino',
                                    'National Music Competitions for Young Artists' => 'National Music Competitions for Young Artists',
                                    'UST Symphony Orchestra' => 'UST Symphony Orchestra'
                                ]),
                            Forms\Components\TextInput::make('series')
                                ->columns(1),
                            Forms\Components\Textarea::make('opening_remarks')
                                ->columns(1),
                            Forms\Components\Textarea::make('closing_remarks')
                                ->columns(1),

                            Forms\Components\Section::make('Talk details')
                            ->schema ([
                                Forms\Components\Textarea::make('speaker')
                                    ->columns(1),
                                Forms\Components\Textarea::make('lecturer')
                                    ->columns(1),
                                Forms\Components\Textarea::make('moderator')
                                    ->columns(1),
                                Forms\Components\Textarea::make('participants')
                                    ->columns(1),
                            ])
                            ->collapsed()
                            ->columns(2),
                            Forms\Components\Section::make('Film/Play/Theater details')
                            ->schema ([
                                Forms\Components\Textarea::make('film')
                                    ->maxLength(255)
                                    ->columns(1),
                                Forms\Components\Textarea::make('play')
                                    ->maxLength(255)
                                    ->columns(1),
                                Forms\Components\Textarea::make('screenwriter')
                                    ->maxLength(255)
                                    ->columns(1),
                                Forms\Components\Textarea::make('scriptwriter')
                                    ->maxLength(255)
                                    ->columns(1),
                                Forms\Components\Textarea::make('writer')
                                    ->maxLength(255)
                                    ->columns(1),
                                Forms\Components\Textarea::make('playwright')
                                    ->maxLength(255)
                                    ->columns(1),
                                Forms\Components\Textarea::make('librettist')
                                    ->maxLength(255)
                                    ->columns(1),
                                Forms\Components\Textarea::make('adaptor')
                                    ->maxLength(255)
                                    ->columns(1),
                                Forms\Components\Textarea::make('adapted_from')
                                    ->columns(1),
                                Forms\Components\Textarea::make('based_on')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('translator')
                                    ->maxLength(255)
                                    ->columns(1),
                                Forms\Components\Textarea::make('concept')
                                    ->maxLength(255)
                                    ->columns(1),
                                Forms\Components\Textarea::make('director')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('associate_director')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('assistant_director')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('assistant_to_the_director')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('direction_consultant')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('program_director')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('project_director')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('artistic_director')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('artistic_consultant')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('fashion_director')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('ballet_master')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('regisseur')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('dramaturg')
                                    ->maxLength(65535)
                                    ->columns(1),
                            ])
                            ->collapsed()
                            ->columns(2),
                            Forms\Components\Section::make('More details')
                            ->schema ([
                                Forms\Components\Textarea::make('creative_director')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('director_of_photography')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('camera')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('musical_director')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('musical_arranger')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('stage_director')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('assistant_stage_director')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('composer')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('music')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('lyricist')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('performers')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('ventriloquist')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('cast')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('narrator')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('host')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('executive_producer')
                                    ->maxLength(100)
                                    ->columns(1),
                                Forms\Components\Textarea::make('associate_producer')
                                    ->maxLength(100)
                                    ->columns(1),
                                Forms\Components\Textarea::make('producer')
                                    ->maxLength(100)
                                    ->columns(1),
                                Forms\Components\Textarea::make('production_designer')
                                    ->maxLength(100)
                                    ->columns(1),
                                Forms\Components\Textarea::make('production_supervisor')
                                    ->maxLength(100)
                                    ->columns(1),
                                Forms\Components\Textarea::make('production_manager')
                                    ->maxLength(100)
                                    ->columns(1),
                                Forms\Components\Textarea::make('associate_production_manager')
                                    ->maxLength(100)
                                    ->columns(1),
                                Forms\Components\Textarea::make('deputy_production_manager')
                                    ->maxLength(100)
                                    ->columns(1),
                                Forms\Components\Textarea::make('assistant_production_manager')
                                    ->maxLength(100)
                                    ->columns(1),
                                Forms\Components\Textarea::make('production_coordinator')
                                    ->maxLength(100)
                                    ->columns(1),
                                Forms\Components\Textarea::make('editor')
                                    ->maxLength(100)
                                    ->columns(1),
                                Forms\Components\Textarea::make('visual_effects')
                                    ->maxLength(100)
                                    ->columns(1),
                                Forms\Components\Textarea::make('production_and_costume_consultant')
                                    ->maxLength(100)
                                    ->columns(1),
                                Forms\Components\Textarea::make('set_consultant')
                                    ->maxLength(100)
                                    ->columns(1),
                                Forms\Components\Textarea::make('set_designer')
                                    ->maxLength(100)
                                    ->columns(1),
                                Forms\Components\Textarea::make('set_design_assistant')
                                    ->maxLength(100)
                                    ->columns(1),
                                Forms\Components\Textarea::make('costume_designer')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('costume_consultant')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('make_up_artist')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('production_stylist')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('fashion_designer')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('lighting_designer')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('associate_lighting_designer')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('lighting_design_consultant')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('lighting_design_assistant')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('sound_designer')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('assistant_sound_designer')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('sound_engineer')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('choreographer')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('guest_faculty')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('technical_director')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('assistant_technical_director')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('technical_direction_assistant')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('stage_manager')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('assistant_stage_manager')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('deputy_stage_manager')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('stage_management_assistant')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('audio_visual_designer')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('video_projection_designer')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('video_projection_design_assistant')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('video_operator')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('music_director')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('assistant_music_director')
                                    ->maxLength(100),
                            ])
                            ->collapsed()
                            ->columns(2),

                            Forms\Components\Section::make('Orchestra details')
                            ->schema ([
                                Forms\Components\Textarea::make('arranger')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('conductor')
                                    ->maxLength(100),
                                Forms\Components\Textarea::make('choirmaster')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('orchestra')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('tenor')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('countertenor')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('soprano')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('bass_baritone')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('baritone')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('mezzo_soprano')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('alto')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('bandurria')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('bass')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('bass_guitar')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('bassoon')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('cello')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('clarinet')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('contrabass')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('drums')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('english_horn')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('flute')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('french_horn')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('guitar')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('harp')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('keyboard')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('oboe')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('marimba')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('percussion')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('piano')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('viola')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('violin')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('saxophone')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('string_quartet')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('timpani')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('trombone')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('trumpet')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('tuba')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('vocals')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('musicians')
                                    ->maxLength(65535)
                                    ->columns(1),
                                Forms\Components\Textarea::make('artist')
                                    ->maxLength(65535)
                                    ->columns(1),
                            ])
                            ->collapsed()
                            ->columns(2),
                            Forms\Components\Textarea::make('curator')
                                ->maxLength(65535),
                            Forms\Components\Textarea::make('author')
                                ->maxLength(65535)
                                ->columns(1),
                            Forms\Components\Textarea::make('project_coordinator')
                                ->maxLength(65535)
                                ->columns(1),
                            Forms\Components\Textarea::make('publisher')
                                ->maxLength(65535)
                                ->columns(1),
                            Forms\Components\Textarea::make('contributing_writer')
                                ->maxLength(65535)
                                ->columns(1),
                            Forms\Components\Textarea::make('photographer')
                                ->maxLength(65535),
                            Forms\Components\Textarea::make('camera_operator')
                                ->maxLength(65535),
                            Forms\Components\select::make('camera_setup')
                                ->options([
                                    '1-cam' => '1-cam',
                                    '2-cam' => '2-cam',
                                    '2-cam with switcher' => '2-cam with switcher',
                                    '3-cam' => '3-cam',
                                    '3-cam with switcher' => '3-cam with switcher',
                                    '4-cam' => '4-cam',
                                    '4-cam with switcher' => '4-cam with switcher',
                                    '5-cam' => '5-cam',
                                    '5-cam with switcher' => '5-cam with switcher'
                                ]),
                            Forms\Components\Textarea::make('shooting_schedule')
                                ->maxLength(65535)
                                ->columnSpanFull(),
                        ])
                        // ->collapsed()
                        ->columns(2),

                        Tab::make('Physical Description')
                        ->schema ([
                            Forms\Components\Select::make('format')
                                ->options([
                                    'Audio cassette' => 'Audio cassette',
                                    'CD' => 'CD',
                                    'CD-R' => 'CD-R',
                                    'LP record' => 'LP record',
                                    'Microcassette' => 'Microcassette',
                                    'Betacam' => 'Betacam',
                                    'Betamax' => 'Betamax',
                                    'Blu-ray' => 'Blu-ray',
                                    'Digital 8' => 'Digital 8',
                                    'DV' => 'DV',
                                    'DVD' => 'DVD',
                                    'DVD-R' => 'DVD-R',
                                    'HD DVD' => 'HD DVD',
                                    'Hi8' => 'Hi8',
                                    'MiniDV' => 'MiniDV',
                                    'MiniDVD' => 'MiniDVD',
                                    'S-VHS' => 'S-VHS',
                                    'Umatic' => 'Umatic',
                                    'VHS' => 'VHS',
                                    'VHS-C' => 'VHS-C',
                                    'Video8' => 'Video8',
                                    'Photographic print' => 'Photographic print',
                                    'Negative' => 'Negative',
                                    'Slide' => 'Slide',
                                    'Contact sheet' => 'Contact sheet',
                                    'Album' => 'Album',
                                    'Hard cover' => 'Hard cover',
                                    'Soft cover' => 'Soft cover',
                                    'Library binding' => 'Library binding',
                                    'Loose-leaf' => 'Loose-leaf',
                                    'Slip-cased' => 'Slip-cased'
                                    ])
                                ->columns(1),
                            Forms\Components\Textarea::make('technique')
                                ->maxLength(65535)
                                ->columns(1),
                            Forms\Components\Textarea::make('measurement')
                                ->maxLength(65535)
                                ->columns(1),
                            Forms\Components\Textarea::make('edition')
                                ->maxLength(255),
                            Forms\Components\Textarea::make('color')
                                ->maxLength(65535)
                                ->columns(1),
                            Forms\Components\Textarea::make('inscription')
                                ->maxLength(65535)
                                ->columns(1),
                        ])
                        // ->collapsed()
                        ->columns(2),

                        Tab::make('Digital Description')
                        ->schema ([
                            Forms\Components\Select::make('extension')
                                ->options([
                                    'AAC' => 'AAC',
                                    'AVI' => 'AVI',
                                    'DOC' => 'DOC',
                                    'DOCX' => 'DOCX',
                                    'EPUB' => 'EPUB',
                                    'FLAC' => 'FLAC',
                                    'GIF' => 'GIF',
                                    'JPEG' => 'JPEG',
                                    'MCC' => 'MCC',
                                    'MKV' => 'MKV',
                                    'MOV' => 'MOV',
                                    'MP3' => 'MP3',
                                    'MP4' => 'MP4',
                                    'MTS' => 'MTS',
                                    'PDF' => 'PDF',
                                    'PNG' => 'PNG',
                                    'TIFF' => 'TIFF',
                                    'WAV' => 'WAV',
                                    'WMA' => 'WMA',
                                    'WMV' => 'WMV'
                                    ])
                                ->columns(1),
                            Forms\Components\TextInput::make('resolution')
                                ->maxLength(25),
                            Forms\Components\TextInput::make('frame_rate')
                                ->maxLength(25),
                            Forms\Components\TextInput::make('aspect_ratio')
                                ->maxLength(25),
                            Forms\Components\TextInput::make('audio')
                                ->maxLength(25),
                            Forms\Components\TextInput::make('duration')
                                ->maxLength(25),
                            Forms\Components\Select::make('wholeness')
                                ->options([
                                    'Complete' => 'Complete',
                                    'Partial' => 'Partial',
                                    'Insufficient' => 'Insufficient'
                                ]),
                            Forms\Components\TextInput::make('file_count')
                                ->numeric(),
                            Forms\Components\TextInput::make('total_size')
                                ->maxLength(25),
                            Forms\Components\Select::make('color_space')
                                ->options([
                                    'sRGB' => 'sRGB',
                                    'Adobe RGB' => 'Adobe RGB',
                                    'CMYK' =>  'CMYK',
                                    'Grayscale' => 'Grayscale',
                                    'Color' => 'Color'
                                ]),
                            Forms\Components\Select::make('video_description')
                                ->options([
                                    'Excellent' => 'Excellent',
                                    'Adequate' => 'Adequate',
                                    'Poor' => 'Poor'
                                ]),
                            Forms\Components\Select::make('audio_description')
                                ->options([
                                    'Excellent' => 'Excellent',
                                    'Adequate' => 'Adequate',
                                    'Poor' => 'Poor'
                                ]),
                            Forms\Components\TextArea::make('notes')
                                ->columnSpanFull(),
                        ])
                        // ->collapsed()
                        ->columns(2),

                        Tab::make('Acquisition, Storage, Citation, and Rights')
                        ->schema ([
                            Forms\Components\Textarea::make('accession_year')
                                ->maxLength(4),
                            Forms\Components\Textarea::make('loan_history')
                                ->maxLength(65535)
                                ->columns(1),
                            Forms\Components\Select::make('ccp_collection')
                                ->options([
                                    'CCP Arts Education Department' => 'CCP Arts Education Department',
                                    'CCP Costume Division' => 'CCP Costume Division',
                                    'CCP Cultural Research & Development Division' => 'CCP Cultural Research & Development Division',
                                    'CCP Intertextual Division' => 'CCP Intertextual Division',
                                    'CCP Library & Archives Division' => 'CCP Library & Archives Division',
                                    'CCP Marketing Department' => 'CCP Marketing Department',
                                    'CCP Media Arts Division' => 'CCP Media Arts Division',
                                    'CCP Visual Arts & Museum Division' => 'CCP Visual Arts & Museum Division'])
                                ->label('CCP Collection'),
                            Forms\Components\Textarea::make('shelf_number')
                                ->maxLength(25),
                            Forms\Components\Textarea::make('inventory_number')
                                ->maxLength(25),
                            Forms\Components\Textarea::make('tape_number')
                                ->maxLength(25),
                            Forms\Components\Textarea::make('hard_drive')
                                ->maxLength(25),
                            Forms\Components\Textarea::make('server')
                                ->maxLength(25),
                            Forms\Components\Select::make('access')
                                ->options([
                                    'Online' => 'Online',
                                    'On-Site' => 'On-Site',
                                    'Restricted' => 'Restricted'])
                                ->columnSpanFull(),
                            Forms\Components\Textarea::make('citation')
                                ->maxLength(255),
                            Forms\Components\Textarea::make('credit_line')
                                ->maxLength(255),
                            Forms\Components\Textarea::make('precup')
                                ->maxLength(255),
                            ])
                            // ->collapsed()
                            ->columns(2),
                    ])
                    // ->collapsed()
                    // ->compact(),

                ])
                ->columnSpan(['lg' => 3])
            ])
            ->columns(3);
        }

        public static function table(Table $table): Table
        {
            return $table
                ->columns([
                    // Tables\Columns\TextColumn::make('archivist')
                    //     ->searchable(),
                    // Tables\Columns\IconColumn::make('thumbnail')
                    //     ->boolean(),
                    Tables\Columns\TextColumn::make('code')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('title')
                        ->searchable()
                        ->limit(30)
                        ->tooltip(fn (Model $record): string => "{$record->title}"),
                    Tables\Columns\TextColumn::make('date')
                        ->date()
                        ->sortable(),
                    Tables\Columns\TextColumn::make('collection.name')
                        ->numeric()
                        ->sortable()
                        ->label('Parent Collection'),
                    Tables\Columns\TextColumn::make('place')
                        ->searchable()
                        ->limit(30),
                        // ->tooltip(fn (Model $record): string => "{$record->place}"),
                    Tables\Columns\TextColumn::make('reference')
                        ->searchable()
                        ->limit(30)
                        ->tooltip(fn (Model $record): string => "{$record->reference}"),
                    Tables\Columns\TextColumn::make('open_access_link')
                        ->searchable()
                        ->limit(30)
                        ->tooltip(fn (Model $record): string => "{$record->open_access_link}"),
                    Tables\Columns\TextColumn::make('created_at')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
                    Tables\Columns\TextColumn::make('updated_at')
                        ->dateTime()
                        ->sortable()
                        ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultPaginationPageOption(25)
            ->paginated([10, 25, 50, 100, 'all']);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEntities::route('/'),
            'create' => Pages\CreateEntity::route('/create'),
            'edit' => Pages\EditEntity::route('/{record}/edit'),
        ];
    }
}
