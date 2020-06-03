
<div class="modal fade" id="editstatus<?php echo $row['purchaseid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Status</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editstatus.php?purchase=<?php echo $row['purchaseid']; ?>" enctype="multipart/form-data">

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Status:</label>
                            </div>
                            <div class="col-md-3">
                                <select class="form-control" name="status">
                                    <option value= "Pending">Pending</option>
                                    <option value= "Delivered">Delivered</option>
                                    <option value= "Canceled">Cansceled</option>
                                </select>
                            </div>
                        </div>
                    </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Update</button>
            </div>
        </div>
        
    </div>
  </form>
</div>
</div>
</div>
