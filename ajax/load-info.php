<?php
    require('../connect.php');  
  
    if(isset($_POST['person_id'])){
        $person_id = intval($_POST['person_id']);
        $query = "SELECT first_name, last_name, photo FROM people WHERE id = $person_id";
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
        <p>Text goes here</p>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>