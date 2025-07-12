<?php

namespace App\Nova\Cards;

use Laravel\Nova\Card;
use App\Models\Produit;
use App\Models\CommandeProduit;
use Illuminate\Support\Facades\DB;

class ProduitsPlusVendus extends Card
{
    public $width = '1/2';

    public function __construct()
    {
        parent::__construct();

        // Récupérer les produits les plus vendus avec leurs quantités
        $produitsPlusVendus = CommandeProduit::select(
                'produits.nom',
                'produits.prix',
                DB::raw('SUM(commande_produits.quantite) as total_vendu'),
                DB::raw('SUM(commande_produits.quantite * commande_produits.prix_unitaire) as revenus')
            )
            ->join('produits', 'commande_produits.produit_id', '=', 'produits.id')
            ->join('commandes', 'commande_produits.commande_id', '=', 'commandes.id')
            ->where('commandes.statut', 'Livrée') // Utilisez le bon statut
            ->groupBy('produits.id', 'produits.nom', 'produits.prix')
            ->orderBy('total_vendu', 'desc')
            ->limit(10)
            ->get()
            ->map(function ($item) {
                return [
                    'nom' => $item->nom,
                    'prix' => number_format($item->prix, 2, ',', ' ') . ' FCFA',
                    'quantite_vendue' => $item->total_vendu,
                    'revenus' => number_format($item->revenus, 2, ',', ' ') . ' FCFA',
                ];
            });

        $this->withMeta([
            'produits' => $produitsPlusVendus,
        ]);
    }

    public function component(): string
    {
        return 'produits-plus-vendus';
    }
}
