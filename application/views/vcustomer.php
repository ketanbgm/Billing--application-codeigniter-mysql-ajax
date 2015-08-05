<?php include('vheader.php');?>
<script src="<?php echo $base;?>js/customer.js"></script>
</head>
<?php include('vmenu.php');?>
<?php
	$cname='';
	$lastname='';
	$cgender='';
	$caddress='';
	$cdob='';
	$canndate='';
	$contactno='';
	$cemailid='';

	$btnvalue='Save';
	$oper='Save';
	$id=0;
	$btnfunct="customer.save('".$oper."',".$id.");";
	if(isset($dataCustomer))
	{
		//print_r($dataCustomer); 
		$id=$dataCustomer[0]['cid'];
		$cname=$dataCustomer[0]['cname'];
		$lastname=$dataCustomer[0]['clname'];
		//echo "lastname".$lastname; die();
		$cgender=$dataCustomer[0]['cgender'];
		$caddress=$dataCustomer[0]['caddress'];
		$cdob=$dataCustomer[0]['cdob'];
		$canndate=$dataCustomer[0]['canndate'];
		$contactno=$dataCustomer[0]['contactno'];
		$cemailid=$dataCustomer[0]['cemailid'];
		$btnvalue='Update';
		$oper='Update';
		$btnfunct="customer.save('".$oper."',".$id.");";
	}
	
?>
    
     <div id="maincontent" >
       <?php //include('vmainhead.php');?><!-- end of <div id="adminpanel">-->
        <div id="maindata">
		  <div id="datacontent">
            <div class="panel panel-default" >
                <div class="panel-heading">
                         <!-- <span class="pull-right">
                            <a class="lookupclass" href="<?php//echo $base?>index.php/ccustomer/lookupCustomer">LookUp</a>
                          </span>-->
                    <h3 class="panel-title">Customer</h3>
                </div>
                <div class="panel-body">
                <table border="0" width="" align="center" cellpadding="5" > 
                  <!--  <input type="hidden" id="id" name="id" value=""/>-->
                    <tr>
                        <td class="lbl compulsory" width="40%">Customer Name: </td>
                        <td width="30%" ><input type="text" id="name" name="name" value="<?php echo $cname;?>"  data-placement="right" class="form-control" tabindex="1" placeholder="Firstname"  onkeyUp="customer.loadAutocomplete('name',this.value,'name');"/></td>
                       	<td width="30%"><input type="text" id="lname" name="lname" value="<?php echo $lastname;?>" data-placement="right" class="form-control" tabindex="2" placeholder="Lastname" onkeyUp="customer.loadAutocomplete('lname',this.value,'lname');"/></td>
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
                        <td class="lbl">Mobile No.: </td>
                        <td>
                            <div class="input-group"><span class="input-group-addon">+91</span><input type="text" id="contactno" name="contactno" value="<?php echo $contactno;?>"  tabindex="4" class="form-control" data-placement="right" maxlength="10"/></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="lbl ">Address: </td>
                        <td><textarea type="text" id="address" name="address"  class="form-control" data-placement="right" tabindex="5" ><?php echo $caddress;?></textarea></td>
                    </tr>
                    <tr>
                        <td class="lbl">Date of Birth: </td>
                        <td><div class="input-group"><input type="text" class="form-control" id="dob" name="dob" value="<?php echo $cdob;?>"  tabindex="6"/>
                                   <span class="input-group-addon glyphicon glyphicon-calendar" style="cursor:pointer" onClick="customer.dob();" ></span>
                            </div></td>
                    </tr>
                     <tr>
                        <td class="lbl ">Anniversary Date:</td>
                        <td><div class="input-group"><input type="text" class="form-control" id="anndate" name="anndate" value="<?php echo $canndate;?>"  tabindex="7">
                                   <span class="input-group-addon glyphicon glyphicon-calendar" style="cursor:pointer" onClick="customer.anndate();" ></span>
                            </div></td>
                    </tr>
                    
                    <tr>
                        <td class="lbl ">Email-ID:</td>
                        <td>
                            <input type="text" id="cemailid" name="cemailid" value="<?php echo $cemailid;?>"  class="form-control" data-placement="right"  tabindex="8"/></div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <input type="button" id="<?php echo $btnvalue;?>" name="<?php echo $btnvalue;?>"  value="<?php echo $btnvalue;?>"  onclick="<?php echo $btnfunct;?>"   tabindex="9" class="btn btn-success" />
                        &nbsp;&nbsp;&nbsp;&nbsp;
                    
                        </td>
                    </tr>
                </table>
                </div>
            </div>
           </div>
           <?php include('vfooter.php');	 ?>
