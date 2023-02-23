<template>
	<!-- Modal -->
	<div class="modal fade" id="category_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">
						{{ `${is_create ? 'Create' : 'Edit'} Category` }}
					</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

					<form @submit.prevent="storeCategory">
						<!-- Name -->
						<div class="mb-3">
							<label for="name" class="form-label">Category Name</label>
							<input type="text" class="form-control" id="name" v-model="category.name" required>
						</div>

						<hr>
						<section class="d-flex justify-content-end">
							<button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">
								{{ `${is_create ? 'Create' : 'Edit'}` }}
							</button>
						</section>
					</form>

				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['category_data'],
		data() {
			return {
				is_create: true,
				category: {},
			}
		},
		created() {
			this.index()
		},
		methods: {
			index() {
				this.getCategories()
				this.setCategory()
			},
			async getCategories() {
				const { data } = await axios.get('Categories/GetAll')
				this.categories = data.categories
			},
			async storeCategory() {
				try {
					const category = this.loadFormData()
					if (this.is_create) {
						await axios.post('Categories/Save', category)
					} else {
						await axios.post(`Categories/Update/${this.category.id}`, category)
					}
					swal.fire({
						icon: 'success',
						title: 'Congrats!',
						text: 'Category Store!'
					})
					this.$parent.closeModal()
				} catch (error) {
					console.error(error)
					swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Something went wrong!'
					})
				}
			},
			setCategory() {
				if (!this.category_data) return
				this.category = {...this.category_data}
				this.is_create = false
			},
			loadFormData() {
				const form_data = new FormData()
				form_data.append('name', this.category.name)
				return form_data
			}
		},
	}
</script>
