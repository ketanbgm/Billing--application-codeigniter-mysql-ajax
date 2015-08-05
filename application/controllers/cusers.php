<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class cusers extends CI_Controller {

	public function index()
	{
		$this->load->model('memployee');
		$arrEmp=$this->memployee->getEmployee();
		$this->load->model('mmenu');
		//$this->load->model('musers');
		$arrMenu=$this->mmenu->getMenu();
		//$this->musers->getMenu();
		//print_r($arrMenu); die();
		$this->load->view('vusers',array('arrEmp'=>$arrEmp,'arrMenu'=>$arrMenu));	
	}
	
	public function saveusers()
	{
		$dataCPassword=$this->input->post('dataCPassword');
		//$dataMenu=$this->input->post('dataMenu');
		//	print_r($dataMenu); die();
		$oper=$this->input->post('oper');
		$id=$this->input->post('id');
		$this->load->model('musers');
		$res=$this->musers->saveusers($dataCPassword,$oper,$id);
		//print_r($res); die();
		echo json_encode($res);
	}
		
	public function changePassword()
	{
		$this->chkloginuser();
		$this->load->view('vchangepassword');
	}/*End of public function changePassword()*/
	
	public function updateNewpassword()
	{
		$this->chkloginuser();
		/*$oldpassword=$this->input->post('oldpassword');
		$newpassword=$this->input->post('newpassword');
		$confirmpassword=$this->input->post('confirmpassword');
		$arrUser['oldpassword']=$oldpassword;
		$arrUser['newpassword']=$newpassword;
		$arrUser['confirmpassword']=$confirmpassword;*/
		$arrUser=$this->input->post('arrUser');
		$this->load->model('musers');
		$arr=$this->musers->updateNewpassword($arrUser);
		echo json_encode($arr);
	}/*End of public function updateNewpassword()*/

	public function loadUsers()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$pageno=$this->input->post('pageno');
		$end=$numberofrecords * $pageno;
		$start=$end-$numberofrecords;
		$this->load->model('musers');
		$res=$this->musers->loadUsers($start,$numberofrecords);
		//print_r($res);die();
		echo json_encode($res);
	}

	public function lookupUsers()
	{
		$this->chkloginuser();
		$numberofrecords=15;
		$this->load->model('mlogin');
		$Cnt=$this->mlogin->getTableCount('users');
		$this->load->view('vlookupusers',array('Cnt'=>$Cnt,'numberofrecords'=>$numberofrecords));
	}
	
	public function deleteUsers($id='')
	{
		$this->chkloginuser();
		$id=$this->input->post('id');
		$this->load->model('musers');
		$res=$this->musers->deleteUsers($id);
		echo json_encode($res);
	}
	
	public function getMenu()
	{
		$this->chkloginuser();
		$uid=$this->session->userdata['uid'];
		//echo $uid;die();

		$this->load->model('musers');
		$arrRes=$this->musers->getMenu($uid);
		//print_r($arrRes);die();
		$this->load->view('vmenu',array('arrRes'=>$arrRes));
		//echo json_encode($arrRes);
		//echo $uid;die();
	}
}
?>