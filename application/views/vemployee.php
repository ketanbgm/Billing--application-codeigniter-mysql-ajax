<?php 
include('vheader.php');	 ?>
 <script src="<?php echo $base;?>js/employee.js"></script>
</head>
<?php include('vmenu.php');?>
<?php

    $name = '';
    $address = '';
    $dob ='';
    $doj = '';
    $avd = '';
    $gender = '';
	$contactno = '';
    $btnvalue = "Save";
    $oper = "Save";
	$id=0; 
	$btnfunct="employee.save('".$oper."',".$id.");";
	
    if (isset($updateData)) 
    {
		//print_r($updateData);die();
		$id= $updateData[0]['eid'];
        $name = $updateData[0]['ename'];
        $address = $updateData[0]['eaddress'];
		$contactno = $updateData[0]['eno'];
        $dob = $updateData[0]['edob'];
		$gender = $updateData[0]['egender'];
        $doj = $updateData[0]['edoj'];
		$avd = $updateData[0]['eavd'];
        //$subitemid = $updateData[0]['subitemId'];
        //$subitemname = $updateData[0]['subitemName'];
        $btnvalue = "Update";
        $oper = "Update";
        $btnfunct="employee.save('".$oper."',".$id.")";
     }
?>
 

     <div id="maincontent" >
       <?php //include('vmainhead.php');?><!-- end of <div id="adminpanel">-->
        <div id="maindata">
		  <div id="datacontent">
            <div class="panel panel-default" >
                <div class="panel-heading">
                         <!-- <span class="pull-right">
                            <a class="lookupclass" href="<?php// echo $base?>index.php/cemployee/lookupEmp">LookUp</a>
                          </span>-->
                    <h3 class="panel-title">Employee</h3>
                </div>
                <div class="panel-body">
                <table border="0" width="" align="center" cellpadding="5" > 
                    <input type="hidden" id="id" name="id" value=""/>
                    <tr>
                        <td class="lbl compulsory " width="40%">Employee Name: </td>
                        <td><input type="text" id="name" name="name" value="<?php echo $name; ?>"  data-placement="right" class="form-control" tabindex="1"/></td>
                    </tr>
                    <tr>
                        <td class="lbl compulsory">Gender: </td>
                        <td>
                            <select id="gender" name="gender" class="form-control" data-placement="right"  tabindex="2" >
                                <option value="-1">Select</option>
                               <?php
								  if(isset($arr) && is_array($arr))
								  {
									  $count= count($arr);
									  for($i=0;$i<$count;$i++)
									  {
										 $selected=''; 
										if($gender==$arr[$i])
											$selected="selected='selected'";
										 echo  "<option value='".$arr[$i]."' ".$selected.">".strtoupper($arr[$i])."</option>";
									  }
								  }
                             ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="lbl ">Mobile No.: </td>
                        <td>
                            <div class="input-group"><span class="input-group-addon">+91</span><input type="text" id="contactno" name="contactno" value="<?php echo $contactno; ?>"  tabindex="7" class="form-control" data-placement="right" maxlength="10"/></div>
                        </td>
                    </tr>
                    <tr>
                        <td class="lbl ">Address: </td>
                        <td><textarea id="address" name="address" value="" class="form-control" data-placement="right" tabindex="3" ><?php echo $address; ?></textarea></td>
                    </tr>
            
            
                    <tr>
                        <td class="lbl ">Date of Birth: </td>
                        <td><div class="input-group"><input type="text" class="form-control" id="dob" name="dob" value="<?php echo $dob; ?>" tabindex="4"/>
                           <span class="input-group-addon glyphicon glyphicon-calendar" style="cursor:pointer" onClick="employee.dob();"  ></span>
                           </div></td>
                    </tr>
                    <tr>
                        <td class="lbl ">Date of Joining: </td>
                        <td><div class="input-group"><input type="text" class="form-control" id="doj" name="doj" value="<?php echo $doj; ?>" tabindex="5"/>
                           <span class="input-group-addon glyphicon glyphicon-calendar" style="cursor:pointer" onClick="employee.doj();"></span>
                           </div></td>
                    </tr>
                    <tr>
                        <td class="lbl ">Anniversary date: </td>
                        <td><div class="input-group"><input type="text" class="form-control" id="avd" name="avd" value="<?php echo $avd; ?>"  tabindex="6"/>
                           <span class="input-group-addon glyphicon glyphicon-calendar" style="cursor:pointer" onClick="employee.avd();"></span>
                           </div></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        
            <input type="button" id="<?php echo $btnvalue;?>" name="<?php echo $btnvalue;?>"  value="<?php echo $btnvalue;?>"  onclick="<?php echo $btnfunct;?>"  tabindex="8" class="btn btn-success" />            &nbsp;&nbsp;&nbsp;&nbsp;
                    
                        </td>
                    </tr>
                </table>
                </div>
            </div>
           </div>
           <?php include('vfooter.php');	 ?>
