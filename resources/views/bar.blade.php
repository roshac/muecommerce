<!DOCTYPE html><html class=''>
  <head>
    <style>
      .container {
      width: 700px ;
      margin-left: auto ;
      margin-right: auto ;
      padding-top: 10%;
      }
    </style>
  </head>
  <body>
    <div id="app">
      	
	  <div class="columns">
	    <div class="column">
	      <chartjs-bar :labels="labels" :data="dataset" :bind="true"></chartjs-bar>
	    </div>	    
	  </div>    
	<
    </div>
    <script src='//cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js'></script>
    <script src='//unpkg.com/vue-chartjs@2.6.0/dist/vue-chartjs.full.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js'></script>
    <script src='//unpkg.com/hchs-vue-charts@1.2.8'></script>
    <script >'use strict';

      Vue.use(VueCharts);
      var app = new Vue({
        el: '#app',
        data: function data() {
          return {
            dataentry: null,
            datalabel: null,
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September'            , 'October', 'November', 'December'],
            dataset: [5, 10, 15, 25, 45, 70, 115, 185, 70, 75, 70, 60]
          };
        },

        methods: {
          addData: function addData() {
            this.dataset.push(this.dataentry);
            this.labels.push(this.datalabel);
            this.datalabel = '';
            this.dataentry = '';
          }
        }
      });
    </script>
  </body>
</html>