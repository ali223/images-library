<template>
	<div class="alert alert-primary text-center">
		<a href="#" @click.prevent="remove">
			<span class="glyphicon glyphicon-remove"></span>
		</a>
		<a :href="imageUrl" download>
			<span class="glyphicon glyphicon-download"></span>
		</a>
	</div>
</template>

<script>
export default {
	props: ['imageId', 'imageUrl'],
	methods: {
		remove() {
			if (! this.imageId) {
				return;
			}

			axios.delete('/api/images/' + this.imageId)
				.then( () => {
					this.$emit('removed');		
			});			
		}
	}
}
	
</script>

<style scoped>
div {
	background-color: DarkCyan;
	color: White;
	font-size: 20px;
	font-weight: bold;
}
</style>