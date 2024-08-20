<script setup>
import { Head } from '@inertiajs/vue3';
import Header from '@/Components/Sections/Header.vue';
import Hero from '@/Components/Sections/Hero.vue';
import Footer from '@/Components/Sections/Footer.vue';
import Steps from '@/Components/Sections/Steps.vue';
import Testimonials from '@/Components/Sections/Testimonials.vue';
import AboutUs from '@/Components/Sections/AboutUs.vue';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img
            id="background"
            class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg"
        />
        <Header />
        <Hero />
        <AboutUs/>
        <Steps />
        <Testimonials />
        <Footer />


    </div>
</template>
