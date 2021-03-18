<style>
  #map {
    height: 100%;
  }

  /* Optional: Makes the sample page fill the window. */
  html,
  body {
    height: 100%;
    margin: 0;
    padding: 0;
  }

  #floating-panel {
    position: absolute;
    opacity:0.9;
    top: 30px;
    right:30px;
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
    background-color: blue;
    border-radius:5px;
    color: white;
  }

  .wokrek li a:hover:not(.active) {
    background-color: blue;
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

    <div class="row" style="min-height:600px;margin-top:20px;">
<div class="col-md-12">
<div id="floating-panel">
      <ul class="wokrek">
        <li><a href="#home" onclick="show_marker('vvip')">VVIP</a></li>
        <li><a href="#black_spot" onclick="show_marker('black_spot')">Black Spot</a></li>
        <li><a href="#trouble_spot" onclick="show_marker('trouble_spot')">Trouble Spot</a></li>
        <li><a href="#ambang_gangguan" onclick="show_marker('ambang_gangguan')">Ambang Gangguan</a></li>
        <li><a href="#about" onclick="show_marker('cctv')">Traffic Counting</a></li>
        <li><a href="#about" onclick="show_marker('cctv')">Traffic Kategori</a></li>
        <li><a href="#about" onclick="show_marker('cctv')">Average Speed</a></li>
        <li><a href="#about" onclick="show_marker('cctv')">Length Ocupantion</a></li>
        <li><a href="#about" data-toggle="modal" data-target="#cctv">Face Recognation</a></li>
        <li><a href="#giat_masyarakat" onclick="show_marker('giat_masyarakat')">Giat Masyarakat</a></li>
      </ul>
    </div>
  <div id="map"></div>
</div>
    </div>
<!-- End Row -->
                        



<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" id="tmc" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="card" style="border: 0;border-top: solid 6px #795548;">
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
    <div class="card" style="border: 0;border-top: solid 6px #795548;">
          <div class="card-body" style="font-size: 12px;">
            <h3 class="text-center">Under Construction</h3>
        </div>
      </div>
    </div>
  </div>
</div>