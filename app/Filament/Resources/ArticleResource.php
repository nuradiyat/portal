<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'News';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Judul')
                    ->required(),
                Forms\Components\Select::make('categori_id')
                    ->relationship('categori', 'name') // Relasi ke Category
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name') // Relasi ke user
                    ->options(function () {
                        // Ambil user yang sedang login
                        $user = Auth::user();
                        // Return user yang login sebagai opsi tunggal
                        return [
                            $user->id => $user->name,
                        ];
                    })
                    ->default(Auth::id()) // Set default ke user yang login
                    ->required(),
                Forms\Components\DatePicker::make('published_at')
                    ->required()
                    ->maxDate(now()),
                FileUpload::make('image')
                    ->image()
                    ->required(),
                Forms\Components\Textarea::make('content')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('content'),
                Tables\Columns\TextColumn::make('categori.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('image')
                    ->height(50)
                    ->width(100),
                Tables\Columns\TextColumn::make('published_at'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
