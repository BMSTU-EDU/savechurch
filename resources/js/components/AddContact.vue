<template>
    <div>
        <div class="btn btn-link" v-on:click="addContact">{{ add_contact_text }}</div>
        <div v-for="contact in contacts" class="row">
            <div class="col-3">
                <label class="image" :for="'image_' + contact.index"
                       :style="{ backgroundImage: 'url(' + images[contact.index] + ')'}"
                ></label>
                <input type="file" :name="'contact[' + contact.index +'][\'image\']'" :id="'image_' + contact.index"
                       style="display: none"
                       v-on:change="selectPicture(contact.index, $event)"/>
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-6 form-group">
                        <input type="text" class="form-control form-control-sm"
                               :name="'contact[' + contact.index +'][\'name\']'" placeholder="ФИО"/>
                    </div>
                    <div class="col-6 form-group">
                        <input type="text" class="form-control form-control-sm"
                               :name="'contact[' + contact.index +'][\'role\']'" placeholder="Роль в проекте"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 form-group">
                        <input type="text" class="form-control form-control-sm"
                               :name="'contact[' + contact.index +'][\'email\']'" placeholder="E-Mail"/>
                    </div>
                    <div class="col-6 form-group">
                        <input type="text" class="form-control form-control-sm"
                               :name="'contact[' + contact.index +'][\'phone\']'" placeholder="Телефон"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 form-group">
                        <input type="text" class="form-control form-control-sm" :name="'contact[' + contact.index +'][\'vk\']'"
                               placeholder="Страница VK"/>
                    </div>
                    <div class="col-6 form-group">
                        <input type="text" class="form-control form-control-sm"
                               :name="'contact[' + contact.index +'][\'facebook\']'" placeholder="Страница Facebook"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-danger" role="alert" v-if="errors.length > 0">
            <ul class="m-0">
                <li v-for="error in errors">{{ error }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['button_text', 'add_contact_text', 'income_contacts', 'delete_url', 'contact_image_url_post'],
        name: "AddContact",
        data: function () {
            return {
                contacts: [],
                errors: [],
                images: [],
                id_counter: 0
            }
        },
        mounted: function () {
            this.contacts = JSON.parse(this.income_contacts);
        },
        methods: {
            selectPicture: function (index, event) {
                this.readURL(index, event.target);
            },
            readURL(index, input) {
                if (input.files && input.files[0]) {
                    if (event.target.files[0].size > 512 * 1024) {
                        this.errors.push("File is to big. Maximum 1 mb.");
                        return;
                    }
                    var reader = new FileReader();

                    reader.onload = (function (e) {
                        this.images.splice(index, 1, e.target.result);
                    }).bind(this);

                    reader.readAsDataURL(input.files[0]);
                }
            },
            deleteContact: function (contactIndex) {

            },
            addContact: function () {
                this.contacts.push({index: this.id_counter});
                this.id_counter++;
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