<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Select;

class Commande extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Commande>
     */
    public static $model = \App\Models\Commande::class;

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
        BelongsTo::make('Client'),
        Date::make('Date Commande', 'date_commande')->rules('required'),
        Select::make('Statut')->options([
            'En attente' => 'En attente',
            'Validée' => 'Validée',
            'Livrée' => 'Livrée',
        ])->rules('required'),
        BelongsToMany::make('Produits')->fields(function () {
            return [
                Number::make('Quantité', 'quantite')->min(1),
                Number::make('Prix Unitaire', 'prix_unitaire')->step(0.01),
            ];
        }),
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
