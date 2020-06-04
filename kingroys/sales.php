<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

<?php include('export.php'); ?>
<body>
<div class="container" ><div id = "button"> </div>
	<h1 class="page-header text-center" style="color:#C79926"><b>Sales</b></h1>
	<table class="table table-striped table-bordered" id="myTable">
		<thead>
			<th>Date</th>
			<th>Customer</th>
			<th>Total per Kilo</th>
			<th>Total per Box</th>
			<th>Amount Due</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php
				$sql="select * from purchase order by date_purchase desc";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
						<td><?php echo $row['customer']; ?></td>
						<td class="text-right">&#8369; <?php echo number_format($row['total'], 2); ?></td>
						<td class="text-right">&#8369; <?php echo number_format($row['boxtotal'], 2); ?></td>
						<td class="text-right">&#8369; <?php echo number_format($row['overall'], 2); ?></td>
						<td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View Details </a>
							<?php include('sales_modal.php'); ?>
						</td>
					</tr>

					<?php
				}
			?>

		</tbody>
	
	</table>

</div>

<script>
	$(document).ready(function() {
    $('#myTable').DataTable( {
        dom: 'lBfrtip',
        buttons: [
             {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
            },

            {
                extend: 'print',
                exportOptions: {
                    columns: [ 0, 1, 2,3,4 ]
                }
            },

        ]
    } );
} );

</script>
</body>
</footer>
</html>
