/*--details-chart open--*/
var options = {
    chart: {
        height: 320,
        type: 'area',
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'straight',
        width:2
    },
    series: [{
        name: 'Mengantuk',
        type: 'line',
        // data: [ 25,29,27,26,27, 24,26,28, 27,29,28, 29,27, 25, 26,24, 20,]
        data: [100,50,100,50]
    }, 
    {
        name: 'Mabuk',
        type: 'line',
        // data: [ 35,39,37,36,37, 34,36,38, 37,39,38, 39,37, 35, 36,34, 30,]
        data: [50,25,50,25]
    }, 
    {
        name: 'Terserempet',
        type: 'line',
        // data: [37, 35, 36,34,32,39, 38,40, 43, 46,45, 49,50, 52,53,52, 55]
        data: [20,15,20,15]
    },
    {
        name: 'Balap Liar',
        type: 'line',
        data: [30,10,30,10]
    }],
    plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '55%',
          endingShape: 'rounded'
        },
    },
    fill: {
        type:'solid',
        opacity: [1, 1,1],
    },
    grid: {
        show: true,
        borderColor: 'rgba(142, 156, 173,0.2)',
    },
    colors: ['#fb1c52', '#ff8519','#fffb14','#44ff1f'],
    xaxis: {
        // type: 'datetime',
        // categories: ['Dec 01', 'Dec 02','Dec 03','Dec 04','Dec 05','Dec 06','Dec 07','Dec 08','Dec 09 ','Dec 10','Dec 11','Dec 12','Dec 13','Dec 14','Dec 15 ','Dec 16','Dec 17'],
        categories: ['31-11-2020','01-12-2020','02-12-2020','03-12-2020'],
        color: '#fff',
        style: {
            colors: ['#000'],
        },
        
    },
    tooltip: {
        x: {
            format: 'dd-mm-yyyy'
        },
    }
}
var chart = new ApexCharts(document.querySelector("#live-chart"), options);
chart.render();


/* chartjs (#sales) */
var myCanvas = document.getElementById("sales");

var myCanvasContext = myCanvas.getContext("2d");
var gradientStroke = myCanvasContext.createLinearGradient(0, 80, 0, 280);
var gradientStroke2 = myCanvasContext.createLinearGradient(0, 80, 0, 280);
var gradientStroke3 = myCanvasContext.createLinearGradient(0, 80, 0, 280);

gradientStroke.addColorStop(0, 'rgb(251 28 82 / 58%)');
gradientStroke.addColorStop(1, 'rgb(251 28 82 / 87%)');

gradientStroke2.addColorStop(0, 'rgba(74, 50, 212, 0.8)');
gradientStroke2.addColorStop(1, 'rgba(74, 50, 212, 0.09)');

gradientStroke3.addColorStop(0, '#2393ff9e');
gradientStroke3.addColorStop(1, '#2393ff7d');

var myChart = new Chart( myCanvas, {
    type: 'line',
    data: {
        labels: ["Januari","Februari","Meret", "April","Mei", "Juni","Juli","Agustus","September","Oktober", "November", "Desember" ],
        type: 'line',
        datasets: [ {
            label: 'Perpanjang SIM',
            data: [0, 35, 24, 64, 93, 55, 39,60, 61, 54, 62, 63],
            backgroundColor: gradientStroke,
            borderColor: '#FFF',
            pointBackgroundColor:'#fff',
            pointHoverBackgroundColor:gradientStroke,
            pointBorderColor :'#007adf',
            pointHoverBorderColor :gradientStroke,
            pointBorderWidth :0,
            pointRadius :0,
            pointHoverRadius :0,
            lineTension: 0.2,
            borderWidth: 2,
            fill: 'origin'
        },{
            label: 'SIM Baru',
            data: [90, 35, 24, 64, 43, 55, 39,60, 61, 54, 62, 63],
            backgroundColor: gradientStroke2,
            borderColor: '#FFF',
            pointBackgroundColor:'#fff',
            pointHoverBackgroundColor:gradientStroke2,
            pointBorderColor :'#007adf',
            pointHoverBorderColor :gradientStroke2,
            pointBorderWidth :0,
            pointRadius :0,
            pointHoverRadius :0,
            lineTension: 0.2,
            borderWidth: 2,
            fill: 'origin'
        },{
            label: 'DPS',
            data: [30, 25, 20, 14, 33, 85, 79,90, 61, 54, 62, 63],
            backgroundColor: gradientStroke3,
            borderColor: '#FFF',
            pointBackgroundColor:'#fff',
            pointHoverBackgroundColor:gradientStroke3,
            pointBorderColor :'#007adf',
            pointHoverBorderColor :gradientStroke3,
            pointBorderWidth :0,
            pointRadius :0,
            pointHoverRadius :0,
            lineTension: 0.2,
            borderWidth: 2,
            fill: 'origin'
        }, ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        tooltips: {
            mode: 'index',
            titleFontSize: 12,
            titleFontColor: '#000',
            bodyFontColor: '#000',
            backgroundColor: '#fff',
            cornerRadius: 3,
            intersect: false,
        },
        stepsize: 200,
        min: 0,
        max: 400,
        legend: {
            display: false,
            labels: {
                usePointStyle: false,
            },
        },
        scales: {
            xAxes: [{
                
                display: true,
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    fontColor: '#b0bac9',
                    autoSkip: true,
                    maxTicksLimit: 9,
                    maxRotation: 0,
                    labelOffset: 10
                },
                scaleLabel: {
                    display: false,
                    labelString: 'Month',
                    fontColor: 'transparent'
                }
            }],
            yAxes: [{
                ticks: {
                    fontColor: "#b0bac9",
                },
                display: true,
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                scaleLabel: {
                    display: false,
                    labelString: 'sales',
                    fontColor: 'transparent'
                }
            }]
        },
        title: {
            display: false,
            text: 'Normal Legend'
        }
    }
});
/* chartjs (#sales) closed */

require(["esri/Map", "esri/views/MapView"], function(Map, MapView) {
    var map = new Map({
      basemap: "topo-vector"
    });
  
    var view = new MapView({
      container: "map", // Reference to the DOM node that will contain the view
      map: map // References the map object created in step 3
    });
  });