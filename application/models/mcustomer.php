<?php
	class mcustomer extends CI_Model
	{
		public function save($dataCustomer,$oper,$id)
		{
			$arrStatus=NULL;
			$this->db->query("Begin");
			if($dataCustomer['cdob']!='')
			{
				$dataCustomer['cdob']=date("Y-m-d",strtotime(str_replace("/","-",$dataCustomer['cdob'])));
			}
			else
			{
				$dataCustomer['cdob']=NULL;	
			}
			if($dataCustomer['canndate']!='')
			{
				$dataCustomer['canndate']=date("Y-m-d",strtotime(str_replace("/","-",$dataCustomer['canndate'])));
			}
			else
			{
				$dataCustomer['canndate']=NULL;	
			}
			if($oper=='Save')
			{
				$sql="SELECT * FROM customer_master WHERE cname='".$dataCustomer['cname']."' AND clname='".$dataCustomer['clname']."' AND contactno='".$dataCustomer['contactno']."'";
			}
			else
				$sql="SELECT * FROM customer_master WHERE cname='".$dataCustomer['cname']."' AND clname='".$dataCustomer['clname']."' AND contactno='".$dataCustomer['contactno']."' AND cid!=".$id."";
	    	
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
						//print_r($dataCustomer);
						$this->db->insert('customer_master',$dataCustomer);
						$res=$this->db->query("Select LAST_INSERT_ID() as id from customer_master");
						$row=$res->row();
						$id=$row->id;
						$msg='Record Saved';
						//echo $msg;
					}
					else
					{
						$this->db->where('cid',$id);
						$res=$this->db->update('customer_master',$dataCustomer);
						$msg='Record Updated';
					}
				
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
			return $arrStatus;
		}
		
		public function loadCustomer($start,$end)
		{
			$sql="SELECT * FROM customer_master ORDER BY cid DESC LIMIT ".$start.",".$end."";
			$res=$this->db->query($sql);
			$c=0;
			$arrRet=NULL;
			foreach($res->result() as $row)
			{
				$id=$row->cid;
				$name=$row->cname;
				$lname=$row->clname;
				$arrRet[$c]['items']['cname']=$name." ".$lname;
				$arrRet[$c]['items']['cgender']=strtoupper($row->cgender);
				//$arrRet[$c]['items']['caddress']=$row->caddress;
				$cdob=$row->cdob;
				if($cdob!='')	
					$arrRet[$c]['items']['cdob']=date("d-m-Y",strtotime($cdob));
				else
					$arrRet[$c]['items']['cdob']='-';
				$canndate=$row->canndate;
				if($canndate!='')	
					$arrRet[$c]['items']['canndate']=date("d-m-Y",strtotime($canndate));
				else
					$arrRet[$c]['items']['canndate']='-';
				$contactno=$row->contactno;
				if($contactno!='')
					$arrRet[$c]['items']['contactno']=$contactno;
				else
					$arrRet[$c]['items']['contactno']='-';
				$emailid=$row->cemailid;
				if($emailid!='')
					$arrRet[$c]['items']['cemailid']=$emailid;	
				else
					$arrRet[$c]['items']['cemailid']='-';	
				$arrRet[$c]['editfunction']="customer.editCustomer(".$id.")";
				$arrRet[$c]['deletefunction']="customer.deleteCustomer(".$id.")";
				$c++;
			}
			return $arrRet;
		}
		
		public function getCustomer($id='')
		{
			
			$sql="SELECT * FROM customer_master";
			//echo $sql;die();
			if($id!='')
				$sql=$sql." WHERE cid=".$id."";
			$res=$this->db->query($sql);
			$ret=NULL;
			$c=0;
			foreach($res->result() as $row)
			{
				$ret[$c]['cid']=$row->cid;
				$ret[$c]['cname']=$row->cname;
				$ret[$c]['clname']=$row->clname;
				$ret[$c]['cgender']=$row->cgender;
				$ret[$c]['caddress']=$row->caddress;
				$ret[$c]['cdob']=$row->cdob;
				$ret[$c]['canndate']=$row->canndate;
				$ret[$c]['contactno']=$row->contactno;
				$ret[$c]['cemailid']=$row->cemailid;
				$ret[$c]['value']=$row->cid;
				$ret[$c]['label']=$row->cname;
				$c++;
			}
			
			return $ret;
		}
		
		public function deleteCustomer($id='')
		{
			$arrstatus['status'] = "";
			$arrstatus['msg'] = "";
	
			$this->db->where('cid',$id);
			$res = $this->db->delete('customer_master');
	
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
		
		public function getautocomplete($name,$ctype)
		{
			if($ctype=='name')
				$sql="SELECT distinct(cname) from customer_master where (lower(cname) like '%".strtolower(($name))."%')";
			else if($ctype=='lname')
				$sql="SELECT distinct(clname) from customer_master where (lower(clname) like '%".strtolower(($name))."%')";
			$res=$this->db->query($sql);
			$ret=NULL;
			$c=0;
			foreach($res->result() as $row)
			{
				if($ctype=='name')
					$ret[$c]['label']=$row->cname;
				else if($ctype=='lname')
					$ret[$c]['label']=$row->clname;
				$c++;
			}
			return $ret;
		}
		
}
?>