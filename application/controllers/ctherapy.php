<?php
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ctherapy extends CI_Controller 
{
	public function index()
	{
		$this->chkloginuser();
		$this->load->view('vtherapy');
	}
	
	public function save()
	{
		$this->chkloginuser();
		$this->load->model('mtherapy');
		$dataTherapy=$this->input->post('dataTherapy');
		//print_r($dataTherapy);die();
		$oper=$this->input->post('oper');
		$id=$this->input->post('id');
		//echo "id..".$id; die();
		$res=$this->mtherapy->save($dataTherapy,$oper,$id);
		echo json_encode($res);
	}
	
	public function lookupTherapy()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$this->load->model('mlogin');
		$Cnt=$this->mlogin->getTableCount('therapy');
		//$this->load->view('vhome',array('Cnt'=>$Cnt,'numberofrecords'=>$numberofrecords));
		$ctype='';
		$this->load->view('vtherapylookup',array('Cnt'=>$Cnt,'numberofrecords'=>$numberofrecords,'ctype'=>$ctype));
	}
	public function loadTherapy()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$pageno=$this->input->post('pageno');
		$end=$numberofrecords * $pageno;
		$start=$end-$numberofrecords;
		$this->load->model('mtherapy');
		$arrSearch=$this->input->post('params');
		$formtype=$arrSearch['ctype'];
		$res=$this->mtherapy->loadTherapy($start,$numberofrecords,$formtype);
		//print_r($res);die();
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
	
	public function deleteTherapy($id='')
	{
		$this->chkloginuser();
		$id=$this->input->post('id');
		$this->load->model('mtherapy');
		$res=$this->mtherapy->deleteTherapy($id);
		echo json_encode($res);

	}
}
?>