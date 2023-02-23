<template>
    <!-- Modal -->
    <div class="modal fade" id="product_modal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                {{`${is_create?'Crear':'Actualizar'} Producto`}}
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">

                <form @submit.prevent="storeProduct" enctype="multipart/form-data">
                    <!-- image -->
                    <div class="mb-3">
                        <label for="images" class="form-label">Imagen</label>
                        <input type="file" class="form-control" id="file" accept="image/*" @change="loadImage">
                    </div>
                    <!-- name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" v-model="product.name">
                    </div>
                    <!-- descripcion -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripcion</label>
                        <textarea class="form-control" id="description" rows="3" v-model="product.description"></textarea>
                    </div>

                    <!-- categories -->
                    <div class="mb-3">
                        <label for="category" class="form-label">Categorias</label>
                        <v-select id="category" :options="categories" v-model="product.category_id" :reduce="category => category.id" label="name" :clearable="false">
                        </v-select>
                    </div>

                    <!-- stock -->
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" v-model="product.stock">
                    </div>
                    <!-- precio -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="price" v-model="product.price">
                    </div>

                    <hr>
                    <section class="d-flex justify-content-end mt-3">
                        <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary me-1">{{`${is_create?'Crear':'Actualizar '}`}}</button>
                    </section>
                </form>
          </div>
          <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
    props: ['product_data'],
	data(){
		return {
			is_create: true,
			categories: [],
			product: {},
			file: null
		}
	},
	created() {
			this.index()
		},
	methods: {
			index() {
				this.getCategories()
				this.setProduct()
			},
			setProduct(){
				if (!this.product_data) return
				this.product = { ...this.product_data}
				this.is_create = false
			},
			loadImage(event){
				this.file = event.target.files[0]
			},
			loadFormData(){
				const form_data = new FormData()
				if(this.file) form_data.append('image', this.file, this.file.name)
				form_data.append('name', this.product.name)
				form_data.append('description', this.product.description)
				form_data.append('category_id', this.product.category_id)
				form_data.append('stock', this.product.stock)
				form_data.append('price', this.product.price)
				return form_data
			},
			async getCategories( ){
				const { data } = await axios.get('Categories/GetAll')
				this.categories = data.categories
			},
			async storeProduct(){
				try {
					const product = this.loadFormData()
					if (this.is_create) {
					await axios.post('Products/Save', product)
					} else {
					await axios.post(`Products/Update/${this.product.id}`, product)
					}
					//alerta success
					swal.fire({
						icon: 'success',
						title: 'Felicidades',
						text: 'Producto añadido'
					})
					this.$parent.closeModal()
				} catch (error) {
					console.error(error)
					//alerta error
					swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Algo salio mal'
					})
				}
			}
	}
}
</script>
