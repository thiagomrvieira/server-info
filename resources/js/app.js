import { createApp } from 'vue';
import { createI18n } from 'vue-i18n';
import ServerList from './components/ServerList.vue';
import enTranslations from './locales/en.json';

const app = createApp(ServerList);

// Translations
const i18n = createI18n({
    locale: 'en',
    messages: {
        en: enTranslations,
    },
});

app.use(i18n);
app.mount('#app');
