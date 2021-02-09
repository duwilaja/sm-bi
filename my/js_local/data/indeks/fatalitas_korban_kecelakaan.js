/*--details-chart open--*/
var no = 1;


$(document).ready(function(){
    jml_data_tmc();
    slide();

    $('#f_polda').change(function(){ 
        var id=$(this).val();
        $.ajax({
            url : "../Grafik_api/get_polres",
            method : "POST",
            data : {id: id},
            async : true,
            dataType : 'json',
            success: function(data){
                 
                var html = '<option value=""></option>';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].res_id+'>'+data[i].res_nam+'</option>';
                }
                $('#f_polres').html(html);

            }
        });
        // return false;
    });

    $("#cari").click(function(){
        var start = $("#f_date_start").val();
        var end =   $("#f_date_end").val();
        if (start == '' || end == '') {
            alert('isi start date & end date');
        }else{
            if (end < start) {
                alert('start date tidak boleh lebih besar dari end date');
            }else{
                jml_data_tmc();
                slide();
                }
        
        }
    });
});

function slide() {
    $('.owl-carousel').owlCarousel({
        margin:10,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        rewind:true,
        nav:false,
        autoplay:true,
        pagination: false,
        dots: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    })
}


function jml_data_tmc(start='',end='',polda='',polres='') {
    var start = $("#f_date_start").val();
    var end = $("#f_date_end").val();
    var polda = $("#f_polda").val();
    var polres = $("#f_polres").val();
    $.ajax({
        // url : "../Grafik_api/jml_data_tmc",
        url: "../Grafik_api/jml_data_etle",
        method : "POST",
        data : {start: start, end:end,polda:polda,polres:polres },
        async : true,
        dataType : 'json',
        success: function(r){

            $('#total').text(r[0]);
            $('#tervalidasi').text(r[1]);
            $('#terberkas').text(r[2]);
            $('#terkirim').text(r[3]);
            $('#terkonfirmasi').text(r[4]);
            $('#terbayar').text(r[5]);
            $('#blokir').text(r[6]);
            $('#polda1').text(r[7]);
            $('#polda2').text(r[8]);
            $('#polda3').text(r[9]);
            $('#polda4').text(r[10]);
            $('#polda5').text(r[11]);
            $('#polda6').text(r[12]);
            $('#polda7').text(r[13]);
            $('#polres1').text(r[14]);
            $('#polres2').text(r[15]);
            $('#polres3').text(r[16]);
            $('#polres4').text(r[17]);
            $('#polres5').text(r[18]);
            $('#polres6').text(r[19]);
            $('#polres7').text(r[20]);

        }
    });
}


