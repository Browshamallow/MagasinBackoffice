<template>
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-medium text-gray-900">Chiffre d'Affaires</h3>
                    <p class="text-sm text-gray-500">Revenus générés</p>
                </div>
            </div>
            <div class="text-right">
                <div class="text-2xl font-bold text-gray-900">{{ card.total }}</div>
                <div class="text-sm text-gray-500">{{ card.devise }}</div>
            </div>
        </div>
        
        <div class="mt-6 grid grid-cols-2 gap-4">
            <div class="bg-emerald-50 rounded-lg p-4 text-center">
                <div class="text-xl font-bold text-emerald-600">{{ card.aujourd_hui }}</div>
                <div class="text-sm text-emerald-700 mt-1">Aujourd'hui</div>
                <div class="text-xs text-emerald-600">{{ card.devise }}</div>
            </div>
            <div class="bg-teal-50 rounded-lg p-4 text-center">
                <div class="text-xl font-bold text-teal-600">{{ card.ce_mois }}</div>
                <div class="text-sm text-teal-700 mt-1">Ce mois</div>
                <div class="text-xs text-teal-600">{{ card.devise }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ChiffreAffaires',
    props: ['card'],
    mounted() {
        console.log('Carte ChiffreAffaires montée avec les données:', this.card);
    }
}
</script>

<style scoped>
.bg-emerald-50 {
    background-color: #ecfdf5;
}
.bg-teal-50 {
    background-color: #f0fdfa;
}
</style>