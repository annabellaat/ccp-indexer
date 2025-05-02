<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\RequestResource\Pages;
use App\Filament\Admin\Resources\RequestResource\RelationManagers;
use App\Models\{Request, Entity};
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Widgets\RequestWidgetR;

class RequestResource extends Resource
{
    protected static ?string $model = Request::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                ->schema([
                    Forms\Components\TextInput::make('entity_id')
                        ->disabled()
                        ->formatStateUsing(function (Request $record): string {
                            $ent = Entity::where('id', $record->entity_id)->first();
                            if($ent) {
                                return $ent->title;
                            } else {
                                return '-- Entity deleted from list --';
                            }
                        })
                        ->label('Entity Requested')
                        ->columnSpanFull(),
                    Forms\Components\Select::make('status')
                        ->options([
                            'New' => [
                                'New' => 'New'
                            ],
                            'Processing' => [
                                'Material Available' => 'Material Available',
                                'IPR Cleared' => 'IPR Cleared',
                                'Paid' => 'Paid',
                            ],
                            'Closed' => [
                                'Closed - Material Sent' => 'Closed - Material Sent',
                                'Closed - Disapproved' => 'Closed - Disapproved'
                            ]
                        ]),
                    Forms\Components\TextInput::make('type_of_use')
                        ->disabled(),
                    Forms\Components\Section::make('Requestor Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->disabled()
                            ->label('Name of Requestor'),
                        Forms\Components\TextInput::make('email')
                            ->disabled()
                            ->label('Email of Requestor'),
                        Forms\Components\TextInput::make('country')
                            ->disabled()
                            ->label('Country of Requestor'),
                        Forms\Components\TextInput::make('company')
                            ->disabled()
                            ->label('Company of Requestor'),
                        Forms\Components\TextInput::make('number')
                            ->disabled()
                            ->label('Number of Requestor'),
                    ])
                    ->columns(2)
                    ->compact(),
                    Forms\Components\Section::make('Project Details')
                    ->schema([
                        Forms\Components\TextInput::make('project_title')
                            ->disabled()
                            ->label('Project Title'),
                        Forms\Components\TextInput::make('project_description')
                            ->disabled()
                            ->label('Project Description'),
                        Forms\Components\TextInput::make('project_duration')
                            ->disabled()
                            ->label('Project Details'),
                    ])
                    ->columns(2)
                    ->compact()
                ])
                ->columns(2)
                ->compact(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('entity_id')
                    ->getStateUsing(function (Request $record): string {
                        $ent = Entity::where('id', $record->entity_id)->first();
                        if($ent) {
                            return $ent->title;
                        } else {
                            return '-- Entity deleted from list --';
                        }
                    })
                    ->searchable()
                    ->label('Entity Requested'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('project_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable()
                    ->dateTime()
                    ->label('Date Requested'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->multiple()
                    ->options([
                        'New' => 'New',
                        'Material Available' => 'Material Available',
                        'IPR Cleared' => 'IPR Cleared',
                        'Paid' => 'Paid',
                        'Closed - Material Sent' => 'Closed - Material Sent',
                        'Closed - Disapproved' => 'Closed - Disapproved'
                    ]),
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getWidgets(): array
    {
        return [
            RequestWidgetR::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRequests::route('/'),
            'view' => Pages\ViewRequest::route('/{record}/view'),
            // 'create' => Pages\CreateRequest::route('/create'),
            'edit' => Pages\EditRequest::route('/{record}/edit'),
        ];
    }
}
