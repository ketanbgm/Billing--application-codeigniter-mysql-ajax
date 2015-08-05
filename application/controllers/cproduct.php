<?php 
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cproduct extends CI_Controller 
{
	public function index()
	{
		$this->chkloginuser();
		$this->load->view('vproduct');
	}
	
	public function save()
	{
		$this->chkloginuser();
		$this->load->model('mproduct');
		$arrProduct=$this->input->post('arrProduct');
		//print_r($arrProduct);die();
		$oper=$this->input->post('oper');
		$id=$this->input->post('id');
		$res=$this->mproduct->saveProduct($arrProduct,$oper,$id);
		echo json_encode($res);
	}
	
	public function lookupProd()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$this->load->model('mlogin');
		$Cnt=$this->mlogin->getTableCount('product_master');
		$this->load->view('vlookupproduct',array('Cnt'=>$Cnt,'numberofrecords'=>$numberofrecords));
	}
	
	public function getProdDetails()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$pageno=$this->input->post('pageno' );
		//echo $pageno;die();
		$end=$numberofrecords * $pageno;
		$start=$end-$numberofrecords;
		//echo $start;die();
		$this->load->model("mproduct");
		$res=$this->mproduct->getProdDetails($start,$numberofrecords);
		echo json_encode($res);
		//echo json_encode($arrretdata);	
		//$this->load->view('vlookupemp', array('arrretdata'=>$arrretdata));
	}
	
	public function cdeleteProd()
	{
		$this->chkloginuser();
		$id = $this->input->post('id');
		$this->load->model('mproduct');
		$res = $this->mproduct->mdeleteProd($id);
		echo json_encode($res);
	}
	
	public function editProd($id='')
	{
		$this->chkloginuser();
		$id = $this->input->get('id');
		$this->load->model('mproduct');
		$arrProduct = $this->mproduct->editProduct($id);
		//print_r($arr);die();
		$this->load->view('vproduct',array('arrProduct'=>$arrProduct));
	}
	
}