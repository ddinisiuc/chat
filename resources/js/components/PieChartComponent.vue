<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Pie Chart</h2>
                <pie-chart :chart-data="data" :height="100" :options="{responsive: true, maintainAspectRation: true}"></pie-chart>
            </div>
        </div>
    </div>
</template>

<script>
    import PieChart from './PieChart.js'
    export default {
        components: {
            PieChart
        },
        data: function(){
           return {
               data: []
           }
        },
        mounted() {
            this.update()
        },
        methods: {
            update: function(){
                console.log(this.data)
                axios.get('/chart').then((response) => {
                    this.data = response.data
                })
            }
        }
    }
</script>
