<template>
  <card class="flex flex-col items-center justify-center text-center p-6">
    <h1 class="text-xl font-bold text-gray-800 mb-2">Total Commandes</h1>
    <p class="text-5xl text-indigo-600 font-bold">{{ card.total }}</p>
  </card>
</template>

<script>
export default {
  props: ['card'],
}
</script>
