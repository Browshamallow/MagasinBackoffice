<?php

namespace App\Nova\Cards;

use Laravel\Nova\Card;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;
use App\Models\CommandeProduit;

class StatistiquesGenerales extends Card
{
    public $width = '1/2';

    public function __construct()
    {
        parent::__construct();

        // Statistiques générales
        $totalProduits = Produit::count();
        
        // Comptage des clients (ajustez selon votre système de rôles)
        $totalClients = User::count(); // Simplifiez pour l'instant
        
        // Utilisez les bons statuts de votre DB
        $commandesEnAttente = Commande::where('statut', 'En attente')->count();
        $commandesValidees = Commande::where('statut', 'Validée')->count();
        $commandesLivrees = Commande::where('statut', 'Livrée')->count();

        // Calcul du panier moyen basé sur les produits commandés
        $panierMoyen = CommandeProduit::join('commandes', 'commande_produits.commande_id', '=', 'commandes.id')
                                    ->where('commandes.statut', 'Livrée')
                                    ->selectRaw('AVG(commande_produits.quantite * commande_produits.prix_unitaire) as moyenne')
                                    ->value('moyenne') ?? 0;

        // Évolution des ventes (comparaison mois précédent)
        $ventesMoisActuel = CommandeProduit::join('commandes', 'commande_produits.commande_id', '=', 'commandes.id')
                                         ->where('commandes.statut', 'Livrée')
                                         ->whereMonth('commandes.created_at', now()->month)
                                         ->whereYear('commandes.created_at', now()->year)
                                         ->selectRaw('SUM(commande_produits.quantite * commande_produits.prix_unitaire) as total')
                                         ->value('total') ?? 0;

        $ventesMoisPrecedent = CommandeProduit::join('commandes', 'commande_produits.commande_id', '=', 'commandes.id')
                                            ->where('commandes.statut', 'Livrée')
                                            ->whereMonth('commandes.created_at', now()->subMonth()->month)
                                            ->whereYear('commandes.created_at', now()->subMonth()->year)
                                            ->selectRaw('SUM(commande_produits.quantite * commande_produits.prix_unitaire) as total')
                                            ->value('total') ?? 0;

        $evolutionVentes = $ventesMoisPrecedent > 0 
            ? (($ventesMoisActuel - $ventesMoisPrecedent) / $ventesMoisPrecedent) * 100
            : 0;

        $this->withMeta([
            'total_produits' => $totalProduits,
            'total_clients' => $totalClients,
            'commandes_en_attente' => $commandesEnAttente,
            'commandes_validees' => $commandesValidees,
            'commandes_livrees' => $commandesLivrees,
            'panier_moyen' => number_format($panierMoyen, 2, ',', ' '),
            'evolution_ventes' => round($evolutionVentes, 2),
            'devise' => 'FCFA',
        ]);
    }

    public function component(): string
    {
        return 'statistiques-generales';
    }
}