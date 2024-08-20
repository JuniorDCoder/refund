<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="px-6 mx-auto max-w-7xl md:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in {{auth.user.name}}!</div>
                </div>
                <div v-if="role == 'user'" class="mt-5 lg:flex lg:flex-col">
                    <div class="items-stretch gap-4 lg:flex">
                        <div class="bg-white md:p-2 p-6 rounded-lg border border-gray-200 mb-4 lg:mb-0 shadow-md lg:w-[35%]">
                            <div class="flex items-center justify-center h-full space-x-5">
                                <div>
                                    <p class="text-2xl">Balance</p>
                                    <h2 class="text-4xl font-bold text-gray-600">{{auth.user.balance}} $</h2>

                                </div>
                                <img src="https://www.emprenderconactitud.com/img/Wallet.png" alt="wallet"
                                    class="h-24 md:h-20 w-38">
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-lg xs:mb-4 max-w-full shadow-md lg:w-[65%]">

                            <div class="flex flex-wrap justify-between h-full">

                                <a href="mailto:info@quickreimbourseexpertsco.online"
                                    class="flex flex-col items-center justify-center flex-1 p-4 m-2 space-y-2 border border-gray-200 rounded-lg bg-gradient-to-r from-cyan-400 to-cyan-600">
                                    <i class="text-4xl text-white fas fa-hand-holding-usd"></i>
                                    <p class="text-white">Deposit</p>
                                </a>


                                <a href="mailto:info@quickreimbourseexpertsco.online"
                                    class="flex flex-col items-center justify-center flex-1 p-4 m-2 space-y-2 border border-gray-200 rounded-lg bg-gradient-to-r from-cyan-400 to-cyan-600">
                                    <i class="text-4xl text-white fas fa-qrcode"></i>
                                    <p class="text-white">Withdraw</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 my-4 bg-white rounded-lg shadow-md">
                        <table class="w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="w-full px-4 py-2 text-left border-b-2">
                                        <h2 class="font-bold text-gray-600 text-ml">Transacciones</h2>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="w-full border-b">
                                    <td class="w-1/2 px-4 py-2 text-left align-top">
                                        <div>
                                            <h2 class="font-semibold">Account Creation</h2>
                                            <p>{{ formatDate(auth.user.created_at) }}</p>
                                        </div>
                                    </td>
                                    <td class="w-1/2 px-4 py-2 text-right text-cyan-500">
                                        <p>{{ auth.user.balance }}$</p>
                                    </td>
                                </tr>
                                <tr v-for="transaction in transactions" :key="transaction.id" class="w-full border-b">
                                    <td class="w-1/2 px-4 py-2 text-left align-top">
                                        <div>
                                            <!-- Conditionally display "Credited" or "Debited" -->
                                            <h2 class="font-semibold" v-if="transaction.amount >= 0">Credited</h2>
                                            <h2  class="font-semibold" v-else>Debited</h2>
                                            <p>{{ formatDate(transaction.created_at) }}</p>
                                        </div>
                                    </td>
                                    <td class="w-1/2 px-4 py-2 text-right">
                                        <!-- Conditionally apply text color and prepend symbol based on the amount -->
                                        <p class="flex" :class="{'text-cyan-500': transaction.amount >= 0, 'text-red-500': transaction.amount < 0}">
                                            <!-- Prepend + or - based on the amount -->
                                            <span v-if="transaction.amount >= 0">+</span>
                                            <span v-else>-</span>
                                            {{ Math.abs(transaction.amount) }}$
                                        </p>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <!-- Pagination Controls -->
                        <div class="pagination">
                            <button @click="goToPreviousPage" :disabled="currentPage === 1">Previous</button>
                            <span>Page {{ currentPage }} of {{ totalPages }}</span>
                            <button @click="goToNextPage" :disabled="currentPage === totalPages">Next</button>
                        </div>
                    </div>
                </div>
                <Users :users="users" v-if="role == 'admin'" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import { defineProps, reactive, ref, computed } from 'vue';
import Users from '@/Components/Sections/Users.vue';

// Use usePage to access $page
const { props } = usePage();

const auth = reactive({
    user: props.auth.user,
});

// Define props and destructure transactions from it
const { role, users, transactions } = defineProps({
    role: String,
    users: Array,
    transactions: Array,
});

const formatDate = (dateString) => {
    const options = { year: 'numeric', month: 'long', day: 'numeric', weekday: 'long' };
    const date = new Date(dateString);
    // Explicitly setting locale to 'en-US'
    return date.toLocaleDateString('en-US', options);
};

const currentPage = ref(1);
const transactionsPerPage = 5;

const paginatedTransactions = computed(() => {
    let start;
    let end;

    if (currentPage.value === 1) {
        // For the first page, show only 4 transactions
        start = 0;
        end = 5;
    } else {
        // For subsequent pages, calculate start and end normally
        start = 1 * transactionsPerPage - 1; // Adjust start for subsequent pages
        end = start + transactionsPerPage;
    }

    return transactions.slice(start, end);
});

const totalPages = computed(() => Math.ceil(transactions.length / transactionsPerPage));

function goToNextPage() {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
    }
}

function goToPreviousPage() {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
}
</script>

<style>
.pagination {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
  margin-top: 20px;
}

.pagination button {
  padding: 5px 10px;
  cursor: pointer;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 5px;
}

.pagination button:disabled {
  background-color: #ccc;
}
</style>
