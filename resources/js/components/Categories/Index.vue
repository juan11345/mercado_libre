<template>
    <div class="card mx-5 my-5">
        <div class="card-header d-flex justify-content-between">
            <h2 class="text-center">Categoria</h2>
            <button @click="openModel" class="btn btn-outline-warning">Crear Categoria</button>
        </div>

        <div class="card-body">
            <section class="table">
                <table-categories ref="table"/>
            </section>

            <section v-if="load_modal">
                <modal :category_data="category"/>
            </section>
        </div>
    </div>
</template>

<script>
import TableCategories from './TableCategories.vue';
import Modal from './Modal.vue';

export default {
    components: {
        TableCategories,
        Modal
    },
    data() {
        return {
            load_modal: false,
            modal: null,
            category: null
        }
    },

    methods: {
        openModal(){
            this.load_modal = true

            setTimeouy(() =>{
                this.modal = new bootstrap.Modal(document.getElementById('category_modal'),{
                    keyboard: false
                })

                this.modal.show()

                const modal = document.getElementById('category_modal')
                modal.addEventListener('hidden.bs.modal', () => {
                    this.load_modal = false
                    this.category = null
                })
            }, 200);
        },

        closeModak(){
            this.modal.hide()
            this.$refs.table.datatable.destroy()
            this.$refs.table.index()
        },

        editCategory(category){
            this.category = category
            this.openModal()
        }
    },
}

</script>

