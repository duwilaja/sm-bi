var ctx = document.getElementById('cfr');
ctx.height = 140;

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 16;

var data = {
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
var options = {
    tooltips: {
        callbacks: {
            label: function(tooltipItem, data) {
                var label = data.datasets[tooltipItem.datasetIndex].label || '';

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
var cfr = new Chart(ctx, {
  type: 'line',
  data: data,
  options: options
});

// Jquery

$(document).ready(function () {
    grafik_cdr();
});

function grafik_cdr() { 
    $.getJSON("../Grafik_api/grafik_cfr", function(r) {
        cfr.data.labels = r.tahun;
        cfr.data.datasets[0].data = r.data.real;
        cfr.data.datasets[1].data = r.data.target;
        cfr.update();  
    });
}