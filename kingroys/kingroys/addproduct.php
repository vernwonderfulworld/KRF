<?php
	include('conn.php');

	$pname=$_POST['pname'];
	$price=$_POST['price'];
	$pricebox=$_POST['pricebox'];
	$category=$_POST['category'];

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	}
	
	$sql="insert into product (productname, categoryid, price, pricebox, photo) values ('$pname', '$category', '$price', '$pricebox', '$location')";
	$conn->query($sql);

	header('location:product.php');

?>