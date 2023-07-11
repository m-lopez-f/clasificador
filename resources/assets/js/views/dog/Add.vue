<template>
    <form v-on:submit.prevent="submitForm">
        <div class="form-group">
            <label for="dogName">Dog Name</label>
            <input required v-model="name" class="form-control" id="dogName" placeholder="Churrasco">
        </div>
        <div class="form-group">
            <label for="dogRace">Dog Race</label>
            <input required v-model="race" class="form-control" id="dogRace" placeholder="Bretón">
        </div>
        <div class="form-group">
            <label for="size">Size</label>
            <select required v-model="size" class="form-control" id="size">
                <option value="small">Small</option>
                <option value="medium">medium</option>
                <option value="big">big</option>
                <option value="extrabig">Extra Big</option>
            </select>
        </div>
        <div class="form-group">
            <label for="color">Dog color</label>
            <input required v-model="color" type="text" class="form-control" id="color" placeholder="Blue">
        </div>
        <div class="form-group">
            <label for="dogIdentifier">Dog Identifier</label>
            <input required v-model="identifier" type="text" class="form-control" id="dogIdentifier" placeholder="154848">
        </div>
        <div class="form-group">
            <label for="dogOwner">Dog Owner</label>
            <input required v-model="owner" type="text" class="form-control" id="dogOwner" placeholder="Pedro Alcantara">
        </div>
        <div class="form-group">
            <label for="photoDog">File input</label>
            <input type="file" id="photoDog" @change="fileChange">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</template>
<script>
import axios from 'axios';
export default {
    
    data: function () {
        return {
            name: '',
            race: '',
            size: '',
            color: '',
            photo: null,
            photo_url: '',
            identifier: '',
            owner: '',
        }
    },
    methods: {
        fileChange: function (event) {
            this.photo = event.target.files[0];
        },
        submitForm: function () {
            const formData = new FormData();

    		formData.set('name', this.name);
    		formData.set('race', this.race);
    		formData.set('size', this.size);
    		formData.set('color', this.color);
    		formData.set('identifier', this.identifier);
    		formData.set('owner', this.owner);
    		formData.set('photo', this.photo);

            axios.post('/api/dogs/add', formData, {
                headers: {
                    "content-type": "multipart/form-data"
                }
            }
            ).then((response) => {
                this.$router.push(`/dog/details/${response.data.id}`)
            })
        }
    }
}
</script>