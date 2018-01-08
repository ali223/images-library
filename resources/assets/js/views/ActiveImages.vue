<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Active Images</div>

                    <div class="panel-body">
                        <ul>
                            <li v-for="image in activeImages">
                                <img :class="{selected: selectedImage == image}" 
                                    :src="image.thumbnail_path" 
                                    @click="selectedImage = image">
                                {{ image.title }}
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                activeImages: [],
                selectedImage: false
            }
        },
        created() {
            axios.get('/api/images')
                .then(response => this.activeImages = response.data.data);
        }
    }
</script>
