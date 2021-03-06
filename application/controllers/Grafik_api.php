<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik_api extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MEri','eri');
        $this->load->model('MTmc','tmc');
        $this->load->model('MCyb','cyb');
        $this->load->model('MAis','ais');
        $this->load->model('MDares','dares');
        $this->load->model('MDPend','mdp');
        $this->load->model('MEtle','etle');
    }
    
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

    public function bar_tmc_kondisi_lalin()
    {
        
        $start =$this->input->post('start');
        $end =$this->input->post('end');
        $lancar = [];
        $padat = [];
        $macet = [];
        $date = [];

        if ($start == "") {
            $tmc_lalin = $this->db->query('SELECT tgl,status,count(*) as total FROM `tmc_info_lalin` WHERE date(tgl) = date(now()) GROUP BY tgl,status')->result();
                foreach ($tmc_lalin as $v) {
                    if ($v->status == 'Lancar') {
                        array_push($lancar,$v->total);
                    }
                    if ($v->status == 'Padat') {
                        array_push($padat,$v->total);
                    }
                    if ($v->status == 'Macet') {
                        array_push($macet,$v->total);
                    }
                    $tgl = array(
                        tgl_indo($v->tgl)
                    );     
                    array_push($date,array_unique($tgl));   
                }
                
            
                $series =  [
                    'data' => [
                    [
                        "name" => 'Lancar',
                        "type" => 'bar',
                        "data" => $lancar
                    ], 
                    [
                        "name" => 'Padat',
                        "type" => 'bar',
                        "data" => $padat
                    ], 
                    [
                        "name" => 'Macet',
                        "type" => 'bar',
                        "data" => $macet
                    ]],
                    'date' => $date,
                ];
        }else{
            $sql_data =  $this->db->query('select date(tgl) as tgl, status, Count(*) as jumlah from tmc_info_lalin group by date(tgl), status')->result();
            $sql_date = $this->db->query('SELECT tgl FROM `tmc_info_lalin` GROUP BY tgl')->result();
            foreach ($sql_data as $da) {
                if ($da->tgl >= $start && $da->tgl <= $end) {

                    if ($da->status == 'Lancar') {
                        $l = $da->jumlah;
                        array_push($lancar,$l);
                    }

                    if ($da->status == 'Padat') {
                        $p = $da->jumlah;
                        array_push($padat,$p);
                    }
                    
                    if ($da->status == 'Macet') {
                        $m = $da->jumlah;
                        array_push($macet,$m);
                    }

                }


            }
            
            foreach ($sql_date as $de) {
                if ($de->tgl >= $start && $de->tgl <= $end) {
                    array_push($date,tgl_indo($de->tgl));  
                }    
            }
       
            $series =  [
                'data' => [
                [
                    "name" => 'Lancar',
                    "type" => 'bar',
                    "data" => $lancar
                ], 
                [
                    "name" => 'Padat',
                    "type" => 'bar',
                    "data" => $padat
                ], 
                [
                    "name" => 'Macet',
                    "type" => 'bar',
                    "data" => $macet
                ]],
                'date' => $date,
            ];

        }
        
         echo json_encode($series);
        // echo json_encode($eri);
    } 

    public function bar_tmc_penyebab_lalin()
    {

        $start =$this->input->post('start');
        $end =$this->input->post('end');

        if ($start == "") {
                $data = [];
                $date = [];

                $penyebab = $this->db->get('penyebab_macet')->result();

                $tmc_penyebab = $this->db->query('SELECT dtm,penyebab,count(*) as total FROM `tmc_info_lalin` WHERE date(dtm) = date(now()) and status="macet" GROUP BY penyebab')->result();
                    foreach ($tmc_penyebab as $key) {
                        foreach ($penyebab as $p) {
                            if ($key->penyebab == $p->sebab) {
                                $a = [
                                    'name'=> $key->penyebab,
                                    'type'=> 'bar',
                                    'data'=> [(int)$key->total]
                                ];
                                $b = tgl_indo($key->dtm);

                            }
                        }

                        array_push($data,$a);
                        array_push($date,$b);
                    }

                    $series =  [
                        'data' => $data,
                        'date' => $date
                    ];
        }else{
            $date=[];


            $alam = [];
            $jalan = [];
            $kendaraan = [];
            $peraturan = [];
            $pengendara = [];
            $infrastruktur = [];
            $kegiatan_kenegaraan = [];
            $kegiatan_masyarakat = [];
            $prasarana_jalan = [];
    
                $tmc_penyebab = $this->db->query('SELECT tgl,penyebab,count(*) as total FROM tmc_info_lalin WHERE penyebab != ""  GROUP BY date(tgl), penyebab')->result();
                $tmc_penyebab_date = $this->db->query('SELECT tgl,penyebab,count(*) as total FROM tmc_info_lalin WHERE penyebab != ""  GROUP BY date(tgl)')->result();
                    foreach ($tmc_penyebab as $key) {
                            if ($key->tgl >= $start && $key->tgl <= $end) {
    
                                if ($key->penyebab == "Alam") {
                                     $satu = $key->total;
                                     array_push($alam,$satu);                                
                                }
                                if ($key->penyebab == "Jalan") {
                                    $dua = $key->total;
                                    array_push($jalan,$dua);
                                }
                                if ($key->penyebab == "Kendaraan") {
                                    $tiga = $key->total;
                                    array_push($kendaraan,$tiga);          
                                }
                                if ($key->penyebab == "Peraturan") {
                                    $empat = $key->total;
                                    array_push($peraturan,$empat);
                                }
                                if ($key->penyebab == "Pengendara") {
                                    $lima = $key->total;
                                    array_push($pengendara,$lima);
                                }
                                if ($key->penyebab == "Infrastruktur") {
                                    $enam = $key->total;
                                    array_push($infrastruktur,$enam);
                                }
                                if ($key->penyebab == "Kegiatan Kenegaraan") {
                                    $tujuh = $key->total;
                                    array_push($kegiatan_kenegaraan,$tujuh);
                                }
                                if ($key->penyebab == "Kegiatan Masyarakat") {
                                    $delapan = $key->total;
                                    array_push($kegiatan_masyarakat,$delapan);
                                }
                                if ($key->penyebab == "Prasarana Jalan") {
                                    $fb = $key->total;
                                    array_push($prasarana_jalan,$fb);
                                }
                                
                            }
                    }
                    foreach ($tmc_penyebab_date as $de) {
                        if ($de->tgl >= $start && $de->tgl <= $end) {
                            array_push($date,tgl_indo($de->tgl));  
                        }    
                    }
                    $series =  [
                        'data' => [
                        [
                            "name" => 'Alam',
                            "type" => 'bar',
                            "data" => $alam
                        ], 
                        [
                            "name" => 'jalan',
                            "type" => 'bar',
                            "data" => $jalan
                        ], 
                        [
                            "name" => 'kendaraan',
                            "type" => 'bar',
                            "data" => $kendaraan
                        ],
                        [
                            "name" => 'peraturan',
                            "type" => 'bar',
                            "data" => $peraturan
                        ],
                        [
                            "name" => 'pengendara',
                            "type" => 'bar',
                            "data" => $pengendara
                        ],
                        [
                            "name" => 'infrastruktur',
                            "type" => 'bar',
                            "data" => $infrastruktur
                        ],
                        [
                            "name" => 'kegiatan_kenegaraan',
                            "type" => 'bar',
                            "data" => $kegiatan_kenegaraan
                        ],
                        [
                            "name" => 'kegiatan_masyarakat',
                            "type" => 'bar',
                            "data" => $kegiatan_masyarakat
                        ],
                        [
                            "name" => 'prasarana_jalan',
                            "type" => 'bar',
                            "data" => $prasarana_jalan
                        ]],
                        'date' => $date,
                    ];

        }
                       
        echo json_encode($series);

    }


    public function bar_tmc_interaksi_giat()
    {
        $start =$this->input->post('start');
        $end =$this->input->post('end');
        $pm = [];
        $lp = [];
        $ap = [];
        $sp = [];
        $date = [];

        if ($start == "") {
            $interaksi =$this->db->query('SELECT tgl,dasar,count(*) as total FROM tmc_interaksi where date(tgl) = date(now()) GROUP BY dasar')->result();
        
            foreach ($interaksi as $v) {
                if ($v->dasar == 'Permintaan Masyarakat') {
                    array_push($pm,$v->total);
                }
                if ($v->dasar == 'Laporan Pengaduan') {
                    array_push($lp,$v->total);
                }
                if ($v->dasar == 'Atensi Pimpinan') {
                    array_push($ap,$v->total);
                }
                if ($v->dasar == 'SPRINT') {
                    array_push($sp,$v->total);
                }
            
            }
            array_push($date,tgl_indo($v->tgl));
    
            $series =  [
                'data' => [
                [
                    "name" => 'Permintaan Masyarakat',
                    "type" => 'bar',
                    "data" => $pm
                ], 
                [
                    "name" => 'Laporan Pengaduan',
                    "type" => 'bar',
                    "data" => $lp
                ], 
                [
                    "name" => 'Atensi Pimpinan',
                    "type" => 'bar',
                    "data" => $ap
                ],
                [
                    "name" => 'Surat Perintah',
                    "type" => 'bar',
                    "data" => $sp
                ]],
                'date' => $date
            ];
        }else{
            $interaksi =$this->db->query('SELECT tgl,dasar,count(*) as total FROM tmc_interaksi GROUP BY date(tgl), dasar')->result();
            $interaksi_date =$this->db->query('SELECT tgl,dasar,count(*) as total FROM tmc_interaksi GROUP BY date(tgl) ')->result();
        
            foreach ($interaksi as $v) {
                if ($v->tgl >= $start && $v->tgl <= $end) {
                    if ($v->dasar == 'Permintaan Masyarakat') {
                        array_push($pm,$v->total);
                    }
                    if ($v->dasar == 'Laporan Pengaduan') {
                        array_push($lp,$v->total);
                    }
                    if ($v->dasar == 'Atensi Pimpinan') {
                        array_push($ap,$v->total);
                    }
                    if ($v->dasar == 'SPRINT') {
                        array_push($sp,$v->total);
                    }

                }

            }
            foreach ($interaksi_date as $de) {
                if ($de->tgl >= $start && $de->tgl <= $end) {
                    array_push($date,tgl_indo($de->tgl));  
                }    
            }
    
            $series =  [
                'data' => [
                [
                    "name" => 'Permintaan Masyarakat',
                    "type" => 'bar',
                    "data" => $pm
                ], 
                [
                    "name" => 'Laporan Pengaduan',
                    "type" => 'bar',
                    "data" => $lp
                ], 
                [
                    "name" => 'Atensi Pimpinan',
                    "type" => 'bar',
                    "data" => $ap
                ],
                [
                    "name" => 'Surat Perintah',
                    "type" => 'bar',
                    "data" => $sp
                ]],
                'date' => $date
            ];

        }

  
        
        echo json_encode($series);
    }


    public function bar_tmc_interaksi_media()
    {
        $start =$this->input->post('start');
        $end =$this->input->post('end');
        $facebook = [];
        $twitter = [];
        $website = [];
        $center = [];
        $date = [];

        if ($start == "") {
                $interaksi =$this->db->query('SELECT tgl,media,count(*) as total FROM tmc_interaksi where date(tgl) = date(now())  GROUP BY media')->result();
                foreach ($interaksi as $v) {
                    if ($v->media == 'Facebook') {
                        array_push($facebook,$v->total);
                    }
                    if ($v->media == 'Tweeter') {
                        array_push($twitter,$v->total);
                    }
                    if ($v->media == 'Website') {
                        array_push($website,$v->total);
                    }
                    if ($v->media == 'Center') {
                        array_push($center,$v->total);
                    }
                         
                }
                array_push($date,tgl_indo($v->tgl));

                $series =  [
                    'data' => [
                    [
                        "name" => 'Facebook',
                        "type" => 'bar',
                        "data" => $facebook
                    ], 
                    [
                        "name" => 'Twitter',
                        "type" => 'bar',
                        "data" => $twitter
                    ], 
                    [
                        "name" => 'Website',
                        "type" => 'bar',
                        "data" => $website
                    ],
                    [
                        "name" => 'Center',
                        "type" => 'bar',
                        "data" => $center
                    ]
                ],
                    'date' => $date
                ];
        }else{
        $interaksi =$this->db->query('SELECT tgl,media,count(*) as total FROM tmc_interaksi GROUP BY date(tgl), media')->result();
        $interaksi_date =$this->db->query('SELECT tgl,media,count(*) as total FROM tmc_interaksi GROUP BY date(tgl)')->result();
        foreach ($interaksi as $v) {
            if ($v->tgl >= $start && $v->tgl <= $end) {

                if ($v->media == 'Facebook') {
                    $fb = $v->total;
                    array_push($facebook,$fb);
                }
                if ($v->media == 'Tweeter') {
                    $tw = $v->total;
                    array_push($twitter,$tw);
                }
                if ($v->media == 'Website') {
                    $wb = $v->total;
                    array_push($website,$wb);
                }
                if ($v->media == 'Center') {
                    $cn = $v->total;
                    array_push($center,$cn);
                }               
            }   
        }
        foreach ($interaksi_date as $de) {
            if ($de->tgl >= $start && $de->tgl <= $end) {
                array_push($date,tgl_indo($de->tgl));  
            }    
        }

        $series =  [
            'data' => [
            [
                "name" => 'Facebook',
                "type" => 'bar',
                "data" => $facebook
            ], 
            [
                "name" => 'Twitter',
                "type" => 'bar',
                "data" => $twitter
            ], 
            [
                "name" => 'Website',
                "type" => 'bar',
                "data" => $website
            ],
            [
                "name" => 'Center',
                "type" => 'bar',
                "data" => $center

            ]
        ],
            'date' => $date
        ];

        }
        
        echo json_encode($series);
    }

    public function bar_tmc_publikasi_giat()
    {
        $start =$this->input->post('start');
        $end =$this->input->post('end');
        $pm = [];
        $lp = [];
        $ap = [];
        $sp = [];
        $date = [];

        if ($start == "") {
            $publikasi =$this->db->query('SELECT tgl,dasar,count(*) as total FROM tmc_publikasi WHERE date(tgl) = date(now())  GROUP BY dasar')->result();
        
            foreach ($publikasi as $v) {
                if ($v->dasar == 'Permintaan Masyarakat') {
                    array_push($pm,$v->total);
                }
                if ($v->dasar == 'Laporan Pengaduan') {
                    array_push($lp,$v->total);
                }
                if ($v->dasar == 'Atensi Pimpinan') {
                    array_push($ap,$v->total);
                }
                if ($v->dasar == 'SPRINT') {
                    array_push($sp,$v->total);
                }
            
            }
            array_push($date,tgl_indo($v->tgl));
    
            $series =  [
                'data' => [
                [
                    "name" => 'Permintaan Masyarakat',
                    "type" => 'bar',
                    "data" => $pm
                ], 
                [
                    "name" => 'Laporan Pengaduan',
                    "type" => 'bar',
                    "data" => $lp
                ], 
                [
                    "name" => 'Atensi Pimpinan',
                    "type" => 'bar',
                    "data" => $ap
                ],
                [
                    "name" => 'Surat Perintah',
                    "type" => 'bar',
                    "data" => $sp
                ]],
                'date' => $date
            ];
           
        }else{
            $publikasi =$this->db->query('SELECT tgl,dasar,count(*) as total FROM tmc_publikasi GROUP BY date(tgl), dasar')->result();
            $publikasi_date =$this->db->query('SELECT tgl,dasar,count(*) as total FROM tmc_publikasi GROUP BY date(tgl)')->result();
        
            foreach ($publikasi as $v) {
                if ($v->tgl >= $start && $v->tgl <= $end) {
                    if ($v->dasar == 'Permintaan Masyarakat') {
                        array_push($pm,$v->total);
                    }
                    if ($v->dasar == 'Laporan Pengaduan') {
                        array_push($lp,$v->total);
                    }
                    if ($v->dasar == 'Atensi Pimpinan') {
                        array_push($ap,$v->total);
                    }
                    if ($v->dasar == 'SPRINT') {
                        array_push($sp,$v->total);
                    }                
                }
            }
            foreach ($publikasi_date as $de) {
                if ($de->tgl >= $start && $de->tgl <= $end) {
                    array_push($date,tgl_indo($de->tgl));  
                }    
            }
    
            $series =  [
                'data' => [
                [
                    "name" => 'Permintaan Masyarakat',
                    "type" => 'bar',
                    "data" => $pm
                ], 
                [
                    "name" => 'Laporan Pengaduan',
                    "type" => 'bar',
                    "data" => $lp
                ], 
                [
                    "name" => 'Atensi Pimpinan',
                    "type" => 'bar',
                    "data" => $ap
                ],
                [
                    "name" => 'Surat Perintah',
                    "type" => 'bar',
                    "data" => $sp
                ]],
                'date' => $date
            ];


        }


        
        echo json_encode($series);
    }

    public function bar_tmc_publikasi_media()
    {
        $start =$this->input->post('start');
        $end =$this->input->post('end');
        $facebook = [];
        $twitter = [];
        $website = [];
        $center = [];
        $date = [];

        if ($start == "") {
            
        $publikasi =$this->db->query('SELECT tgl,media,count(*) as total FROM `tmc_publikasi` WHERE date(dtm) = date(now())  GROUP BY media')->result();
        
        foreach ($publikasi as $v) {
            if ($v->media == 'Facebook') {
                array_push($facebook,$v->total);
            }
            if ($v->media == 'Tweeter') {
                array_push($twitter,$v->total);
            }
            if ($v->media == 'Website') {
                array_push($website,$v->total);
            }
            if ($v->media == 'Center') {
                array_push($center,$v->total);
            }
        }
        array_push($date,tgl_indo($v->tgl));

        $series =  [
            'data' => [
            [
                "name" => 'Facebook',
                "type" => 'bar',
                "data" => $facebook
            ], 
            [
                "name" => 'Twitter',
                "type" => 'bar',
                "data" => $twitter
            ], 
            [
                "name" => 'Website',
                "type" => 'bar',
                "data" => $website
            ],
            [
                "name" => 'Center',
                "type" => 'bar',
                "data" => $center
            ]],
            'date' => $date
        ];
        
    }else{
        $publikasi =$this->db->query('SELECT tgl,media,count(*) as total FROM `tmc_publikasi` GROUP BY date(tgl), media')->result();
        $publikasi_date =$this->db->query('SELECT tgl,media,count(*) as total FROM `tmc_publikasi`  GROUP BY date(tgl)')->result();
        
        foreach ($publikasi as $v) {
            if ($v->tgl >= $start && $v->tgl <= $end) {
                if ($v->media == 'Facebook') {
                    array_push($facebook,$v->total);
                }
                if ($v->media == 'Tweeter') {
                    array_push($twitter,$v->total);
                }
                if ($v->media == 'Website') {
                    array_push($website,$v->total);
                }
                if ($v->media == 'Center') {
                    array_push($center,$v->total);
                }
            }   
    
        }

        foreach ($publikasi_date as $de) {
            if ($de->tgl >= $start && $de->tgl <= $end) {
                array_push($date,tgl_indo($de->tgl));  
            }    
        }


        $series =  [
            'data' => [
            [
                "name" => 'Facebook',
                "type" => 'bar',
                "data" => $facebook
            ], 
            [
                "name" => 'Twitter',
                "type" => 'bar',
                "data" => $twitter
            ], 
            [
                "name" => 'Website',
                "type" => 'bar',
                "data" => $website
            ],
            [
                "name" => 'Center',
                "type" => 'bar',
                "data" => $center
            ]],
            'date' => $date
        ];
    }
        echo json_encode($series);
    }

    public function bar_tmc_kordinasi_giat()
    {
        $start =$this->input->post('start');
        $end =$this->input->post('end');
        $pm = [];
        $lp = [];
        $ap = [];
        $sp = [];
        $date = [];

        if ($start == "") {
            $kordinasi =$this->db->query('SELECT tgl,dasar,count(*) as total FROM `tmc_koordinasi` WHERE date(dtm) = date(now())  GROUP BY dasar')->result();
        
        foreach ($kordinasi as $v) {
            if ($v->dasar == 'Permintaan Masyarakat') {
                array_push($pm,$v->total);
            }
            if ($v->dasar == 'Laporan Pengaduan') {
                array_push($lp,$v->total);
            }
            if ($v->dasar == 'Atensi Pimpinan') {
                array_push($ap,$v->total);
            }
            if ($v->dasar == 'SPRINT') {
                array_push($sp,$v->total);
            }
        }
        array_push($date,tgl_indo($v->tgl));

        $series =  [
            'data' => [
            [
                "name" => 'Permintaan Masyarakat',
                "type" => 'bar',
                "data" => $pm
            ], 
            [
                "name" => 'Laporan Pengaduan',
                "type" => 'bar',
                "data" => $lp
            ], 
            [
                "name" => 'Atensi Pimpinan',
                "type" => 'bar',
                "data" => $ap
            ],
            [
                "name" => 'Surat Perintah',
                "type" => 'bar',
                "data" => $sp
            ]],
            'date' => $date
        ];
        }else{
            $kordinasi =$this->db->query('SELECT tgl,dasar,count(*) as total FROM `tmc_koordinasi` GROUP BY date(tgl), dasar')->result();
            $kordinasi_date =$this->db->query('SELECT tgl,dasar,count(*) as total FROM `tmc_koordinasi` GROUP BY date(tgl)')->result();
        
            foreach ($kordinasi as $v) {
                if ($v->tgl >= $start && $v->tgl <= $end) {
                    if ($v->dasar == 'Permintaan Masyarakat') {
                        array_push($pm,$v->total);
                    }
                    if ($v->dasar == 'Laporan Pengaduan') {
                        array_push($lp,$v->total);
                    }
                    if ($v->dasar == 'Atensi Pimpinan') {
                        array_push($ap,$v->total);
                    }
                    if ($v->dasar == 'SPRINT') {
                        array_push($sp,$v->total);
                    }  
                }   
            }
            foreach ($kordinasi_date as $de) {
                if ($de->tgl >= $start && $de->tgl <= $end) {
                    array_push($date,tgl_indo($de->tgl));  
                }    
            }
    
            $series =  [
                'data' => [
                [
                    "name" => 'Permintaan Masyarakat',
                    "type" => 'bar',
                    "data" => $pm
                ], 
                [
                    "name" => 'Laporan Pengaduan',
                    "type" => 'bar',
                    "data" => $lp
                ], 
                [
                    "name" => 'Atensi Pimpinan',
                    "type" => 'bar',
                    "data" => $ap
                ],
                [
                    "name" => 'Surat Perintah',
                    "type" => 'bar',
                    "data" => $sp
                ]],
                'date' => $date
            ];

        }

    
       
        
        echo json_encode($series);
    }

    public function bar_tmc_kordinasi_media()
    {
        $start =$this->input->post('start');
        $end =$this->input->post('end');
        $perijinan = [];
        $pemberitahuan = [];
        $info_kegiatan = [];
        $permohonan_pengawalan = [];
        $date = [];

        if ($start == "") {
            $kordinasi =$this->db->query('SELECT tgl,jenis,count(*) as total FROM `tmc_koordinasi` WHERE date(dtm) = date(now())  GROUP BY jenis')->result();
        
            foreach ($kordinasi as $v) {
                if ($v->jenis == 'Perijinan') {
                    array_push($perijinan,$v->total);
                }
                if ($v->jenis == 'Pemberitahuan') {
                    array_push($pemberitahuan,$v->total);
                }
                if ($v->jenis == 'Info Kegiatan') {
                    array_push($info_kegiatan,$v->total);
                }
                if ($v->jenis == 'Permohonan Pengawalan') {
                    array_push($permohonan_pengawalan,$v->total);
                }
            
                array_push($date,tgl_indo($v->tgl));
            }
    
            $series =  [
                'data' => [
                [
                    "name" => 'Perijinan',
                    "type" => 'bar',
                    "data" => $perijinan
                ], 
                [
                    "name" => 'Pemberitahuan',
                    "type" => 'bar',
                    "data" => $pemberitahuan
                ], 
                [
                    "name" => 'Info Kegiatan',
                    "type" => 'bar',
                    "data" => $info_kegiatan
                ],
                [
                    "name" => 'Permohonan Pengawalan',
                    "type" => 'bar',
                    "data" => $permohonan_pengawalan
                ]],
                'date' => $date
            ];
        }else{
        
        $kordinasi =$this->db->query('SELECT tgl,jenis,count(*) as total FROM `tmc_koordinasi` GROUP BY date(tgl), jenis')->result();
        $kordinasi_date =$this->db->query('SELECT tgl,jenis,count(*) as total FROM `tmc_koordinasi` GROUP BY date(tgl)')->result();
        
        foreach ($kordinasi as $v) {
            if ($v->tgl >= $start && $v->tgl <= $end) {
                if ($v->jenis == 'Perijinan') {
                    array_push($perijinan,$v->total);
                }
                if ($v->jenis == 'Pemberitahuan') {
                    array_push($pemberitahuan,$v->total);
                }
                if ($v->jenis == 'Info Kegiatan') {
                    array_push($info_kegiatan,$v->total);
                }
                if ($v->jenis == 'Permohonan Pengawalan') {
                    array_push($permohonan_pengawalan,$v->total);
                }
            }     
        
        }

        foreach ($kordinasi_date as $de) {
            if ($de->tgl >= $start && $de->tgl <= $end) {
                array_push($date,tgl_indo($de->tgl));  
            }    
        }

        $series =  [
            'data' => [
            [
                "name" => 'Perijinan',
                "type" => 'bar',
                "data" => $perijinan
            ], 
            [
                "name" => 'Pemberitahuan',
                "type" => 'bar',
                "data" => $pemberitahuan
            ], 
            [
                "name" => 'Info Kegiatan',
                "type" => 'bar',
                "data" => $info_kegiatan
            ],
            [
                "name" => 'Permohonan Pengawalan',
                "type" => 'bar',
                "data" => $permohonan_pengawalan
            ]],
            'date' => $date
        ];

        }

        echo json_encode($series);
    }

    public function bar_tmc_prasarana_giat_ori()
    {
        $a1=[];
        $a2=[];
        $a3=[];
        $a4=[];
        $a5=[];
        $a6=[];
        $a7=[];
        $a8=[];
        $a9=[];
        $date = [];
    
        $prasarana =$this->db->query('SELECT tgl,prasarana,count(*) as total FROM tmc_prasarana_publik WHERE date(dtm) = date(now())  GROUP BY prasarana')->result();
        foreach ($prasarana as $v) {
            if ($v->prasarana == 'Terminal') {
                array_push($a1,$v->total);
            }
            if ($v->prasarana == 'Pelabuhan') {
                array_push($a2,$v->total);
            }
            if ($v->prasarana == 'Bandara') {
                array_push($a3,$v->total);
            }
            if ($v->prasarana == 'Stasiun') {
                array_push($a4,$v->total);
            }
            if ($v->prasarana == 'Tempat Wisata') {
                array_push($a5,$v->total);
            }
            if ($v->prasarana == 'Gerbang Tol') {
                array_push($a6,$v->total);
            }
            if ($v->prasarana == 'Gedung') {
                array_push($a7,$v->total);
            }
            if ($v->prasarana == 'Pusat Perbelanjaan') {
                array_push($a8,$v->total);
            }
            if ($v->prasarana == 'Sarana Olahraga') {
                array_push($a9,$v->total);
            }
        
            array_push($date,tgl_indo($v->tgl));
        }

        $series =  [
            'data' => [
            [
                "name" => 'Terminal',
                "type" => 'bar',
                "data" => $a1
            ], 
            [
                "name" => 'Pelabuhan',
                "type" => 'bar',
                "data" => $a2
            ], 
            [
                "name" => 'Bandara',
                "type" => 'bar',
                "data" => $a3
            ],
            [
                "name" => 'Stasiun',
                "type" => 'bar',
                "data" => $a4
            ],
            [
                "name" => 'Tempat Wisata',
                "type" => 'bar',
                "data" => $a5
            ],
            [
                "name" => 'Gerbang Tol',
                "type" => 'bar',
                "data" => $a6
            ],
            [
                "name" => 'Gedung',
                "type" => 'bar',
                "data" => $a7
            ],
            [
                "name" => 'Pusat Perbelanjaan',
                "type" => 'bar',
                "data" => $a8
            ],
            [
                "name" => 'Sarana Olahraga',
                "type" => 'bar',
                "data" => $a9
            ]],
            'date' => $date
        ];
        
        echo json_encode($series);
    }

    public function bar_tmc_prasarana_p_datang()
    {
        $start =$this->input->post('start');
        $end =$this->input->post('end');
        $terminal=[];
        $pelabuhan=[];
        $bandara=[];
        $stasiun=[];
        $date = [];

        if ($start == "") {
            $penumpang =$this->db->query('SELECT tgl,prasarana,sum(p_datang) as total FROM tmc_prasarana_publik where p_datang > 0 and date(dtm) = date(now()) GROUP by tgl, prasarana')->result();
            $penumpang_date =$this->db->query('SELECT tgl,prasarana,sum(p_datang) as total FROM tmc_prasarana_publik where p_datang > 0 and date(dtm) = date(now()) GROUP by tgl')->result();
            foreach ($penumpang as $v) {
                        if ($v->prasarana == 'Terminal') {
                            array_push($terminal,$v->total);
                        }
                        if ($v->prasarana == 'Pelabuhan') {
                            array_push($pelabuhan,$v->total);
                        }
                        if ($v->prasarana == 'Bandara') {
                            array_push($bandara,$v->total);
                        }
                        if ($v->prasarana == 'Stasiun') {
                            array_push($stasiun,$v->total);
                        }   
            }
            foreach ($penumpang_date as $de) {
                    array_push($date,tgl_indo($de->tgl));      
            }
    
            $series =  [
                'data' => [
                [
                    "name" => 'Terminal',
                    "type" => 'bar',
                    "data" => $terminal
                ], 
                [
                    "name" => 'Pelabuhan',
                    "type" => 'bar',
                    "data" => $pelabuhan
                ], 
                [
                    "name" => 'Bandara',
                    "type" => 'bar',
                    "data" => $bandara
                ],
                [
                    "name" => 'Stasiun',
                    "type" => 'bar',
                    "data" => $stasiun
                ]],
                'date' => $date
            ];

        }else{
            $penumpang =$this->db->query('SELECT tgl,prasarana,sum(p_datang) as total FROM tmc_prasarana_publik where p_datang > 0 GROUP by tgl, prasarana')->result();
            $penumpang_date =$this->db->query('SELECT tgl,prasarana,sum(p_datang) as total FROM tmc_prasarana_publik where p_datang > 0 GROUP by tgl')->result();
            foreach ($penumpang as $v) {
                    if ($v->tgl >= $start && $v->tgl <= $end) {
                        if ($v->prasarana == 'Terminal') {
                            array_push($terminal,$v->total);
                        }
                        if ($v->prasarana == 'Pelabuhan') {
                            array_push($pelabuhan,$v->total);
                        }
                        if ($v->prasarana == 'Bandara') {
                            array_push($bandara,$v->total);
                        }
                        if ($v->prasarana == 'Stasiun') {
                            array_push($stasiun,$v->total);
                        }  
                        
                    }  
            }
            foreach ($penumpang_date as $de) {
                if ($de->tgl >= $start && $de->tgl <= $end) {
                    array_push($date,tgl_indo($de->tgl));  
                }    
            }
    
            $series =  [
                'data' => [
                [
                    "name" => 'Terminal',
                    "type" => 'bar',
                    "data" => $terminal
                ], 
                [
                    "name" => 'Pelabuhan',
                    "type" => 'bar',
                    "data" => $pelabuhan
                ], 
                [
                    "name" => 'Bandara',
                    "type" => 'bar',
                    "data" => $bandara
                ],
                [
                    "name" => 'Stasiun',
                    "type" => 'bar',
                    "data" => $stasiun
                ]],
                'date' => $date
            ];
            
        }
        
        echo json_encode($series);
    }

    public function bar_tmc_prasarana_p_berangkat()
    {
        $start =$this->input->post('start');
        $end =$this->input->post('end');
        $terminal=[];
        $pelabuhan=[];
        $bandara=[];
        $stasiun=[];
        $date = [];

        if ($start == "") {
            $penumpang =$this->db->query('SELECT tgl,prasarana,sum(p_berangkat) as total FROM tmc_prasarana_publik where p_berangkat > 0 and date(dtm) = date(now()) GROUP by tgl, prasarana')->result();
            $penumpang_date =$this->db->query('SELECT tgl,prasarana,sum(p_berangkat) as total FROM tmc_prasarana_publik where p_berangkat > 0 and date(dtm) = date(now())  GROUP by tgl')->result();
            foreach ($penumpang as $v) {
                    
                        if ($v->prasarana == 'Terminal') {
                            array_push($terminal,$v->total);
                        }
                        if ($v->prasarana == 'Pelabuhan') {
                            array_push($pelabuhan,$v->total);
                        }
                        if ($v->prasarana == 'Bandara') {
                            array_push($bandara,$v->total);
                        }
                        if ($v->prasarana == 'Stasiun') {
                            array_push($stasiun,$v->total);
                        }  
                        
            }
            foreach ($penumpang_date as $de) {
                
                    array_push($date,tgl_indo($de->tgl));   
            }
    
            $series =  [
                'data' => [
                [
                    "name" => 'Terminal',
                    "type" => 'bar',
                    "data" => $terminal
                ], 
                [
                    "name" => 'Pelabuhan',
                    "type" => 'bar',
                    "data" => $pelabuhan
                ], 
                [
                    "name" => 'Bandara',
                    "type" => 'bar',
                    "data" => $bandara
                ],
                [
                    "name" => 'Stasiun',
                    "type" => 'bar',
                    "data" => $stasiun
                ]],
                'date' => $date
            ];
        }else{
            $penumpang =$this->db->query('SELECT tgl,prasarana,sum(p_berangkat) as total FROM tmc_prasarana_publik where p_berangkat > 0 GROUP by tgl, prasarana')->result();
            $penumpang_date =$this->db->query('SELECT tgl,prasarana,sum(p_berangkat) as total FROM tmc_prasarana_publik where p_berangkat > 0 GROUP by tgl')->result();
            foreach ($penumpang as $v) {
                    if ($v->tgl >= $start && $v->tgl <= $end) {
                        if ($v->prasarana == 'Terminal') {
                            array_push($terminal,$v->total);
                        }
                        if ($v->prasarana == 'Pelabuhan') {
                            array_push($pelabuhan,$v->total);
                        }
                        if ($v->prasarana == 'Bandara') {
                            array_push($bandara,$v->total);
                        }
                        if ($v->prasarana == 'Stasiun') {
                            array_push($stasiun,$v->total);
                        }  
                        
                    }  
            }
            foreach ($penumpang_date as $de) {
                if ($de->tgl >= $start && $de->tgl <= $end) {
                    array_push($date,tgl_indo($de->tgl));  
                }    
            }
    
            $series =  [
                'data' => [
                [
                    "name" => 'Terminal',
                    "type" => 'bar',
                    "data" => $terminal
                ], 
                [
                    "name" => 'Pelabuhan',
                    "type" => 'bar',
                    "data" => $pelabuhan
                ], 
                [
                    "name" => 'Bandara',
                    "type" => 'bar',
                    "data" => $bandara
                ],
                [
                    "name" => 'Stasiun',
                    "type" => 'bar',
                    "data" => $stasiun
                ]],
                'date' => $date
            ];

        }

        
        echo json_encode($series);
    }

    public function bar_tmc_prasarana_pengunjung()
    {
        $start =$this->input->post('start');
        $end =$this->input->post('end');
        $tempat_wisata=[];
        $gedung=[];
        $pusat_perbelanjaan=[];
        $sarana_olahraga=[];
        $date = [];
        if ($start == "") {
            $pengunjung =$this->db->query('SELECT tgl,prasarana,sum(pengunjung) as total FROM tmc_prasarana_publik where pengunjung > 0  and date(dtm) = date(now())  GROUP by tgl, prasarana')->result();
            $pengunjung_date =$this->db->query('SELECT tgl,prasarana,sum(pengunjung) as total FROM tmc_prasarana_publik where pengunjung > 0 and date(dtm) = date(now()) GROUP by tgl')->result();
            foreach ($pengunjung as $v) {
                        if ($v->prasarana == 'Tempat Wisata') {
                            array_push($tempat_wisata,$v->total);
                        }
                        if ($v->prasarana == 'Gedung') {
                            array_push($gedung,$v->total);
                        }
                        if ($v->prasarana == 'Pusat Perbelanjaan') {
                            array_push($pusat_perbelanjaan,$v->total);
                        }
                        if ($v->prasarana == 'Sarana Olahraga') {
                            array_push($sarana_olahraga,$v->total);
                        }                  
            }
            foreach ($pengunjung_date as $de) {
                    array_push($date,tgl_indo($de->tgl));  
                
            }
    
            $series =  [
                'data' => [
                [
                    "name" => 'Tempat Wisata',
                    "type" => 'bar',
                    "data" => $tempat_wisata
                ], 
                [
                    "name" => 'Gedung',
                    "type" => 'bar',
                    "data" => $gedung
                ], 
                [
                    "name" => 'Pusat Perbelanjaan',
                    "type" => 'bar',
                    "data" => $pusat_perbelanjaan
                ],
                [
                    "name" => 'Sarana Olahraga',
                    "type" => 'bar',
                    "data" => $sarana_olahraga
                ]],
                'date' => $date
            ];
        }else{
            $pengunjung =$this->db->query('SELECT tgl,prasarana,sum(pengunjung) as total FROM tmc_prasarana_publik where pengunjung > 0 GROUP by tgl, prasarana')->result();
            $pengunjung_date =$this->db->query('SELECT tgl,prasarana,sum(pengunjung) as total FROM tmc_prasarana_publik where pengunjung > 0 GROUP by tgl')->result();
            foreach ($pengunjung as $v) {
                    if ($v->tgl >= $start && $v->tgl <= $end) {
                        if ($v->prasarana == 'Tempat Wisata') {
                            array_push($tempat_wisata,$v->total);
                        }
                        if ($v->prasarana == 'Gedung') {
                            array_push($gedung,$v->total);
                        }
                        if ($v->prasarana == 'Pusat Perbelanjaan') {
                            array_push($pusat_perbelanjaan,$v->total);
                        }
                        if ($v->prasarana == 'Sarana Olahraga') {
                            array_push($sarana_olahraga,$v->total);
                        }  
                        
                    }  
            }
            foreach ($pengunjung_date as $de) {
                if ($de->tgl >= $start && $de->tgl <= $end) {
                    array_push($date,tgl_indo($de->tgl));  
                }    
            }
    
            $series =  [
                'data' => [
                [
                    "name" => 'Tempat Wisata',
                    "type" => 'bar',
                    "data" => $tempat_wisata
                ], 
                [
                    "name" => 'Gedung',
                    "type" => 'bar',
                    "data" => $gedung
                ], 
                [
                    "name" => 'Pusat Perbelanjaan',
                    "type" => 'bar',
                    "data" => $pusat_perbelanjaan
                ],
                [
                    "name" => 'Sarana Olahraga',
                    "type" => 'bar',
                    "data" => $sarana_olahraga
                ]],
                'date' => $date
            ];

        }
    

        
        echo json_encode($series);
    }

    public function bar_tmc_prasarana_media()
    {
        $perijinan = [];
        $pemberitahuan = [];
        $info_kegiatan = [];
        $permohonan_pengawalan = [];
        $date = [];

    
        $kordinasi =$this->db->query('SELECT tgl,jenis,count(*) as total FROM `tmc_koordinasi` WHERE date(dtm) = date(now())  GROUP BY jenis')->result();
        
        foreach ($kordinasi as $v) {
            if ($v->jenis == 'Perijinan') {
                array_push($perijinan,$v->total);
            }
            if ($v->jenis == 'Pemberitahuan') {
                array_push($pemberitahuan,$v->total);
            }
            if ($v->jenis == 'Info Kegiatan') {
                array_push($info_kegiatan,$v->total);
            }
            if ($v->jenis == 'Permohonan Pengawalan') {
                array_push($permohonan_pengawalan,$v->total);
            }
        
            array_push($date,tgl_indo($v->tgl));
        }

        $series =  [
            'data' => [
            [
                "name" => 'Perijinan',
                "type" => 'bar',
                "data" => $perijinan
            ], 
            [
                "name" => 'Pemberitahuan',
                "type" => 'bar',
                "data" => $pemberitahuan
            ], 
            [
                "name" => 'Info Kegiatan',
                "type" => 'bar',
                "data" => $info_kegiatan
            ],
            [
                "name" => 'Permohonan Pengawalan',
                "type" => 'bar',
                "data" => $permohonan_pengawalan
            ]],
            'date' => $date
        ];
        
        echo json_encode($series);
    }

    public function bar_cybercops_user_polda()
    {

        $data = [];
        // $date = [];
        // $this->tmc->see = 'dtm,status,count(*) as total ';
        // $eri = $this->eri->get('','date(dtm) >= date("2020-12-28") && date(dtm) <= date("2020-12-30")','date(dtm)')->result();
        // $tmc_lalin = $this->tmc->get('','','','status')->result();
        $polda = $this->db->get('polda')->result();

        $user_polda = $this->db->query('SELECT b.da_nam as polda,COUNT(*) as jumlah FROM persons as a inner join polda as b on b.da_id=a.polda  inner JOIN polres as c on c.res_id=a.polres GROUP BY a.polda order by b.da_nam asc')->result();
            foreach ($user_polda as $key) {
                   foreach ($polda as $p) {
                      if ($key->polda == $p->da_nam) {
                           $a = [
                               'name'=> $key->polda,
                               'type'=> 'bar',
                               'data'=> [(int)$key->jumlah]
                           ];

                      }
                   }

                   array_push($data,$a);

            }

            $series =  [
                'data' => $data,
                'date' => ['polda']
            ];
            
            echo json_encode($series);
       
    }

    public function bar_cybercops_user_polres()
    {

        $data = [];
        // $date = [];
        // $this->tmc->see = 'dtm,status,count(*) as total ';
        // $eri = $this->eri->get('','date(dtm) >= date("2020-12-28") && date(dtm) <= date("2020-12-30")','date(dtm)')->result();
        // $tmc_lalin = $this->tmc->get('','','','status')->result();
        $polres = $this->db->get('polres')->result();

        $user_polres = $this->db->query('SELECT c.res_nam as polres,COUNT(*) as jumlah FROM persons as a inner join polda as b on b.da_id=a.polda inner JOIN polres as c on c.res_id=a.polres GROUP BY c.res_nam order by c.res_nam asc')->result();
            foreach ($user_polres as $key) {
                   foreach ($polres as $p) {
                      if ($key->polres == $p->res_nam) {
                           $a = [
                               'name'=> $key->polres,
                               'type'=> 'bar',
                               'data'=> [(int)$key->jumlah]
                           ];

                      }
                   }

                   array_push($data,$a);

            }

            $series =  [
                'data' => $data,
                'date' => ['Polres']
            ];
            
            echo json_encode($series);
       
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

    public function dt_tmc_info_lalin()
    {

        echo $this->tmc->dt_tmc_info_lalin();
    }

    public function dt_tmc_interaksi()
    {
        echo $this->tmc->dt_tmc_interaksi();
    }

    public function dt_tmc_publikasi()
    {
        echo $this->tmc->dt_tmc_publikasi();
    }

    public function dt_tmc_kordinasi()
    {
        echo $this->tmc->dt_tmc_kordinasi();
    }

    public function dt_tmc_prasarana()
    {
        echo $this->tmc->dt_tmc_prasarana();
    }


    // cybercops
    public function dt_user_cybercops()
    {
        echo $this->cyb->dt_user_cybercops();
    }
    // end cybercops

    function get_polres(){
        $t = $this->input->post('id',TRUE);
        $data = $this->dares->get_polres($t)->result();
        echo json_encode($data);
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

    public function jml_data_tmc($start='',$end='',$polda='',$polres='')
    {
    
        $start =$this->input->post('start');
        $end =$this->input->post('end');
        $polda =$this->input->post('polda');
        $polres =$this->input->post('polres');
        $info_lalin = 0;
        $interaksi = 0;
        $publikasi = 0;
        $kordinasi = 0;
        $prasarana_public = 0;
        $info_lalin = $this->tmc->tmc_info_lalin($start,$end,$polda,$polres);
        $interaksi = $this->tmc->tmc_interaksi($start,$end,$polda,$polres);
        $publikasi = $this->tmc->tmc_publikasi($start,$end,$polda,$polres);
        $kordinasi = $this->tmc->tmc_koordinasi($start,$end,$polda,$polres);
        $prasarana_public = $this->tmc->tmc_prasarana_publik($start,$end,$polda,$polres);

        $series =  [$info_lalin,$interaksi,$publikasi,$kordinasi,$prasarana_public];
        echo json_encode($series);
    }

    public function jml_data_etle($start='',$end='',$polda='',$polres='')
    {
    
        $start =$this->input->post('start');
        $end =$this->input->post('end');
        $polda =$this->input->post('polda');
        $polres =$this->input->post('polres');
        $total= 0;
        $tervalidasi = 0;
        $terberkas = 0;
        $terkirim = 0;
        $terkonfirmasi = 0;
        $terbayar = 0;
        $blokir = 0;
        $polda1 = "Seluruh Indonesia";
        $polda2 = "Seluruh Indonesia";
        $polda3 = "Seluruh Indonesia";
        $polda4 = "Seluruh Indonesia";
        $polda5 = "Seluruh Indonesia";
        $polda6 = "Seluruh Indonesia";
        $polda7 = "Seluruh Indonesia";

        $polres1 = "";
        $polres2 = "";
        $polres3 = "";
        $polres4 = "";
        $polres5 = "";
        $polres6 = "";
        $polres7 = "";

        $data = $this->etle->jml_data_etle($start,$end,$polda,$polres);
        foreach ($data as $key) {

            if ($key->total != "") {
                $total = $key->total;
                $tervalidasi = $key->tervalidasi;
                $terberkas = $key->terberkas;
                $terkirim = $key->terkirim;
                $terkonfirmasi = $key->terkonfirmasi;
                $terbayar = $key->terbayar;
                $blokir = $key->blokir;
            }
            if ($polda != "") {
                $polda1 = "polda ".$this->etle->cek_polda($polda);
                $polda2 = "polda ".$this->etle->cek_polda($polda);
                $polda3 = "polda ".$this->etle->cek_polda($polda);
                $polda4 = "polda ".$this->etle->cek_polda($polda);
                $polda5 = "polda ".$this->etle->cek_polda($polda);
                $polda6 = "polda ".$this->etle->cek_polda($polda);
                $polda7 = "polda ".$this->etle->cek_polda($polda);
            }
            if ($polres != "") {
                $polres1 = "polres ".$this->etle->cek_polres($polres);
                $polres2 = "polres ".$this->etle->cek_polres($polres);
                $polres3 = "polres ".$this->etle->cek_polres($polres);
                $polres4 = "polres ".$this->etle->cek_polres($polres);
                $polres5 = "polres ".$this->etle->cek_polres($polres);
                $polres6 = "polres ".$this->etle->cek_polres($polres);
                $polres7 = "polres ".$this->etle->cek_polres($polres);
            }

                       
            
        }
        $series =  [$total,$tervalidasi,$terberkas,$terkirim,$terkonfirmasi,$terbayar,$blokir,$polda1,$polda2,$polda3,$polda4,$polda5,$polda6,$polda7,$polres1,$polres2,$polres3,$polres4,$polres5,$polres6,$polres7];
        echo json_encode($series);
    }

    // AIS

    public function tabel_penyebab_kecelakaan()
    {
        $tahun = $this->ais->get_tahun_kec();
        $nama = [
            'Jumlah Kejadian',
            'Korban MD',
            'Korban LB',
            'Korban LR',
        ];
        $data = [
            $this->ais->get_nama_kec('jml'),
            $this->ais->get_nama_kec('md'),
            $this->ais->get_nama_kec('lb'),
            $this->ais->get_nama_kec('lr'),
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
            'data' => $this->ais->get_nama_kec('jml')
        ], 
        [
            'name' => 'Korban MD',
            'type' => 'bar',
            'data' => $this->ais->get_nama_kec('md')
        ], 
        [
            'name' => 'Korban LB',
            'type' => 'bar',
            'data' => $this->ais->get_nama_kec('lb')
        ],
        [
            'name' => 'Korban LR',
            'type' => 'bar',
            'data' => $this->ais->get_nama_kec('lr')
        ]];

        $data = [
            'data' => $rsp,
            'tahun' => $this->ais->get_tahun_kec()
        ];

        echo json_encode($data);
    }

    // Statistik CFR
    public function grafik_cfr()
    {
        $tahun = $this->ais->get_tahun_kec();
        $real = $this->ais->get_cfr();
        $target = [12.4,11.4];
        $rsp = [
            'tahun' => $tahun,
            'data' => [
                'real' => $real,
                'target' => $target
            ]
        ];

        echo json_encode($rsp);
    }

    // Statistik Trend Data

    public function grafik_trend_data()
    {
        $data = [];
        // Definis inputan
        $data_pembanding = $this->input->post('f_data_pembanding');
        $kategori_ranmor = $this->input->post('f_kategori_ranmor');
        $polda = $this->input->post('f_polda');
        $polres = $this->input->post('f_polres');

        $kondisi = [
            "titik_macet" => 
            [
                "label" => "Titik Macet",
                "fill" => false,
                "lineTension" => 0.1,
                "backgroundColor" => "rgb(255 255 255 / 0%)",
                "borderColor" => "#ba5452", // The main line color
                "borderCapStyle" => 'square',
                "borderDash" => [], // try [5, 15] for instance
                "borderDashOffset" => 0.0,
                "borderJoinStyle" => 'miter',
                "pointBorderColor" => "black",
                "pointBackgroundColor" => "white",
                "pointBorderWidth" => 1,
                "pointHoverRadius" => 8,
                "pointHoverBackgroundColor" => "yellow",
                "pointHoverBorderColor" => "brown",
                "pointHoverBorderWidth" => 2,
                "pointRadius" => 4,
                "pointHitRadius" => 10,
                // notice the gap in the data and the "spanGaps" => true
                "data" => $this->get_tmc_jml_bulan('','',$polda,$polres),
                "spanGaps" => true,
            ],
            "jumlah_ranmor" => 
            [
                "label" => "Jumlah Ranmor",
                "fill" => false,
                "lineTension" => 0.1,
                "backgroundColor" => "rgb(255 255 255 / 0%)",
                "borderColor" => "#617ea0", // The main line color
                "borderCapStyle" => 'square',
                "borderDash" => [], // try [5, 15] for instance
                "borderDashOffset" => 0.0,
                "borderJoinStyle" => 'miter',
                "pointBorderColor" => "black",
                "pointBackgroundColor" => "white",
                "pointBorderWidth" => 1,
                "pointHoverRadius" => 8,
                "pointHoverBackgroundColor" => "yellow",
                "pointHoverBorderColor" => "brown",
                "pointHoverBorderWidth" => 2,
                "pointRadius" => 4,
                "pointHitRadius" => 10,
                // notice the gap in the data and the "spanGaps" => true
                "data" => $this->get_eri_jml_bulan('',$kategori_ranmor,$polda,$polres),
                "spanGaps" => true,
            ],
            "jumlah_laka" => 
            [
                "label" => "Jumlah Laka",
                "fill" => false,
                "lineTension" => 0.1,
                "backgroundColor" => "rgb(255 255 255 / 0%)",
                "borderColor" => "#ec9858", // The main line color
                "borderCapStyle" => 'square',
                "borderDash" => [], // try [5, 15] for instance
                "borderDashOffset" => 0.0,
                "borderJoinStyle" => 'miter',
                "pointBorderColor" => "black",
                "pointBackgroundColor" => "white",
                "pointBorderWidth" => 1,
                "pointHoverRadius" => 8,
                "pointHoverBackgroundColor" => "yellow",
                "pointHoverBorderColor" => "brown",
                "pointHoverBorderWidth" => 2,
                "pointRadius" => 4,
                "pointHitRadius" => 10,
                // notice the gap in the data and the "spanGaps" => true
                "data" => $this->get_ais_jml_bulan('',$polda,$polres),
                "spanGaps" => true,
            ],
        ];
    
       
        
        if(!empty($data_pembanding)){
            foreach ($data_pembanding as $v) {
                $data[] = $kondisi[$v];
            }
        }else{
            $data[] = $kondisi['titik_macet'];
            $data[] = $kondisi['jumlah_ranmor'];
            $data[] = $kondisi['jumlah_laka'];
        }

        $rsp = [
            'data' => $data
        ];

        echo json_encode($rsp);
    }

    private function get_tmc_jml_bulan($d='',$status='',$polda="",$polres="")
    {
        for ($i=1; $i <= 12 ; $i++) { 
            $bulan[$i] = 0;
        }

        if($d == '') $d = date('Y-m-d');
        if($status == '') $status = "Macet";
        $q = $this->tmc->get_jml_bulan($d,$status,$polda,$polres);
        foreach ($q->result() as $v) {
            @$bulan[(int)$v->bulan] = (int) $v->jml;
        }
        return array_values($bulan);
    }

    private function get_eri_jml_bulan($d='',$kategori="",$polda="",$polres="")
    {
        for ($i=1; $i <= 12 ; $i++) { 
            $bulan[$i] = 0;
        }

        if($d == '') $d = date('Y-m-d');
        $q = $this->eri->get_jml_bulan($d,$kategori="",$polda,$polres);
        foreach ($q->result() as $v) {
            @$bulan[(int)$v->bulan] = (int) $v->jml;
        }

        return array_values($bulan);
    }

    private function get_ais_jml_bulan($d='',$polda="",$polres="")
    {
        for ($i=1; $i <= 12 ; $i++) { 
            $bulan[$i] = 0;
        }

        if($d == '') $d = date('Y-m-d');
        $q = $this->ais->get_jml_bulan($d,$polda,$polres);
        foreach ($q->result() as $v) {
            @$bulan[(int)$v->bulan] = (int) $v->jml;
        }

        return array_values($bulan);
    }

    public function td_kateg_ranmor()
    {
        $ranmor = [
            'pnp' => "Mobil PNP",
            'bus' => "Bus",
            'brg' => "Mobil Barang",
            'motor' => "Motor",
            "khusus" => "Kend. Khusus"
        ];
        
        echo json_encode($ranmor);
    }

     // Statistik Fatality Index
     public function grafik_fi()
     {
         $penduduk = $this->input->post('penduduk');
         if (!$penduduk) $penduduk = 100000;
         $tahun = $this->ais->get_tahun_kec();
         $real = $this->ais->get_fi($penduduk);
         $rsp = [
             'tahun' => $tahun,
             'data' => [
                 'real' => $real,
                 'penduduk' => 'Fatalitiy Index '.$penduduk.' Populasi'
             ]
         ];
 
         echo json_encode($rsp);
     }

     public function grafik_bar_fi()
     {
         $hasil = [];
         $provinsi = [];
         $tahun = '2016';
         $q = $this->mdp->get_data_pend($tahun);
         foreach ($q->result() as $t) {
                // if ($t->da == '31') {
                //  echo $t->jml.'<br>';
                //  $md = $this->ais->get_ais_jml_md($tahun,$t->da);
                //  echo round((($md/$t->jml)*100),2);
                // }
                $md = $this->ais->get_ais_jml_md($tahun,$t->da);
                $c = 0;
                if($t->jml != 0){
                     $c = round((($md/$t->jml)*100),3);
                }
                array_push($hasil,$c);
                array_push($provinsi,$t->provinsi);
         }
 
         $rsp = [
             'data' => [
                 'label' => $provinsi,
                 'jml' => $hasil
             ]
         ];

         echo json_encode($rsp);
     }

    //  public function polda($provinsi)
    //  {
    //     $this->db->like('p.da_nam',$provinsi);
    //     $x = $this->db->get('polda p')->row();
    //     return $x;
    //  }

    //  public function cek()
    //  {
    //     $q = $this->mdp->get_data_pend();
    //     foreach ($q->result() as $v) {
    //         $x = $this->polda($v->provinsi);
    //         $this->db->update('data_penduduk', ['da' => @$x->da_id],['provinsi_id' => $v->provinsi_id]);
    //         $c[] = $x;
    //         $c[] = $v;
    //     }

    //     echo json_encode($c);
    //  }
    
}