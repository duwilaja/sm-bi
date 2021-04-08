$(document).ready(function(){
    grafik_trend_data();
    grafik_cdr();
});

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 12;

// trend data

var ctx_trend = document.getElementById('td');
ctx_trend.height = 140;

var data_trend = {
labels: ["Jan", "Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
datasets: []
};

// Notice the scaleLabel at the same level as Ticks
var options_trend = {
    tooltips: {
        callbacks: {
            label: function(tooltipItem, data_trend) {
                var label = data_trend.datasets[tooltipItem.datasetIndex].label || '';

                if (label) {
                    label += ': ';
                }
                label += Math.round(tooltipItem.yLabel * 100) / 100;

                return label;
            }
        }
    },
scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    callback: function(value, index, values) {
                        return value;
                    }
                },
                scaleLabel: {
                    display: true,
                    labelString: 'Trend Data',
                    fontSize: 20 
                }
            }]
                    
    }
    
};

// Chart declaration:
var cfr_trend = new Chart(ctx_trend, {
type: 'line',
data: data_trend,
options: options_trend
});

function grafik_trend_data(data_trend) { 
    cfr_trend.data.datasets = [];
    $.ajax({
        type: "POST",
        url: "../Grafik_api/grafik_trend_data",
        data: data_trend,
        dataType: "json",
        success: function (r) {
            // cfr.data.labels = r.tahun;
            r.data.forEach(x => {
                cfr_trend.data.datasets.push(x)
            });
            
            // cfr.data.datasets[0].data = r.data.real;
            cfr_trend.update();  
        }
    });
}

// case fatality rate

var ctx_casefr = document.getElementById('cfr');
ctx_casefr.height = 140;

var data_casefr = {
  labels: ["2020", "2021"],
  datasets: [{
      label: "Real",
      fill: false,
      lineTension: 0.1,
      backgroundColor: "rgba(225,0,0,0.4)",
      borderColor: "red", // The main line color
      borderCapStyle: 'square',
      borderDash: [], // try [5, 15] for instance
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "black",
      pointBackgroundColor: "white",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "yellow",
      pointHoverBorderColor: "brown",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: true
      data: [65, 59, 80, 81, 56, 55, 40,32,60,55,30,78],
      spanGaps: true,
    }, {
      label: "Target",
      fill: true,
      lineTension: 0.1,
      backgroundColor: "rgba(167,105,0,0.4)",
      borderColor: "rgb(167, 105, 0)",
      borderCapStyle: 'butt',
      borderDash: [],
      borderDashOffset: 0.0,
      borderJoinStyle: 'miter',
      pointBorderColor: "white",
      pointBackgroundColor: "black",
      pointBorderWidth: 1,
      pointHoverRadius: 8,
      pointHoverBackgroundColor: "brown",
      pointHoverBorderColor: "yellow",
      pointHoverBorderWidth: 2,
      pointRadius: 4,
      pointHitRadius: 10,
      // notice the gap in the data and the spanGaps: false
      data: [10, 20, 60, 95, 64, 78, 90,21,70,40,70,89],
      spanGaps: false,
    }

  ]
};

// Notice the scaleLabel at the same level as Ticks
var options_casefr = {
    tooltips: {
        callbacks: {
            label: function(tooltipItem, data_casefr) {
                var label = data_casefr.datasets[tooltipItem.datasetIndex].label || '';

                if (label) {
                    label += ': ';
                }
                label += Math.round(tooltipItem.yLabel * 100) / 100;

                return label+'%';
            }
        }
    },
  scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    callback: function(value, index, values) {
                        return value+'%';
                    }
                },
                scaleLabel: {
                     display: true,
                     labelString: 'Case Fatalitiy Rate',
                     fontSize: 20 
                  }
            }]
                       
    }
    
};

// Chart declaration:
var cfr_casefr = new Chart(ctx_casefr, {
  type: 'line',
  data: data_casefr,
  options: options_casefr
});

// Jquery

function grafik_cdr() { 
    $.getJSON("../Grafik_api/grafik_cfr", function(r) {
        cfr_casefr.data.labels = r.tahun;
        cfr_casefr.data.datasets[0].data = r.data.real;
        cfr_casefr.data.datasets[1].data = r.data.target;
        cfr_casefr.update();  
    });
}

// index kinerja

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
    series: [],
     fill: {
     type:'solid',
     opacity: [1, 1,1],
  },
//   plotOptions: {
//     bar: {
//       horizontal: false,
//       columnWidth: '50%',
//       endingShape: 'rounded'
//     },
//   },
  grid: {
    yaxis: {
      lines: {
        show: false,
        offsetX: 0,
        offsetY: 0
      }
    }
  },
  colors:['#4a32d4','#f7592d','#f7be2d','#3abc1d'],
  xaxis: {
      // type: 'datetime',
      // categories: ['Dec 01', 'Dec 02','Dec 03','Dec 04','Dec 05','Dec 06','Dec 07','Dec 08','Dec 09 ','Dec 10','Dec 11','Dec 12','Dec 13','Dec 14','Dec 15 ','Dec 16','Dec 17'],
      categories: ['31-11-2020'],
      color: '#fff',
       style: {
          colors: ['#000'],
       },
  },
//   yaxis : {
//     max : 6
//   },
  tooltip: {
      x: {
          format: 'dd-mm-yyyy'
      },
  }
}

var ctx = document.getElementById("ikc").getContext('2d');

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Ali",	"Rudi",	"Joseph",	"Singgih",	"Almer"],
        datasets: [{
            label: 'Target', // Name the series
            data: [120,	130,145,110,140], // Specify the data values array
            fill: false,
            type : 'line',
            borderColor: '#2196f3', // Add custom color border (Line)
            backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
        {
            label: 'Real', // Name the series
            data: [90,	100,80,	75,	68], // Specify the data values array
            fill: false,
            type : 'line',
            borderColor: '#4CAF50', // Add custom color border (Line)
            backgroundColor: '#4CAF50', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
        {
            label: 'Persentase', // Name the series
            data: [75,76,55,68,	48], // Specify the data values array
            fill: false,
            borderColor: '#ff9800', // Add custom color border (Line)
            backgroundColor: '#ffc107', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
    ],
    },
    options: {
      responsive: true, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
    }
});

myChart.render()