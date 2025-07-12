<template>
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-medium text-gray-900">Commandes</h3>
                    <p class="text-sm text-gray-500">Total des commandes</p>
                </div>
            </div>
            <div class="text-right">
                <div class="text-3xl font-bold text-gray-900">{{ card.total }}</div>
                <div class="text-sm text-gray-500">Total</div>
            </div>
        </div>
        
        <div class="mt-6 grid grid-cols-2 gap-4">
            <div class="bg-green-50 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-green-600">{{ card.aujourd_hui }}</div>
                <div class="text-sm text-green-700 mt-1">Aujourd'hui</div>
            </div>
            <div class="bg-blue-50 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-blue-600">{{ card.ce_mois }}</div>
                <div class="text-sm text-blue-700 mt-1">Ce mois</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'NombreCommandes',
    props: ['card'],
    mounted() {
        console.log('Carte NombreCommandes montée avec les données:', this.card);
    }
}
</script>

<style scoped>
.bg-green-50 {
    background-color: #f0fdf4;
}
.bg-blue-50 {
    background-color: #eff6ff;
}
</style>