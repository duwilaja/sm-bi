var no = 1;


$(document).ready(function(){
    jml_data_ssc();
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
                 
                var html = '';
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
                jml_data_ssc();
                slide();
                }
        
        }
    });
});

require(["esri/Map", "esri/views/MapView"], function(Map, MapView) {
    var map = new Map({
      basemap: "topo-vector"
    });
  
    var view = new MapView({
      container: "map", // Reference to the DOM node that will contain the view
      map: map // References the map object created in step 3
    });
  });
