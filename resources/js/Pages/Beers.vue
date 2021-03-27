<template>
  <h1 class="text-2xl font-bold text-gray-700 mb-6">
    {{ brewery.name }}
    <inertia-link
      :href="route('dashboard')"
      class="text-sm text-blue-600 hover:text-blue-400"
      >[back]</inertia-link
    >
  </h1>
  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
        >
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Name
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  ABV
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  PLACEHOLDER
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  PLACEHOLDER
                </th>
              </tr>
            </thead>
            <tbody
              v-for="b in beers.data"
              :key="b.id"
              class="bg-white divide-y divide-gray-200"
            >
              <tr>
                <td
                  class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                >
                  {{ b.name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ b.abv }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  placeholder
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  placeholder
                </td>
              </tr>
            </tbody>
          </table>
          <div class="px-6 pb-4 bg-white">
            <pagination :data="beers" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Pagination from "../Shared/Pagination.vue";
export default {
  components: { Pagination },
  name: "Beers",
  props: {
    brewery: Object,
    beers: Object,
  },
};
</script>
