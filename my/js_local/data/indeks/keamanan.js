/*--details-chart open--*/
var no = 1;


$(document).ready(function(){
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
                 
                var html = '<option value="">-- Pilih Polres --</option>';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].res_id+'>'+data[i].res_nam+'</option>';
                }
                $('#f_polres').html(html);

            }
        });
        // return false;
    });
	
	grafik();
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


function grafik() {
    var start = $("#f_date_start").val();
    var end = $("#f_date_end").val();
    var polda = $("#f_polda").val();
    var polres = $("#f_polres").val();
	
	var lokasi="Nasional";
	if(polda!=''){ lokasi=$("#f_polda option:selected").text(); }
	if(polres!=''){ lokasi=$("#f_polres option:selected").text(); }
	
    $.ajax({
        // url : "../Grafik_api/jml_data_tmc",
        url: "keamanan_datasets",
        method : "POST",
        data : {start: start, end:end,polda:polda,polres:polres },
        success: function(r){
			//console.log(r);
			var dat=JSON.parse(r);
			$("#loc").html(lokasi);
			if(myChart!=null){
				myChart.destroy();
			}
			var labels=dat['labels'];//["Jan","Feb", "Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"];
			var dataset=build_datasets(dat['labels'],dat['datas']);
			myChart=series_chart(ctx2,'line',labels,dataset);
        }
    });
}
function randomColor(){
	return "#"+(Math.random().toString(16)+"000000").slice(2, 8).toUpperCase();
}

var ctx2 = document.getElementById("ikc2").getContext('2d');
var myChart = null;
var lbls=["Black Spot","Trouble Spot","Tindak Pidana"];

function get_data(a,b,c){
	var ret=0;
	for(var y=0;y<c.length;y++){
		var d=c[y];
		if(d['ym']==b && d['gangguan']==a) ret=parseInt(d['cnt']);
	}
	return ret;
}
function get_sets(l,ds,lbl){
	var set=[];
	for(var x=0;x<lbl.length;x++){ //loop bulan
		set[x]=get_data(l,lbl[x],ds);
	}
	var sd={
		label: l,
		data: set,
		fill: false,
		type: "line",
		borderColor: randomColor(),
		backgroundColor: randomColor(),
		borderWidth: 1
	}
	return sd;
}
function build_datasets(lbl,dataset){
	var data=[];
	for(var i=0;i<lbls.length;i++){
		data.push(get_sets(lbls[i],dataset,lbl));
	}
	//console.log(datax);
	
	return data;
}

function series_chart(ctx,type='bar',labels=[],datasets=[]){
	var thechart = new Chart(ctx, {
		type: type, 
		data: {
			labels: labels,
			datasets: datasets
		},
		options: {
		  responsive: true, // Instruct chart js to respond nicely.
		  maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
		}
	});
	
	return thechart;
}

