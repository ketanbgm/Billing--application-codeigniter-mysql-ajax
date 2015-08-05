<?php
class musers extends CI_Model
{
	private $salt = '12312esdf@#$#%%fghfgh5fd1dfg543&%@%&*#$$#fsdf';
	public function saveusers($dataCPassword,$oper,$id)
	{
	//	print_r($dataMenu); die();
		$arrStatus=NULL;
		if($dataCPassword['newpassword'] == '')
		{
			$arrStatus['status']='ERR';$arrStatus['msg'][]='Please Enter New Password';$arrStatus['tag'][]='show';
		}
	
		if($dataCPassword['confirmpassword'] == '')
		{
			$arrStatus['status']='ERR';$arrStatus['msg'][]='Please Enter Confirm Password';$arrStatus['tag'][]='show';
		}
	
		if($dataCPassword['newpassword'] != $dataCPassword['confirmpassword'])
		{
			$arrStatus['status']='ERR';$arrStatus['msg'][]='Confirm password not equal to New password';$arrStatus['tag'][]='show';
		}
		$dataCPassword['confirmpassword']=md5($this->salt.$dataCPassword['confirmpassword']);
		//print_r($dataCPassword); die();
		$this->db->query("Begin");
		if($oper=='Save')
		{
			$sql="SELECT * FROM users WHERE eid='".$dataCPassword['ename']."'";
			/*$arrStatus['status']='OK';
			$msg='Record already exists';*/
			
			$res=$this->db->query($sql);
			if($res)
			{
				$num=$res->num_rows;
				if($num>=1)
				{
					$arrStatus['status']='OK';$msg='Record already exists';$arrStatus['tag'][]='show';
				}
				else
				{
					/*$this->db->insert('users',$dataCPassword);*/
					$sql="INSERT INTO users (eid,cusername,cpassword,ctype) VALUES ('".$dataCPassword['ename']."','".$dataCPassword['cusername']."','".$dataCPassword['confirmpassword']."','".$dataCPassword['ctype']."')";
					//echo $sql; die();
					
					$res=mysql_query($sql);
					$msg='';
					if($res)
					{
						$result=$this->db->query("Select LAST_INSERT_ID() as id from users");
						$row=$result->row();
						$id=$row->id;
						$msg='Record saved';
					}
				}
			}
		}
		/*else
		{
			$arrStatus['status']='ERR';$arrStatus['msg']='Database Error';
			//return $arrStatus;
		}*/
		if($this->db->trans_status() === FALSE)
		{
			$this->db->query("rollback");
			$arrStatus['status'] ='ERR';
			$arrStatus['msg']='Database Error';
		}
		else
		{
			$this->db->query("commit");
			$arrStatus['status'] ='OK';$arrStatus['msg'][]=$msg;$arrStatus['tag'][]='show';$arrStatus['uid']=$id;$arrStatus['ename']=$dataCPassword['ename'];
		}
		//print_r($arrStatus); die();
		return $arrStatus;
	}
	
	public function updateNewpassword($arrUser)
	{
		$arrStatus=NULL;
		if($arrUser['oldpassword'] == '')
		{
			$arrStatus['status']='ERR';
			$arrStatus['msg']='Please Enter Old Password';
			return $arrStatus;
		}
		
		if($arrUser['newpassword'] == '')
		{
			$arrStatus['status']='ERR';
			$arrStatus['msg']='Please Enter New Password';
			return $arrStatus;
		}
		
		if($arrUser['confirmpassword'] == '')
		{
			$arrStatus['status']='ERR';
			$arrStatus['msg']='Please Enter Confirm Password';
			return $arrStatus;
		}
	
		if($arrUser['newpassword'] != $arrUser['confirmpassword'])
		{
			$arrStatus['status']='ERR';
			$arrStatus['msg']='Confirm password not equal to New password';
			return $arrStatus;
		}
		
		$szOldpassword=md5($this->salt.$arrUser['oldpassword']);
		$iUserid=$this->session->userdata('uid');
		$resUser=$this->db->query("SELECT * FROM users  WHERE uid=".$iUserid." and trim(cpassword)=trim('".$szOldpassword."')");
		$numrows=$resUser->num_rows();
		if($numrows == 0)
		{
			$arrStatus['status']='ERR';
			$arrStatus['msg']='Incorrect Old Password';
			return $arrStatus;
		}
		
		$szNewpassword=md5($this->salt.$arrUser['newpassword']);
		$sql="update users set cpassword='".$szNewpassword."'  where uid=".$iUserid."";
		$result=$this->db->query($sql);
		if(!$result)
		{
			$arrStatus['status']='ERR';
			$arrStatus['msg']='Database Error';
			return $arrStatus;
		}
		
		$arrStatus['status']='OK';
		$arrStatus['msg']='Password Changed';
		return $arrStatus;
	}
	
	public function loadUsers($start,$end)
	{
		$sql="SELECT * FROM users a, emp_master b WHERE a.eid=b.eid ORDER BY uid DESC LIMIT ".$start.",".$end."";
		//echo $sql; die();
		$res=$this->db->query($sql);
		$c=0;
		$arrRet=NULL;
		foreach($res->result() as $row)
		{
			$id=$row->uid;
			$eid=$row->eid;
			$arrRet[$c]['items']['ename']=$row->ename;
			$arrRet[$c]['ctype']=$row->ctype;
			if($arrRet[$c]['ctype']==1)
			{
				$arrRet[$c]['items']['ctype']='Admin';	
			}
			else if($arrRet[$c]['ctype']==2)
			{
				$arrRet[$c]['items']['ctype']='Assistant';	
			}
			else if($arrRet[$c]['ctype']==3)
			{
				$arrRet[$c]['items']['ctype']='Accountant';	
			}
			//$arrRet[$c]['editfunction']="therapy.editTherapy(".$id.")";
			$arrRet[$c]['deletefunction']="users.deleteUsers(".$id.")";
			$c++;
		}
		return $arrRet;
	}
	
	public function deleteUsers($id='')
	{
		$arrStatus=NULL;
		$this->db->where('uid',$id);
		$res=$this->db->delete('users');


		if($this->db->trans_status() === FALSE)
		{
			$this->db->query("rollback");
			$arrStatus['status'] ='ERR';$arrStatus['msg']='Database Error';
		}
		else
		{
			$this->db->query("commit");
			$arrStatus['status'] ='OK';$arrStatus['msg']='Record Deleted';
		}
		//print_r($arrStatus); die();
		return $arrStatus;
	}
	
	public function getMenu($uid)
{
	$sql="SELECT m.mname as mname FROM menu m,users_sub u WHERE m.mid=u.mid AND u.uid='".$uid."'";
		//echo $sql;die();
		$res=$this->db->query($sql);
			$c=0;
			$ret=NULL;
			foreach($res->result() as $row)
			{
				$ret['mname'][$c]=$row->mname;
				$c++;
			}
			return $ret;
	}
}
?>