<template>
    <div>
        <h1>{{ $t('server_list') }}</h1>
        <ul>
            <li v-for="server in servers" :key="server.model">
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
    export default {
        data() {
            return {
                servers: [],
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
                } catch (error) {
                    console.error('Error retrieving server data:', error);
                }
            },
        },
    };
</script>
