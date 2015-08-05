<?php include('vheader.php');?>
<script type="text/javascript" src="<?php echo $base;?>js/login.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#cusername").focus();
	});

</script>
<style type="text/css">
#loading
{
	width:80px;
	height:25px;
	background-color:#fce779;
	color:#000;
	border-bottom-right-radius:5px;
	border-bottom-left-radius:5px;
	font-size:13px;
	align:center;
	font-weight:bold;
	padding:2px 2px 2px 10px;
}

.maincontainer{ width:100%;position:relative;border:0px solid red; }
</style>

<link href="<?php echo $base;?>css/login.css" rel="stylesheet">
</head> 
<body style="background-image:url('<?php echo $base; ?>img/background.jpg'); overflow:hidden;">
     <div id="maincontent" style="padding-left:150px;" >
        <div id="maindata">
		  <div id="datacontent">
            <div class=" panel-default" >
                
                <div class="panel-body" >
                   <div id="div2" align="center">
                	<img src="<?php echo $base; ?>img/backend-logo.png"  class="logo" style="max-height:100%; max-width:100%;"/><br/>       
                    <table width="45%"  class="logintab" align="center" cellpadding="10" cellspacing="10">
                        <tr><td colspan="2" align="center"><span class="loginlbl">Login Credentials</span></td></tr>
                        <tr>
                            <td align="center" colspan="2">                 
                            <div class="input-group">
                              <span class="input-group-addon glyphicon glyphicon-user"></span>
                              <input type="text" class="form-control" name='cusername' id='cusername' placeholder="Enter your username" autocomplete="off">
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" colspan="2">
                            <div class="input-group">
                              <span class="input-group-addon glyphicon glyphicon-lock"></span>
                              <input type="password" class="form-control" name='cpassword' id='cpassword' placeholder="Enter your password" autocomplete="off" onKeyPress="detectKey(event);">
                            </div>
                            </td>
                        </tr>
                        <tr><td align="center" colspan="2"><input type="button" class="btn btn-warning button" name="login" id="login" value="Login" onClick="return chklogin();"></td></tr>
                     	 <tr>
                          <td colspan="2" align="center"><input type="button" name="backup" class="btn btn-info" value="Backup" onClick="backup();"/></td>
                        </tr>
                        <!--<tr>
                        	<td colspan="2" align="center" id="backupmsg">
                            <?php
							/*$arrData='';
                            	if(isset($arrData))
								{
									echo $arrData;
								}*/
							?>
                            </td>
                        </tr>-->
                       <tr>
                          <td colspan="2" valign="top" class='' id="errMsg" style="color:red;" align="center">&nbsp;</td>
                        </tr>
                    </table>
                    </div>
           <table class="table" border="0" cellpadding="10" cellspacing="0" align="center" style="margin:0px auto;">
            <tr>
                <td style="text-align:center; border:0 none; font-size:14px; color:#4d4b35;">
                    &copy; 2015 Deepak SPA Saloon. &nbsp;All rights reserved. Powered by <a style="color:#372d4c;" href="http://www.darshangroups.in" target="_blank">Darshan Designpro Pvt. Ltd.</a>
                </td>
            </tr>
        </table>
                </div>
                
        </div>
    </div>
</body>
</html>
