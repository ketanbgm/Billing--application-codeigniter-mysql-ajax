<?php 
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class cbill extends CI_Controller 
{
	public function index()
	{
		$this->chkloginuser();
		$this->load->model('mcustomer');
		$this->load->model('mtherapy');
		$this->load->model('mtherapy_sub');
		$this->load->model('mproduct');
		$res1=$this->mproduct->editProduct();
		$res=$this->mcustomer->getCustomer();
		$res2=$this->mtherapy_sub->getTherapy_sub();
		//print_r($res2);die();
		$this->load->view('vbill',array('dataCustomer'=>$res,'arrBill'=>$res2));
	}
	public function get_subther()
	{
		$this->chkloginuser();
		$id=$this->input->post('id');
		$this->load->model('mbill');
		$arrVal=$this->mbill->get_subther($id);
		//print_r($arrVal);die();
		//$this->load->view('vbill',array('arrVal'=>$arrVal));
		echo json_encode($arrVal);
	}
	
	public function get_rate()
	{
		$this->chkloginuser();
		$id=$this->input->post('id');
		$this->load->model('mbill');
		$rate=$this->mbill->get_rate($id);
		//print_r($rate);die();
		//$this->load->view('vbill',array('rate'=>$rate));
		echo json_encode($rate);
	}
	
	public function get_prodrate()
	{
		$this->chkloginuser();
		$id=$this->input->post('id');
		$this->load->model('mbill');
		$prod_rate=$this->mbill->get_prodrate($id);
		//print_r($rate);die();
		//$this->load->view('vbill',array('rate'=>$rate));
		echo json_encode($prod_rate);
	}
	
	public function saveBill()
	{
		//$this->chkloginuser();
		$this->load->model('mbill');
		$dataBill=$this->input->post('dataBill');
		//print_r($dataBill); die();
		$billSub=$this->input->post('billSub');
		//print_r($billSub);die();
		$id=$this->input->post('id');
	//	echo $id;die();
		$oper=$this->input->post('oper');
		$res=$this->mbill->saveBill($dataBill,$billSub,$oper,$id);
		echo json_encode($res);
	}
	
	
	public function lookupBill()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$this->load->model('mlogin');
		$Cnt=$this->mlogin->getTableCount('bill');
		$this->load->view('vlookupbill',array('Cnt'=>$Cnt,'numberofrecords'=>$numberofrecords));//,'Cnt'=>$Cnt,'numberofrecords'=>$numberofrecords));
	}
	
		public function loadBill()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$pageno=$this->input->post('pageno');
		$end=$numberofrecords * $pageno;
		$start=$end-$numberofrecords;
		$this->load->model('mbill');
		$res=$this->mbill->lookupBill($start,$numberofrecords);
		echo json_encode($res);
	}
	
	public function billReport()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$this->load->model('mlogin');
		$Cnt=$this->mlogin->getTableCount('bill');
		$this->load->view('vBillReport',array('Cnt'=>$Cnt,'numberofrecords'=>$numberofrecords));//,'Cnt'=>$Cnt,'numberofrecords'=>$numberofrecords));
	}
	
	public function loadReport()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$pageno=$this->input->post('pageno');
		$end=$numberofrecords * $pageno;
		$start=$end-$numberofrecords;
		$fromdate=$this->input->post('fromdate');
		$todate=$this->input->post('todate');
		echo $fromdate;
		$this->load->model('mbill');
		$res=$this->mbill->lookupReport($start,$numberofrecords,$fromdate,$todate);
		echo json_encode($res);
	}
	
	public function editBill($id='')
	{
		
		$this->chkloginuser();
		$numberofrecords=15;
		$id=$this->input->get('id');
		//echo $id;die();
		$this->load->model('mbill');
		$res=$this->mbill->getBill($id);
		$this->load->model('mtherapy');
		$arrBill=$this->mtherapy->getTherapy($id='');
		//print_r($arrBill);die();
		$this->load->model('mcustomer');
		$dataCustomer=$this->mcustomer->getCustomer();
		$this->load->view('vbill',array('dataBill'=>$res,'dataCustomer'=>$dataCustomer,'arrBill'=>$arrBill));
		/*
		$this->chkloginuser();
		$numberofrecords=15;
		$id=$this->input->get('id');
		$this->load->model('mbill');
		$res=$this->mbill->getBill($id);
		$this->load->model('mcustomer');
		$dataCustomer=$this->mcustomer->getCustomer();
		$this->load->model('mtherapy_sub');
		$arrBill=$this->mtherapy_sub->getTherapy_sub();
		$this->load->view('vbill',array('dataBill'=>$res,'dataCustomer'=>$dataCustomer,'arrBill'=>$arrBill));*/
	}
	public function deleteBill($id='')
	{
		$this->chkloginuser();
		$id=$this->input->post('id');
		$this->load->model('mbill');
		$res=$this->mbill->deleteBill($id);
		echo json_encode($res);
	}
	
	public function getBillPrint($id='')
	{
		require_once(APPPATH.'libraries/Numbertowords.php');
		$this->chkloginuser();
		$id=$this->input->get('id');
		//echo $id;die();
		$this->load->model('mbill');
		$res=$this->mbill->getBill($id);
		$res1=$this->mbill->getcus($id);
		//print_r($res1);die();
		//$this->load->view('vbillPrint',array('res'=>$res));
		$html=$this->load->view('vbillPrint',array('dataBill'=>$res,'dataCustomer'=>$res1),true);
		require_once(APPPATH.'third_party/html2pdf.class.php');
		//$app=APPPATH;
		//echo($app);die();
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'fr');
			$html2pdf->writeHTML($html, isset($_GET['vuehtml']));
			$pagecnt = $html2pdf->getPageCount();
			$html=$this->load->view('vbillPrint',array('dataBill'=>$res,'dataCustomer'=>$res1,'enclose'=>true,'pagecnt'=>$pagecnt),true);
			$html2pdf1 = new HTML2PDF('P', 'A4', 'fr');
			//$html2pdf1 = $this->addTTFfont('\\DDP-IT-07\xampp\htdocs\kannadamma\application\helpers\mpdf\ttfonts', 'TrueTypeUnicode', '', 32);
			//$html2pdf1->setDefaultFont("dejavusans");
			$html2pdf1->setDefaultFont("dejavusans");
			$html2pdf1->writeHTML($html, isset($_GET['vuehtml']));
			//$html2pdf1->setDefaultFont("dejavusans");
			//$html2pdf1->setDefaultFont("dejavusans");
			$html2pdf1->Output('gc.pdf');// generates pdf  
		}
		catch(HTML2PDF_exception $e) {
		echo $e;
		exit;
		}

	}
}
?>