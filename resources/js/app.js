import './bootstrap';
import { createApp } from 'vue';
import vSelect from 'vue-select';



const app = createApp({
    components: {
    }
});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);



app.component("v-select", vSelect)
app.mount('#app');
