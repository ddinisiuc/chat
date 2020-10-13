<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>List item</h2>
                <ul>
                    <li v-for="item in arr">{{ item.title }}</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:[
            'arr'
        ],
        mounted() {
            this.update()
        },
        methods: {
            update: function(){
            }
        }
    }
</script>