var ifakl = document.getElementById("ifakl").getContext('2d');
var myChart = new Chart(ifakl, {
    type: 'bar',
    data: {
        labels: ["2017","2018","2019","2020"],
        datasets: [{
            label: 'Target', // Name the series
            data: [100,80,70,30], // Specify the data values array
            fill: false,
            type : 'line',
            borderColor: '#38c0ff', // Add custom color border (Line)
            backgroundColor: '#38c0ff', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
        {
            label: 'Real', // Name the series
            data: [115,90,65,50], // Specify the data values array
            fill: false,
            type : 'line',
            borderColor: '#ffcd36', // Add custom color border (Line)
            backgroundColor: '#ffcd36', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        },
    ],
    },
    options: {
      responsive: true, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
    }
});  



Chart.defaults.global.defaultFontFamily = "Lato";
var per_jml_kec = document.getElementById("per_jml_kec").getContext('2d');
// var horizontalBarChart = new Chart(per_jml_kec, {
//    type: 'horizontalBar',
//    data: {
//       labels: ["BABEL","MALUT","GORONTALO","BENGKULU","KALTIM","MALUKU","KALSEL","KEPRI","PAPUA","JAMBI","KALTENG","SUMSEL","SULTARA","NTT"],
//     //   datasets: [{
//     //     //  data: [2000, 4000, 6000, 8000, 10000, 12000, 14000],
//     //     //  backgroundColor: ["#73BFB8", "#73BFB8", "#73BFB8", "#73BFB8", "#73BFB8", "#73BFB8", "#73BFB8"], 
//     //   }]
//          datasets:[
//                 {
//                     label: "Jumlah Korban",
//                     backgroundColor: "orange",
//                     data: [3,7,6,3,4,9,8,7,2,4,6,8,9,5]
//                 },
//                 {
//                     label: "Jumlah Laka",
//                     backgroundColor: "red",
//                     data: [4,3,1,4,6,8,5,9,4,7,8,2,4,6]
//                 }
//          ]
//    },

//    options: {
//     responsive: true, // Instruct chart js to respond nicely.
//     maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
//   }
// });
var horizontalBarChart = new Chart(per_jml_kec, {
    type: 'horizontalBar',
    data: {
       labels: ["BABEL","MALUT","GORONTALO","BENGKULU","KALTIM","MALUKU","KALSEL","KEPRI","PAPUA","JAMBI","KALTENG","SUMSEL","SULTARA","NTT"],
          datasets:[
                 {
                     label: "Jumlah Korban",
                     backgroundColor: "#38c0ff",
                     data: [3,7,6,3,4,9,8,7,2,4,6,8,9,5]
                 },
                 {
                     label: "Jumlah Laka",
                     backgroundColor: "#ffcd36",
                     data: [4,3,1,4,6,8,5,9,4,7,8,2,4,6]
                 }
          ]
    },
 
    options: {
     responsive: true, // Instruct chart js to respond nicely.
     maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
     scales: {
        xAxes: [{
            stacked: true,
            ticks: {
              suggestedMin: 0,
              suggestedMax: 20
          }
        }],
        yAxes: [{
            stacked: true,
            ticks: {
              suggestedMin: 0,
              suggestedMax: 20
          }
        }]
    }
   }
 });
var data = {
    datasets: [{
        data: [
            11,
            16,
            7,
            3,
            14
        ],
        backgroundColor: [
            "red",
            "green",
            "blue",
            "orange",
            "purple"
        ],
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
var options = {
    responsive: true, // Instruct chart js to respond nicely.
    // maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
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
var indeks_penyebab_kecelakaan = $("#indeks_penyebab_kecelakaan");
new Chart(indeks_penyebab_kecelakaan, {
    data: data,
    type: 'polarArea',
    options: options
});


Chart.defaults.global.defaultFontFamily = "Lato";
var grafik_kecelakaan = document.getElementById("grafik_kecelakaan").getContext('2d');
var horizontalBarChart = new Chart(grafik_kecelakaan, {
    type: 'bar',
    data: {
       labels: ["TAKSI","BUS SEKOLAH","BUS PARIWISATA","RENTAL","OJEK","ANGKOT","ANGKUTAN BARANG","PRIBADI"],
          datasets:[
                 {
                     label: "Jumlah Korban",
                     backgroundColor: "#38c0ff",
                     data: [3,7,6,3,4,9,8,7]
                 },
                 {
                     label: "Jumlah Laka",
                     backgroundColor: "#ffcd36",
                     data: [4,3,1,4,6,8,5,9]
                 }
          ]
    },
 
    options: {
     responsive: true, // Instruct chart js to respond nicely.
     maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
     scales: {
        xAxes: [{
            stacked: true,
            ticks: {
              suggestedMin: 0,
              suggestedMax: 20
          }
        }],
        yAxes: [{
            stacked: true,
            ticks: {
              suggestedMin: 0,
              suggestedMax: 20
          }
        }]
    }
   }
 });


Chart.defaults.global.defaultFontFamily = "Lato";
var ifak2 = document.getElementById("ifak2").getContext('2d');
var horizontalBarChart = new Chart(ifak2, {
     type: 'horizontalBar',
     data: {
        labels: ["BABEL","MALUT","GORONTALO","BENGKULU","KALTIM","MALUKU","KALSEL","KEPRI","PAPUA","JAMBI","KALTENG","SUMSEL","SULTARA","NTT"],
           datasets:[
                  {
                      label: "Jumlah Korban",
                      backgroundColor: "#38c0ff",
                      data: [3,7,6,3,4,9,8,7,2,4,6,8,9,5]
                  }
           ]
     },
  
     options: {
      responsive: true, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
      scales: {
          xAxes: [{
              stacked: true,
              ticks: {
                suggestedMin: 0,
                suggestedMax: 20
            }
          }],
          yAxes: [{
              stacked: true,
              ticks: {
                suggestedMin: 0,
                suggestedMax: 20
            }
          }]
      }
    }
  }); 


