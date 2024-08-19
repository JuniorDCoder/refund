<template>
    <div class="flex p-4">
        <h1 class="text-3xl">Users</h1>
    </div>
    <!-- Search input -->
    <div class="w-full mb-4">
        <input type="text" v-model="searchQuery" placeholder="Search users by name..." class="w-full p-2 mb-4 border rounded-md shadow">
    </div>
    <div class="flex justify-center py-4">

        <!-- Wrapper div with overflow-x-auto for horizontal scrolling -->
        <div class="w-full overflow-x-auto">
            <table class="w-full mb-4 bg-white rounded shadow-md text-md">
                <tbody>
                    <tr class="border-b">
                        <th class="p-3 px-5 text-left">Name</th>
                        <th class="p-3 px-5 text-left">Email</th>
                        <th class="p-3 px-5 text-left">Role</th>
                        <th></th>
                    </tr>
                    <tr v-for="user in filteredUsers" :key="user.id" class="bg-gray-100 border-b hover:bg-orange-100">
                        <td class="p-3 px-5">
                            <input type="text" :value="user.name" class="py-2 bg-transparent border-b-2 border-gray-300">
                        </td>
                        <td class="p-3 px-5">
                            <input type="text" :value="user.email" class="py-2 bg-transparent border-b-2 border-gray-300">
                        </td>
                        <td class="p-3 px-5">
                            <div class="py-2 bg-transparent border-b-2 border-gray-300">
                               User
                            </div>
                        </td>
                        <td class="flex justify-end p-3 px-5">
                            <Link :href="route('set-balance', user.id)">
                                <button type="button"
                                    class="px-2 py-1 mr-3 text-sm text-white bg-blue-500 rounded md:py-2 hover:bg-blue-700 focus:outline-none focus:shadow-outline">Set Balance
                                </button>
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup>
import { defineProps, ref, computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    users: Array,
});

const searchQuery = ref('');

const filteredUsers = computed(() => {
    if (!searchQuery.value) {
        return props.users;
    }
    return props.users.filter(user => user.name.toLowerCase().includes(searchQuery.value.toLowerCase()));
});
</script>

<style scoped>

</style>
