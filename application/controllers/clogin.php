<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class clogin extends CI_Controller
{
	public function index()
	{
		$this->load->view('vlogin');
	}
	
	public function login()
	{
		$cusername=$this->input->post("cusername");
		$cpassword=$this->input->post("cpassword");
		$errFlag=0;
		$arrData=array();
		if($cusername == '')
		{
			$arrData = array("szMessage" => "No username entered");
			$errFlag++;
		}

		if($cpassword == '')
		{
			$arrData = array("szMessage" => "No password entered");
			$errFlag++;
		}
		if($errFlag == 0)
		{
			$this->load->model("mlogin");
			$szRes=$this->mlogin->login($cusername,$cpassword);
			if(is_array($szRes))
			{
					$szRes['cusername']=$cusername;
					$this->session->set_userdata('cusername',$szRes['cusername']);
					//$this->session->set_userdata('cname',$szRes['cname']);
					$this->session->set_userdata('uid',$szRes['uid']);
					$this->session->set_userdata('ctype',$szRes['ctype']);
					$arrData = array("szMessage" => "Success");
			}
			else
			{
				$arrData = array("szMessage" => "Invalid username or password.");
			}
						
		}//end of if($errFlag == 0)
		echo json_encode($arrData);
	}//end of function login()
	
	public function success()
	{
		$this->chkloginuser();
		$uid=$this->session->userdata['uid'];
		//echo $uid;die();

		$this->load->model('musers');
		$arrRes=$this->musers->getMenu($uid);
		
		$numberofrecords=15;
		$this->load->model('mlogin');
		$Cnt=$this->mlogin->getTableCount('therapy');
		$ctype="home";
		$this->load->view('vtherapylookup',array('Cnt'=>$Cnt,'numberofrecords'=>$numberofrecords,'ctype'=>$ctype));
		//$this->load->view('vhome',array('arrRes'=>$arrRes));
	}//end of success()
	
	public function logout()
	{
		//echo "Logout";
		$this->session->unset_userdata('cusername');
		$this->session->sess_destroy();
		 //unset($this->session->userdata);  
		//redirect('/index');
		header("location:".constant('BASE_DIR')."index.php");
		//die();
	}//end of public function logout()
	
	 public function backup()
	 {
		$arrData=array();
		 $this->load->dbutil();
	     date_default_timezone_set("Asia/Kolkata");
		 $date  = date("d-m-Y");
		//$folder = "application/DeepakSPA-Software-Backup";
			
		 $prefs = array(
				'tables' => array('customer_master','emp_master','therapy','bill','bill_sub','receipt_master','receipt_sub')
				 );
		 $backup =& $this->dbutil->backup($prefs);
		 $this->load->helper('file');
		// $this->load->helper('download');
		// force_download('SPA.sql.gz', $backup); 
		write_file("D:\DeepakSPA-Software-Backup/SPA_$date.sql.gz", $backup);
		echo 1;
	}
	
}
?>