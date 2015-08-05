
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class creceipt extends CI_Controller 
{
	public function index()
	{
		$this->chkloginuser();
		$this->load->view('vreceipt');
	}
	
	public function lookupReceipt()
	{
		$this->chkloginuser();
		$numberofrecords=10;
		/*$this->load->model('mlogin');
		$Cnt=$this->mlogin->getTableCount('receipt_master');
		echo "cnt..".$Cnt; die();*/
		$this->load->model('mreceipt');
		$pendingReceiptsCnt=$this->mreceipt->getReceiptsCnt('Pending');
		$approvedReceiptsCnt=$this->mreceipt->getReceiptsCnt('Approved');
		$allReceiptsCnt=$this->mreceipt->getReceiptsCnt('All');
		$viewData=array(
			'numberofrecords'=>$numberofrecords,
			'pendingReceiptsCnt'=>$pendingReceiptsCnt,
			'approvedReceiptsCnt'=>$approvedReceiptsCnt,
			'allReceiptsCnt'=>$allReceiptsCnt,

		);
		$this->load->view('vlookupreceipt',$viewData);
	}
	public function loadReceipt()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$pageno=$this->input->post('pageno');
		$end=$numberofrecords * $pageno;
		$start=$end-$numberofrecords;
		$ctype=$this->input->get('ctype');
		$this->load->model('mreceipt');
		if($ctype=='All')
			$res=$this->mreceipt->loadReceiptAll($start,$numberofrecords);
		else
			$res=$this->mreceipt->loadReceipt($ctype,$start,$numberofrecords);
		echo json_encode($res);
	}
	
	public function getReceipt($id='')
	{
	
		$this->chkloginuser();
		$numberofrecords=15;
		$id=$this->input->get('id');
		$this->load->model('mreceipt');
		$dataReceipt=$this->mreceipt->getReceipt($id);
		//print_r($dataReceipt); die();
		$this->load->model('mcustomer');
		$dataCustomer=$this->mcustomer->getCustomer();
		$this->load->view('vreceipt',array('dataReceipt'=>$dataReceipt,'dataCustomer'=>$dataCustomer));
	}


		public function saveupdate_receipt()
	{
		$this->chkloginuser();
		$arrVal=$this->input->post('receiptData');
		$id=$this->input->post('id');
		//echo $id;die();
		$gridData=$this->input->post('receiptSub');
		//print_r($gridData); die();
		$oper=$this->input->post('oper');//echo $oper;die();
		$this->load->model('mreceipt');
		$res=$this->mreceipt->saveupdate_receipt($oper,$arrVal,$gridData,$id);
		echo json_encode($res);
	}
	/*public function getPendingReceipts()
	{
		$this->chkloginuser();
		$this->load->model("mreceipt");
		//$empid=$this->input->post('id');
		//$type="Pending";
		$Cnt=$this->mreceipt->getPendingReceipts();
		echo $Cnt; 
	}*/
}
?>