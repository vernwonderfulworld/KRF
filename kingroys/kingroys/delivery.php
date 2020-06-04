<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

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
						<td><?php echo date('M d, Y', strtotime($row['date_purchase'])) ?></td></b>
						<td><?php echo $row['customer']; ?></td></b>
						<td><?php echo date('M d, Y', strtotime($row['delivery_date'])) ?></td></b>
						<td><?php echo $row['deliverymethod']; ?></td>
						<td class="text-right"> &#8369; <?php echo number_format($row['overall'], 2); ?> </td>
						<td>
							<b>	<?php echo $row['status']; ?> </b>
						</td>
						<td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> Details  </a> || <a href="#editstatus<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit  </a>
								<?php include('editdelivery_modal.php'); ?>
							<?php include('delivery_modal.php'); ?></td>
						


					</tr>

					<?php
				}
			?>

		</tbody>
		<!-- <tfoot>  disable footer
				<tr>
					<th colspan = "6" style ="text-align: right">Total Sales:</th>
					<th></th>

				</tr>
	 </tfoot> -->
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
