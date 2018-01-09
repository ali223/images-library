<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Deleted Images</div>

                    <div class="panel-body">
                        <ul>
                            <li v-for="image in deletedImages">
                                <img :class="{selected: selectedImage == image}" 
                                    :src="image.thumbnail_path" 
                                    @click="selectedImage = image">
                                {{ image.title }}
                            </li>

                        </ul>
                        <restore-bar :image-id="getSelectedImageId()"      
                                    v-show="selectedImage" @restored="getDeletedImages()">
                                    
                        </restore-bar>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import RestoreBar from '../components/RestoreBar';    
    export default {
        components: { RestoreBar },
        data() {
            return {
                deletedImages: [],
                selectedImage: false
            }
        },
        created() {
            this.getDeletedImages();
        },
        methods: {
            getDeletedImages() {
                axios.get('/api/deletedimages')
                    .then(response => this.deletedImages = response.data.data);
            },

            getSelectedImageId() {
                if (this.selectedImage) {
                    return this.selectedImage.id;
                }

                return null;
            },

            getSelectedImageUrl() {
                if (this.selectedImage) {
                    return this.selectedImage.image_path;
                }

                return null;
            }

        }
    }
</script>
