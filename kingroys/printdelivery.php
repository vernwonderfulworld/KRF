<?php include('header.php'); ?>
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



</body>
<footer>
<? php include ('footer.php');?>
</footer>

<script type="text/javascript">
<!--
window.print();
//-->
</script>
</html>
