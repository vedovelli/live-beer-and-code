<template>
  <form @submit.prevent="onSubmit" class="mb-4 w-full md:w-1/3">
    <label for="search" class="block text-sm font-medium text-gray-700"
      >Search Breweries</label
    >
    <div class="mt-1 flex rounded-md shadow-sm">
      <div class="relative flex items-stretch flex-grow focus-within:z-10">
        <div
          class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
        >
          <svg
            class="h-5 w-5 text-gray-400"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
          >
            <path
              fill-rule="evenodd"
              d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
              clip-rule="evenodd"
            />
          </svg>
        </div>
        <input
          v-model="searchTerm"
          type="search"
          name="search"
          id="search"
          class="focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-none rounded-l-md pl-10 sm:text-sm border-gray-300"
          placeholder="John Doe"
        />
      </div>
      <button
        type="submit"
        class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
      >
        <span>Search</span>
      </button>
    </div>
  </form>

  <div class="bg-white shadow overflow-hidden sm:rounded-md">
    <ul class="divide-y divide-gray-200">
      <li v-for="b in breweries.data" :key="b.id">
        <inertia-link
          :href="route('brewery.beers', { id: b.id })"
          class="block hover:bg-gray-50"
        >
          <div class="px-4 py-4 sm:px-6">
            <div class="flex items-center justify-between">
              <p class="text-sm font-medium text-indigo-600 truncate">
                {{ b.name }}
              </p>
              <div class="ml-2 flex-shrink-0 flex">
                <p
                  class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
                >
                  Open NOW! 🍺
                </p>
              </div>
            </div>
            <div class="mt-2 sm:flex sm:justify-between">
              <div class="sm:flex">
                <p class="mt-2 flex items-center text-sm text-gray-500">
                  <!-- Heroicon name: solid/location-marker -->
                  <svg
                    class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"
                    />
                  </svg>
                  {{ b.city }}, {{ b.state }} - {{ b.country }}
                </p>
              </div>
              <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                <p>Quantidade de cervejas: {{ b.beers_count }}</p>
              </div>
            </div>
          </div>
        </inertia-link>
      </li>
    </ul>
    <div v-if="!shouldHidePagination" class="px-6 pb-4">
      <pagination :data="breweries" />
    </div>
  </div>
</template>

<script>
import Pagination from "../Shared/Pagination.vue";
export default {
  name: "BeerDashboard",
  components: { Pagination },
  props: {
    breweries: Object,
  },
  data() {
    return {
      searchTerm: "",
    };
  },
  computed: {
    shouldHidePagination() {
      return !this.breweries.prev_page_url && !this.breweries.next_page_url;
    },
  },
  methods: {
    onSubmit() {
      this.$inertia.replace(
        this.route("dashboard", { search: this.searchTerm })
      );
    },
  },
};
</script>
