<template>
    <div>
        <label :for="'file' + files" class="btn btn-link">{{ button_text }}</label>
        <input type="file" name="images[]" id="file0" style="display: none" v-on:change="selectPicture"/>
        <input type="file" name="images[]" id="file1" style="display: none" v-on:change="selectPicture"/>
        <input type="file" name="images[]" id="file2" style="display: none" v-on:change="selectPicture"/>
        <input type="file" name="images[]" id="file3" style="display: none" v-on:change="selectPicture"/>
        <input type="file" name="images[]" id="file4" style="display: none" v-on:change="selectPicture"/>
        <input type="file" name="images[]" id="file5" style="display: none" v-on:change="selectPicture"/>
        <input type="file" name="images[]" id="file6" style="display: none" v-on:change="selectPicture"/>
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
        props: ['button_text'],
        name: "UploadImages",
        data: function () {
            return {
                images: [],
                index: null,
                files: 0,
            }
        },
        methods: {
            selectPicture: function (event) {
                this.readURL(event.target);
            },
            readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = (function (e) {
                        this.images.push(e.target.result);
                        this.files++;
                    }).bind(this);

                    reader.readAsDataURL(input.files[0]);
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