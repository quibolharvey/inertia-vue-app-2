<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

// Variables for form
const fullName = ref('');
const email = ref('');
const subscriptionType = ref('');
const applyMembership = ref(false);


// Handle form submission
// const handleSubmit = () => {
//     // Logic for handling form submission
//     console.log('Form submitted:', { fullName: fullName.value, email: email.value, subscriptionType: subscriptionType.value });
// };

const handleSubmit = () => {
    let basePrice = 0;
    switch (subscriptionType.value) {
        case 'daily':
            basePrice = 150;
            break;
        case 'monthly':
            basePrice = 900;
            break;
        case 'yearly':
            basePrice = 9000;
            break;
    }

    const membershipFee = applyMembership.value ? 400 : 0;
    const total = basePrice + membershipFee;

    console.log('Form submitted:', {
        fullName: fullName.value,
        email: email.value,
        subscriptionType: subscriptionType.value,
        hasMembership: applyMembership.value,
        amount: total,
    });

    // You can now submit this data via router.post() to your backend.
};

</script>

<template>
    <Head title="Subscription" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Subscription
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="handleSubmit">
                            <!-- Full Name -->
                            <div class="mb-4">
                                <label for="fullName" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <input
                                    type="text"
                                    id="fullName"
                                    v-model="fullName"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    required
                                />
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input
                                    type="email"
                                    id="email"
                                    v-model="email"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    required
                                />
                            </div>

                            <!-- Subscription Type -->
                            <div class="mb-4">
                                <label for="subscriptionType" class="block text-sm font-medium text-gray-700">Subscription Type</label>
                                <select
                                    id="subscriptionType"
                                    v-model="subscriptionType"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    required
                                >
                                    <option value="" disabled>Select Subscription Type</option>
                                    <option value="daily">Daily - ₱150</option>
                                    <option value="monthly">Monthly - ₱900</option>
                                    <option value="yearly">Yearly - ₱9000</option>
                                </select>
                            </div>

                            <!-- Membership Checkbox -->
                            <div class="mb-4">
                                <label class="inline-flex items-center">
                                    <input
                                        type="checkbox"
                                        v-model="applyMembership"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                    />
                                    <span class="ml-2 text-sm text-gray-700">Apply Membership? ₱400</span>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <div class="mb-4">
                                <button
                                    type="submit"
                                    class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600"
                                >
                                    Subscribe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
