<?php include('vheader.php');?>
<script>
function changepassword()
{
	var oldpassword=$("#oldpassword").val();
	var newpassword=$("#newpassword").val();
	var confirmpassword=$("#confirmpassword").val();
	
	var obj={};var arr=[];var tag=[];
	obj.status="";
	
	if(oldpassword == '')
	{
		obj.status="ERR";arr.push("Enter Old Password");tag.push("oldpassword");
	}
	if(newpassword == '')
	{
		obj.status="ERR";arr.push("Enter New Password");tag.push("newpassword");
	}
	if(confirmpassword == '')
	{
		obj.status="ERR";arr.push("Enter Confirm Password");tag.push("confirmpassword");
	}
	if(obj.status=="ERR")
	{
		obj.msg=arr;obj.tag=tag;
		validation(obj);
		return false;
	}
	
	else
	{
		$('.form-control').css('border','1px solid #ccc');
	}
	var arrUser={
		'oldpassword':oldpassword,
		'newpassword':newpassword,
		'confirmpassword':confirmpassword,
	}
	//console.log(arrUser);
	//console.log('old..'+oldpassword+'..newpassword..'+newpassword+'..confirm..'+confirmpassword);
	var strUrl='<?php echo $base;?>index.php/cusers/updateNewpassword';
	$.ajax({
	url: strUrl,
	type: "POST",
	data: {arrUser:arrUser},
	dataType:"json",
	success: function(response, textStatus, jqXHR){
		//console.log('response..'+response);
			
				bootbox.alert(response.msg,function(){
					if(response.msg=='Password Changed')
					{
						window.location.href = pbaseurl+'index.php/clogin/';
					}
					});
			
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				console.log("The following error occured: "+textStatus, errorThrown);
			}
		});
}
</script>

</head>
<?php include('vmenu.php');?>
     <div id="maincontent" >
       <?php //include('vmainhead.php');?><!-- end of <div id="adminpanel">-->
        <div id="maindata">
		  <div id="datacontent">
            <div class="panel panel-default" >
                <div class="panel-heading">
                    <h3 class="panel-title">Change Password</h3>
                </div>
                <div class="panel-body">
                <table border="0" width="" align="center" cellpadding="5">
                    <tr><td class="lbl compulsory">Old Password:</td><td><input type="password" id="oldpassword" name="oldpassword" value="" tabindex="1"  data-placement="right" class="form-control"/></td></tr>
                    <tr><td class="lbl compulsory">New Password:</td><td><input type="password" id="newpassword" name="newpassword" value=""  tabindex="2" data-placement="right" class="form-control"/></td></tr>
                    <tr><td class="lbl compulsory">Confirm Password:</td><td><input type="password" id="confirmpassword" name="confirmpassword" value="" tabindex="3"  data-placement="right" class="form-control"/></td></tr>
                    <tr><td></td><td><input type="button" id="save" name="save"  value='Change Password' onclick="changepassword();" class="btn btn-success" tabindex="4"/></td></tr>
                </table>
                
            </div>
        </div>
    </div>
<?php include('vfooter.php');?>