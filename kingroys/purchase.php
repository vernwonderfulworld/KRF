<?php
	include('conn.php');
	if(isset($_POST['productid'])){
		$customer=$_POST['customer'];
		$address=$_POST['address'];
		$phone=$_POST['phone'];
		$delivery_date=$_POST['delivery_date'];
		$email=$_POST['email'];
		$landmark=$_POST['landmark'];
		$deliverymethod=$_POST['deliverymethod'];
		$landline=$_POST['landline'];

		$sql="insert into purchase (customer, date_purchase, address, phone, delivery_date, email, landmark, deliverymethod, landline ) VALUES ('$customer', NOW(), '$address', '$phone','$delivery_date', '$email', '$landmark', '$deliverymethod', '$landline')";
		$conn->query($sql);
		$pid=$conn->insert_id;

		$total=0;
		$boxtotal=0;
		$overall=0;


		foreach($_POST['productid'] as $product):
		$proinfo=explode("||",$product);
		$productid=$proinfo[0];
		$iterate=$proinfo[1];
		$sql="select * from product where productid='$productid'";
		$query=$conn->query($sql);
		$row=$query->fetch_array();




		if (isset($_POST['quantity_'.$iterate])){
			$subt=$row['price']*$_POST['quantity_'.$iterate];
			if (isset($_POST['quantitybox_'.$iterate])){
			$subt1=$row['pricebox']*$_POST['quantitybox_'.$iterate];
			$total+=$subt;
			$boxtotal+=$subt1;

			$sql="insert into purchase_detail (purchaseid, productid, quantity, quantitybox) values ('$pid', '$productid', '".$_POST['quantity_'.$iterate]."',  '".$_POST['quantitybox_'.$iterate]."')";
			$conn->query($sql);
		}
		

		}
	endforeach;
		



//update total
 		$sql="update purchase set total='$total' where purchaseid='$pid'";
		$conn->query($sql);
		$sql="update purchase set boxtotal='$boxtotal' where purchaseid='$pid'";
		$conn->query($sql);
		$overall= $total+$boxtotal;
			$sql="update purchase set overall='$overall' where purchaseid='$pid'";
			$conn->query($sql);
		header('location:sales.php');
	}
	else{
		?>
		<script>
			window.alert('Please select a product');
			window.location.href='order.php';
		</script>
		<?php
	}

?>
