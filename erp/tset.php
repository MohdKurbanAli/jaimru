<?php include('includes/top_inc.php');

include('includes/class.php');
$class = new baseClass;
$user_id = $_SESSION['sess_user_id'];


$msg = '';




$msgs = "";
if (isset($_POST['filter'])) {
   @extract($_POST);
   $from_date = $class->changeUserToSql_DateFromat($from_date);
    $to_date = $class->changeUserToSql_DateFromat($to_date);
	
   
   $query = mysqli_query($class->conn, "SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id INNER JOIN jk_user ON invoice.`agent` = `jk_user`.`user_id`  WHERE $date_type BETWEEN '$from_date' AND '$to_date' ORDER BY invoice.`in_id` DESC");

}else{
	$query = mysqli_query($class->conn, "SELECT * FROM invoice INNER JOIN customers ON invoice.customer_id = customers.customer_id INNER JOIN jk_user ON invoice.`agent` = `jk_user`.`user_id` ORDER BY invoice.`in_id` DESC;");
}



//filter 


?>
	<link rel="stylesheet" type="text/css" href="https://www.jqueryscript.net/demo/DataTables-Jquery-Table-Plugin/media/css/jquery.dataTables.css">
	<style type="text/css" class="init">
	
	th { white-space: nowrap; }

	</style>
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Salary</th>
        </tr>
    </thead>
 
    <tfoot>
        <tr>
            <th colspan="4" style="text-align:right">Total:</th>
            <th></th>
        </tr>
    </tfoot>
 
    <tbody>
	<?php

                                                while ($res = mysqli_fetch_array($query)) {
                                                    @extract($res);
													
											
                                                            $amount = json_decode($amount);
                                                            $finalamount = 0;
                                                            foreach ($amount as $amt) {
                                                                $finalamount = $finalamount + $amt;
                                                            }
														$fileamount = $class->moneyFormatIndia(round($finalamount));
														
														echo $fileamount;
                                                       
                                                    ?>
      
        <tr>
            <td>Garrett</td>
            <td>Winters</td>
            <td>Director</td>
            <td>Edinburgh</td>
<td>
                                                           <?php echo ($fileamount); ?> 
                                                        </td>   

														</tr>
                                                       <?php } ?>

      
    </tbody>
</table>
		<script type="text/javascript" language="javascript" src="https://www.jqueryscript.net/demo/DataTables-Jquery-Table-Plugin/media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="https://www.jqueryscript.net/demo/DataTables-Jquery-Table-Plugin/media/js/jquery.dataTables.js"></script>

	
	<script>
	$(document).ready(function() {
    $('#example').DataTable( {
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 4, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 4 ).footer() ).html(
                '$'+pageTotal +' ( $'+ total +' total)'
            );
        }
    } );
} );
</script>