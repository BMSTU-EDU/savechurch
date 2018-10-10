<template>
    <yandex-map :coords="[55.753095, 37.615363]"
                zoom="10"
                style="width: auto; height: 750px;"
                :behaviors="['default']"
                :controls="['default']"
                map-type="map">
        <yandex-marker
                v-for="church, index in churches"
                :markerId="church.id"
                :key="index"
                :church="church"
                marker-type="placemark"
                :coords="[church.latitude, church.longitude]"
                :balloonTemplate = "balloonTemplate(church)"
        >
        </yandex-marker>
    </yandex-map>
</template>

<script>
    export default {
        props: ['churches_url'],
        name: "ChurchMap",
        data: function () {
            return {
                churches: []
            }
        },
        methods: {
            balloonTemplate: function(church) {
                return `
                <h3>${church.name}</h3>
                 <small class="text-muted">${church.address}</small>
                `;
            }  
        },
        mounted: function () {
            axios
                .get(this.churches_url)
                .then(response => {
                    this.churches = response.data;
                })
                .catch(response => {
                console.log(response);
            });
        }
    }
</script>