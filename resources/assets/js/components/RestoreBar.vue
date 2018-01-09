<template>
	<div class="alert alert-primary text-center">
		<a href="#" @click.prevent="restore()">
			<span class="glyphicon glyphicon-upload"></span>
		</a>
	</div>
</template>

<script>
export default {
	props: ['imageId'],
	methods: {
		restore() {
			if (! this.imageId) {
				return;
			}

			axios.patch('/api/deletedimages/' + this.imageId)
				.then( () => {
					this.$emit('restored');		
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

div a{
	color: white;
}
</style>