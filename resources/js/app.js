import './bootstrap';

import { createApp } from 'vue';

import ServerList from "./components/ServerList.vue";

const app = createApp();

app.component('server-list', ServerList);

app.mount("#app");
