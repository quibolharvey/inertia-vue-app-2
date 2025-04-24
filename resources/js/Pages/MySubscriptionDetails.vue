<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
defineProps({
    subscription: Object
})
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold text-gray-800">My Subscription</h2>
        </template>

        <div class="py-12 max-w-3xl mx-auto">
            <div class="bg-white p-6 rounded-lg shadow">
                <p><strong>Full Name:</strong> {{ subscription?.full_name }}</p>
                <p><strong>Email:</strong> {{ subscription?.email }}</p>
                <p><strong>Type:</strong> {{ subscription?.subscription_type }}</p>
                <p><strong>Price:</strong> ₱{{ subscription?.price }}</p>
                <p><strong>Lifetime:</strong> {{ subscription?.lifetime ? 'Yes' : 'No' }}</p>
                <p><strong>Expires:</strong> {{ subscription?.expiry_date }}</p>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

