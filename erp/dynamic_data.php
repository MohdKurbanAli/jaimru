<?php 
 include_once('includes/class.php');
$class = new baseClass;

 $org = mysqli_real_escape_string($class->conn,$_GET['org']);
 $run = mysqli_query($class->conn,"SELECT * FROM wo_details WHERE wo_oraganisation_name = '$org'");
?>
    <option value=""> Select </option>
<?php
 while($res = mysqli_fetch_array($run))
 { ?>

    <option value="<?php echo $res['wo_project_name']  ?>" > <?php echo $res['wo_project_name'] ?> </option>

 <?php } ?>