<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	
	private $vendor = "Lenna Chat Bot 06-04-2021";
	private $vendor_id = 19;
	
	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		$this->load->model('MTmc','tmc');
		$this->load->model('MDares','dares');
		$this->load->model('MIntan','intan');
    }
    
    public function cybercop()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/cybercop/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/cybercop/dashboard",$data);
			// 404 page 
			// $this->load->view("error/404",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function eri()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/eri/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/eri/dashboard",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function sdc()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/sdc/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/sdc/dashboard",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function ssc()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/ssc/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['polda'] = $this->dares->get_polda()->result();
			$this->template->load("data/ssc/dashboard",$data);

			// 404 page 
			// $this->load->view("error/404",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function ssc2()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/ssc/dashboard2.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['ssc'] = true;
			$this->template->load("data/ssc/dashboard2",$data);

			// 404 page 
			// $this->load->view("error/404",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function detail($id='')
	{
		$this->load->model('MData_analytic','mda');
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/ssc/detail.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/ssc/detail",$data);

			// 404 page 
			// $this->load->view("error/404",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function tmc()
	{
        $user=$this->session->userdata('user_data');
		if ($this->input->get('kode') == md5($this->vendor)) $user = $this->db->get_where('persons',['rowid' => $this->vendor_id])->row_array();
		
        $data['js_local'] = 'data/tmc/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['polda'] = $this->dares->get_polda()->result();
			$this->template->load("data/tmc/dashboard",$data);

			// 404 page 
			// $this->load->view("error/404",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	
	public function intan()
	{
        $user=$this->session->userdata('user_data');
		$data['js_statistik'] = 'simulasi/statistik.js';
        $data['js_local'] = 'data/intan/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$this->template->load("data/intan/dashboard",$data);

			// 404 page 
			// $this->load->view("error/404",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}

	public function dt_ttr_operator()
	{
		echo $this->intan->dt_ttr_operator();
	}

	public function export_data_intan(){
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		$excel = new PHPExcel();
		$excel->getProperties()
					 ->setTitle("Data Intan")
					 ->setSubject("Intan")
					 ->setDescription("Live Data Inteligent Traffic Analytic (INTAN)")
					 ->setKeywords("Data Intan");
		$style_col = array(
		  'font' => array('bold' => true),
		  'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
		  )
		);
		
		$style_row = array(
		  'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
		  )
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "Live Data Inteligent Traffic Analytic (INTAN)");
		$excel->getActiveSheet()->mergeCells('A1:H1');
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Kasus");
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Lokasi");
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Time Call");
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Response Time");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Durasi");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Tanggal");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Status");
		
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		
		$data = $this->intan->get()->result();
		$no = 1;
		$numrow = 4;
		foreach($data as $d){
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $d->kasus);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $d->lokasi);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, date("h:i:s",strtotime($d->time_call)));
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, date("h:i:s",strtotime($d->response_time)));
		  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, secondsToTime($d->durasi));
		  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, tgl_indo($d->ctd_date));
		  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $this->intan->status($d->status));
		  
		  
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		  
		  $no++;
		  $numrow++;
		}
		
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
		
		
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		
		$excel->getActiveSheet(0)->setTitle("DATA INTAN");
		$excel->setActiveSheetIndex(0);
		
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Intan.xlsx"'); 
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	  }

	public function ais()
	{
		$this->load->model('MAis','ais');
		
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/ais/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['md'] = $this->ais->get_jml('md');
			$data['lb'] = $this->ais->get_jml('lb');
			$data['lr'] = $this->ais->get_jml('lr');
			$data['rumat'] = $this->ais->get_jml('rumat');
			$this->template->load("data/ais/dashboard",$data);

			// 404 page 
			// $this->load->view("error/404",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function taa()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/taa/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			// $this->template->load("data/taa/dashboard",$data);

			// 404 page 
			$this->load->view("error/404",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
	public function tarc()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/tarc/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			// $this->template->load("data/tarc/dashboard",$data);

			// 404 page 
			$this->load->view("error/404",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}

	public function etle()
	{
        $user=$this->session->userdata('user_data');
        $data['js_local'] = 'data/etle/dashboard.js';
		if(isset($user)){
			$data['session'] = $user;
			$data['polda'] = $this->dares->get_polda()->result();
			$this->template->load("data/etle/dashboard",$data);
		}else{
			$retval=array("403","Failed","Please login","error");
			$data['retval']= $retval;
			$this->load->view('login',$data);
		}
	}
}