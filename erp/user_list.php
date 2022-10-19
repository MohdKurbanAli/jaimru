<?php include('top_inc.php');
$success_msg ="";
if(isset($_POST) && count($_POST['ids']) > 0 ){
$ids = implode(',' , $_POST['ids']);
	if(isset($_POST['active'])){
		mysql_query("UPDATE ch_admin SET admin_status = 'Active' WHERE  admin_id in ($ids)" )or die(mysql_error());
		$success_msg = 'User(s) successfully Activated';
	}else if(isset($_POST['inactive'])){
		mysql_query("UPDATE ch_admin SET admin_status = 'Inactive' WHERE  admin_id in ($ids)" )or die(mysql_error());
		$success_msg = 'User(s) successfully Deactivated';
	}else if(isset($_POST['delete'])){
		mysql_query("delete from  ch_admin WHERE  admin_id in ($ids)" )or die(mysql_error());
		$success_msg = 'User(s) successfully Deleted';
	}
}
$query = mysql_query("SELECT * FROM ch_admin");
include('header.php');
include('left.php');
	?>      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User Manager
            <small>User List</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="create_user.php">Add New User</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of User</h3>
				<?php if(isset($_SESSION['success_msg'])) {$success_msg = $_SESSION['success_msg']; }
				unset($_SESSION['success_msg']);
				?>
                </div><!-- /.box-header -->  <label class="label label-info"><?php echo $success_msg;?></label>
                <div class="box-body"style="overflow-x:auto;">
				<form class="form-horizontal" method="post" enctype="multipart/form-data">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					   <th></th>
                        <th>User Id</th>
                        <th>User Name</th>
						<th>Admin Status</th>
                        <th>User Type</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php while($result = mysql_fetch_array($query)){
		@extract($result);?>
		 <tr><td><input type="checkbox" name="ids[]" value="<?php echo $admin_id; ?>"></td>
                        <td><?php echo $admin_user_id; ?></td>
                        <td><?php echo $admin_user_name; ?></td>
						<td><?php echo $admin_status; ?></td>
						<td><?php echo $user_type; ?></td>
                        <td><a href="create_user.php?id=<?php echo $admin_id;?>">Edit</a></td>
                        </tr>
		<?php
}?>                     
				 <tr>
                        
						<td colspan="6"><button type="submit" class="btn btn-success pull-right margin-left" name="active">Active</button>
						<button type="submit" class="btn btn-info pull-right margin-left" name="inactive">Inactive</button>
						<button type="submit" class="btn btn-danger pull-right" name="delete">Delete</button>
						</td>
                        </tr>	

                    </tfoot>
                  </table>
				   </form>
                </div><!-- /.box-body -->
              </div>
			  </div><!-- /.box-body -->
              </div>
			  </section><!-- /.box-body -->
              </div>
			  <?php include('footer.php');?>