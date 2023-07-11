<template>
    <div class="container-fluid">
        <h1>Dogs List</h1>
        <form action="" v-if="!noElements" v-on:submit.prevent="filterForm">
            <div class="form-group">
                <label for="dogName">Dog Name</label>
                <input v-model="name" class="form-control" id="dogName" placeholder="Churrasco">
            </div>
            <div class="form-group">
                <label for="dogRace">Dog Race</label>
                <input v-model="race" class="form-control" id="dogRace" placeholder="Bretón">
            </div>
            <div class="form-group">
                <label for="size">Size</label>
                <select v-model="size" class="form-control" id="size">
                    <option value="small">Small</option>
                    <option value="medium">medium</option>
                    <option value="big">big</option>
                    <option value="extrabig">Extra Big</option>
                </select>
            </div>
            <div class="form-group">
                <label for="color">Dog color</label>
                <input v-model="color" type="text" class="form-control" id="color" placeholder="Blue">
            </div>
            <div class="form-group">
                <label for="dogIdentifier">Dog Identifier</label>
                <input v-model="identifier" type="text" class="form-control" id="dogIdentifier" placeholder="154848">
            </div>
            <div class="form-group">
                <label for="dogOwner">Dog Owner</label>
                <input  v-model="owner" type="text" class="form-control" id="dogOwner" placeholder="Pedro Alcantara">
            </div>
            <button type="submit" class="btn btn-default">Filter</button>
        </form>
        <div class="table-responsive" v-if="!noElements">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Race</th>
                    <th>Owner</th>
                    <th>Identifier</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr v-for="dog in dogs">
                        <td>{{ dog.name }}</td>
                        <td>{{ dog.size }}</td>
                        <td>{{ dog.color }}</td>
                        <td>{{ dog.race }}</td>
                        <td>{{ dog.owner }}</td>
                        <td>{{ dog.identifier }}</td>
                        <td><router-link :to="`/dog/details/${dog.id}`">Details</router-link></td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container-fluid" v-else> 
            <div class="row">
                <router-link to="/dog/add">Add First Dog</router-link>
                <img src="/api/images/NotDogFound.png" alt="">
                
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    name: 'List',
    data: function() {
        return {
            dogs: [],
            name: null,
            race: null,
            size: null,
            color: null,
            identifier: null,
            owner: null,
            noElements: true,
        }
    },
    mounted: function() {
        
        axios.get('/api/dogs/list').then((response) => {
            this.dogs = response.data
            this.noElements = false
        }) 
    },
    methods: {
        filterForm: function () {
            const formData = {
                name: this.name,
                size: this.size,
                race: this.race,
                color: this.color,
                owner: this.owner,
                identifier: this.identifier,
            }
            axios.post('/api/dogs/filter', formData).then(response => {
                this.dogs = response.data
            })
        }
    }
}
</script>
