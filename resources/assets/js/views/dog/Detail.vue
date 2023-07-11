<template>
    <div class="panel panel-primary" v-if="dog">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <img class="img-thumbnail" :src="`${dog.path_photo}`" alt="">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12"><strong>Dog Name</strong>{{ dog.name }}</div>
                    </div>
                     <div class="row">
                        <div class="col-md-12"><strong>Race:</strong> {{ dog.race }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><strong>ID:</strong> {{ dog.identifier }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><strong>Color:</strong> {{ dog.color }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><strong>Owner:</strong> {{ dog.owner }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><strong>Size: </strong>{{ dog.size }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data: function () {
        return {
            dog: {}
        }
    },
    mounted: function() {
        const dogID = this.$route.params.dogId
        axios.get(`/api/dogs/details/${dogID}`).then((response) => {
            this.dog = response.data
        }) 
    },
}
</script>