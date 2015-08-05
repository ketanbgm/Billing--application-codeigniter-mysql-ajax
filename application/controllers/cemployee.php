<?php 
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cemployee extends CI_Controller 
{
	public function index()
	{
		$this->chkloginuser();
		$this->load->view('vemployee');
	}
	
	public function save()
	{
		$this->chkloginuser();
		$arr=$this->input->post('arr');
		$oper=$this->input->post('oper');
		$id=$this->input->post('id');
		//echo $oper;die();
		//print_r($arr); die();
		$this->load->model('memployee');
		$res=$this->memployee->saveEmp($arr,$oper,$id);
		echo json_encode($res);
	}
	
	public function lookupEmp()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$this->load->model('mlogin');
		$Cnt=$this->mlogin->getTableCount('emp_master');
		$this->load->view('vlookupemp',array('Cnt'=>$Cnt,'numberofrecords'=>$numberofrecords));
	}
	
	public function loadEmployee()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$pageno=$this->input->post('pageno');
		//echo $pageno;die();
		$end=$numberofrecords * $pageno;
		$start=$end-$numberofrecords;
		//echo $start;die();
		$this->load->model("memployee");
		$res=$this->memployee->loadEmployee($start,$numberofrecords);
		echo json_encode($res);
		//echo json_encode($arrretdata);	
		//$this->load->view('vlookupemp', array('arrretdata'=>$arrretdata));
	}
	
	public function cdeleteEmp()
	{
		$this->chkloginuser();
		$id = $this->input->post('id');
		$this->load->model('memployee');
		$res = $this->memployee->mdeleteEmp($id);
		echo json_encode($res);
	}
	
	public function getEmployee()
	{
		$this->chkloginuser();
		$id = $this->input->get('id');
		$this->load->model('memployee');
		$updateData = $this->memployee->getEmployee($id);
		$this->load->view('vemployee', array('updateData'=>$updateData));
	}
	
}
?>