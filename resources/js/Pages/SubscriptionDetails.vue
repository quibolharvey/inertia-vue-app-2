<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Subscription Details
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Centered Search bar and Search button -->
                        <div class="mb-6 flex justify-center">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                                <input
                                    type="text"
                                    placeholder="Search subscription..."
                                    class="w-72 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                />
                                <button
                                    class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow hover:bg-indigo-700 transition"
                                >
                                    Search
                                </button>
                            </div>
                        </div>

                        Details
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>



