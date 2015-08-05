<?php include('vheader.php');?>
<script src="<?php echo $base;?>js/bill.js"></script>
<script src="<?php echo $base;?>js/customer.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>js/grid.js"></script>
<script type="text/javascript">
	var gridArr=new Array();
	gridArr['tblid']="ItemDetails";
	gridArr['deleteOption']=true;
	gridArr['editOption']=false;
	//gridArr['editFlds']=new Array(1);
	//gridArr['editFldsEvents']=new Array('onblur');
	//gridArr['editFldsEventFunctions']=new Array("hotelmenu.validateItemDetailsAfterEdit(this.value,this)");
	gridArr['callAfterDelete']="checkIfHasRec()"; 
	gridArr['validationFunc']="bill.validateItemDetailsBeforeAdd()";
	gridArr['getValueFunc']="bill.getItemDetailsBeforeAdd()";
	gridArr['resetfieldsFunc']="bill.resetItemDetailsFields()";

</script>
</head>
<?php include('vmenu.php');?>
<?php
if(isset($dataBill))
{
	//print_r($dataBill);die();
	$bid=$dataBill[0]['bid'];
	//$bill_date=$dataBill[0]['bill_date'];
	$bill_date=date("d-m-Y",strtotime(str_replace("/","-",$dataBill[0]['bill_date'])));
	$net1=$dataBill[0]['net'];
	//$cid=$dataBill[0]['cid'];
	$cname=$dataBill[0]['cname'];
	$lname=$dataBill[0]['clname'];
	$cgender=$dataCustomer[0]['cgender'];
	$total=$dataBill[0]['total'];
	$discount=$dataBill[0]['discount'];
	//echo $dataBill[0]['total'];die();
	//$tid=$arrTherapysubData[0]['tid'];
	//$ncategory_id=$arrMenuData[0]['ncategory_id'];
	$btnvalue='Update';
	$oper='Update';
	$disabled='';
	$btnfunct="bill.save('".$oper."',".$bid.");";
	//print_r($arrBill);die();
}
else
{
	//die();
	//echo"hi";
	$cname='';
	$lname='';
	$cgender='';
	$total='';
	$tid='';
	$bill_date=date("d-m-Y");
	$btnvalue='Save';
	$oper='Save';
	$id=0;
	$net1='';
	$total='';
	$discount=0;
	$btnfunct="bill.save('".$oper."',".$id.");";
	$disabled="disabled";
}/*if(isset($aa))
	{
		$id=$dataCustomer[0]['cid'];
		$cname=$dataCustomer[0]['cname'];
		$cgender=$dataCustomer[0]['cgender'];
		$caddress=$dataCustomer[0]['caddress'];
		$cdob=$dataCustomer[0]['cdob'];
		$canndate=$dataCustomer[0]['canndate'];
		$contactno=$dataCustomer[0]['contactno'];
		$cemailid=$dataCustomer[0]['cemailid'];
		$btnvalue='Update';
		$oper='Update';
		$btnfunct="customer.save('".$oper."',".$id.");";
	}*/
	
