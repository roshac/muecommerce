<template>
  <div class="small">
    <h4>Sales Per Week</h4>
    <bar-chart :chart-data="datacollection" :height="270"></bar-chart>
  </div>
</template>

<script>
import BarChart from './LineChart.js'
export default {
  components: {
    BarChart
  },
  data(){
    return {
      datacollection: null
    }
  },
  mounted () {
    this.fillData()
  },
  methods: {

    fillData ()
    {
      this.datacollection = {
        labels: ['Monday','Tuesday','Wenesday','Thurthday','Friday', 'Saturday' , 'Sunday'],
        datasets: [
          {
            label: 'Days',
            backgroundColor: '#00bcd4',
            data: [ 30, 20, 50, 30, 50, 40,10,5]
          },
        ]
      }
    }
  }
}
</script>

<style lang="css">
.small {
  max-width: 800px;
  max-height: 150%; 
  margin:  20px auto;
}
</style>