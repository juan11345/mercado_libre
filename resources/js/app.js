import './bootstrap';
import { createApp } from 'vue';
import vSelect from 'vue-select';

/**componentes */
import ProductsList from './components/Products/Index.vue';
import CategoriesTable from './components/Categories/Index.vue';
import CategoriesView from './components/Categoriesview/Index.vue';


const app = createApp({
    components: {
        ProductsList,
        CategoriesTable,
        CategoriesView
    }
});


app.component("v-select", vSelect)
app.mount('#app');
