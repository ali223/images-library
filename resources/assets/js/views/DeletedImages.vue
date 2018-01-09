<template>
    <div class="container">
        <div class="row" v-for="groupedImages in getGroupedDeletedImages()">
            <div class="col-md-4 well text-center" v-for="image in groupedImages">
                <img :class="{selected: selectedImage == image}" 
                    :src="image.thumbnail_path" 
                    @click="selectedImage = image">
                <p>{{ image.title }}</p> 
            </div>                    
        </div>

        <restore-bar :image-id="getSelectedImageId()" 
                    v-show="selectedImage" @restored="getDeletedImages()">
                    
        </restore-bar>
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
            },

            getGroupedDeletedImages() {
                return _.chunk(this.deletedImages, 3);
            }

        }
    }
</script>
<style scoped>
p {
    margin-top: 10px;
}
</style>