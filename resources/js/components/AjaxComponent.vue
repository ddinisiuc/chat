<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Ajax Component</h2>
                <button @click="update" v-if="!is_fresh">Update - {{id}}...</button>
                <span class="loader" v-if="is_fresh">loader...</span>
                <ul>
                    <li style="display:flex">
                        <p style="margin-right:15px">Product: {{ data.product }}</p>
                        <p>Price: {{ data.price }}</p>
                    </li>
                    <li v-for="item in data.features">
                        {{ item }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
           return {
                data:[],
                is_fresh: false,
                id:0
           }
        },
        mounted() {
            this.update()
        },
        methods: {
            update: function(){
                this.is_fresh = true
                axios.get('/product').then((response) => {
                    this.data = response.data
                    this.is_fresh = false
                    this.id++
                })
            }
        }
    }
</script>
