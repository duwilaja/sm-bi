var mytbl;

$(document).ready(function () {
    dt_ttr_operator();
    slide();
	getSum();
	grafik();
});

function reloadtbl(){
	mytbl.ajax.reload();
	grafik();
}
function getSum(){
	var url='intan_sum';
	var mtd='POST';
	var danam=$("#f_polda option:selected").text();
	var resnam=$("#f_polres option:selected").text();
	var frmdata={
		f_date_start:$("#f_date_start").val(),
		f_date_end:$("#f_date_end").val(),
		f_polda:$("#f_polda").val(),
		f_polres:$("#f_polres").val(),
		danam:danam,
		resnam:resnam};
	
	//alert(frmdata);
	$(".loc").html("");
	$("#pos_polisi").html("0"); $("#pos_polisi_loc").html("");
	$("#faskes").html("0"); $("#faskes_loc").html("");
	$("#pos_pjr").html("0"); $("#pos_pjr_loc").html("");
	$("#ambulance").html("0"); $("#ambulance_loc").html("");
	
	$.ajax({
		type: mtd,
		url: url,
		data: frmdata,
		success: function(data){
			var json=JSON.parse(data);
			console.log(json);
			if(json['code']=="200"){
				for(i=0;i<json['msgs'].length;i++){
					v=0; f="xxx";
					$.each(json['msgs'][i],function (key,val){
						if(key=="txt") {f=val.replace(" ","_").toLowerCase(); }
						if(key=="jml") {v=val;}
					});
					//console.log(f + " = " + v)
					$("#"+f).html(v);
					$("#"+f+"_loc").html(json['loc']);
				}
				$(".loc").html(json["loc"]);
				//log(s);
			}
		},
		error: function(xhr){
			console.log("Error:"+xhr);
		}
	});
}

function getCombo(q,id,tgt,dv="",blnk=""){
	var url=q;
	var mtd='POST';
	var frmdata={id:id};
	
	//alert(frmdata);
	
	$.ajax({
		type: mtd,
		url: url,
		data: frmdata,
		success: function(data){
			var json=JSON.parse(data);
			console.log(json);
			$(tgt).find('option').remove();
			var s='<option value="">'+blnk+'</option>';
			if(json['code']=="200"){
				for(i=0;i<json['msgs'].length;i++){
					v="";t="";
					$.each(json['msgs'][i],function (key,val){
						if(key=='v'){v=val;}
						if(key=='t'){t=val;}
					});
					if(v==dv){
						s+='<option selected value="'+v+'">'+t+'</option>';
					}else{
						s+='<option value="'+v+'">'+t+'</option>';
					}
				}
				//log(s);
			}
			$(tgt).append(s);
		},
		error: function(xhr){
			console.log("Error:"+xhr);
		}
	});
}

function dt_ttr_operator() {
  mytbl=$('#tabel').DataTable({
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
          "url": '../Data/dt_ttr_operator',
          "type": "POST",
          "data" : function(d){
			  d.f_date_start=$("#f_date_start").val(),
			  d.f_date_end=$("#f_date_end").val(),
			  d.f_polda=$("#f_polda").val(),
			  d.f_polres=$("#f_polres").val();
		  }
      },
      // "paging":   false,
      //Set column definition initialisation properties
      "columnDefs": [{
          // "targets": [8],
          "orderable": false
      }]
  });
}

function export_excel_intan() {
  download_report_intan();
}

function download_report_intan() {
  new Promise((resolve, reject) => {
      $.ajax({  
          url : "../Data/export_data_intan",
          method : "POST",
          async : true,
          // data: $('#filter').serialize(), 
          dataType : 'json',
          success: function(response){ 
              window.location.assign('../Data/link_download_intan?l='+response.link);
              resolve(response.link);
          }
      });
    });
}

let map;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: {lat: -6.941041, lng: 107.517584},
    zoom: 10,
  });
  const iconBase =
    "https://developers.google.com/maps/documentation/javascript/examples/full/images/";
  const icons = {
    parking: {
      icon: iconBase + "parking_lot_maps.png",
    },
    library: {
      icon: iconBase + "library_maps.png",
    },
    info: {
      icon: iconBase + "info-i_maps.png",
    },
  };
  const features = [
    {
      position: {lat: -7.034920, lng: 107.526471},
      type: "parking",
    },
    {
      position: {lat: -7.028424, lng: 107.521091},
      type: "library",
    },
    {
      position: {lat: -6.983111, lng: 107.436284},
      type: "info",
    },
    {
      position: {lat: -6.885647, lng: 107.537207},
      type: "info",
    },
    {
      position: {lat: -6.892210, lng: 107.536977},
      type: "info",
    },
    {
      position: {lat: -6.960185, lng: 107.376799},
      type: "info",
    },
  ];

  // Create markers.
  for (let i = 0; i < features.length; i++) {
    const marker = new google.maps.Marker({
      position: features[i].position,
      icon: icons[features[i].type].icon,
      map: map,
    });
  }
}

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
                items:3
            }
        }
    })
}

var ctx2 = document.getElementById("intanchart").getContext('2d');
var myChart = null;

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
        url: "intan_datasets",
        method : "POST",
        data : {start: start, end:end,polda:polda,polres:polres },
        success: function(r){
			console.log(r);
			var dat=JSON.parse(r);
			$(".loc").html(lokasi);
			if(myChart!=null){
				myChart.destroy();
			}
			var dataset=build_datasets(dat['axis'],dat['datas'],dat['sets']);
			myChart=series_chart(ctx2,'bar',dat['axis'],dataset);
        }
    });
}

function randomColor(){
	return "#"+(Math.random().toString(16)+"000000").slice(2, 8).toUpperCase();
}

function get_data(a,c,b){
	var ret=0;
	for(var y=0;y<c.length;y++){
		var d=c[y];
		if(a==d['x']&&b==d['z']) ret=d['y'];
	}
	return ret;
}
function get_sets(ax,ds,lbl){
	var set=[];
	for(var x=0;x<ax.length;x++){ //loop axis
		set[x]=get_data(ax[x],ds,lbl);
	}
	var sd={
		label: lbl,
		data: set,
		//fill: false,
		type: "bar",
		borderColor: randomColor(),
		backgroundColor: randomColor(),
		borderWidth: 1
	}
	return sd;
}
function build_datasets(axis,dataset,sets){
	var data=[];
	for(var i=0;i<sets.length;i++){
		data.push(get_sets(axis,dataset,sets[i]));
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
