<?php include('top_inc.php');7
$error = array();
if(isset($_POST['user-submit'])){
	@extract($_POST);
	
	if($admin_user_id == ''){
		$error[] = 'User Id is required';
	}
	
	if($admin_password == ''){
		$error[] = 'Password is required';
	}
	if($admin_password != $admin_cpassword){
		$error[] = 'Confirm Password must be same  to password';
	}
	if($user_type == ''){
		$error[] = 'User Type is required';
	}
	if($admin_id =='' )
	{
		$cqry = "SELECT admin_user_id FROM ch_admin WHERE admin_user_id ='$admin_user_id'";
		$crun = mysql_query($cqry);
		$cres = mysql_fetch_array($crun);
		$cresult = strcmp($cres[0],$admin_user_id);
		if($cresult == "0")
		{ $error[] = "User Id: <span style='color:green;'>".$admin_user_id."</span> is already registered.";}
	}
	if(count($error) == 0)
	{
		$sql = "admin_user_id = '$admin_user_id',
		admin_password= '$admin_password',
		admin_user_name = '$admin_user_name',
		user_type= '$user_type'";
				
		if($admin_id != '')
		{
			$res = mysql_query("update ch_admin SET $sql where admin_id = $admin_id" )or die(mysql_error());
			$_SESSION['success_msg'] = 'User '.$admin_user_name.' has been updated';
			
		}
		else{
			$res = mysql_query("insert into ch_admin SET $sql " )or die(mysql_error());
			$_SESSION['success_msg'] = 'User '.$admin_user_name.' has been Added';
			
		}
	
								
	}
	}else{
	
		
	}
if(isset($_GET['id']))
{
	$admin_id = $_GET['id'];
}
	$qry = mysql_query("SELECT * FROM ch_admin where admin_id = '$admin_id'");
	$result = mysql_fetch_array($qry);
	@extract($result);
	


?>
<?php 

include('header.php');
include('left.php');?>
  <link href="admin/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />  
  <div class="content-wrapper">
   <section class="content-header">
          <h1>
            Add/Edit User
           </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">User</li>
          </ol>
        </section>
  <section class="content">
      <div class="row">
       
        	 
		<div class="col-md-12">
			<form method="post" action="create_user.php" class="form-horizontal" enctype="multipart/form-data">
			
			<input name="admin_id" type="hidden" value="<?php echo $admin_id?>" >
			<?php if(count($_SESSION['success_msg']) > 0){echo '<p style="color:red;">'.$_SESSION['success_msg'].'</p>';} ?>
		  	<?php if(count($error) > 0){echo '<p style="color:red;">'.implode('<br/>',$error).'</p>';} ?>
		  
					<div class="form-group">
				<label  class="col-sm-2 control-label">	User ID: *</label>
				<div class="col-md-5">
					<input name="admin_user_id" type="email" class="form-control"  placeholder="" value="<?php echo $admin_user_id?>" >
				</div>
			</div>
            <div class="form-group">
				<label  class="col-sm-2 control-label">Password: *</label>
				<div class="col-md-5">
			<input name="admin_password" type="password" class="form-control"  placeholder="" >
				</div>
			</div>
            <div class="form-group">
				<label  class="col-sm-2 control-label">Confirm Password: *</label>
				<div class="col-md-5">
					<input name="admin_cpassword" type="password" class="form-control"  placeholder="" >
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-2 control-label">User Name: *</label>
				<div class="col-md-5">
			<input name="admin_user_name" type="text" class="form-control"  placeholder="" value="<?php echo $admin_user_name?>" >
				</div>
			</div>
			<div class="form-group">
				<label  class="col-sm-2 control-label">User Type: *</label>
				<div class="col-md-5">
					<select name="user_type" class="form-control" >
					<option value="Admin" <?php if($user_type = "Admin"){ echo "selected";} ?>>Admin</option>
					<option value="Agent" <?php if($user_type = "Agent"){ echo "selected";} ?>>Agent</option>
					</select>
				</div>
			</div>
				 <div class="col-sm-2 col-sm-offset-2">
					<button type="submit" class="btn btn-info" name="user-submit">Create User</button>
										</div> 
				</form>
		 
	 </div>
    </div>

  </section>
  </div>
  
 <?php include('footer.php')?>