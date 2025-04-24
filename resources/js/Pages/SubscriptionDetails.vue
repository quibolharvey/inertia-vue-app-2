<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';
defineProps({ subscriptions: Array });

const updateStatus = (id, status) => {
  router.patch(`/subscription/${id}/status`, { status }, {
    preserveScroll: true,
  });
};
</script>

<template>
  <Head title="Subscription Details" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Subscription Details (Admin)</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <table class="min-w-full divide-y divide-gray-200">
              <thead>
                <tr>
                  <th class="px-4 py-2 text-left">Name</th>
                  <th class="px-4 py-2 text-left">Email</th>
                  <th class="px-4 py-2 text-left">Type</th>
                  <th class="px-4 py-2 text-left">Membership</th>
                  <th class="px-4 py-2 text-left">Amount</th>
                  <th class="px-4 py-2 text-left">Status</th>
                  <th class="px-4 py-2 text-left">Change Status</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                <tr v-for="sub in subscriptions" :key="sub.id">
                  <td class="px-4 py-2">{{ sub.full_name }}</td>
                  <td class="px-4 py-2">{{ sub.email }}</td>
                  <td class="px-4 py-2 capitalize">{{ sub.subscription_type }}</td>
                  <td class="px-4 py-2">{{ sub.has_membership ? 'Yes' : 'No' }}</td>
                  <td class="px-4 py-2">₱{{ sub.amount }}</td>
                  <td class="px-4 py-2">{{ sub.status }}</td>
                  <td class="px-4 py-2">
                    <select
                      class="rounded border-gray-300"
                      :value="sub.status"
                      @change="e => updateStatus(sub.id, e.target.value)"
                    >
                      <option value="pending">Pending</option>
                      <option value="paid">Paid</option>
                      <option value="expired">Expired</option>
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
``
