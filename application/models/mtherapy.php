<?php
	class mtherapy extends CI_Model
	{
		public function save($dataTherapy,$oper,$id)
		{
			$arrStatus=NULL;
			$this->db->query("Begin");
			
			if($oper=='Save')
			{
				$sql="SELECT * FROM therapy WHERE tname='".$dataTherapy['tname']."' and amount='".$dataTherapy['amount']."'";
			}
			else
				$sql="SELECT * FROM therapy WHERE tname='".$dataTherapy['tname']."' and amount='".$dataTherapy['amount']."' AND tid!=".$id."";
	    	
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
						//echo($id); die();
						$this->db->insert('therapy',$dataTherapy);
						$res=$this->db->query("Select LAST_INSERT_ID() as id from therapy");
						$row=$res->row();
						$id=$row->id;
						$msg='Record Saved';
							/*if($res)
							{
								$res1=$this->db->query("SELECT nmenu_id FROM menu WHERE cmenu_name='News'");
								$row=$res1->row();
								$nmenu_id=$row->nmenu_id;
								
								$activity_log=array(
									'dcurrent_date'=>date('Y-m-d h:i:s A'),
									'nmenu_id'=>$nmenu_id,
									'nrecord_id'=>$id
								);
								$res2=$this->db->insert('activity_log',$activity_log);
								if($res2)
								$msg='Record Saved';
								
							}
							else
									$msg='ERR';*/
					}
					else
					{
						$this->db->where('tid',$id);
						$res=$this->db->update('therapy',$dataTherapy);
						$msg='Record Updated';
					}
				
				}
			}
			else
			{
				$arrStatus['status']='ERR';$arrStatus['msg']='Database Error';
				return $arrStatus;
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
				$arrStatus['status'] ='OK';$arrStatus['msg'][]=$msg;$arrStatus['tag'][]='show';$arrStatus['id']=$id;$arrStatus['tname']=$dataTherapy['tname'];
			}
			return $arrStatus;
		}
		
		public function loadTherapy($start,$end,$formtype)
		{
			//echo "formtype..".$formtype; die();
			
			$sql="SELECT * FROM therapy ORDER BY tname LIMIT ".$start.",".$end."";
			$res=$this->db->query($sql);
			$c=0;
			$arrRet=NULL;
			foreach($res->result() as $row)
			{
				$id=$row->tid;
				$arrRet[$c]['items']['tname']=$row->tname;
				$arrRet[$c]['items']['amount']=$row->amount;
				if($formtype=='')
				{
					$arrRet[$c]['editfunction']="therapy.editTherapy(".$id.")";
					$arrRet[$c]['deletefunction']="therapy.deleteTherapy(".$id.")";
				}
				$c++;
			}
			return $arrRet;
		}
		
		public function getTherapy($id='')
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
			return $ret;
		}
		
		public function deleteTherapy($id='')
		{
			$arrStatus=NULL;
			$this->db->where('tid',$id);
			$res=$this->db->delete('therapy');


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
		
		
}
?>