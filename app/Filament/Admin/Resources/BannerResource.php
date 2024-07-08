<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BannerResource\Pages;
use App\Filament\Admin\Resources\BannerResource\RelationManagers;
use App\Models\{Banner, Entity};
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-2-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                ->schema([
                    Forms\Components\TextInput::make('banner_number')
                        ->disabled()
                        ->label('Banner')
                        ->columnSpan(1),
                    Forms\Components\Toggle::make('is_active')
                        ->onColor('success')
                        ->inline(false)
                        ->columnSpan(1),
                    Forms\Components\TextInput::make('title')
                        ->columnSpanFull(),
                    Forms\Components\TextArea::make('description')
                        ->columnSpanFull(),
                    Forms\Components\Select::make('entity_id')
                        ->options(Entity::all()->pluck('title', 'id'))
                        ->label('Select the entity to be linked')
                        ->searchable()
                        ->columnSpanFull(),
                    Forms\Components\FileUpload::make('image')
                        ->panelAspectRatio('3:1')
                        ->image()
                        ->imageEditor()
                        ->label('Background Image')
                        ->directory('banner-images')
                        ->getUploadedFileNameForStorageUsing(
                            fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                                ->prepend('Banner-')
                        )
                        ->maxSize(24000)
                        ->columnSpanFull(),
                ])
                ->columns(2),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('banner_number')
                    ->label('Banner'),
                Tables\Columns\IconColumn::make('is_active')
                    ->icon(fn (string $state): string => match ($state) {
                        '1' => 'heroicon-o-check-circle',
                        '0' => 'heroicon-o-x-circle',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        '1' => 'success',
                        '0' => 'danger',
                        default => 'gray',
                    })
                    ->label('Active'),
                Tables\Columns\TextColumn::make('title')
                    ->getStateUsing(function (Banner $record): string {
                        if($record->title) {
                            return $record->title;
                        } else {
                            return '-No title given-';
                        }
                    })
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->getStateUsing(function (Banner $record): string {
                        if($record->description) {
                            return $record->description;
                        } else {
                            return '-No description given-';
                        }
                    })
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('entity_id')
                    ->getStateUsing(function (Banner $record): string {
                        if($record->entity_id) {
                            $ent = Entity::where('id', $record->entity_id)->first();
                            return $ent->title;
                        } else {
                            return '-No entity linked-';
                        }
                    })
                    ->searchable()
                    ->label('Entity Linked To'),
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public')
                    ->label('Background Image'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->sortable()
                    ->dateTime()
                    ->label('Last edited at'),
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ])
            ->paginated(false);;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBanners::route('/'),
        ];
    }
}
