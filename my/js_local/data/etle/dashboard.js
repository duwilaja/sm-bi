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
var grafik_line = c3.generate({
    bindto: '#grafik_line', // id of chart wrapper
    data: {
        columns: [
            // each columns data
            ['data1', 100, 90, 80, 130, 150],
            ['data2', 150, 70, 50, 150, 250],
            ['data3', 100, 120, 100, 130, 320],
            ['data4', 170, 50, 130, 170, 215],
            ['data5', 300, 171, 200, 300, 125],
            ['data6', 250, 132, 100, 150, 135],
            ['data7', 120, 270, 200, 170, 115]
        ],
        type: 'line', // default type of chart
        colors: {
            data1: '#4a32d4',
            data2:'#f72d66',
            data3:'#f7be2d'
        },
        names: {
            // name of each serie
            'data1': 'Total Pelanggaran',
            'data2': 'Tervalidasi',
            'data3': 'Terberkas',
            'data4': 'Terkirim',
            'data5': 'Terkonfirmasi',
            'data6': 'Terbayar',
            'data7': 'Blokir',
        }
    },
    axis: {
        x: {
            type: 'category',
            // name of each category
            categories: ['Okt 2019', 'Nov 2019', 'Des 2019', 'Jan 2020', 'Feb 2020']
        },
    },
    legend: {
          show: false, //hide legend
    },
    padding: {
        bottom: 0,
        top: 0
    },
});

var grafik_bar = c3.generate({
    bindto: '#grafik_bar', // id of chart wrapper
    data: {
        columns: [
            // each columns data
            ['data1', 100, 90, 80, 130, 150],
            ['data2', 150, 70, 50, 150, 250],
            ['data3', 100, 120, 100, 130, 320],
            ['data4', 170, 50, 130, 170, 215],
            ['data5', 300, 171, 200, 300, 125],
            ['data6', 250, 132, 100, 150, 135],
            ['data7', 120, 270, 200, 170, 115]
        ],
        type: 'bar', // default type of chart
        colors: {
            data1: '#4a32d4',
            data2:'#f72d66',
            data3:'#f7be2d'
        },
        names: {
            // name of each serie
            'data1': 'Total Pelanggaran',
            'data2': 'Tervalidasi',
            'data3': 'Terberkas',
            'data4': 'Terkirim',
            'data5': 'Terkonfirmasi',
            'data6': 'Terbayar',
            'data7': 'Blokir',
        }
    },
    axis: {
        x: {
            type: 'category',
            // name of each category
            categories: ['Okt 2019', 'Nov 2019', 'Des 2019', 'Jan 2020', 'Feb 2020']
        },
    },
    legend: {
          show: false, //hide legend
    },
    padding: {
        bottom: 0,
        top: 0
    },
});

