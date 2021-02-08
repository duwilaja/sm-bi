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




//   var ctx1 = document.getElementById("ikc1").getContext('2d');
//   var myChart = new Chart(ctx1, {
//       type: 'bar',
//       data: {
//           labels: ["Pengguna SIM", "Pelanggaran ",	"Penindakan"],
//           datasets: [{
//               label: 'SIM A', // Name the series
//               data: [100,80,100], // Specify the data values array
//               fill: false,
//               type : 'line',
//               borderColor: '#2196f3', // Add custom color border (Line)
//               backgroundColor: '#2196f3', // Add custom color background (Points and Fill)
//               borderWidth: 1 // Specify bar border width
//           },
//           {
//               label: 'SIM B ', // Name the series
//               data: [50,40,10], // Specify the data values array
//               fill: false,
//               type : 'line',
//               borderColor: '#4CAF50', // Add custom color border (Line)
//               backgroundColor: '#4CAF50', // Add custom color background (Points and Fill)
//               borderWidth: 1 // Specify bar border width
//           },
//           {
//               label: 'SIM C', // Name the series
//               data: [150,100,150], // Specify the data values array
//               fill: false,
//               type : 'line',
//               borderColor: '#ff9800', // Add custom color border (Line)
//               backgroundColor: '#ffc107', // Add custom color background (Points and Fill)
//               borderWidth: 1 // Specify bar border width
//           },
//           {
//             label: 'SIM D', // Name the series
//             data: [80,60,20], // Specify the data values array
//             fill: false,
//             type : 'line',
//             borderColor: '#ff443b', // Add custom color border (Line)
//             backgroundColor: '#ff6861', // Add custom color background (Points and Fill)
//             borderWidth: 1 // Specify bar border width
//         },
//       ],
//       },
//       options: {
//         responsive: true, // Instruct chart js to respond nicely.
//         maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
//       }
//   });  
var ctx2 = document.getElementById("ikc2").getContext('2d');
var myChart = new Chart(ctx2, {
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
      responsive: true, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
    }
});  


