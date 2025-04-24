<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

// Form variables
const fullName = ref('');
const email = ref('');
const subscriptionType = ref('');
const applyLifetime = ref(false);

// Price logic
const prices = {
    daily: 150,
    monthly: 900,
    yearly: 9000,
};

const finalPrice = computed(() => {
    if (!subscriptionType.value) return 0;
    let base = prices[subscriptionType.value];
    return applyLifetime.value ? Math.round(base * 0.85) : base;
});

// Submit handler
const handleSubmit = () => {
    router.post(route('subscription.store'), {
        full_name: fullName.value,
        email: email.value,
        subscription_type: subscriptionType.value,
        lifetime: applyLifetime.value,
        price: finalPrice.value,
    });
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

                            <!-- Lifetime Checkbox -->
                            <div class="mb-4 flex items-center gap-2">
                                <input
                                    type="checkbox"
                                    id="lifetime"
                                    v-model="applyLifetime"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                />
                                <label for="lifetime" class="text-sm text-gray-700">Apply lifetime membership</label>

                                <!-- Hoverable tooltip -->
                                <div class="relative group">
                                    <span class="text-indigo-500 cursor-pointer text-lg font-bold">?</span>
                                    <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 w-64 p-2 rounded-md bg-gray-800 text-white text-xs opacity-0 group-hover:opacity-100 transition-opacity duration-200 z-10">
                                        Apply lifetime membership with 15% discount.
                                    </div>
                                </div>
                            </div>

                            <!-- Price Display -->
                            <div class="mb-4 text-sm text-gray-700">
                                <span v-if="subscriptionType">Total Price: ₱{{ finalPrice }}</span>
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

