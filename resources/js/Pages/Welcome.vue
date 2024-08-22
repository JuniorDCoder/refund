<script setup>
import { onMounted, ref } from'vue'
import { Head } from '@inertiajs/vue3';
import Header from '@/Components/Sections/Header.vue';
import Hero from '@/Components/Sections/Hero.vue';
import Footer from '@/Components/Sections/Footer.vue';
import Steps from '@/Components/Sections/Steps.vue';
import Testimonials from '@/Components/Sections/Testimonials.vue';
import AboutUs from '@/Components/Sections/AboutUs.vue';
import Popup from '@/Components/Popup.vue';
import Loader from '@/Components/Loader.vue';

const showPopup = ref(false);
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

// State to control the visibility of the spinner and content
const showContent = ref(false);

const showLoader = ref(false);
function handleContactUsClicked() {
    showLoader.value = true; // Show the loader
    setTimeout(() => {
        showLoader.value = false; // Hide the loader
        showPopup.value = true; // Show the popup
    }, 3000); // Wait for 3 seconds
}

// Use onMounted to change the state after 4 seconds
onMounted(() => {
    setTimeout(() => {
        showContent.value = true;
    }, 4000);
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
    <!-- Spinner that shows before the content -->
    <Loader v-if="showLoader" />
    <!-- Page content that shows after the spinner -->
    <div v-if="showContent" class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
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
        <Footer @contactUsClicked="handleContactUsClicked" />

        <Loader v-if="showLoader" />
        <Popup v-if="showPopup" @close="showPopup = false" />
    </div>
</template>
