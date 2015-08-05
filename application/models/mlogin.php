<?php
class mlogin extends CI_Model
{	
	private $salt = '12312esdf@#$#%%fghfgh5fd1dfg543&%@%&*#$$#fsdf';
	public function login($cusername,$cpassword)
	{
		//echo "username..".$cusername."pass..".$cpassword; die();
		$userData=array();
		$query="SELECT * FROM users WHERE lower(cusername)=lower('".$cusername."'); ";
		//echo "query:".$query."<br/>";die();
		$res=$this->db->query($query);
		if($res->num_rows() == 1)
		{
			$row=$res->row();
			$encyptpass=md5($this->salt.$cpassword);
			
			if(strcmp($encyptpass, $row->cpassword) == 0 )
			{
				$userData=array(
					'username'=>$row->cusername,
					//'cname'=>$row->cname,
					'uid'=>$row->uid,
					'ctype'=>$row->ctype,
				);
				return $userData;
			}
			else
			{
				return -1;
			}
		}
		else
		{
			return -2;
		}
	}

	public function getTableCount($tblname,$condition='',$fld="*")
	{
		$iCnt=0;
		//$sql="SELECT COUNT(".$fld.") AS cnt FROM ".$tblname." ".$condition;
		$resId=$this->db->query("SELECT COUNT(".$fld.") AS cnt FROM ".$tblname." ".$condition);
		//$sql="SELECT COUNT(".$fld.") AS cnt FROM ".$tblname." ".$condition;
		//echo "SELECT COUNT(".$fld.") AS cnt FROM ".$tblname." ".$condition;die();
		if(is_object($resId))
		{
			$row = $resId->row();
			$iCnt=$row->cnt;
		}
		return $iCnt;
	}
}
?>
