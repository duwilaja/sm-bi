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




var ctx2 = document.getElementById("ikc2").getContext('2d');
var myChart = new Chart(ctx2, {
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
      responsive: true, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
    }
});




