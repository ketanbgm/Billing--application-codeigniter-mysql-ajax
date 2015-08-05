<?php include('vheader.php');
	$numberofPages=$Cnt/$numberofrecords; 
	$numberofPages=ceil($numberofPages);
	$basepageset=5;
	$pageset=$basepageset;
	
	if($numberofPages < $pageset)
		$pageset=$numberofPages;
?>
<script>
	var pageset='<?php echo $pageset; ?>';
	var numberofPages='<?php echo $numberofPages; ?>';
	var basepageset='<?php echo $basepageset; ?>';
	var numberofrecords='<?php echo $numberofrecords; ?>';
	var url=pbaseurl+"index.php/cbill/loadBill";
	$(function(){
			loadPagination1 =new loadPagination({'start':1,'end':pageset,'pageno':1,'id':'pagination','pageset':pageset,'basepageset':basepageset,'numberofpages':numberofPages,'url':url,'numberofrecords':numberofrecords});
			loadPagination1.load();
	});
</script>
 <script src="<?php echo $base;?>js/bill.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>js/pagination.js"></script>
</head>
<?php include('vmenu.php');?>
     <div id="maincontent" >
       <?php include('vmainhead.php')
	   //print_r($res);die();
	   ;?><!-- end of <div id="adminpanel">-->
        <div id="maindata">
		  <div id="datacontent">
            <div class="panel panel-default" >
                <div class="panel-heading">
                          <!--<span class="pull-right">
                            <a class="lookupclass" href="<?php// echo $base?>index.php/ccustomer/">New</a>
                          </span>-->
                    <h3 class="panel-title">Bill Lookup</h3>
                </div>
                <div class="panel-body">
                 <div class="paginationView">
                     <ul class="pagination" id="pagination" style="marign:0px;" align="left"></ul> 
                </div>
                <div class="lookupView">
                <table border="0" width="" align="center" cellpadding="5" id="pgnationTbl" class="table table-bordered" > 
                  <!--  <input type="hidden" id="id" name="id" value=""/>-->
					 <tr class="lookuphead">
						<th width="10%">Sl. No.</th>
						<th width="26%">Customer Name</th>
                        <th width="20%">Bill Date</th>
                        <th width="20%">Net Amount</th>
                        <th width="14%">Print</th>
                        <th width="10%">Edit/ Delete</th>
					</tr>
				</table>
                </table>
                </div>
                </div>
            </div>
           </div>
<?php include('vfooter.php');	 ?>
