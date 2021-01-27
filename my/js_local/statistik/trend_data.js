var ctx = document.getElementById('td');
ctx.height = 140;
var toll = null;

// Global Options:
Chart.defaults.global.defaultFontColor = 'black';
Chart.defaults.global.defaultFontSize = 12;

var data = {
  labels: ["Jan", "Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
  datasets: []
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
var cfr = new Chart(ctx, {
  type: 'line',
  data: data,
  options: options
});

// Jquery

$(document).ready(function () {
    grafik_trend_data();
});

function grafik_trend_data(data) { 
    cfr.data.datasets = [];
    $.ajax({
        type: "POST",
        url: "../Grafik_api/grafik_trend_data",
        data: data,
        dataType: "json",
        success: function (r) {
            // cfr.data.labels = r.tahun;
            r.data.forEach(x => {
                cfr.data.datasets.push(x)
            });
            
            // cfr.data.datasets[0].data = r.data.real;
            cfr.update();  
        }
    });
}

$('#filter_td').submit(function (e) { 
    e.preventDefault();
    var data = $(this).serialize();
    grafik_trend_data(data);
});

$('#f_polda').change(function(){ 
    var id=$(this).val();
    $.ajax({
        url : "../Grafik_api/get_polres",
        method : "POST",
        data : {id: id},
        async : true,
        dataType : 'json',
        success: function(data){
             
            var html = '';
            var i;
            html += "<option value=''>-- Pilih Polres --</option>";
            for(i=0; i<data.length; i++){
                html += '<option value='+data[i].res_id+'>'+data[i].res_nam+'</option>';
            }
            $('#f_polres').html(html);

        }
    });
    // return false;
});