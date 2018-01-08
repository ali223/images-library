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
                        <actions-bar :image-id="getSelectedImageId()" 
                                    :image-url="getSelectedImageUrl()"
                                    v-show="selectedImage" @removed="getActiveImages()">
                                    
                        </actions-bar>
                    </div>
                </div>
            </div>
        </div>
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
            }

        }
    }
</script>
