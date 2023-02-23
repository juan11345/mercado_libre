<template>
	<table class="table" id="productTable" @click="getEvent">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Categoria</th>
				<th>Stock</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>
</template>

<script>
export default {
	data() {
		return {
			products: [],
			datatable: {}
		}
	},
	mounted() {
		this.index()
	},
	methods:{
		async index(){
			this.mountDataTable()
		},
		mountDataTable(){
			this.datatable = $('#productTable').DataTable({
				processing: true,
				serverSide: true,
				ajax:{
					url:'/Products/GetAllDataTable'
				},
				columns:[
					{data: 'name'},
					{data: 'category.name', searchable: false },
					{data: 'stock'},
					{data: 'action'}
				]
			})
		},
		async getProducts(){
			try {
				this.load = false
				const { data }  = await axios.get('Products/GetAll')
				this.products = data.products
				this.load = true
			} catch (error) {
				console.error(error)
			}
			this.mountDataTable()
		},
		getEvent(event) {
				const button = event.target
				if (button.getAttribute('role') == 'edit') {
					this.getProduct(button.getAttribute('data-id'))
				}
				if (button.getAttribute('role') == 'delete') {
					this.deleteProduct(button.getAttribute('data-id'))
				}
			},
		async getProduct(product_id){
			try {
			const { data } = await axios.get(`Products/GetOne/${product_id}`)
			this.$parent.editProduct(data.product)
			} catch (error) {
				console.error(error)
			}
		},
		async deleteProduct(product_id){
			try {
				 const result = await swal.fire({
					icon: 'info',
					title: 'Quiere eliminar el producto?',
					showCancelButton: true,
					confirmButtonText: 'Eliminar',
				})
				if (!result.isConfirmed) return
				this.datatable.destroy()
				await axios.delete(`Products/Delete/${product_id}`)
				this.index()
				swal.fire({
							icon: 'success',
							title: 'Felicidades',
							text: 'Producto Eliminado'
						})
			} catch (error) {
				console.error(error)
			}
		}
	}
}
</script>
