/*--details-chart open--*/
$(document).ready(function () {
    cybercops_bar_polda();
    cybercops_bar_polres();
    dt_tabel_user_cybercops();
});

var locations = [
    {lat: -7.034920, lng: 107.526471},
    {lat: -7.028424, lng: 107.521091},
    {lat: -6.983111, lng: 107.436284},
    {lat: -6.885647, lng: 107.537207},
    {lat: -6.892210, lng: 107.536977},
    {lat: -6.960185, lng: 107.376799},
];

var locations2 = [
    {lat: -7.034920, lng: 107.526471},
    {lat: -7.028424, lng: 107.521091},
    {lat: -6.983111, lng: 107.436284},
    {lat: -6.885647, lng: 107.537207},
    {lat: -6.892210, lng: 107.536977},
    {lat: -6.960185, lng: 107.376799},
];

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
var chart_bar_cybercops_user_polda = new ApexCharts(document.querySelector("#cybercops-bar-polda"), options);
var chart_bar_cybercops_user_polres = new ApexCharts(document.querySelector("#cybercops-bar-polres"), options);

chart_bar_cybercops_user_polda.render();
chart_bar_cybercops_user_polres.render();


function cybercops_bar_polda() { 
    $.getJSON("../Grafik_api/bar_cybercops_user_polda", function(response) {
        chart_bar_cybercops_user_polda.updateSeries(response.data);
        chart_bar_cybercops_user_polda.updateOptions({xaxis: {
            categories: response.date
          }});  
    });
}

function cybercops_bar_polres() { 
    $.getJSON("../Grafik_api/bar_cybercops_user_polres", function(response) {
        chart_bar_cybercops_user_polres.updateSeries(response.data);
        chart_bar_cybercops_user_polres.updateOptions({xaxis: {
            categories: response.date
          }});  
    });
}

function dt_tabel_user_cybercops() {
    $('#tabel_user_cybercops').DataTable({
        // Processing indicator
        "bAutoWidth": false,
        "destroy": true,
        "autoWidth": true,
        "searching": true,
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        "scrollX": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": '../Grafik_api/dt_user_cybercops',
            "type": "POST",
            "data" : {
                'a' : null,
                'tgl' : null,
                 'length' : 10,
            }
        },
        // "paging":   false,
        //Set column definition initialisation properties
        "columnDefs": [{
            // "targets": [6],
            "orderable": false
        }]
    });

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