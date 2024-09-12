<template>
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
      <div class="z-30 text-center bg-white rounded-lg p-9">
        <Link :href="route('welcome')" class="flex justify-center lg:justify-start">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" :alt="appName" />
            <span class="self-center text-xl font-semibold text-black whitespace-nowrap">{{ appName }}</span>
        </Link>
        <!-- Contact detail (email) -->
        <p class="mt-4 text-xl text-gray-900">Contact Detail</p>
        <p><a :href="'mailto:'+email" class="mt-4 text-black">{{ email }}</a></p>

        <button @click="$emit('close')" class="px-4 py-2 mt-3 text-center text-white bg-red-500 rounded">Close</button>
      </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import {defineProps} from 'vue';

defineProps({
    email: String,
    appName: String,
})
</script>
