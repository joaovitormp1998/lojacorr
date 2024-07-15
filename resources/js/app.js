import './bootstrap';
import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';
import App from './components/App.vue';
import ToastNotification from './components/ToastNotification.vue';

const app = createApp({
    components: {
        'App': App,
        'ToastNotification':ToastNotification,
    }
});

app.mount('#app');
