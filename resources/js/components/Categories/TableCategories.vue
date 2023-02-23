<template>
    <div class="table-bordered table-responsive-md">
        <table class="table" id="categoryTable" @click="getEvent">
            <thead>
                <tr class="text-center">
                    <th scope="col">id</th>
				    <th scope="col">Nombre</th>
				    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</template>

<script>
export default {
		data() {
			return {
				categories: [],
				datatable: {}
			}
		},
		mounted() {
			this.index()
		},
		methods: {
			async index() {
				this.mountDataTable()
			},
			mountDataTable() {
				this.datatable = $('#categoryTable').DataTable({
					processing: true,
					serverSide: true,
					ajax: {
						url: '/Categories/GetAllDataTable'
					},
					columns: [
						{ data: 'id' },
						{ data: 'name' },
						{ data: 'action' }
					]
				})
			},
			async getCategories() {
				try {
					this.load = false
					const { data } = await axios.get('Categories/GetAll')
					this.categories = data.categories
					this.load = true
				} catch (error) {
					console.error(error)
				}
				this.mountDataTable()
			},
			getEvent(event) {
				const button = event.target
				if (button.getAttribute('role') == 'edit') {
					this.getCategory(button.getAttribute('data-id'))
				}
				if (button.getAttribute('role') == 'delete') {
					this.deleteCategory(button.getAttribute('data-id'))
				}
			},
			async getCategory(category_id) {
				try {
					const { data } = await axios.get(`Categories/GetOne/${category_id}`)
					this.$parent.editCategory(data.category)
				} catch (error) {
					console.error(error);
				}
			},
			async deleteCategory(category_id) {
				try {
					const result = await swal.fire({
						title: 'Do you want delete the category?',
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Delete'
					})
					if (!result.isConfirmed) return
					this.datatable.destroy()
					await axios.delete(`Categories/Delete/${category_id}`)
					this.index()
					swal.fire({
						icon: 'success',
						title: 'Congrats!',
						text: 'Categoria eliminada!'
					})
				} catch (error) {
					console.error(error);
				}
			}
		},
	}
</script>
