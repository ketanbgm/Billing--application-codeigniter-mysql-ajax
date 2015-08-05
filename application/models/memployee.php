<?php
	class memployee extends CI_Model
	{
		public function saveEmp($arr,$oper,$id)
		{
			//print_r($arr);die();
				$arrStatus=NULL;
			$this->db->query("Begin");
			if($arr['edob']!='')
			{
				$arr['edob']=date("Y-m-d",strtotime(str_replace("/","-",$arr['edob'])));
			}
			else
			{
				$arr['edob']=NULL;	
			}
			if($arr['edoj']!='')
			{
				$arr['edoj']=date("Y-m-d",strtotime(str_replace("/","-",$arr['edoj'])));
			}
			else
			{
				$arr['edoj']=NULL;	
			}
			
			if($arr['eavd']!='')
			{
				$arr['eavd']=date("Y-m-d",strtotime(str_replace("/","-",$arr['eavd'])));
			}
			else
			{
				$arr['eavd']=NULL;	
			}
			if($arr['eaddress']=='')
			{
				$arr['eaddress']='-';	
			}
			//echo $oper;die();
			if($oper=='Save')
			{
				$sql="SELECT * FROM emp_master WHERE ename='".$arr['ename']."' AND eno='".$arr['eno']."'";
			}
			else
				$sql="SELECT * FROM emp_master WHERE ename='".$arr['ename']."' AND eno='".$arr['eno']."' AND eid!=".$id."";
	    	
			//echo $sql; die();
			$res=$this->db->query($sql);
			if($res)
			{
				$num=$res->num_rows;
				if($num>=1)
				{
					$arrStatus['status']='ERR';
					$arrStatus['msg']='Record already exists';
					return $arrStatus;
				}
				else
				{
					if($oper=='Save')
					{
						$sql=$this->db->insert('emp_master',$arr);
						//echo $sql; die();
						$res=$this->db->query("Select LAST_INSERT_ID() as id from emp_master");
						$row=$res->row();
						$id=$row->id;
							$msg='Record Saved';
						//echo $id; die();
						//$msg='Record Saved';
						
					}
					else
					{
						$this->db->where('eid',$id);
						$res=$this->db->update('emp_master',$arr);
						$msg='Record Updated';
					}
				}
			}
					/*else
					{
						$this->db->where('id',$id);
						$res=$this->db->update('news',$dataNews);
						$msg='Record Updated';
					}
				}
			}*/
			/*else
			{
				$arrStatus['status']='ERR';$arrStatus['msg']='Database Error';
				return $arrStatus;
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
				$arrStatus['status'] ='OK';$arrStatus['msg'][]=$msg;$arrStatus['tag'][]='show';$arrStatus['id']=$id;
			}
			return $arrStatus;
		}
	
		public function loadEmployee($start,$end)
		{
			//print_r($arrretdata);die();
			$sql="SELECT * FROM emp_master ORDER BY eid DESC LIMIT ".$start.",".$end." ";
			//echo $sql;die();
			$res=$this->db->query($sql);
			$ret=NULL;
			$c=0;
			foreach($res->result() as $row)
			{
				$id=$row->eid;
				//echo $id;die();
				//$ret[$c]['items']['id']=$id;
				$ret[$c]['items']['ename']=$row->ename;
				$ret[$c]['items']['eaddress']=$row->eaddress;
				$ret[$c]['items']['eno']=$row->eno;
				$edob=$row->edob;
				if($edob!='')	
					$ret[$c]['items']['edob']=date("d-m-Y",strtotime($edob));
				else
					$ret[$c]['items']['edob']='-';
					
				$ret[$c]['items']['egender']=strtoupper($row->egender);
				
				$edoj=$row->edoj;
				if($edoj!='')	
					$ret[$c]['items']['edoj']=date("d-m-Y",strtotime($edoj));
				else
					$ret[$c]['items']['edoj']='-';
					
				$eavd=$row->eavd;
				if($eavd!='')	
					$ret[$c]['items']['eavd']=date("d-m-Y",strtotime($eavd));
				else
					$ret[$c]['items']['eavd']='-';
				$ret[$c]['editfunction']="employee.editEmployee(".$id.")";
				$ret[$c]['deletefunction']="employee.deleteEmployee(".$id.")";
				$c++;
			}
			return $ret;
		}
		
		public function mdeleteEmp($id)
		{
			$arrstatus['status'] = "";
			$arrstatus['msg'] = "";
	
			$this->db->where('eid',$id);
			$res = $this->db->delete('emp_master');
	
			if ($this->db->trans_status() === FALSE) 
			{
				$this->db->query("rollback");
				$arrstatus['status'] = "ERR";
				$str = "Database Error! Record Not Deleted! \n\n Cannot delete this record as it is refered in other table.";
				$arrstatus['msg'] = nl2br($str);
			}
			else
			{
				$this->db->query("commit");
				$arrstatus['status'] = "OK";
				$arrstatus['msg'] = "Record Deleted!";
			}
	
			return $arrstatus;
		}
		
		
		public function getEmployee($id='')
		{
			$ret = NULL;
			$c = 0;
			$qry1 = "Select * From emp_master";
			if($id!='')
				$qry1=$qry1." where eid = ".$id."";
			$res1 = $this->db->query($qry1);
	
			foreach($res1->result() as $row)
			{
				$ret[$c]['eid'] = $row->eid;
				$ret[$c]['ename'] = $row->ename;
				$ret[$c]['eaddress'] = $row->eaddress;
				$ret[$c]['eno'] = $row->eno;
				$ret[$c]['edob'] = $row->edob;
				$ret[$c]['egender'] = $row->egender;
				$ret[$c]['edoj'] = $row->edoj;
				$ret[$c]['eavd'] = $row->eavd;
				//$ret[$c]['subitemId'] = $row->nsubitemId;
				// $qry3 = "Select * From subitem_master where nsubitemId = ".$subitem."";
				// $res3 = $this->db->query($qry3);
				// foreach($res3->result() as $row3)
				// {
				// 	$ret[$c]['subitemName'] = $row3->csubitemName;
				// }
	
				$c++;
			} 
			return $ret;
		}
	
		
	}
?>