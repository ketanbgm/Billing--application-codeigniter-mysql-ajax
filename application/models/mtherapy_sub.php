<?php
	class mtherapy_sub extends CI_Model
	{
		public function save($dataTherapy_sub,$oper,$id)
		{
			//print_r($dataTherapy_sub); die();
			$arrStatus=NULL;
			$this->db->query("Begin");
			if($oper=='Save')
			{
				$sql="SELECT * FROM therapy_sub WHERE tid='".$dataTherapy_sub['tid']."'";
				$res=mysql_query($sql);
				$num=mysql_num_rows($res);
				if($num>=1)
				{
					$arrStatus['status'] ='ERR';$arrStatus['msg'][]='Entry Already Exists';$arrStatus['tag'][]='show';
				}
				$msg='Record Saved';
			}
			else if($oper=='Update')
			{
				$sql="DELETE FROM therapy_sub WHERE tid=".$dataTherapy_sub['tid']."";
				$res=$this->db->query($sql);
				if(!$res)
				{
					$arrStatus['status'] ='ERR';$arrStatus['msg'][]='Database error';$arrStatus['tag'][]='show';
				}
				$msg='Record Updated';
			}
			if($arrStatus['status']!='ERR')
			{
				for($i=0;$i<count($dataTherapy_sub['sname']);$i++)
				{
					$sql="INSERT INTO therapy_sub (tid,sname,stime,srate) VALUES (".$dataTherapy_sub['tid'].",'".$dataTherapy_sub['sname'][$i]."','".$dataTherapy_sub['stime'][$i]."','".$dataTherapy_sub['srate'][$i]."')";
					//echo $sql; die();
					$res=mysql_query($sql);
					if($res)
					{
						$result=$this->db->query("Select LAST_INSERT_ID() as id from therapy_sub");
						$row=$result->row();
						$id=$row->id;
						//$msg="Record Saved";
					}
					else
					{
						$arrStatus['status'] ='ERR';
					}
				}
				if($this->db->trans_status() === FALSE)
				{
					$this->db->query("rollback");
					$arrStatus['status'] ='ERR';
					$arrStatus['msg']='Database Error';
				}
				else
				{
					$this->db->query("commit");
					$arrStatus['status'] ='OK';$arrStatus['msg'][]=$msg;$arrStatus['tag'][]='show';$arrStatus['id']=$id;
				}
				
				}
				return $arrStatus;
			}
		
		public function lookupTherapy_sub()
		{
			
			$arrData=NULL;
			$sql="SELECT distinct(a.tid),a.tname as therapyname FROM therapy a where tid in (select tid from therapy_sub b WHERE a.tid=b.tid)";
			//echo $sql; die();
			$res=$this->db->query($sql);
			$c=0;
			foreach($res->result() as $row)
			{
				$arrData[$c]['tid']=$row->tid;
				$arrData[$c]['therapyname']=$row->therapyname;
				$arrData[$c]['therapy_sub']=NULL;
				$sql1="SELECT sname FROM therapy_sub WHERE tid=".$arrData[$c]['tid']."";
				$k=0;$l=0;
				$res1=$this->db->query($sql1);
				foreach($res1->result() as $row1)
				{
					$arrData[$c]['therapy_sub'][$l]=$row1->sname;
					$l++;
				}
				$c++;
			}
			return $arrData;
		}
		
		public function getTherapy_sub($id='')
		{
			$sql="SELECT * FROM therapy";
			if($id!='')
				$sql=$sql." WHERE tid=".$id."";
			$res=$this->db->query($sql);
			$ret=NULL;
			$c=0;
			foreach($res->result() as $row)
			{
				
				$ret[$c]['tid']=$row->tid;
				$ret[$c]['tname']=$row->tname;
				$ret[$c]['amount']=$row->amount;
			$c++;	
			}
			//print_r($ret); die();
			return $ret;
		}
		
		public function deleteTherapy_sub($id='')
		{
			$arrStatus=NULL;
			$this->db->where('sid',$id);
			$res=$this->db->delete('therapy_sub');


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
			return $arrStatus;
		}

	public function get_sub($id='')
	{
		$ret = NULL;
		$c = 0;
		$qry1 = "Select * From therapy_sub";
		if($id!='')
				$qry1=$qry1." WHERE sid=".$id."";
		$res1 = $this->db->query($qry1);

		foreach($res1->result() as $row)
		{
			$ret[$c]['tid'] = $row->tid;
			$ret[$c]['sname'] = $row->sname;
			$ret[$c]['stime'] = $row->stime;
			$ret[$c]['srate'] = $row->srate;
			//$ret[$c]['subitemId'] = $row->nsubitemId;
			// $qry3 = "Select * From subitem_master where nsubitemId = ".$subitem."";
			// $res3 = $this->db->query($qry3);
			// foreach($res3->result() as $row3)
			// {
			// 	$ret[$c]['subitemName'] = $row3->csubitemName;
			// }

			$c++;
		} 
		//print_r($ret);die();
		return $ret;
	}
	


}

?>