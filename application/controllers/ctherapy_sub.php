<?php
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ctherapy_sub extends CI_Controller 
{
	public function index()
	{
		$this->chkloginuser();
		$this->load->model('mtherapy');
		$arrTherapy=$this->mtherapy->getTherapy();
		$this->load->view('vtherapy_sub',array('arrTherapy'=>$arrTherapy));
	}
	
	public function save()
	{
		$this->chkloginuser();
		$this->load->model('mtherapy_sub');
		$dataTherapy_sub=$this->input->post('dataTherapy_sub'); print_r($dataTherapy_sub);die();
		$oper=$this->input->post('oper');
		$id=$this->input->post('id');
		$res=$this->mtherapy_sub->save($dataTherapy_sub,$oper,$id);
		echo json_encode($res);
	}
	
	public function lookupTherapy_sub()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$this->load->model('mlogin');
		$Cnt=$this->mlogin->getTableCount('therapy_sub');
		$this->load->model('mtherapy_sub');
		$arrData=$this->mtherapy_sub->lookupTherapy_sub();
		$this->load->view('vtherapylookup_sub',array('arrData'=>$arrData));//,'Cnt'=>$Cnt,'numberofrecords'=>$numberofrecords));
	}
	public function loadTherapy()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$pageno=$this->input->post('pageno');
		$end=$numberofrecords * $pageno;
		$start=$end-$numberofrecords;
		$this->load->model('mtherapy');
		$res=$this->mtherapy->loadTherapy($start,$numberofrecords);
		echo json_encode($res);
	}
	
	public function getTherapy($id='')
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$id=$this->input->get('id');
		$this->load->model('mtherapy');
		$res=$this->mtherapy->getTherapy($id);
		$this->load->view('vtherapy',array('dataTherapy'=>$res));
	}
	
	public function deleteTherapy_sub($id='')
	{
		$this->chkloginuser();
		$id=$this->input->post('id');
		$this->load->model('mtherapy_sub');
		$res=$this->mtherapy_sub->deleteTherapy_sub($id);
		echo json_encode($res);

	}
	
	public function edittherapy_sub()
	{
		$id=$this->input->get('id');
		$this->load->model('mtherapy');
		$arrTherapy=$this->mtherapy->getTherapy();
		$this->load->model('mtherapy_sub');
		$arrTherapysubData=$this->mtherapy_sub->getTherapy_sub($id);
		//print_r($arrTherapysubData); die();
		$this->load->view('vtherapy_sub',array('arrTherapy'=>$arrTherapy,'arrTherapysubData'=>$arrTherapysubData));
	}
}
?>