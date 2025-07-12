// resources/js/app.js
import { createApp } from 'vue';
import './bootstrap';

// Importation des composants de cartes Nova
import NombreCommandes from './components/NombreCommandes.vue';
import ChiffreAffaires from './components/ChiffreAffaires.vue';
import ProduitsPlusVendus from './components/ProduitsPlusVendus.vue';
import StatistiquesGenerales from './components/StatistiquesGenerales.vue';

// Création de l'application Vue
const app = createApp({});

// Enregistrement global des composants
app.component('nombre-commandes', NombreCommandes);
app.component('chiffre-affaires', ChiffreAffaires);
app.component('produits-plus-vendus', ProduitsPlusVendus);
app.component('statistiques-generales', StatistiquesGenerales);

// Montage de l'application si un élément #app existe
const appElement = document.getElementById('app');
if (appElement) {
    app.mount('#app');
}

// Configuration spécifique à Nova si disponible
if (window.Nova) {
    Nova.booting((app) => {
        app.component('nombre-commandes', NombreCommandes);
        app.component('chiffre-affaires', ChiffreAffaires);
        app.component('produits-plus-vendus', ProduitsPlusVendus);
        app.component('statistiques-generales', StatistiquesGenerales);
    });
}
