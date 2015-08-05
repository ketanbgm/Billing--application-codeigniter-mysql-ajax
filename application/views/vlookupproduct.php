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
	var url=pbaseurl+"index.php/cproduct/getprodDetails";
	$(function(){
			loadPagination1 =new loadPagination({'start':1,'end':pageset,'pageno':1,'id':'pagination','pageset':pageset,'basepageset':basepageset,'numberofpages':numberofPages,'url':url,'numberofrecords':numberofrecords});
			loadPagination1.load();
	});
</script>
 <script src="<?php echo $base;?>js/product.js"></script>
  <script type="text/javascript" src="<?php echo $base; ?>js/pagination.js"></script>
</head>
<?php include('vmenu.php');?>
     <div id="maincontent" >
       <?php //include('vmainhead.php');?><!-- end of <div id="adminpanel">-->
        <div id="maindata">
		  <div id="datacontent">
            <div class="panel panel-default" >
                <div class="panel-heading">
                         <!--   <span class="pull-right">
                          <a class="lookupclass" href="<?php echo $base?>index.php/cproduct/">New</a>
                          </span>-->
                    <h3 class="panel-title">Product Lookup</h3>
                </div>
                <div class="panel-body">
                 <div class="paginationView">
                     <ul class="pagination" id="pagination" style="marign:0px;" align="left"></ul> 
                </div>
                <div class="lookupView">
                <table class="table table-hover table-bordered" border="0" width="" align="center" cellpadding="5" id="pgnationTbl" > 
                  <!--  <input type="hidden" id="id" name="id" value=""/>-->
					 <tr class="lookuphead">
						<th width="10%">Sl. No.</th>
						<th width="30%">Product Name</th>
                        <th width="30%">Quantity</th>
						<th width="20%">Rate</th>
                        <th width="10%" align="center">Edit/ Delete</th>
					</tr>
				</table>
                </table>
                </div>
                </div>
            </div>
           </div>
           <?php include('vfooter.php');	 ?>
