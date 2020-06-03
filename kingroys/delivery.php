<?php include('navbar.php'); ?>
<?php include('header.php'); ?>
<?php include('export.php'); ?>
<body>
<div class="container" ><div id = "button"> </div>
	<h1 class="page-header text-center" style="color:#C79926"><b>Delivery</b></h1>
	<table class="table table-striped table-bordered" id="myTable">
		<thead>
			<th>Order Date</th>
			<th>Customer</th>
			<th>Delivery Date</th>
			<th>Order Type</th>
			<th>Amount Due</th>
			<th>Status</th>
			<th>Action</th>

		</thead>
		<tbody>
			<?php
				$sql="select * from purchase order by date_purchase desc";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo date('M d, Y', strtotime($row['date_purchase'])) ?></td>
						<td><?php echo $row['customer']; ?></td>
						<td><?php echo date('M d, Y', strtotime($row['delivery_date'])) ?></td>
						<td><?php echo $row['deliverymethod']; ?></td>
						<td class="text-right">&#8369; <?php echo number_format($row['overall'], 2); ?></td>
						<td>
								<?php echo $row['status']; ?>
						</td>
						<td><a style = "float: left " href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-search"></span> Details </a><a style ="float: right; width: 50%" href="#editstatus<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-success btn-md"><span class="glyphicon glyphicon-pencil"></span> Edit </a>
								<?php include('editdelivery_modal.php'); ?>
							<?php include('delivery_modal.php'); ?></td>


					</tr>

					<?php
				}
			?>

		</tbody>
	</table>



<script>
	$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'lBfrtip',
        buttons: [
             {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4,5 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4,5 ]
                }
            },

            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4,5 ]
                }
            },

        ]
    } );
} );

</script>

</body>
<footer>
<? php include ('footer.php');?>
</footer>
</html>
