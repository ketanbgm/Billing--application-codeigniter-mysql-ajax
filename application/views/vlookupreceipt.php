<?php include('vheader.php');
	/*$numberofPages=$Cnt/$numberofrecords; 
	$numberofPages=ceil($numberofPages);
	$basepageset=5;
	$pageset=$basepageset;
	
	if($numberofPages < $pageset)
		$pageset=$numberofPages;*/
	$basepageset=5;
	/* Receipts pending */
	$numberofPagesPending=$pendingReceiptsCnt/$numberofrecords; 
	$numberofPagesPending=ceil($numberofPagesPending);
	$pagesetPending=$basepageset;
	if($numberofPagesPending < $pagesetPending)
		$pagesetPending=$numberofPagesPending;
	
	/* Receipts approved */
	$numberofPagesApproved=$approvedReceiptsCnt/$numberofrecords; 
	$numberofPagesApproved=ceil($numberofPagesApproved);
	$pagesetApproved=$basepageset;
	if($numberofPagesApproved < $pagesetApproved)
		$pagesetApproved=$numberofPagesApproved;
		
	/* Receipts all */
	$numberofPagesAll=$allReceiptsCnt/$numberofrecords; 
	$numberofPagesAll=ceil($numberofPagesAll);
	//echo "numberofPagesAll..".$numberofPagesAll; die();
	$pagesetAll=$basepageset; 
	
	if($numberofPagesAll < $pagesetAll)
		$pagesetAll=$numberofPagesAll;
?>
<script>
	/*var pageset='<?php// echo $pageset; ?>';
	var numberofPages='<?php// echo $numberofPages; ?>';
	var basepageset='<?php// echo $basepageset; ?>';
	var numberofrecords='<?php// echo $numberofrecords; ?>';
	var url=pbaseurl+"index.php/creceipt/loadReceipt";
	$(function(){
			loadPagination1 =new loadPagination({'start':1,'end':pageset,'pageno':1,'id':'pagination','pageset':pageset,'basepageset':basepageset,'numberofpages':numberofPages,'url':url,'numberofrecords':numberofrecords});
			loadPagination1.load();
	});*/
	var numberofrecords='<?php echo $numberofrecords; ?>';
	var basepageset='<?php echo $basepageset; ?>';
		
	//Pending Receipts
	var pagesetPending='<?php echo $pagesetPending; ?>';
	var numberofPagesPending='<?php echo $numberofPagesPending; ?>';
	var urlPending=pbaseurl+"index.php/creceipt/loadReceipt?ctype=Pending";
	
	//Approved Receipts
	var pagesetApproved='<?php echo $pagesetApproved; ?>';
	var numberofPagesApproved='<?php echo $numberofPagesApproved; ?>';
	var urlApproved=pbaseurl+"index.php/creceipt/loadReceipt?ctype=Approved";
	
	var pagesetAll='<?php echo $pagesetAll; ?>';
	var numberofPagesAll='<?php echo $numberofPagesAll; ?>';
	var urlAll=pbaseurl+"index.php/creceipt/loadReceipt?ctype=All";
	
	$(function(){
			loadPagination1 =new loadPagination({'start':1,'end':pagesetPending,'pageno':1,'id':'paginationPendingReceipts','pageset':pagesetPending,'basepageset':basepageset,
							'numberofpages':numberofPagesPending,'url':urlPending,'numberofrecords':numberofrecords,'table':'pgnationTblPendingReceipts'});
			loadPagination1.load();
			
			loadPagination2 =new loadPagination({'start':1,'end':pagesetApproved,'pageno':1,'id':'paginationApprovedReceipts','pageset':pagesetApproved,'basepageset':basepageset,
							'numberofpages':numberofPagesPending,'url':urlApproved,'numberofrecords':numberofrecords,'table':'pgnationTblApprovedReceipts'});
			loadPagination2.load();
			
			loadPagination3 =new loadPagination({'start':1,'end':pagesetAll,'pageno':1,'id':'paginationAllReceipts','pageset':pagesetAll,'basepageset':basepageset,
							'numberofpages':numberofPagesPending,'url':urlAll,'numberofrecords':numberofrecords,'table':'pgnationTblAllReceipts'});
			loadPagination3.load();
	});
	
</script>
<style type="text/css">
#pgnationTblPendingReceipts a {
    color: #428bca;
    text-decoration: none;
}

#pgnationTblPendingReceipts a:hover, a:focus 
{
    color: #2a6496;
    text-decoration: underline;
}
</style>
 <script src="<?php echo $base;?>js/receipt.js"></script>
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
                    <h3 class="panel-title">Receipt Lookup</h3>
                </div>
                <div class="panel-body">
                 
                <div class="lookupView">
                  <h5><i>Pending Bills</i></h5> <!----------------------Referred as ctype="Pending" in mreceipt--------------->
                <table border="0" width="" align="center" cellpadding="5" id="pgnationTblPendingReceipts" class="table table-bordered" > 
                  <!--  <input type="hidden" id="id" name="id" value=""/>-->
					 <tr class="lookuphead">
						<th width="5%">Sl. No.</th>
						<th width="20%">Customer Name</th>
                        <th width="20%">Bill Number</th>
                        <th width="20%">Total</th>
                        <th width="15%">Balance</th>
                        <th width="10%">Status</th>
                       
					</tr>
				</table>
                <div class="paginationView" align="right">
                     <ul class="pagination" id="paginationPendingReceipts" style="marign:0px;" align="left"></ul> 
                </div>
               </div>
 
                <div class="lookupView">
                  <h5><i>Pending Receipts</i></h5> <!----------------------Referred as ctype="All" in mreceipt--------------->
                  <table border="0" width="" align="center" cellpadding="5" id="pgnationTblAllReceipts" class="table table-bordered" > 
                  <!--  <input type="hidden" id="id" name="id" value=""/>-->
					 <tr class="lookuphead">
						<th width="10%">Sl. No.</th>
						<th width="30%">Customer Name</th>
                        <th width="20%">Receipt Number</th>
                        <th width="20%">Against Bill</th>
                        <th width="20%">Received Amount</th>
					</tr>
				</table>
                <div class="paginationView" align="right">
                     <ul class="pagination" id="paginationAllReceipts" style="marign:0px;" align="left"></ul> 
                </div>
                </div>
                
                <div class="lookupView">
                  <h5><i>Completed Receipts</i></h5> <!----------------------Referred as ctype="Approved" in mreceipt--------------->
                  <table border="0" width="" align="center" cellpadding="5" id="pgnationTblApprovedReceipts" class="table table-bordered" > 
                  <!--  <input type="hidden" id="id" name="id" value=""/>-->
					 <tr class="lookuphead">
						<th width="10%">Sl. No.</th>
						<th width="30%">Customer Name</th>
                        <th width="30%">Receipt Number</th>
                        <th width="30%">Received Amount</th>
					</tr>
				</table>
                <div class="paginationView" align="right">
                     <ul class="pagination" id="paginationApprovedReceipts" style="marign:0px;" align="left"></ul> 
                </div>
                </div>
               
                </div>
            </div>
           </div>
<?php include('vfooter.php');	 ?>
