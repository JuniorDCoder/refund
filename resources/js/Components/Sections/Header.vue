<template>
    <header>
        <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
            <div class="flex items-center justify-between w-full max-w-screen-xl mx-auto md:flex-wrap">
                <Link :href="route('welcome')" class="z-10 items-center hidden md:flex">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="QuickReimbourse" />
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">QuickReimbourse</span>
                </Link>
                <div class="z-30 flex items-center gap-4 lg:order-2">
                    <Link :href="route('welcome')" class="block py-2 pl-3 pr-4 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Home</Link>
                    <Link :href="route('login')" class="text-gray-800 dark:text-white hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Log in</Link>
                    <Link :href="route('register')" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 mr-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Get started</Link>

                </div>

            </div>
        </nav>
    </header>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
</script>

<style scoped>

</style>
