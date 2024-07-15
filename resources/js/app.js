import './bootstrap';
import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';
import App from './components/App.vue';
import ToastNotification from './components/ToastNotification.vue';
import Saudacao from './components/Saudacao.vue';

const app = createApp({
    components: {
        'App': App,
        'ToastNotification':ToastNotification,
        'Saudacao':Saudacao
    }
});

app.mount('#app');
