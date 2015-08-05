<html>
<head>
<style type="text/css">
	body{ font-family:Arial, Helvetica, sans-serif; }
	table
	{
		font-size: 0.75em;
		background: #FFFFFF;
		border-collapse:collapse;
	}
	.rlbl, .rdata, .maindata, .contentdata, .contentdata1
	{
		font-size:0.75em;
	}
	.rlbl
	{
		font-weight:600;
		font-size:0.75em;
		text-align:left;
	}
	.rdata{ text-align:left; }
	
	/*.tableclass{ width:100%; }
	
	/*.maindata { font-size:12pt; }
	
	.contentdata{ font-size:10pt; }
	
	.contentdata1{ font-size:11pt; }*/
	.para{ margin-top:0px;margin-bottom:2px; }
</style>
</head>
<body>

<?php
//print_r($dataBill);die();
$name=$dataCustomer['name'];
$address=$dataCustomer['address'];
$bill_no=$dataCustomer['bill_no'];
$net=$dataBill[0]['net'];
//echo $bill_no;die();
$bill_date=date("d-m-Y",strtotime(str_replace("/","-",$dataBill[0]['bill_date'])));
$net=$dataBill[0]['net'];
$tname=$dataBill[0]['bill_sub'][0]['tname'];
$discount=$dataBill[0]['bill_sub'][0]['bs_discount'];
$total=$dataBill[0]['bill_sub'][0]['to'];

?>
	<table align="center" cellpadding="10" cellspacing="0" style="border:1px solid #000;margin:0px auto;width: 100%;">
        <tr>
        	<td style="width:50%;" align="center"><h6 align="center">
            		<h5>Deepak's Unisex Span Saloon</h5> demo belgaum</h6>
            </td>
        
        	<td align="right" style="width:50%;"><img src="img/backend-logo.png"  style="float:right;"/></td>
        </tr>
    </table>
            
   <table align="center" cellpadding="10" cellspacing="0" style="border:1px solid #000;margin:0px auto;width: 100%;">
        <tr>
      		 <td class="rlbl contentdata1" style="width: 50%; border: none;;padding:2px 3px 2px 5px;"><small>Bill No. </small></td>
                        <td style="width: 50%; border: none;padding:2px 3px;" class="rdata contentdata"><small>: <?php echo $bill_no;?></small></td>
                        
        </tr>
        <tr>
       <td class="rlbl contentdata1" style="width: 50%; border: none;;padding:2px 3px 2px 5px;"><small>Bill Date </small></td>
                        <td style="width: 50%; border: none;padding:2px 3px;" class="rdata contentdata"><small>: <?php echo $bill_date;?></small></td>
                        
        </tr>
         <tr>
       <td class="rlbl contentdata1" style="width: 50%; border: none;;padding:2px 3px 2px 5px;"><small>Customer Name. </small></td>
                        <td style="width: 50%; border: none;padding:2px 3px;" class="rdata contentdata"><small>: <?php echo $name;?></small></td>
                        
        </tr>
         <tr>
       <td class="rlbl contentdata1" style="width: 50%; border: none;;padding:2px 3px 2px 5px;"><small>Address. </small></td>
                        <td style="width: 50%; border: none;padding:2px 3px;" class="rdata contentdata"><small>: <?php echo $address;?></small></td>
                        
        </tr>
   	</table>

           <table border="0" align="left" width="100%" style="padding-top:0px; width:100%;">
                <tr style='background-color:#eee;'>
                    <th style="width:25%; border:1px solid #000;" align="center" class="contentdata"><small>Sl.No</small></th>
                   <!-- <th class="rlbl contentdata1" style="width: 15%; border: none;;padding:2px 3px 2px 5px;"><small>Sl.No </small></th>
                        <!--<th style="text-align:center">Sl.No</th>-->
                    <th style="width:25%; border:1px solid #000;" align="center" class="contentdata"><small>Therapy Name</small></th>
                        <!--<th style="text-align:center">RegNo</th>-->
                    <th style="width:25%; border:1px solid #000;" align="center" class="contentdata"><small>Discount</small></th>
                        <!-- <th style="text-align:center">Last Name</th> -->
                    <th style="width:25%; border:1px solid #000;" align="center" class="contentdata"><small>Price</small></th>
                   
                        <!--<th style="text-align:center">Gender</th>-->
                           
                        <!--<th style="text-align:center">Address</th>-->
                            
                       <!-- <th style="text-align:center">newcasedate</th>-->
                       <!--<th style="width: 9%; border: solid 1px #000000;border-left:0px;" align="center" class="contentdata"><small>Newdate</small></th>-->
                       <!-- <th style="width: 9%; border: solid 1px #000000;border-left:0px;" align="center" class="contentdata"><small>followupdate</small></th>
                        
                         <!--<th style="text-align:center">followupdate</th>-->
                    
                        <!-- <th style="text-align:center">Delete</th> -->
             </tr>
                <!--<tbody>
                        <!--<th style="text-align:center">Sl.No</th>
                     
                        <th style="text-align:center">RegNo</th>
                        <!-- <th style="text-align:center">Last Name</th> 
                        <th style="text-align:center">PatientName</th>
                    
                        <th style="text-align:center">Dept</th>
                        <th style="text-align:center">Age</th>
                        <th style="text-align:center">Gender</th>
                        <th style="text-align:center">Address</th>
                        <th style="text-align:center">newcasedate</th>
                         <th style="text-align:center">followupdate</th>
                    
                        <!-- <th style="text-align:center">Delete</th> 
                    </tr>
                </thead>-->
                <tbody>
                        <?php
                            $cnt = count($res);
                            //print_r($res);die();
                            $n=1; 
                            if($cnt > 0)
                            {
                                for($i=0; $i<$cnt; $i++)
                                {
                                    echo '<tr>';
                                    echo '<td style="text-align:center" style="border:1px solid #666;">'.$n.'</td>';
                                    //echo '<td>'.$arrVal[$i]['fname'].' '.$arrVal[$i]['lname'].'</td>';
                                    // echo '<td>'.$arrVal[$i]['lname'].'</td>';
                                    echo '<td style="border:1px solid #666;">'.$tname.'</td>';
                                    echo '<td style="border:1px solid #666;">'.$discount.'</td>';
                                    echo '<td style="border:1px solid #666;">'.$total.'</td>';
                                    echo '</tr>';
                                //echo '<td>'.$res[$i]['newdate'].'</td>';
                                    //echo '<td>'.$res[$i]['followupdate'].'</td>';
                                        //echo '<td>'.$res[$i]['casetype'].'</td>';
                                    //echo '<td style="text-align:center">
                                            //<i class="icon-edit" onClick="saveDeal.editdealer('.$arrVal[$i]['id'].')" style="cursor:pointer;" value="Update" title="Update" name="update"></i>&nbsp &nbsp 
                                           // <i class="icon-trash" onClick="saveDeal.deletedealer('.$arrVal[$i]['id'].')" title="Delete" style="cursor:pointer;" value="Delete" name="delete"></i>
                                          //</td>';
                                    // echo '<td> <button class="btn btn-success" id="editbtn" onclick="editEmp('.$arrVal[$i]['id'].')"/>Edit</button> </td>';
                                    // echo '<td> <button class="btn btn-danger" id="deletebtn" onclick="deleteEmp('.$arrVal[$i]['id'].')"/>Delete</button> </td>'; 
                                    $n++;
                                }
                            }
                    ?>
             </tbody>
        </table>	
            
</body>
</html>