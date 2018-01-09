<template>
<div>
	<div class="alert alert-primary text-center">
		<a href="#" @click.prevent="remove">
			<span class="glyphicon glyphicon-remove"></span>
		</a>
		<a :href="imageUrl" download>
			<span class="glyphicon glyphicon-download"></span>
		</a>
	</div>
	<v-dialog/>
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

			this.$modal.show('dialog', {
				title: 'Deleting Image?',
				text: 'Are you sure you want to delete this image?',
				buttons: [
					{ 
      					title: 'Delete',
      					default: true,
      					handler: () => { 
      						axios.delete('/api/images/' + this.imageId)
								.then( () => {
									this.$emit('removed');
								});
							this.$modal.hide('dialog');
      					}	
    				},
    				{
    					title: 'Close'
    				}
    			]
			});

		}
	}
}
	
</script>

<style scoped>
div.alert {
	background-color: DarkCyan;
	color: White;
	font-size: 20px;
	font-weight: bold;
}
div.alert > a{
	color:white;
}
</style>