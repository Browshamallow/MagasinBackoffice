<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Cards\Help;
use Laravel\Nova\Dashboards\Main as Dashboard;
use App\Nova\Cards\StatistiquesGenerales;
use App\Nova\Cards\ProduitsPlusVendus;
use App\Nova\Cards\NombresCommandes;
use App\Nova\Cards\ChiffreAffaires;


class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array<int, \Laravel\Nova\Card>
     */

public function cards()
{
    return [
        
        new NombresCommandes(),
        new ChiffreAffaires(),
        new ProduitsPlusVendus(),
        new StatistiquesGenerales(),
    ];
}
}
