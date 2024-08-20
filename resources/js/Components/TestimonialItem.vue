<template>
    <li class="text-sm leading-6">
        <div class="relative group">
            <div class="absolute transition rounded-lg opacity-25 -inset-1 bg-gradient-to-r from-purple-600 to-pink-600 blur duration-400 group-hover:opacity-100 group-hover:duration-200">
            </div>
            <div class="relative p-6 space-y-6 leading-none rounded-lg bg-slate-800 ring-1 ring-gray-900/5">
                <div class="flex items-center space-x-4">
                    <img :src="imageUrl" class="w-12 h-12 bg-center bg-cover border rounded-full" :alt="name">
                <div>
                <h3 class="text-lg font-semibold text-white">{{ name }}</h3>
                    <p class="text-gray-500 text-md">{{ occupation }}</p>
                </div>
            </div>
            <p class="leading-normal text-gray-300 text-md">{{ testimonial }}</p>
            </div>
        </div>
    </li>
</template>

<script setup>
defineProps({
  name: String,
  occupation: String,
  testimonial: String,
  imageUrl: String
});
</script>

<style scoped>

</style>
