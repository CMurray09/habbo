<?php

namespace App\Nova;

use Cmurray09\ExternalImage\ExternalImage;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;

class Game extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static string $model = \App\Models\Game::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static string $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static array $search = [
        'id',
        'room_link',
        'owner',
        'co_owner',
        'room_count',
        'category',
        'game_type',
        'name',
        'thumbnail'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param Request $request
     * @return array
     */
    public function fields(Request $request): array
    {
        return [
            ID::make()
                ->sortable(),
            Text::make('Room Link', 'room_link')
                ->hideFromIndex()
                ->rules('required'),
            Text::make('Owner')
                ->sortable()
                ->rules('required', 'min:3', 'max:30'),
            Text::make('Co-owner', 'co_owner')
                ->sortable()
                ->rules('nullable', 'min:3', 'max:30'),
            Number::make('Room Count', 'room_count')
                ->sortable()
                ->rules('required')
                ->min(1)
                ->max(200)
                ->step(1),
            Select::make('Category')
                ->options([
                    'wired' => 'wired',
                    'non_wired' => 'non-wired',
                    'mixed' => 'mixed',
                ])->sortable()
                ->rules('required'),
            Select::make('Game Type', 'game_type')
                ->options([
                    'maze' => 'maze',
                    'game' => 'game',
                    'telephrase' => 'telephrase',
                    'auto-run' => 'auto-run',
                    'deathrun' => 'deathrun',
                    'roleplay' => 'roleplay',
                ])->sortable()
                ->rules('required'),
            Text::make('Room Name', 'name')
                ->sortable()
                ->rules('required', 'min:3', 'max:30'),
            DateTime::make('created_at')
                ->onlyOnDetail()
                ->sortable(),
            DateTime::make('updated_at')
                ->onlyOnDetail()
                ->sortable(),
            ExternalImage::make('Thumbnail', 'thumbnail')
                ->width(80)
                ->height(80)
                ->rules('required', 'regex:/^(https:\/\/habbo-stories-content\.s3\.amazonaws\.com\/servercamera\/purchased' .
                    '\/hhus\/p-[a-zA-Z0-9]{8}[-][a-zA-Z0-9]{13}[.](png)$)/')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param Request $request
     * @return array
     */
    public function cards(Request $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function filters(Request $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function lenses(Request $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param Request $request
     * @return array
     */
    public function actions(Request $request): array
    {
        return [];
    }
}
