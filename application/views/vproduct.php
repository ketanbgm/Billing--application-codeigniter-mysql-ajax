<?php 
include('vheader.php');	 ?>
 <script src="<?php echo $base;?>js/product.js"></script>
</head>
	<?php include('vmenu.php');?>
<?php

    $name = '';
    $qnty ='';
    $rate = '';
	$btnvalue='Save';
	$oper='Save';
	$id=0;
	$btnfunct="product.save('".$oper."',".$id.");";
	if(isset($arrProduct))
	{
	//print_r($arrProduct);die();

		$id= $arrProduct[0]['pid'];
        $name = $arrProduct[0]['pname'];
        $qnty = $arrProduct[0]['qnty'];
		$rate = $arrProduct[0]['rate'];
        //$subitemid = $updateData[0]['subitemId'];
        //$subitemname = $updateData[0]['subitemName'];

        $btnvalue = "Update";
        $oper = "Update";
        $btnfunct="product.save('".$oper."',".$id.")";
		
	}
	
?>
     <div id="maincontent" >
       <?php //include('vmainhead.php');?><!-- end of <div id="adminpanel">-->
        <div id="maindata">
		  <div id="datacontent">
            <div class="panel panel-default" >
                <div class="panel-heading">
                          <!--<span class="pull-right">
                            <a class="lookupclass" href="<?php echo $base?>index.php/cproduct/lookupProd">LookUp</a>
                          </span>-->
                    <h3 class="panel-title">Product</h3>
                </div>
                <div class="panel-body">
                	<!--<input type="hidden" name="baseurl" id="baseurl" value="<?php// echo $base;?>"/>-->
                <table border="0" width="" align="center" cellpadding="5" > 
                    <input type="hidden" id="id" name="id" value=""/>
                     <tr>
                        <td class="lbl compulsory">Product Name: </td>
                        <td><input type="text" id="pname" name="pname" class="form-control" value="<?php echo $name; ?>" placeholder="Name" ></td>
                        <td><span class="suffix">-</span></td>
                        <td><input type="text" id="qnty" name="qnty" class="form-control" value="<?php echo $qnty; ?>" placeholder="Quantity" ></td>
                    </tr>
                    <tr>
                        <td class="lbl compulsory">Rate: </td>
                        <td>
                            <div class="input-group"><input type="text" id="rate" name="rate" value="<?php echo $rate; ?>"  class="form-control" data-placement="right"/></div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="button" id="<?php echo $btnvalue;?>" name="<?php echo $btnvalue;?>"  value="<?php echo $btnvalue;?>"  onclick="<?php echo $btnfunct;?>" class="btn btn-success" />            &nbsp;&nbsp;&nbsp;&nbsp;
                    
                        </td>
                    </tr>
                </table>
                </div>
            </div>
           </div>
<?php include('vfooter.php');?>
