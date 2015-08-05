<?php 
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ccustomer extends CI_Controller 
{
	public function index()
	{
		$this->chkloginuser();
		$this->load->view('vcustomer');
	}
	
	public function save()
	{
		$this->chkloginuser();
		$this->load->model('mcustomer');
		$dataCustomer=$this->input->post('dataCustomer');
		$oper=$this->input->post('oper');
		$id=$this->input->post('id');
		$res=$this->mcustomer->save($dataCustomer,$oper,$id);
		echo json_encode($res);
	}
	
	public function lookupCustomer()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$this->load->model('mlogin');
		$Cnt=$this->mlogin->getTableCount('customer_master');
		$this->load->view('vcustomerlookup',array('Cnt'=>$Cnt,'numberofrecords'=>$numberofrecords));
	}
	public function loadCustomer()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$pageno=$this->input->post('pageno');
		$end=$numberofrecords * $pageno;
		$start=$end-$numberofrecords;
		$this->load->model('mcustomer');
		$res=$this->mcustomer->loadCustomer($start,$numberofrecords);
		echo json_encode($res);
	}
	
	public function getCustomer($id='')
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$id=$this->input->get('id');
		$this->load->model('mcustomer');
		$res=$this->mcustomer->getCustomer($id);
		$this->load->view('vcustomer',array('dataCustomer'=>$res));
	}
	
	public function deleteCustomer($id='')
	{
		$this->chkloginuser();
		$id=$this->input->post('id');
		$this->load->model('mcustomer');
		$res=$this->mcustomer->deleteCustomer($id);
		echo json_encode($res);

	}

	public function getautocomplete()
	{
		$name=$this->input->post('value');
		$ctype=$this->input->post('ctype');
		$this->load->model('mcustomer');
		$savename=$this->mcustomer->getautocomplete($name,$ctype);
		echo json_encode($savename);
	}

}
?>