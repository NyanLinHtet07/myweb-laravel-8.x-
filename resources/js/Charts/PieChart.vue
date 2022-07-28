<template>
    <Pie
               :chart-options="chartOptions"
               :chart-data="chartData"
               :chart-id="chartId"
               :dataset-id-key="datasetIdKey"
               :plugins="plugins"
               :css-classes="cssClasses"
               :styles="styles"
               :width="width"
               :height="height"
               />
</template>

<script>

import { Pie } from 'vue-chartjs'
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  ArcElement,
  CategoryScale,

} from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, ArcElement, CategoryScale)
export default {
     name: 'PieChart',
  components: {
    Pie
  },
  props: {
    chartId: {
      type: String,
      default: 'pie-chart'
    },
   datasetIdKey: {
               type: String,
               default: 'label'
          },
          width: {
               type: Number,
               default: 100
          },
          height: {
               type: Number,
               default: 100
          },
          cssClasses: {
               default: '',
               type: String
          },
          styles: {
               type: Object,
               default: () => {}
          },
       
  

  },


        data() {
            return {
            chartData: {
                labels: [ 'January', 'February', 'March'],
                datasets: [
                {
                    label: 'Data One',
                    backgroundColor: ['#41B883', '#E46651', '#00D8FF'],
                    data: [40, 20, 12]
                }
                ]
            }
            }
  },
    

    
}
</script>
