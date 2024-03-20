<?php

namespace App\Filament\User\Resources;

use App\Filament\User\Resources\EntityResource\Pages;
use App\Filament\User\Resources\EntityResource\RelationManagers;
use App\Models\Entity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EntityResource extends Resource
{
    protected static ?string $model = Entity::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('archivist')
                    ->maxLength(255),
                Forms\Components\Toggle::make('thumbnail')
                    ->required(),
                Forms\Components\Textarea::make('work')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('material')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('code')
                    ->maxLength(255),
                Forms\Components\Textarea::make('category')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('tag')
                    ->maxLength(20),
                Forms\Components\Textarea::make('title')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('alternate-title')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('date'),
                Forms\Components\TextInput::make('place')
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('reference')
                    ->maxLength(255),
                Forms\Components\TextInput::make('open_access_link')
                    ->maxLength(255),
                Forms\Components\Textarea::make('language')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('company')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('series')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('opening_remarks')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('closing_remarks')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('speaker')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('lecturer')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('moderator')
                    ->maxLength(255),
                Forms\Components\Textarea::make('participants')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('film')
                    ->maxLength(255),
                Forms\Components\TextInput::make('play')
                    ->maxLength(255),
                Forms\Components\TextInput::make('screenwriter')
                    ->maxLength(255),
                Forms\Components\TextInput::make('scriptwriter')
                    ->maxLength(255),
                Forms\Components\TextInput::make('writer')
                    ->maxLength(255),
                Forms\Components\TextInput::make('playwright')
                    ->maxLength(255),
                Forms\Components\TextInput::make('librettist')
                    ->maxLength(255),
                Forms\Components\TextInput::make('adaptor')
                    ->maxLength(255),
                Forms\Components\Textarea::make('adapted_from')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('based_on')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('translator')
                    ->maxLength(255),
                Forms\Components\TextInput::make('concept')
                    ->maxLength(255),
                Forms\Components\Textarea::make('director')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('associate_director')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('assistant_director')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('assistant_to_the_director')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('direction_consultant')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('program_director')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('project_director')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('artistic_director')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('artistic_consultant')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('fashion_director')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('ballet_master')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('regisseur')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('dramaturg')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('creative_director')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('director_of_photography')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('camera')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('musical_director')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('musical_arranger')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('stage_director')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('assistant_stage_director')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('composer')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('music')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('lyricist')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('performers')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('ventriloquist')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('cast')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('narrator')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('host')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('executive_producer')
                    ->maxLength(100),
                Forms\Components\TextInput::make('associate_producer')
                    ->maxLength(100),
                Forms\Components\TextInput::make('producer')
                    ->maxLength(100),
                Forms\Components\TextInput::make('production_designer')
                    ->maxLength(100),
                Forms\Components\TextInput::make('production_supervisor')
                    ->maxLength(100),
                Forms\Components\TextInput::make('production_manager')
                    ->maxLength(100),
                Forms\Components\TextInput::make('associate_production_manager')
                    ->maxLength(100),
                Forms\Components\TextInput::make('deputy_production_manager')
                    ->maxLength(100),
                Forms\Components\TextInput::make('assistant_production_manager')
                    ->maxLength(100),
                Forms\Components\TextInput::make('production_coordinator')
                    ->maxLength(100),
                Forms\Components\TextInput::make('editor')
                    ->maxLength(100),
                Forms\Components\TextInput::make('visual_effects')
                    ->maxLength(100),
                Forms\Components\TextInput::make('production_and_costume_consultant')
                    ->maxLength(100),
                Forms\Components\TextInput::make('set_consultant')
                    ->maxLength(100),
                Forms\Components\TextInput::make('set_designer')
                    ->maxLength(100),
                Forms\Components\TextInput::make('set_design_assistant')
                    ->maxLength(100),
                Forms\Components\TextInput::make('costume_designer')
                    ->maxLength(100),
                Forms\Components\TextInput::make('costume_consultant')
                    ->maxLength(100),
                Forms\Components\TextInput::make('make_up_artist')
                    ->maxLength(100),
                Forms\Components\TextInput::make('production_stylist')
                    ->maxLength(100),
                Forms\Components\TextInput::make('fashion_designer')
                    ->maxLength(100),
                Forms\Components\TextInput::make('lighting_designer')
                    ->maxLength(100),
                Forms\Components\TextInput::make('associate_lighting_designer')
                    ->maxLength(100),
                Forms\Components\TextInput::make('lighting_design_consultant')
                    ->maxLength(100),
                Forms\Components\TextInput::make('lighting_design_assistant')
                    ->maxLength(100),
                Forms\Components\TextInput::make('sound_designer')
                    ->maxLength(100),
                Forms\Components\TextInput::make('assistant_sound_designer')
                    ->maxLength(100),
                Forms\Components\TextInput::make('sound_engineer')
                    ->maxLength(100),
                Forms\Components\TextInput::make('choreographer')
                    ->maxLength(100),
                Forms\Components\TextInput::make('guest_faculty')
                    ->maxLength(100),
                Forms\Components\TextInput::make('technical_director')
                    ->maxLength(100),
                Forms\Components\TextInput::make('assistant_technical_director')
                    ->maxLength(100),
                Forms\Components\TextInput::make('technical_direction_assistant')
                    ->maxLength(100),
                Forms\Components\TextInput::make('stage_manager')
                    ->maxLength(100),
                Forms\Components\TextInput::make('assistant_stage_manager')
                    ->maxLength(100),
                Forms\Components\TextInput::make('deputy_stage_manager')
                    ->maxLength(100),
                Forms\Components\TextInput::make('stage_management_assistant')
                    ->maxLength(100),
                Forms\Components\TextInput::make('audio_visual_designer')
                    ->maxLength(100),
                Forms\Components\TextInput::make('video_projection_designer')
                    ->maxLength(100),
                Forms\Components\TextInput::make('video_projection_design_assistant')
                    ->maxLength(100),
                Forms\Components\TextInput::make('video_operator')
                    ->maxLength(100),
                Forms\Components\TextInput::make('music_director')
                    ->maxLength(100),
                Forms\Components\TextInput::make('assistant_music_director')
                    ->maxLength(100),
                Forms\Components\TextInput::make('arranger')
                    ->maxLength(100),
                Forms\Components\TextInput::make('conductor')
                    ->maxLength(100),
                Forms\Components\Textarea::make('choirmaster')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('orchestra')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('tenor')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('countertenor')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('soprano')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('bass_baritone')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('baritone')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('mezzo_soprano')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('alto')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('bandurria')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('bass')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('bass_guitar')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('bassoon')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('cello')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('clarinet')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('contrabass')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('drums')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('english_horn')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('flute')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('french_horn')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('guitar')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('harp')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('keyboard')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('oboe')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('marimba')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('percussion')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('piano')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('viola')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('violin')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('saxophone')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('string_quartet')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('timpani')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('trombone')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('trumpet')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('tuba')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('vocals')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('musicians')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('artist')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('curator')
                    ->maxLength(100),
                Forms\Components\Textarea::make('author')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('project_coordinator')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('publisher')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('contributing_writer')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('photographer')
                    ->maxLength(100),
                Forms\Components\TextInput::make('camera_operator')
                    ->maxLength(255),
                Forms\Components\Textarea::make('camera_setup')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('shooting_schedule')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('format')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('technique')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('measurement')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('edition')
                    ->maxLength(255),
                Forms\Components\Textarea::make('color')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('inscription')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('extension')
                    ->maxLength(65535)
                    ->columnSpanFull(),
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
                Forms\Components\Textarea::make('wholeness')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('file_count')
                    ->numeric(),
                Forms\Components\TextInput::make('total_size')
                    ->maxLength(25),
                Forms\Components\Textarea::make('color_space')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('video_description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('audio_description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('notes')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('accession_year'),
                Forms\Components\Textarea::make('loan_history')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('ccp_collection')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('shelf_number')
                    ->maxLength(25),
                Forms\Components\TextInput::make('inventory_number')
                    ->maxLength(25),
                Forms\Components\TextInput::make('tape_number')
                    ->maxLength(25),
                Forms\Components\TextInput::make('hard_drive')
                    ->maxLength(25),
                Forms\Components\TextInput::make('server')
                    ->maxLength(25),
                Forms\Components\Textarea::make('access')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('citation')
                    ->maxLength(255),
                Forms\Components\TextInput::make('credit_line')
                    ->maxLength(255),
                Forms\Components\TextInput::make('precup')
                    ->maxLength(255),
                Forms\Components\Select::make('collection_id')
                    ->relationship('collection', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('archivist')
                //     ->searchable(),
                Tables\Columns\IconColumn::make('thumbnail')
                    ->boolean(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('place')
                    ->searchable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('reference')
                    ->searchable()
                    ->limit(30),
                    // ->tooltip('Reference'),
                Tables\Columns\TextColumn::make('open_access_link')
                    ->searchable()
                    ->limit(30),
                    // ->tooltip('open_access_link'),
                // Tables\Columns\TextColumn::make('moderator')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('film')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('play')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('screenwriter')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('scriptwriter')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('writer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('playwright')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('librettist')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('adaptor')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('translator')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('concept')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('executive_producer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('associate_producer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('producer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('production_designer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('production_supervisor')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('production_manager')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('associate_production_manager')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('deputy_production_manager')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('assistant_production_manager')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('production_coordinator')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('editor')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('visual_effects')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('production_and_costume_consultant')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('set_consultant')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('set_designer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('set_design_assistant')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('costume_designer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('costume_consultant')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('make_up_artist')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('production_stylist')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('fashion_designer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('lighting_designer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('associate_lighting_designer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('lighting_design_consultant')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('lighting_design_assistant')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('sound_designer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('assistant_sound_designer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('sound_engineer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('choreographer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('guest_faculty')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('technical_director')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('assistant_technical_director')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('technical_direction_assistant')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('stage_manager')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('assistant_stage_manager')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('deputy_stage_manager')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('stage_management_assistant')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('audio_visual_designer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('video_projection_designer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('video_projection_design_assistant')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('video_operator')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('music_director')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('assistant_music_director')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('arranger')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('conductor')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('curator')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('photographer')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('camera_operator')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('edition')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('resolution')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('frame_rate')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('aspect_ratio')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('audio')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('duration')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('file_count')
                //     ->numeric()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('total_size')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('notes')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('accession_year')
                //     ->date()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('shelf_number')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('inventory_number')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('tape_number')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('hard_drive')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('server')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('citation')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('credit_line')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('precup')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('collection.name')
                    ->numeric()
                    ->sortable(),
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
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
            ]);
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            // ]);
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
            //'create' => Pages\CreateEntity::route('/create'),
            'view' => Pages\ViewEntity::route('/{record}'),
            //'edit' => Pages\EditEntity::route('/{record}/edit'),
        ];
    }
}
