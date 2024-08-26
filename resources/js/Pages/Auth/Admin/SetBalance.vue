<template>
    <Head title="Set Balance" />
    <AuthenticatedLayout>

        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Set Balance</h2>
        </template>
        <div class="flex items-center justify-center px-6 mx-auto md:mt-24 max-w-7xl md:px-8">
            <!-- Author: FormBold Team -->
            <div class="mx-auto w-full p-12 max-w-[550px] bg-white">
                <form @submit.prevent="submit">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full px-3">
                            <div class="mb-5">
                                <label for="fName" class="mb-3 block text-base font-medium text-[#07074D]">
                                    Name
                                </label>
                                <input disabled type="text" name="fName" id="fName" placeholder="First Name" :value="user.name"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">
                            Set Balance?
                        </label>
                        <input type="number" name="guest" id="guest" placeholder="5" min="0" v-model="form.balance"
                            class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">
                            Set Currency?
                        </label>
                        <input type="text" name="guest" id="guest"  min="0" v-model="form.currency"
                            class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-5">
                        <label class="mb-3 block text-base font-medium text-[#07074D]">
                            Are you sure you want to set this?
                        </label>
                        <div class="flex items-center space-x-6">
                            <div class="flex items-center">
                                <input type="radio" name="radio1" id="radioButton1" class="w-5 h-5" />
                                <label for="radioButton1" class="pl-3 text-base font-medium text-[#07074D]">
                                    Yes
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input type="radio" name="radio1" id="radioButton2" class="w-5 h-5" />
                                <label for="radioButton2" class="pl-3 text-base font-medium text-[#07074D]">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { useForm } from '@inertiajs/vue3';
    import { ref } from 'vue';

    const props = defineProps({
        user: Object,
    });

    const form = useForm({
        balance: props.user.balance || 0,
        currency: props.user.currency || 'USD',
    });

    const submit = () => {
        form.patch(`/update-balance/${props.user.id}`, {
            preserveScroll: true,
            onSuccess: () => {
                // Handle success, e.g., show a success message or redirect
            },
            onError: () => {
                // Handle error, e.g., show an error message
            }
        });
    };
</script>

<style scoped>

</style>
