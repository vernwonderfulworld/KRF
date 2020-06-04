<?php
	include('conn.php');
	$id=$_GET['purchase'];
  $status=$_POST['status'];

  	$sql="select * from purchase where purchaseid='$id'";
    $query=$conn->query($sql);
    $row=$query->fetch_array();
    $sql="update purchase set status= '$status'where purchaseid='$id'";
    $conn->query($sql);

    header('location:delivery.php');
  ?>
