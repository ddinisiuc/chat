<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Chart Js</h2>
                <line-chart :chart-data="data" :height="100" :options="{responsive: true, maintainAspectRation: true}"></line-chart>
                <button @click="update" v-if="!is_refresh">Refresh</button>
                <span v-if=is_refresh>loader...</span>
            </div>
        </div>
    </div>
</template>

<script>
    import LineChart from './LineChart.js'
    export default {
        components: {
            LineChart
        },
        data: function(){
           return {
               data: [],
               is_refresh: false,
           }
        },
        mounted() {
            this.update()
        },
        methods: {
            update: function(){
                this.is_refresh = true;
                axios.get('/chart').then((response) => {
                    this.data = response.data
                    this.is_refresh = false;
                    console.log(response);
                    console.log(response.data);
                })
            }
        }
    }
</script>
