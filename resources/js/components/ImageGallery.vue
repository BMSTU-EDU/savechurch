<template>
    <div>
        <vue-gallery :images="items" :index="index" @close="index = null"></vue-gallery>
        <div class="row">
            <div class="col-auto px-0" v-for="image, imageIndex in items">
                <div class="image"
                     @click="index = imageIndex"
                     :style="{ backgroundImage: 'url(' + image + ')'}"
                ></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['images'],
        name: "ImageGallery",
        data: function () {
            return {
                index: null,
                items: []
            }
        },
        mounted: function () {
            this.items = JSON.parse(this.images);
        }
    }
</script>

<style scoped>
    .image {
        float: left;
        background-size: cover;
        cursor: pointer;
        width: 150px;
        height: 150px;
        background-repeat: no-repeat;
        background-position: center center;
        border: 1px solid #ebebeb;
        margin: 5px;
    }
</style>