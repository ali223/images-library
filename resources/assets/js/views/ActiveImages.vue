<template>
    <div class="container">
        <div class="row" v-for="groupedImages in getGroupedActiveImages()">

            <div class="col-md-4 well text-center" v-for="image in groupedImages">
                <img :class="{selected: selectedImage == image}" 
                    :src="image.thumbnail_path" 
                    @click="selectedImage = image">
                <p>{{ image.title }}</p>                            
            </div>                    
        
        </div>

        <actions-bar :image-id="getSelectedImageId()" 
                    :image-url="getSelectedImageUrl()"
                    v-show="selectedImage" @removed="removeImage">                   
        </actions-bar>
    </div>
</template>

<script>
    import ActionsBar from '../components/ActionsBar';    
    export default {
        components: { ActionsBar },
        data() {
            return {
                activeImages: [],
                selectedImage: false
            }
        },
        created() {
            this.getActiveImages();
        },
        methods: {
            getActiveImages() {
                axios.get('/api/images')
                    .then(response => this.activeImages = response.data.data);
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

            getGroupedActiveImages() {
                return _.chunk(this.activeImages, 3);
            },

            removeImage(id) {
                this.activeImages = _.reject(this.activeImages, (image) => image.id == id);
                this.selectedImage = false;
            }

        }
    }
</script>
<style scoped>
    p {
        margin-top: 10px;
    }
</style>