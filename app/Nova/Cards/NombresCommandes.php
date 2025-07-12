<?php

namespace App\Nova\Cards;

use Laravel\Nova\Card;
use App\Models\Commande;

class NombresCommandes extends Card
{
    public $width = '1/3';

    public function __construct()
    {
        parent::__construct();

        $totalCommandes = Commande::count();
        $commandesAujourdhui = Commande::whereDate('created_at', today())->count();
        $commandesCeMois = Commande::whereMonth('created_at', now()->month)
                                 ->whereYear('created_at', now()->year)
                                 ->count();

        $this->withMeta([
            'total' => $totalCommandes,
            'aujourd_hui' => $commandesAujourdhui,
            'ce_mois' => $commandesCeMois,
        ]);
    }

    public function component(): string
    {
        return 'nombre-commandes';
    }
}
