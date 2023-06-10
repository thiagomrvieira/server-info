<template>
    <div class="p-4">
        <h1 class="text-2xl font-bold">{{ $t('server_list') }}</h1>
        <server-filter @apply-filters="applyFilters" class="my-4"></server-filter>
        <ul class="space-y-4">
            <li v-for="server in filteredServers" :key="server" class="border p-4 rounded-lg bg-gray-200">
                <h2 class="text-lg font-semibold">{{ server.model }}</h2>
                <div class="text-gray-600">
                    <p class="flex items-center">
                        <span class="mr-2">{{ $t('ram') }}:</span>
                        <span>{{ server.ram.capacity }}</span>
                        <span class="mx-1">({{ server.ram.type }})</span>
                    </p>
                    <p class="flex items-center">
                        <span class="mr-2">{{ $t('hdd') }}:</span>
                        <span>{{ server.hdd.capacity }}</span>
                        <span class="mx-1">({{ server.hdd.type }})</span>
                    </p>
                    <p class="flex items-center">
                        <span class="mr-2">{{ $t('location') }}:</span>
                        <span>{{ server.location.name }}</span>
                        <span class="mx-1">({{ server.location.code }})</span>
                    </p>
                    <p>{{ $t('price') }}: {{ server.price }}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    import ServerFilter from './ServerFilter.vue';

    export default {
        data() {
        return {
            servers: [],
            filteredServers: [],
        };
        },
        mounted() {
        this.fetchServers();
        },
        methods: {
            async fetchServers() {
                try {
                    const response = await fetch('/api/v1/servers');
                    const data = await response.json();
                    this.servers = data.data;
                    this.filteredServers = data.data;
                } catch (error) {
                }
            },
            applyFilters(filters) {
                this.filteredServers = this.servers.filter((server) => {
                    if (
                        (filters.storage && server.hdd.capacity !== filters.storage) ||
                        (filters.ram && !filters.ram.includes(server.ram.capacity)) ||
                        (filters.harddiskType && server.hdd.type !== filters.harddiskType) ||
                        (filters.location && server.location.code !== filters.location)
                    ) {
                        return false;
                    }
                    return true;
                });
            },
        },
        components: {
            ServerFilter,
        },
    };
</script>
