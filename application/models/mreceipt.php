<?php
class mreceipt extends CI_Model
{
	public function loadReceipt($ctype,$start,$end)
	{
		$ret = Null;
		$c = 0;
		/*$sql="SELECT DISTINCT(cname),cid FROM customer_master c WHERE cid IN (SELECT cid FROM bill) AND 
				((SELECT SUM(net) FROM bill b WHERE c.cid=b.cid)-(SELECT ISNULL (SUM(recamt)) FROM receipt_sub rs,receipt_master rm WHERE rs.rid=rm.rid AND rm.cid=c.cid))>0";*/
		//$sql= "SELECT DISTINCT(cid) FROM  bill WHERE ((SELECT SUM(net) AS net FROM bill b)-(SELECT SUM(recamt) AS receipt FROM receipt_sub rs,receipt_master rm WHERE rs.rid=rm.rid)>0)"; 
		if($ctype=='Pending')
		{
			$sql="SELECT DISTINCT(cname),clname,cid FROM customer_master c WHERE cid IN (SELECT cid FROM bill) AND ((SELECT COALESCE(SUM(net),0) FROM bill b WHERE c.cid=b.cid)-
			(SELECT COALESCE(SUM(recamt),0) FROM receipt_sub rs,receipt_master rm WHERE rs.rid=rm.rid AND rm.cid=c.cid))>0 LIMIT ".$start.",".$end."";
			//echo $sql;die();
		}
		else if($ctype=='Approved')
		{
			$sql="SELECT DISTINCT(cname),clname,cid FROM customer_master c WHERE cid IN (SELECT cid FROM bill) AND ((SELECT COALESCE(SUM(net),0) FROM bill b WHERE c.cid=b.cid)-
			(SELECT COALESCE(SUM(recamt),0) FROM receipt_sub rs,receipt_master rm WHERE rs.rid=rm.rid AND rm.cid=c.cid))=0 GROUP BY cname LIMIT ".$start.",".$end."";
		}
		/*else if($ctype=='All')
		{
			echo "hi"; die();
			$sql="SELECT DISTINCT(r.rid),r.cid,r.rec_numb,r.rectot,rs.recamt,c.cid FROM receipt_master r, receipt_sub rs, customer_master c WHERE r.rid=rs.rid AND r.cid=c.cid AND rs.recamt>0;";	
			echo 'sql..'.$sql; die();
			$res=$this->db->query($sql);
			foreach($res->result() as $row)
			{
				$ret[$c]['cid']=$row->cid;
				$cid=$row->cid;
				$this->load->model('mcustomer');
				$arrCustomer=$this->mcustomer->getCustomer($cid);
				$ret[$c]['items']['cname']=$arrCustomer[0]['cname'];
				$ret[$c]['items']['rec_numb']=$row->rec_numb;
				$ret[$c]['items']['recamt']=$row->recamt;
			}
			$c++;
		}*/
		
		$res=$this->db->query($sql);
		foreach ($res->result() as $row) 
		{
			$num=$res->num_rows();
		    if($num >0)
			{
				$ret[$c]['cid']=$row->cid;
				$cid=$row->cid;
				$this->load->model('mcustomer');
				$arrCustomer=$this->mcustomer->getCustomer($cid);
				$fname=$arrCustomer[0]['cname'];
				$lname=$arrCustomer[0]['clname'];
				$name=$fname." ".$lname;
				if($ctype=='Pending')
				{
					$ahrefStart = "<a href='javascript:void(0);' onclick=\"receipt.editReceipt('".$ret[$c]['cid']."')\">";$ahrefEnd = "</a>";
					$ret[$c]['items']['name']=$ahrefStart.$name.$ahrefEnd;
				}
				else if($ctype=='Approved')
				{
					$ret[$c]['items']['name']=$name;
				}
				$sql1="SELECT bid,bill_date,cid,bill_no,SUM(net) AS net FROM bill WHERE cid=".$ret[$c]['cid']."";
				//echo "sql1..".$sql1; die();
				$res1 = $this->db->query($sql1);
					foreach ($res1->result() as $row1) 
					{
						
						if($ctype=='Pending')
						{
							$ret[$c]['bid']=$row1->bid;
							$ret[$c]['items']['bill_no']=strtoupper($row1->bill_no);
							$ret[$c]['items']['net']=$row1->net;
						}
						$ret[$c]['bid']=$row1->bid;
						$ret[$c]['net']=$row1->net;
						$BillAmt=$ret[$c]['net'];
						$sql2="SELECT rs.rs_id,rs.rid,r.rec_numb,COALESCE (SUM(rs.recamt),0) AS recamt, bid FROM receipt_sub rs, receipt_master r WHERE r.rid=rs.rid AND r.cid=".$ret[$c]['cid']."";
						//echo "$sql2..".$sql2; die();
						$res2=$this->db->query($sql2);
						$num=$res2->num_rows();
						if($num>0)
						{
							foreach($res2->result() as $row2)
							{
									//$ret[$c]['items']['recamt']=$row2->recamt;
									$TotBill=$row2->recamt;
									//echo "total..".$TotBill; 
									if($ctype=='Pending')
									{
										$OpnBlnc=0;
										$OpnBlnc=$BillAmt-$TotBill;
										//echo "opening..".$OpnBlnc; die();
										$ret[$c]['items']['recamt']=$OpnBlnc;
										if($BillAmt==$OpnBlnc)
										{
											$ret[$c]['items']['status']='Open';	
										}
										else if($OpnBlnc<$BillAmt)
										{
											$ret[$c]['items']['status']='Partial';
										}
									}
									else if($ctype=='Approved')
									{
										$ret[$c]['items']['rec_numb']=strtoupper($row2->rec_numb);
										$ret[$c]['items']['recamt']=$TotBill;
									}
							}
						}
					}
			}
			$c++;
		}
		return $ret;	
	}
	
	public function getReceipt($id='')
	{
		$this->load->model('mcustomer');

		$ret=NULL;
		$c=0;
		$sql="SELECT * FROM bill";
		if($id!='')
			$sql=$sql." WHERE cid=".$id."";
			//echo $sql;die();
		$res = $this->db->query($sql);
		$arrCustomer=$this->mcustomer->getCustomer($id);
		$ret['cid']=$arrCustomer[0]['cid'];
		$fname=$arrCustomer[0]['cname'];
		$lname=$arrCustomer[0]['clname'];
		$ret['cname']=$fname." ".$lname;
		$ret['bill_details']=NULL;
		foreach ($res->result() as $row) 
		{
			
				$openbalance=$this->getopeningBalance($row->bid);
				if($openbalance > 0)	{		
				$ret['bill_details'][$c]['bid']=$row->bid;
				$ret['bill_details'][$c]['bill_no']=$row->bill_no;
				$ret['bill_details'][$c]['net']=$row->net;
				$ret['bill_details'][$c]['openbalance']=$openbalance;
				$ret['bill_details'][$c]['nreceived_amount']=$openbalance;
				$OpnBlnc=0;
				$c++;
				}
		}
		$ret[$c]['OpnBlnc']=$OpnBlnc;
		//print_r($ret);die();
		return $ret;
	}
	
	
	public function getopeningBalance($bid)
	{
		//echo $type;die();
		//echo $getopeningbal;die();
		
		$sql = "SELECT coalesce(net,0)-(select coalesce(sum(recamt),0) FROM receipt_sub 
					WHERE bid=".$bid.") as openbalance FROM bill b WHERE b.bid=".$bid."";
		//echo $sql;die(); 			
		$result = $this->db->query($sql);
		$openbalance=0;
		if(is_object($result))
		{
			$row = $result->row();
			$openbalance=$row->openbalance;
			//echo "o".$openbalance;
			//$openbalance=$openbalance+$getopeningbal; //echo "b".$openbalance;
		}
		//echo $openbalance;die();
		return $openbalance;
	}
	
	
	public function saveupdate_receipt($oper,$arrVal,$receiptSub,$bid='')
	{
		//print_r($receiptSub); die();
		//print_r($arrVal);die();
		$this->db->query("Begin");
		$arrVal['receipt_date']=date("Y-m-d",strtotime(str_replace("/","-",$arrVal['receipt_date'])));
	//	echo $arrVal['receipt_date'];die();
		$msg='';
			if($arrVal['recamt']>0)
			{
				//$this->db->insert('bill',$dataBill);
				$sql="INSERT INTO receipt_master (cid,rdate,rectot) VALUES ('".$arrVal['cid']."','".$arrVal['receipt_date']."','".$arrVal['recamt']."')";
				$res=mysql_query($sql);
				if($res)
				{
					$result=$this->db->query("Select LAST_INSERT_ID() as id from receipt_master");
					$row=$result->row();
					$id=$row->id;
					$rcptno="RECEIPT-".$id;
					
					$arrrowData=explode("^",$receiptSub);
					//$arrcolData=NULL;
					for($i=0;$i < count($arrrowData);$i++)
					{
						$arrcolData=explode("Â°",$arrrowData[$i]);
						//$arrcolData=explode("°",$arrrowData[$i]);         /*------------online------------*/
						//print_r($arrcolData);die();
							
							$arrData=array(
								'rid'=>$id,
								'bid'=>$arrcolData[0],
								'recamt'=>$arrcolData[4]
								
							);
							//print_r($arrData); die();
							$this->db->insert('receipt_sub',$arrData);
					}
					
					$this->db->query("UPDATE receipt_master SET rec_numb='".$rcptno."' WHERE rid='".$id."' ");
					//$res1="UPDATE bill SET bill_no='".$billno."' WHERE bid='".$id."' ";
					$msg="Record Saved";
				}
			}
			if($this->db->trans_status() === FALSE)
			{
				$this->db->query("rollback");
				$arrStatus['status'] ='ERR';$arrStatus['msg'][]='Database error';$arrStatus['tag'][]='show';$arrStatus['id']=$id;
			}
			else
			{
				$arrStatus['status'] ='OK';$arrStatus['msg'][]=$msg;$arrStatus['tag'][]='show';$arrStatus['id']=$id;
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
			$arrData[$c]['items']['bdate']=$row->bdate;
			$arrData[$c]['items']['netamount']=$row->netamount;
			$arrData[$c]['editfunction']="bill.editBill(".$id.")";
			$arrData[$c]['deletefunction']="bill.deleteBill(".$id.")";
			$c++;
		}
		
		return $arrData;
	}
	
	public function getReceiptsCnt($ctype)
	{
		//echo "ctype..".$ctype; die();
		$sql='';
		if($ctype=='Pending')
		{
			$sql="SELECT DISTINCT(cname),clname,cid FROM customer_master c WHERE cid IN (SELECT cid FROM bill) AND ((SELECT COALESCE(SUM(net),0) FROM bill b WHERE c.cid=b.cid)-(SELECT COALESCE(SUM(recamt),0) FROM receipt_sub rs,receipt_master rm WHERE rs.rid=rm.rid AND rm.cid=c.cid))>0 GROUP BY cname";
		}
		else if($ctype=='Approved')
		{
			$sql="SELECT DISTINCT(cname),clname,cid FROM customer_master c WHERE cid IN (SELECT cid FROM bill) AND ((SELECT COALESCE(SUM(net),0) FROM bill b WHERE c.cid=b.cid)-(SELECT COALESCE(SUM(recamt),0) FROM receipt_sub rs,receipt_master rm WHERE rs.rid=rm.rid AND rm.cid=c.cid))=0 GROUP BY cname";
		}
		else if($ctype=='All')
		{
			$sql="SELECT DISTINCT(r.rid),r.cid,r.rec_numb,r.rectot,rs.recamt,c.cid FROM receipt_master r, receipt_sub rs, customer_master c WHERE r.rid=rs.rid AND r.cid=c.cid AND rs.recamt>0;";	
		}
		
		
		$result=$this->db->query($sql);
		$cnt = 0 ;
		if(is_object($result))
			$cnt = $result->num_rows();
		//echo "cnt..".$cnt; die();
		return $cnt;
	}
	public function loadReceiptAll($start,$end)
	{
		$ret=NULL;
		$c=0;
		/*$sql="SELECT DISTINCT(r.rid),r.cid,r.rec_numb,r.rectot,rs.recamt,c.cid,b.bill_no FROM receipt_master r, receipt_sub rs, customer_master c WHERE r.rid=rs.rid AND r.cid=c.cid AND rs.recamt>0 LIMIT ".$start.",".$end.";";	*/
		$sql="SELECT * FROM bill_v WHERE recamt != net limit ".$start.",".$end.";";	
		//echo "sql..".$sql;
		$res=$this->db->query($sql);
		foreach($res->result() as $row)
		{
			$ret[$c]['cid']=$row->cid;
			$billno=$row->bid;
			$cid=$row->cid;
			$this->load->model('mcustomer');
			$arrCustomer=$this->mcustomer->getCustomer($cid);
			$fname=$arrCustomer[0]['cname'];
			$lname=$arrCustomer[0]['clname'];
			
			//echo $fname.$lname; die();
			$ret[$c]['items']['name']=$fname." ".$lname;
			$ret[$c]['items']['rec_numb']=strtoupper($row->rec_numb);
			//$this->load->model('mbill');
			//$arrCustomer=$this->mbill->getBill($bid);
			$ret[$c]['items']['bill_no']=strtoupper($billno);
			//$ret[$c]['items']['bill_no']=strtoupper($row->bill_no);
			$ret[$c]['items']['recamt']=$row->recamt;
			$c++;
		}
		return $ret;
	}
}
?>