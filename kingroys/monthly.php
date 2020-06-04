<?php include ("header.php"); ?>
<?php include ("navbar.php"); ?>
<?php include ("export.php"); ?>

<body>
	

<div class="container" ><div id = "button"> </div>
	<h1 class="page-header text-center" style="color:#C79926"><b>Monthly Sales</b></h1>
	<table class="table table-striped table-bordered" id="myTable">
		<thead>
			<th> Total Number of Kilos Sold </th>
			<th> Total Box Sold </th>
			<th> Total Sales for the Month </th>
		</thead>

		<tbody>
			<?php

					$sql="SELECT SUM(overall) AS TotalAmount FROM purchase WHERE date_purchase BETWEEN 'date_from' AND 'date_to";
					$query=$conn->query($sql);

					?>

				<td>Data not Available </td>
				<td>Data not Available </td>
				<td>Data not Available </td>	

		</tbody>

	</table>
</div>
</body>
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



