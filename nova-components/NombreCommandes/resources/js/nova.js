// resources/js/nova.js
import { createApp } from 'vue';

// Importation des composants de cartes
import NombreCommandes from './components/NombreCommandes.vue';
import ChiffreAffaires from './components/ChiffreAffaires.vue';
import ProduitsPlusVendus from './components/ProduitsPlusVendus.vue';
import StatistiquesGenerales from './components/StatistiquesGenerales.vue';

// Configuration de Nova
Nova.booting((app) => {
    // Enregistrement des composants de cartes
    app.component('nombre-commandes', NombreCommandes);
    app.component('chiffre-affaires', ChiffreAffaires);
    app.component('produits-plus-vendus', ProduitsPlusVendus);
    app.component('statistiques-generales', StatistiquesGenerales);
});

// Export pour utilisation dans d'autres fichiers si nécessaire
export {
    NombreCommandes,
    ChiffreAffaires,
    ProduitsPlusVendus,
    StatistiquesGenerales
};