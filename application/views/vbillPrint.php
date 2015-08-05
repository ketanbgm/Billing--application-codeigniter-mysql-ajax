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
<?php
//print_r($dataBill);die();
$fname=$dataCustomer['name'];
$lname=$dataCustomer['lname'];
$name=$fname." ".$lname; 
$address=$dataCustomer['address'];
$bill_no=$dataCustomer['bill_no'];
$total=$dataBill[0]['total'];
$discount=$dataBill[0]['discount'];
$net=$dataBill[0]['net'];
//$net=($total-$discount);
//echo "discount".$discount."net".$net."total".$total; die();

$nw = new Numbertowords();
$numinwords = $nw->convert_number($net);
//echo $numinwords;die();
$bill_date=date("d-m-Y",strtotime(str_replace("/","-",$dataBill[0]['bill_date'])));
$tname=$dataBill[0]['bill_sub'][0]['tname'];
//echo $tname;die();
//$discount=$dataBill[0]['bill_sub'][0]['bs_discount'];
//$total=$dataBill[0]['bill_sub'][0]['to'];
?>
</head>
<body>
<div style="border:1px solid #000; width:100%; height:480px;">
<div style="border:0px solid #000000;width:100%;">
	<table align="center" border="1" cellpadding="10" cellspacing="0" style="border:1px solid #000;margin:0px auto;width: 100%; border-top:none;">
        <tr>
        	<td style="width:50%; border-right:none; border-left:none;" align="left">
            	<h4 style="margin:0px;">Deepak's Spa Salon</h4>
                <span style="margin:0px; font-size:9pt; font-weight:bold;">Opp. RPD College, Tilakwadi,Belagavi,<br/>Karnataka- 590006, India. </span>
       </td>
            <td align="right" style="width:50%; border-left:none; border-right:none;"><img src="img/backend-logo.png" style="float:right; width:92px; height:50px;"/></td>
            	
        </tr>
   	</table>

    <table border="0" class="tableclass" style="border: solid 1px #000000;" cellspacing="0" cellpadding="0">
    <tr>
        <td colspan="4" align="center"><span style="text-decoration:underline;margin:0px auto;" class="contentdata1"><b>BILL</b></span></td>
    </tr>
                    
        <tr>
      		 <td class="rlbl contentdata1" style=" padding:3px; width:30%; font-size: 10pt;">Bill No. </td>
             <td style="padding:3px; width:70%;font-size: 10pt;" class="rdata contentdata">: <?php echo strtoupper($bill_no);?></td>
        </tr>
        <tr>
       		<td class="rlbl contentdata1" style="padding:3px; width:30%;font-size: 10pt;">Bill Date </td>
      		 <td style="padding:3px; width:70%;font-size: 10pt;" class="rdata contentdata">: <?php echo $bill_date;?></td>
        </tr>
         <tr>
       		<td class="rlbl contentdata1" style="padding:3px; width:30%;font-size: 10pt; ">Customer Name </td>
            <td style="padding:3px;width:70%;font-size: 10pt;" class="rdata contentdata">: <?php echo strtoupper($name);?></td>
        </tr>
        <?php 
		if($address!='')
		{
		?>
        <tr>
      		<td class="rlbl contentdata1" style="padding:3px; width:30%;font-size: 10pt;">Address </td>
            <td style="padding:3px; width:70%;font-size: 10pt;" class="rdata contentdata">: <?php echo $address;?></td>
        </tr>
        <?php
		}
		?>
   	</table>&nbsp;
     <table width="100%" border="0" align="left" cellpadding="10" cellspacing="10" style="padding-top:0px; width:100%;">
                <tr style="background-color:#eee;">
                    <th style="width:10%; border:1px solid #000;padding:5px;" align="center" class="contentdata"><small>Sl.No</small></th>
                    <th  style="width:50%; border:1px solid #000; border-right:none; padding:5px;" align="left" class="contentdata"><small>Therapy Name</small></th>
                    <th style="border:1px; width:15%; border-left:none;padding:5px;">&nbsp;</th>
                     <th style="width:25%; border:1px solid #000;padding:5px;" align="right" class="contentdata"><small>Amount</small></th>
                    </tr>
                    <tbody>
                    
                    <?php
					/*	$kCnt = 0;
						$brTag = "";
						$adCnt = count($dataBill);
						for($i=0;$i<$adCnt;$i++)
						{
							$tname=explode(',',$dataBill[0]['bill_sub'][$i]['tname']);
							$tCnt = ceil(count($tname)/2);
							$kCnt = $kCnt + $tCnt;
						}
						if(($i+1) == $adCnt)
						{
							if($kCnt < 30)
							{
								while($kCnt < 23){
									$brTag = $brTag . "<br/>";// to add extra height to column if total rows less than 30
									$kCnt++;
								}
							}
						}*/
					?>
                        <?php
                            $cnt = count($dataBill[0]['bill_sub']);							
                            //echo($cnt);die();
                            $n=1; 
                            if($cnt > 0)
                            {
                               for($i=0; $i<$cnt; $i++)
                                {
                                    echo '<tr>';
										echo '<td style="text-align:center;border:1px solid #666; padding:5px;font-size: 10pt;">'.$n.'</td>';
										echo '<td  style="border:1px solid #666; text-align:left; border-right:none; padding:5px;font-size:10pt;">'.$dataBill[0]['bill_sub'][$i]['tname'].'</td>';
										echo '<td  style="border:1px solid #666; text-align:right; border-left:none; padding:5px;font-size: 13.6667px;">&nbsp;</td>';
										echo '<td style="border:1px solid #666; text-align:right;font-size: 13.6667px;">'. sprintf('%0.2f',round($dataBill[0]['bill_sub'][$i]['amount'])).'</td>';
										//echo '<td style="border:1px solid #666; text-align:center">'.$dataBill[0]['bill_sub'][$i]['bs_discount'].'</td>';
										//echo '<td style="border:1px solid #666; text-align:right">'.$dataBill[0]['bill_sub'][$i]['to'].'</td>';
                                    echo '</tr>';
									$n++;

                                }
								
								if($cnt>=6)
								{
									echo '<tr>
											<td style="height:400px; border:1px solid #666;">&nbsp;</td>
											<td style="height:400px; border:1px solid #666; border-right:none;">&nbsp;</td>
											<td style="height:400px; border:1px solid #666;border-left:none;">&nbsp;</td>
											<td style="height:400px; border:1px solid #666;">&nbsp;</td>
										</tr>';
								}
                            }
							else
							{
								  echo '<tr>';
								  echo '<td colspan="9";style="text-align:center;border:1px solid #000;">NO RECORDS</td>';
								  echo'</tr>';
							}
                    ?>
                    <tr>
                    	<td colspan="2" style='border-right: solid 1px #000000;'>&nbsp;</td>
                    	<td  style='border:1px solid #000000;padding:5px;' align="right"><small>Total Amount </small></td>
                        <td  class="rlbl contentdata" style="border: solid 1px #000000;"  align="right"><?php echo sprintf('%0.2f',round($total));?></td>
                        
                    </tr>
                    <?php if($discount!=0)
					{
						
					?>
                    <tr>
                    	<!--<td  style='border-right: solid 1px #000000;'>&nbsp;</td>-->
                    	<td  colspan="2" style='border-right: solid 1px #000000;'>&nbsp;</td>
                    	<td style='border:1px solid #000000;padding:5px; ' align="right"><small>Discount</small></td>
                        <td  class="rlbl contentdata" style="border: solid 1px #000000;" align="right"><?php echo sprintf('%0.2f',round($discount));?></td>
                        
                    </tr>
                    <?php } ?>
                    <tr>
                    	<td colspan="2" style='border-right: solid 1px #000000;'>&nbsp;</td>
                    	<td  style='border:1px solid #000000;padding:5px;' align="right">Net Amount</td>
                        <td  class="rlbl contentdata" style="border: solid 1px #000000;"  align="right"><?php echo sprintf('%0.2f',round($net));?></td>
                        
                    </tr>
             
             		
             </tbody>
                    </table>
                    
                    <p style="vertical-align:baseline;margin-right:10px;text-decoration:underline;" align="right"><small>( Rupees <?php echo ucwords($numinwords);?> Only )</small></p>
                    <table align="right">
                    <tr>
                    <td colspan="3"></td>
                    <td align="right" valign="bottom" style="padding-right: 5px;border-top:0px;border-left:0px;"><small>
                    <br>
                    <br>
                    <br>
                    
                    <h5 style="margin-bottom: 5px;">Authorised Signature</h5></small></td>
                   
                    <td ></td>
					</tr>
                    </table>
     <div align="right" style="margin-bottom:0px;"></div>
     <div align="right" ><span style="font-size:8pt;">(Inclusive of all taxes)&nbsp;&nbsp;</span></div>
</div>                    
</div>
<div align="right"><span style="font-size:8pt;">Powered by Darshan Design Pro.Pvt.Ltd</span></div>
</body>
</html>