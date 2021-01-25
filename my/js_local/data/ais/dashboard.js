$(document).ready(function () {
    jml_data_eri();
    grafik_bar_prilaku();
    grafik_pie();
});

function jml_data_eri() {
    var no = 0;
    $.getJSON("../Grafik_api/tabel_penyebab_kecelakaan", function(r) {
        r.tahun.forEach(t => {
            $('#h_prilaku_pribadi tr').append('<th>'+t+'</th>');
        });

        r.nama.forEach(n => {
            noo = no++;
            $('#b_prilaku_pribadi').append("<tr id="+noo+"><td class='sticky-col first-col'>"+n+"</td></tr>");
            
            r.data[noo].forEach(d => {
                $('#b_prilaku_pribadi tr#'+noo).append("<td>"+d+"</td>");
            });
        });
        
    });
}

function grafik_bar_prilaku() { 
    /*--details-chart open--*/
    var options = {
        chart: {
            height: 320,
            type: 'bar',
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve:'straight',
            width:2
        },
        series: [],
         fill: {
         type:'solid',
         opacity: [1, 1,1],
       },
        grid: {
                show: true,
                borderColor: 'rgba(142, 156, 173,0.2)',
            },
        colors: ['#fb1c52', '#ff8519','#fffb14','#44ff1f',' #fc0303','#f8fc05','#c2fc00','#5eff00','#05fce4','#ff00bf'],
        xaxis: {
            // type: 'datetime',
            // categories: ['Dec 01', 'Dec 02','Dec 03','Dec 04','Dec 05','Dec 06','Dec 07','Dec 08','Dec 09 ','Dec 10','Dec 11','Dec 12','Dec 13','Dec 14','Dec 15 ','Dec 16','Dec 17'],
            categories: ['2015','2016','2017','2018','2019'],
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

    var chart = new ApexCharts(document.querySelector("#bar-perilaku"), options);
    chart.render();

    $.getJSON("../Grafik_api/bar_ais", function(response) {
        chart.updateSeries(response.data);
        chart.updateOptions({
          xaxis: {
            categories: response.tahun
        }
      })

    });
}

function grafik_pie() { 
      $.getJSON("../Grafik_api_dummy/pie_perilaku", function(response) {
            var options_ok = {
                series: response.data,
                chart: {
                 width: 480,
                 type: 'donut',
               },
               labels: response.label,
               plotOptions: {
                 pie: {
                   startAngle: -90,
                   endAngle: 270
                 }
               },
               dataLabels: {
                 enabled: false
               },
               fill: {
                 type: 'gradient',
               },
               legend: {
                 formatter: function(val, opts) {
                   return val + " - " + opts.w.globals.series[opts.seriesIndex]+'%';
                 }
               },
               title: {
                 text: ''
               },
               responsive: [{
                 breakpoint: 480,
                 options: {
                   chart: {
                     width: 200
                   },
                   legend: {
                     position: 'bottom'
                   }
                 }
               }]
               };
            
               var chart_pie = new ApexCharts(document.querySelector("#pie-perilaku"), options_ok);
               chart_pie.render();
      });
}

function appendData() {
    var arr = chart_pie.w.globals.series.slice()
    arr.push(Math.floor(Math.random() * (100 - 1 + 1)) + 1)
    return arr;
  }
