<template>
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center mb-6">
            <div class="flex-shrink-0">
                <svg class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
            <div class="ml-4">
                <h3 class="text-lg font-medium text-gray-900">Produits les Plus Vendus</h3>
                <p class="text-sm text-gray-500">Top 10 des meilleures ventes</p>
            </div>
        </div>
        
        <div class="overflow-hidden">
            <div v-if="card.produits && card.produits.length > 0" class="space-y-3">
                <div v-for="(produit, index) in card.produits" :key="index" 
                     class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-purple-100 text-purple-600 text-sm font-medium">
                                {{ index + 1 }}
                            </span>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-sm font-medium text-gray-900">{{ produit.nom }}</h4>
                            <p class="text-xs text-gray-500">Prix: {{ produit.prix }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-sm font-medium text-gray-900">{{ produit.quantite_vendue }} vendus</div>
                        <div class="text-xs text-green-600">{{ produit.revenus }}</div>
                    </div>
                </div>
            </div>
            <div v-else class="text-center py-8">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                <p class="mt-2 text-sm text-gray-500">Aucune vente enregistrée</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ProduitsPlusVendus',
    props: ['card'],
    mounted() {
        console.log('Carte ProduitsPlusVendus montée avec les données:', this.card);
    }
}
</script>

<style scoped>
.bg-purple-100 {
    background-color: #f3e8ff;
}
.text-purple-600 {
    color: #9333ea;
}
</style>