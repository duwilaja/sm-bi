var ctx = document.getElementById('cfr');
ctx.height = 140;

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 14;

var data = {
  labels: ["2020", "2021"],
  datasets: [{
      label: "Real",
      fill: false,
      lineTension: 0.1,
      backgroundColor: "#3f51b5",
      borderColor: "#673ab7", // The main line color
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
                     labelString: 'Fatalitiy Index',
                     fontSize: 16 
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


var idbar_fi = document.getElementById('bar_fi');
var bar_fi = new Chart(idbar_fi, {
    type: 'horizontalBar',
    data: {
        labels: ['Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: 'Fatality Index',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: 'rgba(255, 206, 86, 0.2)',
            borderColor:'rgba(255, 206, 86, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                },
            }]
        }
    }
});

// Jquery

$(document).ready(function () {
    grafik_fi();
    grafik_bar_fi();
});

function grafik_fi() { 
    $.getJSON("../Grafik_api/grafik_fi", function(r) {
        cfr.data.labels = r.tahun;
        cfr.data.datasets[0].data = r.data.real;
        cfr.options.scales.yAxes[0].scaleLabel.labelString = r.data.penduduk;
        cfr.update();  
    });
}

function grafik_bar_fi() { 
    $.getJSON("../Grafik_api/grafik_bar_fi", function(r) {
        bar_fi.data.labels = r.data.label;
        bar_fi.data.datasets[0].data = r.data.jml;
        debugger;
        bar_fi.update();  
    });
}