?>
<script>
$(document).ready(function(e) {
     /*var net='<?php echo $net1; ?>';  
	 alert(net);
 	 cal_total(net);*/
});
 </script>
     <div id="maincontent" >
       <?php // include('vmainhead.php');?><!-- end of <div id="adminpanel">-->
        <div id="maindata">
		  <div id="datacontent">
            <div class="panel panel-default" >
                <div class="panel-heading">
                       <!--<span class="pull-right">
                            <a class="lookupclass" href="<?php//echo $base?>index.php/cbill/lookupBill">LookUp</a>
                          </span>-->
                    <h3 class="panel-title">Bill</h3>
                </div>
                <div class="panel-body">
                <table border="0" width="" align="center" cellpadding="5" style="width:60%;" > 
                  <!--  <input type="hidden" id="id" name="id" value=""/>-->
                 <!-- <tr><td colspan="2" align="center"><input type="radio" id="therapy" name="category" value="therapy" onChange="disablefields();" /> Therapy   &nbsp;
							<input type="radio" id="product" name="category"  value="product" onChange="disablefields();"/> Product
                    </td>
                     </tr>-->
                   <tr>
                        <td class="lbl compulsory" width="40%">Customer Name: </td>
                        <td width="30%" ><input type="text" id="name" name="name" value="<?php echo $cname;?>"  data-placement="right" class="form-control" tabindex="1" placeholder="Firstname"  onkeyUp="customer.loadAutocomplete('name',this.value,'name');"/></td>
                       	<td width="30%"><input type="text" id="lname" name="lname" value="<?php echo $lname;?>" data-placement="right" class="form-control" tabindex="2" placeholder="Lastname" onkeyUp="customer.loadAutocomplete('lname',this.value,'lname');"/></td>
                    </tr>
                    
                    <tr>
                        <td class="lbl compulsory">Gender: </td>
                        <td >
                            <select id="cgender" name="cgender" class="form-control" data-placement="right"  tabindex="3">
                                <option value="-1">Select</option>
                                <?php
							  if(isset($arr) && is_array($arr))
							  {
								  $count= count($arr);
								 
								  for($i=0;$i<$count;$i++)
								  {
									 $selected=''; 
									if($cgender==$arr[$i])
										$selected="selected='selected'";
									 echo  "<option value='".$arr[$i]."' ".$selected.">".strtoupper($arr[$i])."</option>";
								  }
							  }
								 ?>
                            </select>
                        </td>
                    </tr>
                      <tr>
                                <td class='lbl compulsory'>Therapy :</td>
                                <td  colspan="2">
                               
                                    <select id="tname"  class="selectpicker" data-placement="right" data-live-search="true" name="tname" onChange="sub_ther(this.value)" tabindex="3">
                                    <option value="-1">Select</option>
                                    <?php
								//print_r($arrBill);die();
								  	for($i=0;$i<count($arrBill);$i++)
								    {
										$selected='';
										if($tid==$arrBill[$i]['tid'])
											$selected='selected="selected"';
										echo "<option value='".$arrBill[$i]['tid']."' ".$selected.">".$arrBill[$i]['tname']."</option>";
								   }
								?>
                                    </select> 
                                </td>
                            </tr>
                         <!--   <tr>
                                <td class='lbl compulsory' width="40%">Sub Therapy :</td>
                                <td width="50%" >
                               
                                    <select id="sub_name" class="form-control"  data-placement="right"   name="sub_name" onChange="get_rate(this.value)" >
                                    
                                    </select> 
                                    
                                </div>                             
                                </td>
                            </tr>
                      <tr>
                      <tr>
                        <td class="lbl" width="40%">Product: </td>
                        <td width="50%">
                            <select id="pname" class="form-control" name="pname" data-placement="right" onChange="get_prodrate(this.value)" >
                                <option value="-1">Select</option>
                                <?php/*
								   for($i=0;$i<count($arrProduct);$i++)
								   {
										$selected='';
										if($tid==$arrProduct[$i]['pid'])
											$selected='selected="selected"';
										echo "<option value='".$arrProduct[$i]['pid']."' ".$selected.">".$arrProduct[$i]['pname']." ".$arrProduct[$i]['qnty']."</option>";
								   }*/
								 ?>
                            </select>
                        </td>
                    </tr>-->
                    
                    <tr>
                        <td class="lbl compulsory">Bill Date: </td>
                        <td><div class="input-group"><input type="text" class="form-control" id="bill_date" name="bill_date" value="<?php echo $bill_date;?>" tabindex="4">
                                   <span class="input-group-addon glyphicon glyphicon-calendar" style="cursor:pointer;" onClick="bill_date();" ></span>
                            </div></td>
                    </tr>
                     
               
                   
                    <tr>
                        <td class="lbl ">Rate:</td>
                        <td>
                            <input type="text" id="total" name="total" value=""  class="form-control" data-placement="right"  disabled/></div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <input type="button" id="<?php echo $btnvalue;?>" name="Add"  value="Add"  onclick="return addToGrid(gridArr); " class="btn btn-success"  tabindex="5"/>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                    
                        </td>
                    </tr>
                          <tr>
                    <td colspan="3">
                        <table align="center" class="p98tab tblcellborder grid table-bordered" style="margin-bottom:0px;font-size:13px;width:100%;" id="ItemDetails" width="50%">
                            <tr>
                                <th>Therapy Name</th>
                                <th>Total Amount</th>
                                <th >Delete</th>
                            </tr> 
                             <?php
							// print_r($dataBill); die();
							   if(isset($dataBill[0]['bill_sub']))
								{
									//print_r($arrVal[0]['booking']); die();
									$tblid="ItemDetails";
									if(count($dataBill[0]['bill_sub'])>0)
									{
										//print_r($dataBill[0]['bill_sub']);die();
										for($j=0;$j<count($dataBill[0]['bill_sub']);$j++)
										{
													echo "<tr id='".$tblid."_".($j+1)."' style='height:40px;'>";
													echo "<td style='display:none;'>".$dataBill[0]['bill_sub'][$j]['bs_tid']."</td>";
													echo "<td>".$dataBill[0]['bill_sub'][$j]['tname']."</td>";
													echo "<td>".$dataBill[0]['bill_sub'][$j]['to']."</td>";
												
												/* add this if edit or delete option present */
												echo "<td align='center'>";
													echo "&nbsp;&nbsp;<span class='glyphicon glyphicon-trash' 
													onclick=\"removeFromGrid('".$tblid."','".($j+1)."','checkIfHasRec();');\" 
													style='cursor:pointer;'></span>";
												echo "</td>";
												
											echo '</tr>';	
										}
									}
								}
							?>
                        </table> 
                    </td>
                </tr>
                     <tr>
                        <td class="lbl ">Discount:</td>
                        <td>
                        <input type="hidden" id="hdn" name="hdn" value="<?php echo $total;?>"/>
     					 <input type="text" id="discount" name="discount" placeholder="In Rupees" value="<?php echo $discount;?>"  tabindex="6" class="form-control" data-placement="right" onKeyUp="cal_total(this.value);"/></div>
                        </td>
                    </tr>
                 <tr>
                 <?php //echo $net1; ?>
                        <td class="lbl ">Net Total:</td>
                        <td>
                            <input type="text" id="net_amount" name="net" value="<?php echo $net1; ?>"  class="form-control"  tabindex="7" disabled data-placement="right"/></div>
                        </td>
                    </tr>
                <tr>
                    <td></td>
                     
                    <td>
                    <input type="button" id="<?php echo $btnvalue;?>" name="<?php echo $btnvalue;?>"  value="<?php echo $btnvalue;?>" tabindex="8" class="btn btn-success" onClick="<?php echo $btnfunct;?>" />
                   
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                </table>
                </div>
            </div>
           </div>
           <?php include('vfooter.php');	 ?>
