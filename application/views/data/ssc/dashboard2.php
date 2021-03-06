<style>
  #map {
    height: 100%;
  }

  .info {
    padding: 1rem;
    margin: 0;
}

.info.error {
    color: #fff;
    background: #dc3545;
}
  
  /* Optional: Makes the sample page fill the window. */
  html,
  body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
  
  #floating-panel {
    box-shadow: 0px 4px 10px 0px #0000003b;
    position: absolute;
    opacity:0.9;
    top: 30px;
    right:70px;
    z-index: 1;
    background-color: #fff;
    /* padding: 5px; */
    /* border: 1px solid #999; */
    text-align: left;
    font-family: "Roboto", "sans-serif";
    line-height: 30px;
    /* padding-left: 10px; */
  }
  
  ul.wokrek {
    list-style-type: none;
    margin: 0;
    padding: 10px;
    width: 200px;
    background-color: #f1f1f1;
  }
  
  .wokrek li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
  }
  
  .wokrek li a.active {
    background-color: #f44336;
    border-radius:5px;
    color: white;
  }
  
  .wokrek li a:hover:not(.active) {
    background-color: #f44336;
    border-radius:5px;
    color: white;
  }
  
  .labelnum{
    position: relative;
    top: 100px;
  }

  .my-custom-class-for-label {
    font-weight: bold;
    font-size: 14px;
    margin-bottom: 40px;
  }
</style>


<!--Row-->
<input type="hidden"  id="ids" value="<?=$session['rowid'];?>">
<div class="row" style="min-height:600px;margin-top:20px;">
  <div class="col-md-12">
    <div id="floating-panel">
      <!-- <button onclick="share_lokasi()" class="btn btn-danger w-100">Share Lokasi</button> -->
      <ul class="wokrek">
        <li><a href="#home" onclick="show_marker('vvip')">VVIP</a></li>
        <li><a href="#black_spot" onclick="show_marker('black_spot')">Black Spot</a></li>
        <li><a href="#trouble_spot" onclick="show_marker('trouble_spot')">Trouble Spot</a></li>
        <li><a href="#ambang_gangguan" onclick="show_marker('ambang_gangguan')">Ambang Gangguan</a></li>
        <li><a href="#about" onclick="show_marker('cctv','traffic_counting')">Traffic Counting</a></li>
        <li><a href="#about" onclick="show_marker('cctv','traffic_category')">Traffic Category</a></li>
        <li><a href="#about" onclick="show_marker('cctv','average_speed')">Average Speed</a></li>
        <li><a href="#about" onclick="show_marker('cctv','length_ocupantion')">Length Ocupantion</a></li>
        <li><a href="#about" data-toggle="modal" data-target="#cctv">Face Recognation</a></li>
        <li><a href="#giat_masyarakat" onclick="show_marker('giat_masyarakat')">Giat Masyarakat</a></li>
      </ul>
    </div>
    <div id="map"></div>
    <!-- For displaying user's coordinate or error message. -->
    <div id="info" class="info"></div>
  </div>
</div>
<!-- End Row -->




<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" id="tmc" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="card" style="border: 0;border-top: solid 6px #795548;margin-bottom: 0;border-radius: 0;">
        <div class="card-body" style="font-size: 12px;">
          <table class="w-100">
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td id="tmc_nama"></td>
            </tr>
            <tr>
              <td>Nama Jalan</td>
              <td>:</td>
              <td id="tmc_nama_jalan"></td>
            </tr>
            <tr>
              <td>Kordinat</td>
              <td>:</td>
              <td id="tmc_kordinat"></td>
            </tr>
            <tr>
              <td>Status</td>
              <td>:</td>
              <td id="tmc_status"></td>
            </tr>
            <tr>
              <td>Tanggal</td>
              <td>:</td>
              <td id="tmc_tanggal"></td>
            </tr>
            <tr>
              <td>Jam Mulai</td>
              <td>:</td>
              <td id="tmc_jam_mulai"></td>
            </tr>
            <tr>
              <td>Sampai</td>
              <td>:</td>
              <td id="tmc_sampai"></td>
            </tr>
            <tr>
              <td>Penyebab</td>
              <td>:</td>
              <td id="tmc_penyebab"></td>
            </tr>
            <tr>
              <td>Detail</td>
              <td>:</td>
              <td id="tmc_detail"></td>
            </tr>
            <tr>
              <td>Sumber Info</td>
              <td>:</td>
              <td id="tmc_sumber_info"></td>
            </tr>
            <tr>
              <td>Petugas Lapangan</td>
              <td>:</td>
              <td id="tmc_petugas_lapangan"></td>
            </tr>
          </table>
          
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" id="cctv" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-lg">
      <div class="card" style="border: 0;border-top: solid 6px #795548;margin-bottom: 0;border-radius: 0;">
        <div class="card-body" style="font-size: 12px;">
          <iframe src="" id="fcctv" frameborder="0" style="width: 100%;height: 400px;"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>