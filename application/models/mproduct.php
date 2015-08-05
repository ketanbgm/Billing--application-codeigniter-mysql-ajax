<?php
	class mproduct extends CI_Model
	{
		public function saveProduct($arrProduct,$oper,$id)
		{
			//print_r($arrProduct);die();
			$arrStatus=NULL;
			$this->db->query("Begin");
			if($oper=='Save')
			{
				$sql="SELECT * FROM product_master WHERE pname='".$arrProduct['pname']."' AND qnty='".$arrProduct['qnty']."'";
			}
			else
				$sql="SELECT * FROM product_master WHERE pname='".$arrProduct['pname']."' AND qnty='".$arrProduct['qnty']."' AND pid!=".$id."";
	    	
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
						$this->db->insert('product_master',$arrProduct);
						//echo $sql; die();
						$res=$this->db->query("Select LAST_INSERT_ID() as id from product_master");
						$row=$res->row();
						$id=$row->id;
						$msg='Record Saved';
						//echo $id; die();
						//$msg='Record Saved';
						
					}
					else
					{
						//print_r($arrProduct);die();
						$this->db->where('pid',$id);
						$res=$this->db->update('product_master',$arrProduct);
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
				$arrStatus['status'] ='OK';$arrStatus['msg'][]=$msg;$arrStatus['tag'][]='show';$arrStatus['id']=$id;
			}
			return $arrStatus;
		}
		
	public function mdeleteProd($id)
	{
		$arrstatus['status'] = "";
		$arrstatus['msg'] = "";

		$this->db->where('pid',$id);
		$res = $this->db->delete('product_master');

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
	
	
	public function editProduct($id='')
	{
		$ret = NULL;
		$c = 0;
		$qry1 = "Select * From product_master";
		if($id!='')
				$qry1=$qry1." WHERE pid=".$id."";
		$res1 = $this->db->query($qry1);

		foreach($res1->result() as $row)
		{
			$ret[$c]['pid'] = $row->pid;
			$ret[$c]['pname'] = $row->pname;
			$ret[$c]['qnty'] = $row->qnty;
			$ret[$c]['rate'] = $row->rate;
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
	
	
	public function getProdDetails($start,$end)
		{
			
			//print_r($arrretdata);die();
			$sql="SELECT * FROM product_master ORDER BY pid DESC LIMIT ".$start.",".$end." ";
			//echo $sql;die();
			$res=$this->db->query($sql);
			$ret=NULL;
			$c=0;
			foreach($res->result() as $row)
			{
			$id=$row->pid;
		//echo $id;die();
				//$ret[$c]['items']['id']=$id;
				$ret[$c]['items']['pname']=$row->pname;
				$ret[$c]['items']['qnty']=$row->qnty;
				$ret[$c]['items']['rate']=$row->rate;
				
				$ret[$c]['editfunction']="product.editProduct(".$id.")";
				$ret[$c]['deletefunction']="product.deleteProduct(".$id.")";
				$c++;
			}
			return $ret;
		}
	}
?>