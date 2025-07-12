<?php

namespace App\Nova\Cards;

use Laravel\Nova\Card;
use App\Models\Commande;
use App\Models\CommandeProduit;

class ChiffreAffaires extends Card
{
    public $width = '1/3';

    public function __construct()
    {
        parent::__construct();

        // Chiffre d'affaires total (calculé depuis les produits commandés)
        $chiffreAffairesTotal = CommandeProduit::join('commandes', 'commande_produits.commande_id', '=', 'commandes.id')
                                             ->where('commandes.statut', 'Livrée')
                                             ->selectRaw('SUM(commande_produits.quantite * commande_produits.prix_unitaire) as total')
                                             ->value('total') ?? 0;

        // Chiffre d'affaires aujourd'hui
        $chiffreAffairesAujourdhui = CommandeProduit::join('commandes', 'commande_produits.commande_id', '=', 'commandes.id')
                                                   ->where('commandes.statut', 'Livrée')
                                                   ->whereDate('commandes.created_at', today())
                                                   ->selectRaw('SUM(commande_produits.quantite * commande_produits.prix_unitaire) as total')
                                                   ->value('total') ?? 0;

        // Chiffre d'affaires ce mois
        $chiffreAffairesCeMois = CommandeProduit::join('commandes', 'commande_produits.commande_id', '=', 'commandes.id')
                                               ->where('commandes.statut', 'Livrée')
                                               ->whereMonth('commandes.created_at', now()->month)
                                               ->whereYear('commandes.created_at', now()->year)
                                               ->selectRaw('SUM(commande_produits.quantite * commande_produits.prix_unitaire) as total')
                                               ->value('total') ?? 0;

        $this->withMeta([
            'total' => number_format($chiffreAffairesTotal, 2, ',', ' '),
            'aujourd_hui' => number_format($chiffreAffairesAujourdhui, 2, ',', ' '),
            'ce_mois' => number_format($chiffreAffairesCeMois, 2, ',', ' '),
            'devise' => 'FCFA',
        ]);
    }

    public function component(): string
    {
        return 'chiffre-affaires';
    }
}