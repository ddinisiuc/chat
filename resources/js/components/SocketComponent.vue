<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>Chart on Sockets</h2>
                <line-chart :chart-data="data" :height="100" :options="{responsive: true, maintainAspectRation: true}"></line-chart>
                <button @click="update" v-if="!is_refresh">Refresh</button>
                <span v-if=is_refresh>loader...</span>
                <input type="checkbox" v-model="realtime">Realtime
                <input type="text" v-model="label">
                <input type="text" v-model="sale">
                <button @click="sendData">Send data</button>
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
               realtime: false,
               label: "",
               sale: 500,
           }
        },
        mounted() {
            var socket = io('http://127.0.0.1:2002');

            socket.on('news-action:App\\Events\\NewEvent', function(data){
                console.log(data);
                this.data = data.result
            }.bind(this))

            this.update()
        },
        methods: {
            update: function(){
                this.is_refresh = true;
                axios.get('/socket-chart').then((response) => {
                    this.data = response.data
                    this.is_refresh = false;
                })
            },
            sendData: function(){
                axios({
                    method: 'get',
                    url: '/socket-chart',
                    params:{
                        label: this.label,
                        realtime: this.realtime,
                        sale: this.sale,
                    }
                }).then((response) => {
                    this.data = response.data
                })
            }
        }
    }
</script>
