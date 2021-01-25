<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik_api_dummy extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MEri','eri');
        
    }
    
    // @ERI
    public function bar_eri()
    {
        $pnp = [];
        $bus = [];
        $brg = [];
        $motor = [];
        $khusus = [];
        $date = [];

        $this->eri->see = 'sum(pnp) as pnp,sum(bus) as bus,sum(brg) as brg,sum(motor) as motor,sum(khusus) as khusus,date(dtm) as ddtm';
        // $eri = $this->eri->get('','date(dtm) >= date("2020-12-28") && date(dtm) <= date("2020-12-30")','date(dtm)')->result();
        $eri = $this->eri->get('','date(dtm) = date(now())','date(dtm)')->result();
        
        foreach ($eri as $v) {
            array_push($pnp,$v->pnp);
            array_push($bus,$v->bus);
            array_push($brg,$v->brg);
            array_push($motor,$v->motor);
            array_push($khusus,$v->khusus);
            array_push($date,tgl_indo($v->ddtm));
        }

        $series =  [
            'data' => [
            [
                "name" => 'Mobil PNP',
                "type" => 'bar',
                "data" => $pnp
            ], 
            [
                "name" => 'Bus',
                "type" => 'bar',
                "data" => $bus
            ], 
            [
                "name" => 'Mobil Barang',
                "type" => 'bar',
                "data" => $brg
            ],
            [
                "name" => 'Sepeda Motor',
                "type" => 'bar',
                "data" => $motor
            ],
            [
                "name" => 'Kendaraan Khusus',
                "type" => 'bar',
                "data" => $khusus
            ]],
            'date' => $date
        ];
        
        echo json_encode($series);
        // echo json_encode($eri);
    }
    public function bar_tmc_dasar_giat()
    {
        $pnp = [100];
        $bus = [50];
        $brg = [40];
        $motor = [30];
        $khusus = [];
        $date = ['30 Desember 2020'];

        // $this->eri->see = 'sum(pnp) as pnp,sum(bus) as bus,sum(brg) as brg,sum(motor) as motor,sum(khusus) as khusus,date(dtm) as ddtm';
        // // $eri = $this->eri->get('','date(dtm) >= date("2020-12-28") && date(dtm) <= date("2020-12-30")','date(dtm)')->result();
        // $eri = $this->eri->get('','date(dtm) = date(now())','date(dtm)')->result();
        
        // foreach ($eri as $v) {
        //     array_push($pnp,$v->pnp);
        //     array_push($bus,$v->bus);
        //     array_push($brg,$v->brg);
        //     array_push($motor,$v->motor);
        //     array_push($khusus,$v->khusus);
        //     array_push($date,tgl_indo($v->ddtm));
        // }

        $series =  [
            'data' => [
            [
                "name" => 'Permintaan Masyarakat',
                "type" => 'bar',
                "data" => $pnp
            ], 
            [
                "name" => 'Laporan Pengaduan',
                "type" => 'bar',
                "data" => $bus
            ], 
            [
                "name" => 'Atensi Pimpinan',
                "type" => 'bar',
                "data" => $brg
            ],
            [
                "name" => 'Surat Perintah',
                "type" => 'bar',
                "data" => $motor
            ]],
            'date' => $date
        ];
        
        echo json_encode($series);
        // echo json_encode($eri);
    }

    public function bar_tmc_status()
    {
        $pnp = [100];
        $bus = [50];
        $brg = [40];
        $motor = [30];
        $khusus = [];
        $date = ['30 Desember 2020'];

        // $this->eri->see = 'sum(pnp) as pnp,sum(bus) as bus,sum(brg) as brg,sum(motor) as motor,sum(khusus) as khusus,date(dtm) as ddtm';
        // // $eri = $this->eri->get('','date(dtm) >= date("2020-12-28") && date(dtm) <= date("2020-12-30")','date(dtm)')->result();
        // $eri = $this->eri->get('','date(dtm) = date(now())','date(dtm)')->result();
        
        // foreach ($eri as $v) {
        //     array_push($pnp,$v->pnp);
        //     array_push($bus,$v->bus);
        //     array_push($brg,$v->brg);
        //     array_push($motor,$v->motor);
        //     array_push($khusus,$v->khusus);
        //     array_push($date,tgl_indo($v->ddtm));
        // }

        $series =  [
            'data' => [
            [
                "name" => 'Lancar',
                "type" => 'bar',
                "data" => $pnp
            ], 
            [
                "name" => 'Padat',
                "type" => 'bar',
                "data" => $bus
            ], 
            [
                "name" => 'Macet',
                "type" => 'bar',
                "data" => $brg
            ]],
            'date' => $date
        ];
        
        echo json_encode($series);
        // echo json_encode($eri);
    }

    public function donat_eri()
    {
        $pnp = 0;
        $bus = 0;
        $brg = 0;
        $motor = 0;
        $khusus = 0;

        $this->eri->see = 'sum(pnp) as pnp,sum(bus) as bus,sum(brg) as brg,sum(motor) as motor,sum(khusus) as khusus,month(dtm) as ddtm';
        $eri = $this->eri->get('','month(dtm) = month("'.date('Y-m-d').'")','month(dtm)')->result();
        
        foreach ($eri as $v) {
            $pnp = (int)$v->pnp;
            $bus = (int)$v->bus;
            $brg = (int)$v->brg;
            $motor = (int)$v->motor;
            $khusus = (int)$v->khusus;
        }

        $series =  [
            'data' => [$pnp,$bus,$brg,$motor,$khusus]
        ];
        
        echo json_encode($series);
        // echo json_encode($eri);
    }

    public function donat_eri_tabel()
    {
        $pnp = 0;
        $bus = 0;
        $brg = 0;
        $motor = 0;
        $khusus = 0;
        $total = 0;
        $series = [];

        $this->eri->see = 'sum(pnp) as pnp,sum(bus) as bus,sum(brg) as brg,sum(motor) as motor,sum(khusus) as khusus,month(dtm) as ddtm,(sum(pnp) + sum(bus) + sum(brg) + sum(motor) + sum(khusus))  as total ';
        
        $eri = $this->eri->get('','month(dtm) = month("'.date('Y-m-d').'")','month(dtm)')->result();
        $eri_last_month = $this->eri->get('','month(dtm) = month("'.date('Y-m-d',strtotime("-1 month")).'")','month(dtm)');
        $total_bulan_kemarin = $eri_last_month->num_rows() > 0 ? $eri_last_month->row()->total : 0;

        foreach ($eri as $v) {
            $total = $v->total;
            $pnp = (int)$v->pnp;
            $bus = (int)$v->bus;
            $brg = (int)$v->brg;
            $motor = (int)$v->motor;
            $khusus = (int)$v->khusus;
            
        }

        $series = [
           'data' => [[
                'warna' => 'bg-primary',
                'nama' => 'Mobil PNP',
                'value' => $pnp,
                'persen' => per_diagram_lingkaran($total,$pnp),
            ],
            [
                'warna' => 'bg-orange',
                'nama' => 'Bus',
                'value' => $bus,
                'persen' => per_diagram_lingkaran($total,$bus),
            ],
            [
                'warna' => 'bg-warning',
                'nama' => 'Mobil Barang',
                'value' => $brg,
                'persen' => per_diagram_lingkaran($total,$brg),
            ],
            [
                'warna' => 'bg-teal',
                'nama' => 'Sepeda Motor',
                'value' => $motor,
                'persen' => per_diagram_lingkaran($total,$motor),
            ],
            [
                'warna' => 'bg-danger',
                'nama' => 'Kendaraan Khusus',
                'value' => $khusus,
                'persen' => per_diagram_lingkaran($total,$khusus),
            ]],
            'total' => $total,
            'persen_nt' => persen_nt($total_bulan_kemarin,$total)
        ];

        echo json_encode($series);
    }

    public function tabel_eri_bulan()
    {
        $pnp_ini = 0;
        $bus_ini = 0;
        $brg_ini = 0;
        $motor_ini = 0;
        $khusus_ini = 0;

        $pnp_bl = 0;
        $bus_bl = 0;
        $brg_bl = 0;
        $motor_bl = 0;
        $khusus_bl = 0;

        $total_bln_ini = 0;
        $total_bln_lalu = 0;
        $persen = 0;

        $series = [];

        $this->eri->see = 'sum(pnp) as pnp,sum(bus) as bus,sum(brg) as brg,sum(motor) as motor,sum(khusus) as khusus,month(dtm) as ddtm,(sum(pnp) + sum(bus) + sum(brg) + sum(motor) + sum(khusus))  as total ';
        
        $eri = $this->eri->get('','month(dtm) = month("'.date('Y-m-d').'")','month(dtm)')->result();
        $eri_last_month = $this->eri->get('','month(dtm) = month("'.date('Y-m-d',strtotime("-1 month")).'")','month(dtm)');
        $total_bulan_kemarin = $eri_last_month->num_rows() > 0 ? $eri_last_month->row()->total : 0;

        foreach ($eri as $v) {
            $total_bln_ini = $v->total;
            $pnp_ini = (int)$v->pnp;
            $bus_ini = (int)$v->bus;
            $brg_ini = (int)$v->brg;
            $motor_ini = (int)$v->motor;
            $khusus_ini = (int)$v->khusus;
        }

        foreach ($eri_last_month->result() as $v) {
            $total_bln_lalu = $v->total;
            $pnp_bl = (int)$v->pnp;
            $bus_bl = (int)$v->bus;
            $brg_bl = (int)$v->brg;
            $motor_bl = (int)$v->motor;
            $khusus_bl = (int)$v->khusus;
        }

        $series = [
           'data' => [[
               'nama' => 'Mobil PNP',
               'bulan_ini' => $pnp_ini,
               'bulan_lalu' => $pnp_bl,
               'persen' => persen_nt($pnp_bl,$pnp_ini),
            ],
            [
                'nama' => 'Bus',
                'bulan_ini' => $bus_ini,
                'bulan_lalu' => $bus_bl,
                'persen' => persen_nt($bus_bl,$bus_ini),
            ],
            [
                'nama' => 'Mobil Barang',
                'bulan_ini' => $brg_ini,
                'bulan_lalu' => $brg_bl,
                'persen' => persen_nt($brg_bl,$brg_ini),
            ],
            [
                'nama' => 'Sepeda Motor',
                'bulan_ini' => $motor_ini,
                'bulan_lalu' => $motor_bl,
                'persen' => persen_nt($motor_bl,$motor_ini),
            ],
            [
                'nama' => 'Kendaraan Khusus',
                'bulan_ini' => $khusus_ini,
                'bulan_lalu' => $khusus_bl,
                'persen' => persen_nt($khusus_bl,$khusus_ini),
            ]],
            'total_bln_ini' => $total_bln_ini,
            'total_bln_lalu' => $total_bln_lalu,
            'persen' => persen_nt($total_bln_lalu,$total_bln_ini)
        ];

        echo json_encode($series);
    }

    public function dt_eri_polda()
    {
        echo $this->eri->dt_eri_polda();
    }

    public function jml_data_eri()
    {
        $total = 0;
        $pnp = 0;
        $bus = 0;
        $brg = 0;
        $motor = 0;
        $khusus = 0;

        $this->eri->see = 'sum(pnp) as pnp,sum(bus) as bus,sum(brg) as brg,sum(motor) as motor,sum(khusus) as khusus,month(dtm) as ddtm,(sum(pnp) + sum(bus) + sum(brg) + sum(motor) + sum(khusus))  as total';
        $eri = $this->eri->get()->result();
        
        foreach ($eri as $v) {
            $pnp = (int)$v->pnp;
            $bus = (int)$v->bus;
            $brg = (int)$v->brg;
            $motor = (int)$v->motor;
            $khusus = (int)$v->khusus;
            $total = (int)$v->total;
        }

        $series =  [$pnp,$bus,$brg,$motor,$khusus,$total];
        
        echo json_encode($series);
    }

    // AIS
    public function tabel_penyebab_kecelakaan()
    {
        $tahun = [2019,2020,2021,2022];
        $nama = [
            'Jumlah Kejadian',
            'Korban MD',
            'Korban LB',
            'Korban LR',
        ];
        $data = [
            [1,2,3,4],
            [5,6,7,8],
            [3,4,5,5],
            [3,4,5,5],
        ];

        $rsp = [
            'tahun' => $tahun,
            'nama' => $nama,
            'data' => $data
        ];

        echo json_encode($rsp);
    }

    public function bar_ais()
    {
        $rsp = [[
            'name' => 'Jumlah Kejadian',
            'type' => 'bar',
            'data' => [ 100,29,27,26]
        ], 
        [
            'name' => 'Korban MD',
            'type' => 'bar',
            'data' => [ 35,39,37,36]
        ], 
        [
            'name' => 'Korban LB',
            'type' => 'bar',
            'data' => [37, 35, 36,34]
        ],
        [
            'name' => 'Korban LR',
            'type' => 'bar',
            'data' => [ 35,39,37,36]
        ]];

        echo json_encode($rsp);
    }

    public function pie_perilaku()
    {
        
        $data = [12.4,11.4,21.12,1.2,15.4,17.4,20.4,11,13,14];
        $label = [
            'Tidak Waspada',
            'Mendadak Merubah Kecepatan',
            'Ceroboh Saat Menyalip',
            'Berhenti Mendadak',
        ];

        $rsp = [
            'data' => $data,
            'label' => $label
        ];

        echo json_encode($rsp);
    }

    public function grafik_cfr()
    {
        
        $real = [12.4,11.4,21.12,1.2,15.4,17.4,20.4,11,13,14];
        $target = [12.4,11.4,21.12,1.2,15.4,17.4,20.4,11,13,14];
        $rsp = [
            'data' => [
                'real' => $real,
                'target' => $target
            ]
        ];

        echo json_encode($rsp);
    }
}