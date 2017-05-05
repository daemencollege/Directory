<?php
    require('../connect.php');  
  
    if(isset($_POST['person_id'])){
        $person_id = intval($_POST['person_id']);
    } else {
        exit;
    }
?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Header</h4>
            </div>
            <div class="modal-body">
                <p>Text goes here</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>