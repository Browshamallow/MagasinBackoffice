<template>
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center mb-6">
            <div class="flex-shrink-0">
                <svg class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-medium text-gray-900">Statistiques Générales</h3>
                <p class="text-sm text-gray-500">Vue d'ensemble du magasin</p>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Total Produits -->
            <div class="bg-blue-50 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-blue-600">{{ card.total_produits }}</div>
                <div class="text-sm text-blue-700 mt-1">Produits</div>
            </div>
            
            <!-- Total Clients -->
            <div class="bg-green-50 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-green-600">{{ card.total_clients }}</div>
                <div class="text-sm text-green-700 mt-1">Clients</div>
            </div>
            
            <!-- Panier Moyen -->
            <div class="bg-purple-50 rounded-lg p-4 text-center">
                <div class="text-xl font-bold text-purple-600">{{ card.panier_moyen }}</div>
                <div class="text-sm text-purple-700 mt-1">Panier moyen</div>
                <div class="text-xs text-purple-600">{{ card.devise }}</div>
            </div>
        </div>
        
        <!-- Statuts des Commandes -->
        <div class="mt-6">
            <h4 class="text-sm font-medium text-gray-900 mb-3">Statuts des Commandes</h4>
            <div class="grid grid-cols-3 gap-3">
                <div class="bg-yellow-50 rounded-lg p-3 text-center">
                    <div class="text-lg font-bold text-yellow-600">{{ card.commandes_en_attente }}</div>
                    <div class="text-xs text-yellow-700">En attente</div>
                </div>
                <div class="bg-blue-50 rounded-lg p-3 text-center">
                    <div class="text-lg font-bold text-blue-600">{{ card.commandes_en_cours }}</div>
                    <div class="text-xs text-blue-700">En cours</div>
                </div>
                <div class="bg-green-50 rounded-lg p-3 text-center">
                    <div class="text-lg font-bold text-green-600">{{ card.commandes_completees }}</div>
                    <div class="text-xs text-green-700">Terminées</div>
                </div>
            </div>
        </div>
        
        <!-- Évolution des Ventes -->
        <div class="mt-6">
            <h4 class="text-sm font-medium text-gray-900 mb-3">Évolution des Ventes</h4>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                <span class="text-sm text-gray-700">Par rapport au mois dernier</span>
                <div class="flex items-center">
                    <svg v-if="card.evolution_ventes >= 0" class="h-4 w-4 text-green-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    <svg v-else class="h-4 w-4 text-red-500 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                    <span :class="card.evolution_ventes >= 0 ? 'text-green-600' : 'text-red-600'" class="font-medium">
                        {{ Math.abs(card.evolution_ventes) }}%
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'StatistiquesGenerales',
    props: ['card'],
    mounted() {
        console.log('Carte StatistiquesGenerales montée avec les données:', this.card);
    }
}
</script>

<style scoped>
.bg-blue-50 {
    background-color: #eff6ff;
}
.bg-green-50 {
    background-color: #f0fdf4;
}
.bg-purple-50 {
    background-color: #faf5ff;
}
.bg-yellow-50 {
    background-color: #fefce8;
}
</style>