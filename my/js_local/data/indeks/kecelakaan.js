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
	
	//dum();
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


function get_data(a,b,c){
	var ret=0;
	for(var y=0;y<c.length;y++){
		var d=c[y];
		if(d['x']==b && d['z']==a){
			ret=parseInt(d['y']);
		}
	}
	return ret;
}
function get_sets(l,ds,lbl,typ){
	var set=[];
	for(var x=0;x<lbl.length;x++){ //loop bulan
		set[x]=get_data(l,lbl[x],ds);
	}
	var fil=typ=='line'?false:true;
	var sd={
		label: l,
		data: set,
		fill: fil,
		type: typ,
		borderColor: randomColor(),
		backgroundColor: randomColor(),
		borderWidth: 1
	}
	return sd;
}
function build_datasets(lbl,dataset,lblx,typs){
	var data=[];
	for(var i=0;i<lblx.length;i++){
		data.push(get_sets(lblx[i],dataset,lbl,typs[i]));
	}
	console.log(data);
	
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

function getPolarColors(n){
	var re=[];
	for(var i=0;i<n;i++){
		re[i]=randomColor();
	}
	return re;
}

function polar_chart(label,dataset){
	var data = {
		datasets: [{
			data: dataset,//[100,100,100,100,150],
			backgroundColor: getPolarColors(dataset.length),//["red","green","blue","orange","purple"],
			label: 'My dataset' // for legend
		}],
		labels: label /*[
			"Ceroboh terhadap lalu lintas dari depan",
			"Gagal menjaga jarak aman",
			"Ceroboh saat belok",
			"Ceroboh saat menyalip",
			"Melampaui batas kecepatan"
		]*/
	};
	var options = {
		responsive: true, 
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
	
	var thechart = new Chart(ctx5, {
	data: data,
    type: 'polarArea',
    options: options });
	
	return thechart;
}

var ctx1 = document.getElementById("ifakl").getContext('2d');
var myChart1=null;
var ctx2 = document.getElementById("ifak2").getContext('2d');
var myChart2=null;
var ctx3 = document.getElementById("per_jml_kec").getContext('2d');
var myChart3=null;
var ctx4 = document.getElementById("grafik_kecelakaan").getContext('2d');
var myChart4=null;
var ctx5 = document.getElementById("indeks_penyebab_kecelakaan").getContext('2d');
var myChart5=null;

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
        url: "kecelakaan_datasets",
        method : "POST",
        data : {start: start, end:end,polda:polda,polres:polres },
        success: function(r){
			console.log(r);
			var dat=JSON.parse(r);
			$(".loc").html(lokasi);
			if(myChart1!=null){
				myChart1.destroy();
			}
			if(myChart2!=null){
				myChart2.destroy();
			}
			if(myChart3!=null){
				myChart3.destroy();
			}
			if(myChart4!=null){
				myChart4.destroy();
			}
			if(myChart5!=null){
				myChart5.destroy();
			}
			var dataset1 = build_datasets(dat['axis1'],dat['datas1'],dat['label1'],['line','line']);
			var dataset2 = build_datasets(dat['axis2'],dat['datas2'],dat['label2'],['bar','bar']);
			var dataset3 = build_datasets(dat['axis3'],dat['datas3'],dat['label3'],['bar','bar']);
			var dataset4 = build_datasets(dat['axis4'],dat['datas4'],dat['label4'],['bar','bar']);
			
			myChart1=series_chart(ctx1,'line',dat['axis1'],dataset1);
			myChart2=series_chart(ctx2,'bar',dat['axis2'],dataset2);
			myChart3=series_chart(ctx3,'bar',dat['axis3'],dataset3);
			myChart4=series_chart(ctx4,'bar',dat['axis4'],dataset4);
			myChart5=polar_chart(dat['axis5'],dat['datas5']);//(ctx5,'polarArea',dat['axis1'],dataset1);
			
        }
    });
}
function randomColor(){
	return "#"+(Math.random().toString(16)+"000000").slice(2, 8).toUpperCase();
}

