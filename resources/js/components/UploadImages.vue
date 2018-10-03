<template>
    <div>
        <label for="image" class="btn btn-link">{{ button_text }}</label>
        <input type="file" name="image" id="image" style="display: none" v-on:change="uploadPicture"/>
        <input type="hidden" name="images[]" :id="'image_' + index" :value="imageName" v-for="imageName, index in listUpload">
        <div class="alert alert-danger" role="alert" v-if="errors.length > 0">
            <ul class="m-0">
                <li v-for="error in errors">{{ error }}</li>
            </ul>
        </div>
        <vue-gallery :images="images" :index="index" @close="index = null"></vue-gallery>
        <div class="row">
            <div class="col-3" v-for="image, imageIndex in images">
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
        props: ['button_text', 'image_url_post'],
        name: "UploadImages",
        data: function () {
            return {
                images: [],
                listUpload: [],
                index: null,
                errors: []
            }
        },
        methods: {
            uploadPicture: function (event) {
                this.errors = [];
                if (event.target.files && event.target.files[0]) {
                    if (event.target.files[0].size > 1024 * 1024){
                        this.errors.push("File is to big. Maximum 1 mb.");
                    }
                    var formData = new FormData();
                    console.log(this.listUpload);
                    formData.append('image', event.target.files[0], event.target.files[0].name);
                    axios
                        .post(this.image_url_post, formData)
                        .then(response => {
                            this.images.push(response.data.src);
                            this.listUpload.push(response.data.filename);
                        })
                        .catch(error => {
                            this.errors = error.response.data.errors.image;
                        });
                }
            },
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