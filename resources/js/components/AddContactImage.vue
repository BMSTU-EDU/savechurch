<template>
    <div>
        <label class="image" for="contact_image"
               :style="{ backgroundImage: 'url(' + contact_image + ')'}"
        ></label>
        <input type="file" name="contact_image" id="contact_image"
               style="display: none"
               v-on:change="selectPicture($event)"/>
    </div>
</template>

<script>
    export default {
        props: ['income_image'],
        name: "AddContactImage",
        data: function () {
            return {
                contact_image: '',
            }
        },
        mounted: function () {
            if (this.income_image !== '') {
                this.contact_image = this.income_image;
            }
        },
        methods: {
            selectPicture: function (event) {
                this.readURL(event.target);
            },
            readURL(input) {
                if (input.files && input.files[0]) {
                    if (event.target.files[0].size > 512 * 1024) {
                        this.errors.push("File is to big. Maximum 1 mb.");
                        return;
                    }
                    var reader = new FileReader();

                    reader.onload = (function (e) {
                        this.contact_image = e.target.result;
                    }).bind(this);

                    reader.readAsDataURL(input.files[0]);
                }
            }
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