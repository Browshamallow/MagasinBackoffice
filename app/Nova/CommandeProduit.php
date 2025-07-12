<?php

namespace App\Nova;

use Illuminate\Http\Request;
   use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Number;use Laravel\Nova\Http\Requests\NovaRequest;

class CommandeProduit extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\CommandeProduit>
     */
    public static $model = \App\Models\CommandeProduit::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array<int, \Laravel\Nova\Fields\Field>
     */


public function fields(Request $request)
{
    return [
        ID::make()->sortable(),
        BelongsTo::make('Commande'),
        BelongsTo::make('Produit'),
        Number::make('Quantité')->readonly(),
        Number::make('Prix Unitaire')->readonly(),
    ];
}


    /**
     * Get the cards available for the resource.
     *
     * @return array<int, \Laravel\Nova\Card>
     */
    public function cards(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array<int, \Laravel\Nova\Filters\Filter>
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array<int, \Laravel\Nova\Lenses\Lens>
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array<int, \Laravel\Nova\Actions\Action>
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
