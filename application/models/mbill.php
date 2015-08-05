<?php
	class mbill extends CI_Model
	{
		public function get_subther($id)
		{
			$sql="SELECT amount FROM therapy where tid='".$id."'";
			$res=$this->db->query($sql);
			$ret=NULL;
			$c=0;
			foreach($res->result() as $row)
			{
				$ret['amount']=$row->amount;
			}
			return $ret;
		}
		public function get_rate($id1)
		{
			$sql="SELECT amount FROM therapy t,bill_sub bs where bs.bs_tid='".$id1."' and bs.bs_tid=t.tid ";
			$res=$this->db->query($sql);
			$ret=NULL;
			foreach($res->result() as $row)
			{
				$ret['srate']=$row->srate;
				
			}
			return $ret;
		}
		public function get_prodrate($id)
		{
			$sql="SELECT rate FROM product_master where pid='".$id."'";
			$res=$this->db->query($sql);
			$ret=NULL;
			
			foreach($res->result() as $row)
			{
				$ret['rate']=$row->rate;
			}
			return $ret;
		}
	public function saveBill($dataBill,$billSub,$oper,$id)
	{
		//print_r($dataBill); die();
		$this->db->query("Begin");
		//echo $oper;die();
		$arrCustomer=NULL;
		$dataBill['bill_date']=date("Y-m-d",strtotime(str_replace("/","-",$dataBill['bill_date'])));
		$msg='';
		if($oper=='Save')
		{	
			$sql2="SELECT cid,cname,clname FROM customer_master WHERE cname='".$dataBill['cname']."' AND clname='".$dataBill['lname']."'";
			$res2=$this->db->query($sql2);
			if($res2)
			{
				$num=$res2->num_rows;
				if($num>=1)
				{
					foreach($res2->result() as $row1)
					{
						$cid=$row1->cid;	
					}
				}
				else 
				{
					$arrCustomer=array(
						'cname'=>$dataBill['cname'],
						'clname'=>$dataBill['lname'],
						'cgender'=>$dataBill['cgender'],
					);
					
					$this->db->insert('customer_master',$arrCustomer);
					//$this->db->query("INSERT INTO customer_master cname,clname VALUES ('".$dataBill['cname']."','".$dataBill['lname']."')");
					$res=$this->db->query("Select LAST_INSERT_ID() as id from customer_master");
					$row=$res->row();
					$cid=$row->id;
				}
				//echo "num".$num; die();
			}
			//$this->db->insert('bill',$dataBill);
			$sql="INSERT INTO bill (bill_date,cid,discount,total,net) VALUES ('".$dataBill['bill_date']."',".$cid.",'".$dataBill['discount']."','".$dataBill['total']."','".$dataBill['net']."')";
			$res=mysql_query($sql);
			if($res)
			{
				$result=$this->db->query("Select LAST_INSERT_ID() as id from bill");
				$row=$result->row();
				$id=$row->id;
				//echo $id;die();
				$billno="BILL-".$id;
				$this->db->query("UPDATE bill SET bill_no='".$billno."' WHERE bid='".$id."' ");
				//$res1="UPDATE bill SET bill_no='".$billno."' WHERE bid='".$id."' ";
				$msg="Record Saved";
			}
		}
		else if($oper=='Update')
		{	
				$sql="UPDATE bill SET discount='".$dataBill['discount']."', total='".$dataBill['total']."',net='".$dataBill['net']."' WHERE bid=".$id."";
				$this->db->query($sql);
				
				$this->db->where('bid',$id);
				$this->db->delete('bill_sub');
				$msg='Record Updated';
				//die();
				/*
				$sql="DELETE FROM bill_sub WHERE bid=".$billSub['bid']."";
				$res=$this->db->query($sql);
				if(!$res)
				{
					$arrStatus['status'] ='ERR';$arrStatus['msg'][]='Database error';$arrStatus['tag'][]='show';
				}
				$msg='Record Updated';*/
				
		}
		$arrrowData=explode("^",$billSub);
		for($i=0;$i < count($arrrowData);$i++)
		{
			//echo count($billSub);die();
			$arrcolData=explode("Â°",$arrrowData[$i]);
			//print_r($arrcolData);
			//$arrcolData=explode("°",$arrrowData[$i]);         /*------------online------------*/
			//print_r($arrcolData);die();
		//		$bbooking=null;
		//		if($arrcolData[2]=='on')
		//			$bbooking='1';
	           //	 $arrData['bs_pid']=$arrcolData[6];
			 // print_r($arrcolData);die();
			 
			
					$arrData=array(
					'bid'=>$id,
					'bs_tid'=>$arrcolData[0],
					'to'=>$arrcolData[2],
					);
				
				 // print_r($arrData);die();
				
				if($arrData['bs_tid']=='')
				{
					$arrData['bs_tid']=NULL;
				}
				//$count($billSub)++;
				//print_r($arrData);die();
				$this->db->insert('bill_sub',$arrData);
		    }
			if($this->db->trans_status() === FALSE)
			{
				
				$this->db->query("rollback");
				$arrStatus['status'] ='ERR';$arrStatus['msg'][]='Database error';$arrStatus['tag'][]='show';$arrStatus['id'][]=$id;
			}
			else
			{
				//echo $id;die();
				$arrStatus['status'] ='OK';$arrStatus['msg'][]=$msg;$arrStatus['tag'][]='show';$arrStatus['id'][]=$id;
				$this->db->query("Commit");
			}
		return $arrStatus;
	}
		public function lookupBill($start,$end)
		{
			$arrData=NULL;
			$sql="SELECT b.bid as bid,c.cname,c.clname,b.bill_date AS bdate,b.net AS netamount FROM customer_master c,bill b WHERE c.cid=b.cid";
			//echo $sql; die();
			if($start !== '' && $end !=='')
				$sql=$sql." LIMIT ".$end." offset ".$start."";
			$res=$this->db->query($sql);
			$c=0;
			foreach($res->result() as $row)
			{
				$id=$row->bid;
				$fname=$row->cname;
				$lname=$row->clname;
				$arrData[$c]['items']['customer']=$fname." ".$lname; 
				$arrData[$c]['items']['bdate']=date("d-m-Y",strtotime($row->bdate));
				$arrData[$c]['items']['netamount']=$row->netamount;
				$arrData[$c]['items']['printfunction']="<span class='glyphicon glyphicon-print anchorLike' style='cursor:pointer' title='Bill,Click to view bill report' onclick=\"bill.getBillPrint('".$id."','')\"></span>";
				$arrData[$c]['editfunction']="bill.editBill(".$id.")";
				$arrData[$c]['deletefunction']="bill.deleteBill(".$id.")";
				$c++;
			}
			
			return $arrData;
		}
		
		public function lookupReport($start,$end,$fromdate,$todate)
		{
			$arrData=NULL;
			$sql="SELECT b.bid as bid,c.cname AS customer,b.bill_date AS bdate,b.net AS netamount FROM customer_master c,bill b WHERE c.cid=b.cid and bill_date between";
			//echo $sql; die();
			if($start !== '' && $end !=='')
				$sql=$sql." LIMIT ".$end." offset ".$start."";
			$res=$this->db->query($sql);
			$c=0;
			foreach($res->result() as $row)
			{
				$id=$row->bid;
				$arrData[$c]['items']['customer']=$row->customer;
				$arrData[$c]['items']['bdate']=$row->bdate;
				$arrData[$c]['items']['netamount']=$row->netamount;
				$arrData[$c]['items']['printfunction']="<span class='glyphicon glyphicon-print anchorLike' style='cursor:pointer' title='Bill,Click to view bill report' onclick=\"bill.getBillPrint('".$id."','')\"></span>";
				$arrData[$c]['editfunction']="bill.editBill(".$id.")";
				$arrData[$c]['deletefunction']="bill.deleteBill(".$id.")";
				$c++;
			}
			
			return $arrData;
		}
		
		public function getBill($id='')
		{
			$this->load->model('mcustomer');
			$this->load->model('mproduct');
			$this->load->model('mtherapy');
			$this->load->model('mtherapy_sub');
			$sql="SELECT * FROM bill";
			if($id!='')
				$sql=$sql." WHERE bid=".$id."";
			$res=$this->db->query($sql);
			$ret=NULL;
			$c=0;
			foreach($res->result() as $row)
			{
				
				$ret[$c]['bid']=$row->bid;
				$ret[$c]['bill_date']=$row->bill_date;
				$cid=$row->cid;
				$arrCustomer=$this->mcustomer->getCustomer($cid);
				$ret[$c]['cname']=$arrCustomer[0]['cname'];
				$ret[$c]['clname']=$arrCustomer[0]['clname'];
				$ret[$c]['cgender']=$arrCustomer[0]['cgender'];
				$ret[$c]['discount']=$row->discount;
				$ret[$c]['net']=$row->net;
				$ret[$c]['total']=$row->total;
				$ret[$c]['bill_sub']=NULL;
				$sql1="Select * from bill_sub WHERE bid=".$ret[$c]['bid']."";
				$res1=$this->db->query($sql1);	
				$k=0;
				foreach($res1->result() as $row1)
				{
					//$bs_pid='';
					
					
					$bs_tid=$row1->bs_tid;
					
					//echo $bs_pid;die();
					if($bs_tid != '')
					{
						//echo "hello";die();
						$arrTherapy=$this->mtherapy->getTherapy($bs_tid);
						$ret[$c]['bill_sub'][$k]['tname']=$arrTherapy[0]['tname'];
						$ret[$c]['bill_sub'][$k]['amount']=$arrTherapy[0]['amount'];
						//echo $ret[$c]['bill_sub'][$k]['tname'];die();
					}
				
					$ret[$c]['bill_sub'][$k]['bs_tid']=$row1->bs_tid;
					$ret[$c]['bill_sub'][$k]['to']=$row1->to;
					
					$k++;
				}
				
			$c++;	
			}
			//echo $ret; die();
			return $ret;
		}
		
		public function deleteBill($id='')
		{
			$arrStatus=NULL;
			$this->db->where('bid',$id);
			$res=$this->db->delete('bill_sub');
			
			$this->db->where('bid',$id);
			$res=$this->db->delete('bill');
			


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

		
	public function getcus($id='')
		{
			$sql="SELECT b.bill_no as bill_no,c.caddress as address,c.cname,c.clname FROM customer_master c,bill b WHERE b.bid='".$id."' AND c.cid=b.cid";
			//echo $sql;die();
			$res=$this->db->query($sql);
			$ret=NULL;
			$c=0;
			foreach($res->result() as $row)
			{
				$ret['name']=$row->cname;
				$ret['lname']=$row->clname;
				$ret['address']=$row->address;
				$ret['bill_no']=$row->bill_no;
				
			}
			return $ret;
			
			
		}
	
	}
?>