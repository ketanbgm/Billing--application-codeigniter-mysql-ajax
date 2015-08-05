<body>
<?php //echo "type:".$this->session->userdata('clubid');?>
<!--<div id="wrapper" style="border:0px solid blue;">-->
		<div class="container" style="position:fixed;background-attachment:fixed;z-index:1000;width:230px;">
			<!-- Push Wrapper -->
			<div class="mp-pusher" id="mp-pusher">
				<!-- mp-menu -->
				<nav id="mp-menu" class="mp-menu">
					<div class="mp-level">
						<h2 class="icon icon-world"><a href="<?php echo $base;?>index.php/clogin/success"><img class="iconimg" src="<?php echo $base;?>img/deepak-logo.png" width="150" style="margin-left:-20px;"/></a></h2>
						<ul>
                        
						<li class="icon icon-arrow-left">
								<a class="icon icon-news" href="#"><img class="iconimg" src="<?php echo $base;?>img/customer.png"/>Customer</a>
								<div class="mp-level">
									<h2 class="icon icon-news">Customer</h2>
									<ul>
										<li><a href="<?php echo $base;?>index.php/ccustomer">Add Customer</a></li>
										<li><a href="<?php echo $base;?>index.php/ccustomer/lookupCustomer">View Customer</a></li>
									</ul>
								</div>
							</li>
						<?php        
                            if($this->session->userdata['ctype'] !=4)
                            {
                        ?>
						
			<!--				<li class="icon icon-arrow-left">
								<a class="icon icon-news" href="#"><img class="iconimg" src="<?php echo $base;?>img/product.png"/>Product</a>
								<div class="mp-level">
									<h2 class="icon icon-news">Product</h2>
									<ul>
										<li><a href="<?php echo ($this->session->userdata['ctype']==1|| $this->session->userdata['ctype']==2)? $base."index.php/cproduct":"#";?>">Add Product</a></li>
                                        <li><a href="<?php echo ($this->session->userdata['ctype']==1|| $this->session->userdata['ctype']==2)? $base."index.php/cproduct/lookupProd":"#";?>">View Products</a></li>
                                    </ul>
								</div>
							</li>-->
							<li class="icon icon-arrow-left">
								<a class="icon icon-news" href="#"><img class="iconimg" src="<?php echo $base;?>img/therapy.png"/>Therapy</a>
								<div class="mp-level">
									<h2 class="icon icon-news">Therapy</h2>
									<ul>
										<li><a href="<?php echo ($this->session->userdata['ctype']==1|| $this->session->userdata['ctype']==2)? $base."index.php/ctherapy":"#";?>">Add Therapy</a></li>
                                        <li><a href="<?php echo ($this->session->userdata['ctype']==1|| $this->session->userdata['ctype']==2)? $base."index.php/ctherapy/lookupTherapy":"#";?>">View Therapies</a></li>
									<!--	<li><a href="<?php echo ($this->session->userdata['ctype']==1|| $this->session->userdata['ctype']==2)? $base."index.php/ctherapy_sub":"#";?>">Add Sub Therapy</a></li>
                                        <li><a href="<?php echo ($this->session->userdata['ctype']==1|| $this->session->userdata['ctype']==2)? $base."index.php/ctherapy_sub/lookupTherapy_sub":"#"?>">View Sub Therapies</a></li>-->
                                    </ul>
								</div>
							</li>
						
							<li class="icon icon-arrow-left">
								<a class="icon icon-news" href="#"><img class="iconimg" src="<?php echo $base;?>img/bill.png"/>Bill</a>
								<div class="mp-level">
									<h2 class="icon icon-news">Bill</h2>
									<ul>
										<li><a href="<?php echo $base;?>index.php/cbill">Add Bill</a></li>
										<li><a href="<?php echo $base;?>index.php/cbill/lookupBill">View Bill</a></li>
                                     </ul>
                                </div>
                            </li>
                            <li class="icon icon-arrow-left">
								<a class="icon icon-news" href="<?php echo $base;?>index.php/creceipt/lookupReceipt"><img class="iconimg" src="<?php echo $base;?>img/receipt.png"/>Receipt</a>
							</li>
                            
						 <li class="icon icon-arrow-left">
								<a class="icon icon-news" href="#"><img class="iconimg" src="<?php echo $base;?>img/employee.png"/>Employee</a>
                                <div class="mp-level">
									<h2 class="icon icon-news">Employee</h2>
                                    <ul>
                                        <li><a href="<?php echo ($this->session->userdata['ctype']==1)? $base."index.php/cemployee":'#';?>">Add Employee</a></li>
                                        <li><a href="<?php echo ($this->session->userdata['ctype']==1)? $base."index.php/cemployee/lookupEmp":'#';?>">View Employees</a></li>
                                       <!-- <li><a href="<?php// echo $base;?>index.php/cemployee">Add Employee</a></li>
                                        <li><a href="<?php// echo $base;?>index.php/cemployee/lookupEmp">View Employees</a></li>-->
                                    </ul>
								</div>
							</li>
                            
                            <li class="icon icon-arrow-left">
								<a class="icon icon-news" href="#"><img class="iconimg" src="<?php echo $base;?>img/user_login.png"/>Users</a>
								<div class="mp-level">
									<h2 class="icon icon-news">Users</h2>
									<ul>
										<li><a href="<?php echo ($this->session->userdata['ctype']==1)? $base."index.php/cusers":"#";?>">Create User</a></li>
                                        <li><a href="<?php echo ($this->session->userdata['ctype']==1)? $base."index.php/cusers/lookupUsers":"#";?>">List of Users</a></li>
                                    </ul>
								</div>
							</li>	
                           <?php
							}
							?> 
                        <li class="icon icon-arrow-left">
								<a class="icon icon-news" href="#"><img class="iconimg" src="<?php echo $base;?>img/account_settings.png"/><?php echo $this->session->userdata['cusername'];?></a>
								<div class="mp-level">
									<h2 class="icon icon-news"><?php echo $this->session->userdata['cusername'];?></h2>
									<ul>
										<li><a href="<?php echo $base;?>index.php/cusers/changePassword">Change Password</a></li>
                                        <li><a href="<?php echo $base;?>index.php/clogin/logout">Logout</a></li>
                                    </ul>
								</div>
							</li>
                                                   
						</ul>
					</div>
				</nav>
                <input type="hidden" name="trigger" id="trigger">
				<!-- /mp-menu -->
			</div><!-- /pusher -->
            

		</div><!-- /container -->
		<script src="<?php echo $base?>js/classie.js"></script>
		<script src="<?php echo $base?>js/mlpushmenu.js"></script>
		<script>
		var menu=new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
		document.getElementById('trigger').click();
		
		function deactivate(e,aref)
		{
			bootbox.confirm('Are you sure you want delete?', function(result) 
			{
				if(result)
				{
					window.location.href=aref.href;
				}
			});
			return false;
		}

		</script>