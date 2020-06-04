<?php include('header.php'); ?>
<?php include('navbar.php'); ?>

<?php include('export.php'); ?>
<body>
<link rel =stylesheet href="css/styles" type="text/css">

<div class="container">
	<h1 class="page-header text-center" style="color:#C79926"><b>Order</b></h1>
	<form method="POST" action="purchase.php">

		<table class="table table-striped table-bordered" id="myTable">
			<thead>
				<th class="text-center"><input type="checkbox" id="checkAll"></th>
				<th>Category</th>
				<th>Product Name</th>
				<th>Price Kilo</th>
				<th>Price Per Box</th>
				<th>Quantity per Kilo</th>
				<th>Quantity per Box</th>
			</thead>

			<tbody>
				<?php

					$sql="select * from product left join category on category.categoryid=product.categoryid order by product.categoryid asc, productname asc";
					$query=$conn->query($sql);
					$iterate=0;
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td class="text-center"><input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]"></td>
							<td><?php echo $row['catname']; ?></td>
							<td><?php echo $row['productname']; ?></td>
							<td class="text-right">&#8369; <?php echo number_format($row['price'], 2); ?></td>
							<td class="text-right">&#8369; <?php echo number_format($row['pricebox'], 2); ?></td>

							<td><input type="number" class="form-control input-sm" name="quantity_<?php echo $iterate; ?>" min="0"></td>
							<td><input type="number" class="form-control input-sm" name="quantitybox_<?php echo $iterate; ?>" min="0"></td>
						</tr>
						<?php
						$iterate++;
					}
				?>
			</tbody>
		</table>

		<div class="row">
			<div class="col-md-3 col-12">
			<span class = "glyphicon glyphicon-user" > </span>
			<label for="customer" >Customer Name:</label>

				<input type="text" name="customer" class="form-control" placeholder="ex: Juan Dela Cruz" style="font-style:italic" required>
			</div>
			<div class="col-md-3 col-12">
			<span class = "glyphicon glyphicon-home" > </span>
				<label for="address" >Address:</label>
				<input type="text" name="address" class="form-control" placeholder="ex: Lacson street" style="font-style:italic" required>
			</div>
			<div class="col-md-3 col-12">
			<span class = "glyphicon glyphicon-phone " > </span>
				<label for="phone" >Mobile Number:</label>
				<input type="text" name="phone" class="form-control" placeholder="091xxxxxxxx" maxlength="11" oninput="this.value=this.value.replace(/[^0-9]/g,'');" style="font-style:italic" required>
			</div>
     		<div class="col-md-3 col-12">
     		<span class = "glyphicon glyphicon-phone-alt" ></span>
				<label for="landline" >Landline Number:</label>
				<input type="tel" name="landline" class="form-control" placeholder="(034)-555-5555" oninput="this.value=this.value.replace(/[^0-9]/g,'');" style="font-style:italic" required>
			</div>
		</div>
		<div class="row">
			<br/>
		<div class="col-md-3 col-12">
		<span class = "glyphicon glyphicon-envelope" "></span>
				<label for="email" >Email:</label>
				<input type="email" name="email" class="form-control" placeholder="ex: example@gmail.com" style="font-style:italic" required>
			</div>

<script type = "text/javascript">
function changeDropdown(){
	var box = document.getElementById("sel1").value;
	if (box=="Pickup"){
		document.getElementById("landmark").style.visibility='hidden';
	}

	else
	{
		document.getElementById("landmark").style.visibility='visible';

	}
}

</script>

<div class="col-md-3 col-12" >
			<span class = "glyphicon glyphicon-list-alt"></span>
			<label for="deliverymethod" >Select Order Type:</label>
			<select id="sel1" class="form-control"  name="deliverymethod" onchange="changeDropdown(this.value);">
			<option value = "Delivery">Delivery</option>
    		<option value = "Pickup">Pickup</option>


  </select>

</div>

			<div class="col-md-3 col-12" id="landmark">
			<span class = "glyphicon glyphicon-map-marker " ></span>
				<label for="landmark" >Specific Landmark:</label>
				<input type="text" name="landmark" class="form-control" placeholder="ex: In front of Catholic Church" style="font-style:italic">
		</div>
			
 <div class="col-md-3 col-12">
 <span class = "glyphicon glyphicon-calendar"></span>
        <label for="delivery_date" >Delivery/Pickup Date:</label>
        <input type="date" name="delivery_date" class="form-control" min="<?php echo date('Y-m-d') ?>" required>
      </div>

	</div>
    <br/>

		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" class="btn btn-primary btn-block">
          <span class="glyphicon glyphicon-floppy-disk" ></span> Submit
        </button>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);

		});
	});
</script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  } );
</script>
</body>
</html>
