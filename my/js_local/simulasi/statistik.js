$(document).ready(function(){
    grafik_trend_data();
    grafik_cdr();
    grafik_fi();
    grafik_bar_fi();
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

function grafik_cdr() { 
    $.getJSON("../Grafik_api/grafik_cfr", function(r) {
        cfr_casefr.data.labels = r.tahun;
        cfr_casefr.data.datasets[0].data = r.data.real;
        cfr_casefr.data.datasets[1].data = r.data.target;
        cfr_casefr.update();  
    });
}

// fatality index

var fi1 = document.getElementById('fi1');
fi1.height = 140;

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
var optionsfi1 = {
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
var cfi1 = new Chart(fi1, {
  type: 'line',
  data: data,
  options: optionsfi1
});


var fi2 = document.getElementById('fi2');
var bar_fi2 = new Chart(fi2, {
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

function grafik_fi() { 
    $.getJSON("../Grafik_api/grafik_fi", function(r) {
        cfi1.data.labels = r.tahun;
        cfi1.data.datasets[0].data = r.data.real;
        cfi1.options.scales.yAxes[0].scaleLabel.labelString = r.data.penduduk;
        cfi1.update();  
    });
}

function grafik_bar_fi() { 
    $.getJSON("../Grafik_api/grafik_bar_fi", function(r) {
        bar_fi2.data.labels = r.data.label;
        bar_fi2.data.datasets[0].data = r.data.jml;
        bar_fi2.update();  
    });
}

// index kinerja

var ctx = document.getElementById("ikc");

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
      responsive: false, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
    }
});

// index ketertiban

var ikt1 = document.getElementById("ikt1");
var chartIkt1 = new Chart(ikt1, {
    type: 'bar', 
    data: {
        labels: ["SIM A","SIM B", "SIM C","NON SIM"],
        datasets: [{
            label: 'Pelanggaran', // Name the series
            data: [200,100,250,150], // Specify the data values array
            fill: false,
            type : 'line',
            borderColor: '#ff1f14', // Add custom color border (Line)
            backgroundColor: '#ff4e45', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
        {
            label: 'Penindakan', // Name the series
            data: [130,80,200,70], // Specify the data values array
            fill: false,
            type : 'line',
            borderColor: '#4050ff', // Add custom color border (Line)
            backgroundColor: '#5462ff', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
        {
            label: 'Pengguna', // Name the series
            data: [70,20,50,80], // Specify the data values array
            fill: false,
            type : 'bar',
            borderColor: '#5462ff', // Add custom color border (Line)
            backgroundColor: '#f8ff24', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
    ],
    },
    options: {
      responsive: false, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
    }
});  


var ikt2 = document.getElementById("ikt2");
var chartIkt2 = new Chart(ikt2, {
    type: 'bar', 
    data: {
        labels: ["Kamtibmas","lampu utama", "Jalur / lajur lalu lintas","Belokan / simpangan","Kecepatan","Berhenti","Parkir","Kendaraan tidak bermotor"],
        datasets: [{
            label: 'Selalu', // Name the series
            data: [372,70,116,104,217,107,42,38], // Specify the data values array
            fill: false,
            type : 'bar',
            borderColor: '#ff1f14', // Add custom color border (Line)
            backgroundColor: '#ff4e45', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
        {
            label: 'Kadang-Kadang', // Name the series
            data: [225,34,54,14,79,58,16,22], // Specify the data values array
            fill: false,
            type : 'bar',
            borderColor: '#4050ff', // Add custom color border (Line)
            backgroundColor: '#5462ff', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
        {
            label: 'Tidak Pernah', // Name the series
            data: [63,16,10,2,4,15,2,10], // Specify the data values array
            fill: false,
            type : 'bar',
            borderColor: '#5462ff', // Add custom color border (Line)
            backgroundColor: '#f8ff24', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
    ],
    },
    options: {
      responsive: false, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
    }
});

// index kecelakaan

var itc = document.getElementById("itc").getContext('2d');
var chartItc = new Chart(itc, {
    type: 'bar',
    data: {
        labels: ["2016","2017","2018","2019","2020"],
        datasets: [{
            label: 'Target', // Name the series
            data: [50000,40000,30000,20000,10000], // Specify the data values array
            fill: false,
            type : 'line',
            borderColor: '#38c0ff', // Add custom color border (Line)
            backgroundColor: '#38c0ff', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
        {
            label: 'Real', // Name the series
            data: [75000,28000,35000,15000,5000], // Specify the data values array
            fill: false,
            type : 'line',
            borderColor: '#ffcd36', // Add custom color border (Line)
            backgroundColor: '#ffcd36', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
    ],
    },
    options: {
      responsive: false, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
    }
});

var itc2 = document.getElementById("itc2").getContext('2d');
var hBChartItc = new Chart(itc2, {
     type: 'bar',
     data: {
        labels: ["Laweyan","Serengan","Pasar Kliwon","Jebres","Banjarsari","Kota Surakarta"],
           datasets:[
                  {
                      label: "Jumlah Korban",
                      backgroundColor: "#38c0ff",
                      data: [50000,25000,40000,80000,50000,200000]
                  },
                  {
                      label: "Jumlah Penduduk",
                      backgroundColor: "#ffcd36",
                      data: [100000,50000,80000,150000,180000,550000]
                }

           ]
     },
  
     options: {
      responsive: false, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
      scales: {
          xAxes: [{
            //   stacked: true,
              ticks: {
                suggestedMin: 0,
                suggestedMax: 350000
            }
          }],
          yAxes: [{
            //   stacked: true,
              ticks: {
                suggestedMin: 0,
                suggestedMax: 350000
            }
          }]
      }
    }
  }); 

  var itc3 = document.getElementById("itc3").getContext('2d');
var hBChartItc3 = new Chart(itc3, {
    type: 'bar',
    data: {
        labels: ["Laweyan","Serengan","Pasar Kliwon","Jebres","Banjarsari","Kota Surakarta"],
          datasets:[
                 {
                     label: "Jumlah Korban",
                     backgroundColor: "#38c0ff",
                     data: [50000,25000,40000,80000,50000,200000]
                 },
                 {
                     label: "Jumlah Laka",
                     backgroundColor: "#ffcd36",
                     data: [70000,50000,80000,100000,70000,250000]
                 }
          ]
    },
 
    options: {
     responsive: false, // Instruct chart js to respond nicely.
     maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
     scales: {
        xAxes: [{
            // stacked: true,
            ticks: {
              suggestedMin: 0,
              suggestedMax: 350000
          }
        }],
        yAxes: [{
            // stacked: true,
            ticks: {
              suggestedMin: 0,
              suggestedMax: 350000
          }
        }]
    }
   }
 });

 var itc4 = document.getElementById("itc4").getContext('2d');
var hBChartItc4 = new Chart(itc4, {
    type: 'bar',
    data: {
       labels: ["TAKSI","BUS SEKOLAH","BUS PARIWISATA","RENTAL","OJEK","ANGKOT","ANGKUTAN BARANG","PRIBADI"],
          datasets:[
                 {
                     label: "Jumlah Korban",
                     backgroundColor: "#38c0ff",
                     data: [200,150,300,50,200,150,100,175]
                 },
                 {
                     label: "Jumlah Laka",
                     backgroundColor: "#ffcd36",
                     data: [400,450,150,90,300,250,120,200]
                 }
          ]
    },
 
    options: {
     responsive: false, // Instruct chart js to respond nicely.
     maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
     scales: {
        xAxes: [{
            // stacked: true,
            ticks: {
              suggestedMin: 0,
              suggestedMax: 1000
          }
        }],
        yAxes: [{
            // stacked: true,
            ticks: {
              suggestedMin: 0,
              suggestedMax: 1000
          }
        }]
    }
   }
 });

 var data_kecelakaan = {
    datasets: [{
        data: [100,100,100,100,150],
        backgroundColor: ["red","green","blue","orange","purple"],
        label: 'My dataset' // for legend
    }],
    labels: [
        "Ceroboh terhadap lalu lintas dari depan",
        "Gagal menjaga jarak aman",
        "Ceroboh saat belok",
        "Ceroboh saat menyalip",
        "Melampaui batas kecepatan"
    ]
    };
    var options_kecelakaan = {
        responsive: false, 
        // maintainAspectRatio: false,
        plugins: {
            datalabels: {
                formatter: (value, ctx) => {
                    let sum = 0;
                    let dataArr = ctx.chart.data.datasets[0].data;
                    dataArr.map(data => {
                        sum += data;
                    });
                    let percentage = (value*100 / sum).toFixed(2)+"%";
                    return percentage;
                },
                color: '#fff',
            }
        }
    };
    var indeks_penyebab_kecelakaan = $("#itc5");
    new Chart(indeks_penyebab_kecelakaan, {
        data: data_kecelakaan,
        type: 'polarArea',
        options: options_kecelakaan
    });

// index keamanan

var ctx2 = document.getElementById("ikc2");
var myChart2 = new Chart(ctx2, {
    type: 'bar', 
    data: {
        labels: ["Jan","Feb", "Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
        datasets: [{
            label: 'Black Spot', // Name the series
            data: [16,18,15,17,25,15,17,16,22,20,12,22], // Specify the data values array
            fill: false,
            type : 'line',
            borderColor: '#ff1f14', // Add custom color border (Line)
            backgroundColor: '#ff4e45', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
        {
            label: 'Trouble Spot', // Name the series
            data: [17,16,21,15,20,13,20,13,23,15,15,14], // Specify the data values array
            fill: false,
            type : 'line',
            borderColor: '#4050ff', // Add custom color border (Line)
            backgroundColor: '#5462ff', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
        {
            label: 'Tindak Pidana', // Name the series
            data: [18,20,22,14,22,18,15,18,20,18,20,18], // Specify the data values array
            fill: false,
            type : 'line',
            borderColor: '#5462ff', // Add custom color border (Line)
            backgroundColor: '#f8ff24', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
    ],
    },
    options: {
      responsive: false, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
    }
});

//index keselamatan

var ctx3 = document.getElementById("ikc3");
var myChart = new Chart(ctx3, {
    type: 'bar', 
    data: {
        labels: ["Jan","Feb", "Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
        datasets: [{
            label: 'Kecelakaan', // Name the series
            data: [60,80,50,150,50,70,200,150,100,100,100,150], // Specify the data values array
            fill: false,
            type : 'bar',
            borderColor: '#ff1f14', // Add custom color border (Line)
            backgroundColor: '#ff4e45', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
        {
            label: 'Selamat', // Name the series
            data: [40,70,150,100,150,80,100,50,150,50,100,100], // Specify the data values array
            fill: false,
            type : 'bar',
            borderColor: '#4050ff', // Add custom color border (Line)
            backgroundColor: '#5462ff', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
        {
            label: 'Pengendara', // Name the series
            data: [100,150,200,250,200,150,300,200,250,150,200,250], // Specify the data values array
            fill: false,
            type : 'line',
            borderColor: 'yellow', // Add custom color border (Line)
            backgroundColor: '#f8ff24', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
    ],
    },
    options: {
      responsive: false, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
    }
});