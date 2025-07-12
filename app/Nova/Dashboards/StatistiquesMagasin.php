<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Dashboard;
use App\Nova\Cards\StatistiquesGenerales;
use App\Nova\Cards\ProduitsPlusVendus;
use App\Nova\Cards\NombresCommandes;
use App\Nova\Cards\ChiffreAffaires;

class StatistiquesMagasin extends Dashboard
{
    /**
     * Get the displayable name of the dashboard.
     */
    public function name()
    {
        return 'Statistiques Magasin';
    }

    /**
     * Get the cards for the dashboard.
     */
    public function cards()
    {
        return [
            new StatistiquesGenerales(),
            new ProduitsPlusVendus(),
            new NombresCommandes(),
            new ChiffreAffaires(),
        ];
    }

    /**
     * Get the URI key for the dashboard.
     */
    public function uriKey()
    {
        return 'statistiques-magasin';
    }
}