var mytbl;

$(document).ready(function () {
    dt_ttr_operator();
    slide();
	getSum();
});

function reloadtbl(){
	mytbl.ajax.reload();
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
