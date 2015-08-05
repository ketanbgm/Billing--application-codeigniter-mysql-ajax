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
	var url=pbaseurl+"index.php/ctherapy/loadTherapy";
	$(function(){
			loadPagination1 =new loadPagination({'start':1,'end':pageset,'pageno':1,'id':'pagination','pageset':pageset,'basepageset':basepageset,'numberofpages':numberofPages,'url':url,'numberofrecords':numberofrecords});
			loadPagination1.load();
	});
</script>
 <script src="<?php echo $base;?>js/therapy.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>js/pagination.js"></script>
</head>
<?php include('vmenu.php');?>
    
<div id="maincontent" style="min-height:500px;">
<?php // include('vmainhead.php');?><!-- end of <div id="adminpanel">-->
<div id="maindata">
<div id="datacontent">
<div class="panel panel-default" >
    <div class="panel-body">
        Welcome to Deepak SPA Saloon
    </div>
         <div class="paginationView">
             <ul class="pagination" id="pagination" style="marign:0px;" align="left"></ul> 
        </div>
        <div class="lookupView">
        <table border="0" width="" align="center" cellpadding="5" id="pgnationTbl" class="table table-bordered" > 
          <!--  <input type="hidden" id="id" name="id" value=""/>-->
             <tr class="lookuphead">
                <th width="20%">Sl. No.</th>
                <th width="40%">Therapy Name</th>
                <th width="40%">Amount</th>
            </tr>
        </table>
        </table>
        </div>
</div>
</div>
<?php include('vfooter.php');	 ?>
