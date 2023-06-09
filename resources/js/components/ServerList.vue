<template>
    <div>
        <h1>{{ $t('server_list') }}</h1>
        <server-filter @apply-filters="applyFilters"></server-filter>
        <ul>
            <li v-for="server in filteredServers" :key="server">
                <h2>{{ server.model }}</h2>
                <p>{{ $t('ram') }}: {{ server.ram.capacity }} ({{ server.ram.type }})</p>
                <p>{{ $t('hdd') }}: {{ server.hdd.capacity }} ({{ server.hdd.type }})</p>
                <p>{{ $t('location') }}: {{ server.location.name }} ({{ server.location.code }})</p>
                <p>{{ $t('price') }}: {{ server.price }}</p>
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
