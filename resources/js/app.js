import 'flowbite';
import ApexCharts from 'apexcharts';
import './bootstrap';

const graph = document.getElementById("chartContainer");

if (graph){
    const options = {
        chart: {
            type: 'bar',
            height: '650px',
            stacked: true,
        },
        plotOptions: {
            bar: {
                horizontal: true
            }
        },
        series: JSON.parse(document.getElementById("chartJSON").innerText)
    }
    const chart = new ApexCharts(graph, options);
    chart.render();
}
