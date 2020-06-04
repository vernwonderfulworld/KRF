<!-- Sales Details -->
<div class="modal fade" id="details<?php echo $row['purchaseid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Sales Full Details</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <h5>Customer: <b><?php echo $row['customer']; ?></b>
                        <span class="pull-right">
                      <b>  Date Ordered:    </b><?php echo date('M d, Y ', strtotime($row['date_purchase'])) ?>
                        </span>
                    </h5>
                    <h5>Address: <b><?php echo $row['address']; ?></b>
                        <span class="pull-right">
                      <b>  Delivery Date:    </b><?php echo date('M d Y', strtotime( $row['delivery_date'])) ?>
                  </span>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Product Name</th>
                            <th>Price per Kilo</th>
                            <th>Number of Kilos</th>
                            <th>Price per Box</th>
                            <th>Number of Box</th>
                            <th>Subtotal</th>
                        </thead>
                        <tbody>
                            <?php
                                $sql="select * from purchase_detail left join product on product.productid=purchase_detail.productid where purchaseid='".$row['purchaseid']."'";
                                $dquery=$conn->query($sql);
                                while($drow=$dquery->fetch_array()){
                                    ?>
                                    <tr>
                                        <td><?php echo $drow['productname']; ?></td>
                                        <td class="text-right">&#8369; <?php echo number_format($drow['price'], 2); ?></td>
                                        <td><?php echo $drow['quantity']; ?></td>
                                        <td class="text-right">&#8369; <?php echo number_format($drow['pricebox'], 2); ?></td>
                                        <td><?php echo $drow['quantitybox']; ?></td>
                                        <td class="text-right">&#8369;
                                            <?php
                                                $subt = ($drow['price']*$drow['quantity']) + ($drow['pricebox']*$drow['quantitybox']) ;
                                                echo number_format($subt, 2);
                                            ?>
                                        </td>
                                    </tr>
                                     
                                    <?php

                                }
                            ?>
                            <tr>
                                <td colspan="5" class="text-right"><b>TOTAL</b></td>
                                <td class="text-right">&#8369; <?php echo number_format($row['overall'], 2); ?></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog --> </td>
</div>
