<?php
    require('../connect.php');  
  
    if(isset($_POST['person_id'])){
        $person_id = intval($_POST['person_id']);
        $query = "SELECT first_name, last_name, photo, title, email, phone, office, mailbox FROM people JOIN work_info ON people.id = work_info.id WHERE people.id = $person_id";
        $rows = db_select($query);
        $row = $rows[0];
    } else {
        exit;
    }
?>
    <div class="modal-header">
        <h4 class="modal-title"><?php echo $row['first_name'].' '.$row['last_name']; ?></h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-xs-2">
                <img class="img-responsive img-rounded" src="<?php echo 'icons/'.$row['photo'].'.png';?>">
            </div>
            <div class="col-xs-10">
                <ul class="list-unstyled" style="margin-bottom: 0;">
                    <li class="row"><label class="col-xs-3 control-label text-right">Email:</label><a href="mailto:" class="col-xs-9"><?php echo $row['email'];?></a></li>
                    <li class="row"><label class="col-xs-3 control-label text-right">Phone:</label><a href="tel:1-555-555-5555" class="col-xs-9">(555) <?php echo substr($row['phone'],0,3). '-' . substr($row['phone'],3); ?></a></li>
                    <li class="row"><label class="col-xs-3 control-label text-right">Office:</label><span class="col-xs-9"><?php echo $row['office']; ?></span></li>
                    <li class="row"><label class="col-xs-3 control-label text-right">Mailbox:</label><span class="col-xs-9"><?php echo $row['mailbox']; ?></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>