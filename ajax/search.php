<?php
require '../connect.php';	

$link = db_connect();

//Variables
$num_per_page = 10;
$adjacents = 2;

$search = trim($_POST['search']);

if($search !== ''){
	$search = preg_replace('/\s\s+/', '|', $search);
	$search = db_quote($search);
	$sql[] = "last_name REGEXP $search OR first_name REGEXP $search OR email REGEXP $search OR phone REGEXP $search";
}

/*if($_POST['dept']){
	$dept = mysqli_real_escape_string($link, $_POST['dept']);
	$sql[] = "dept = '$dept'";
}

if($_POST['group'] != ''){
	$group = intval($_POST['group']);
	$sql[] = "group_num = $group";
}*/

if($_POST['page']){
	$curr_page = intval($_POST['page']);
	$offset = ($curr_page - 1) * $num_per_page;
} else {
	$curr_page = 1;
	$offset = 0;
}

$query = "SELECT first_name, last_name, email, phone, office, mailbox FROM people JOIN work_info ON people.id = work_info.id";

if (!empty($sql)) {
    $query .= ' WHERE ' . implode(' AND ', $sql);
    $query .= " ORDER BY last_name, first_name";
    $rows = db_select($query);
}


//echo '<pre>'.$query.'</pre>';

if($rows){
	
	$total_pages = ceil(count($rows) / $num_per_page);
	$page_end = min($offset + $num_per_page, count($rows));
	
	for($i = $offset; $i < $page_end; $i++) {
		//$panel_type = $row['group_num'] == 1 ? 'panel-primary' : 'panel-info';
?>
		<div class="col-xs-12 col-sm-6">
	        <div class="panel panel-primary">
	          <div class="panel-heading">
	            <h3 class="panel-title"><?php echo $rows[$i]['first_name'] . ' ' . $rows[$i]['last_name']; ?></h3>
	          </div>
	
	          <div class="panel-body">
	            <div class="row">
	              <div class="col-xs-4 col-xs-offset-4 col-md-3 col-md-offset-0"><img class="img-responsive img-rounded" src="icons/soldier76.png"></div>
	
	              <div class="col-xs-12 col-sm-9" style="min-height: 100px;">
	                <div class="work">
	                  <ul class="list-unstyled" style="margin-bottom: 0;">
	                    <li class="row"><label class="col-xs-3 control-label text-right">Office:</label><span class="col-xs-9"><?php echo $rows[$i]['office']; ?></span></li>
	
	                    <li class="row"><label class="col-xs-3 control-label text-right">Mailbox:</label><span class="col-xs-9"><?php echo $rows[$i]['mailbox']; ?></span></li>
	
	                    <li class="row"><label class="col-xs-3 control-label text-right">Phone:</label><a href="tel:1-555-555-5555" class="col-xs-9">(555) <?php echo substr($rows[$i]['phone'],0,3). '-' . substr($rows[$i]['phone'],3); ?></a></li>
	
	                    <li class="row"><label class="col-xs-3 control-label text-right">Email:</label><a href="mailto:" class="col-xs-9"><?php echo $rows[$i]['email'];?></a></li>
	                  </ul>
	                </div>
	
	                <div class="home" style="display:none;">
	                  <p>Home info loads here</p>
	                </div>
	
	                <div class="emergency" style="display:none;">
	                  <p>Emergency info loads here</p>
	                </div>
	              </div>
	            </div>
	
	            <div class="text-center">
	              <div class="btn-group btn-group-sm" data-toggle="buttons" role="group">
	                <label class="btn btn-primary active"><input name="options-1" type="radio" value="work" checked> <span>Work</span></label>
	                <label class="btn btn-primary"><input name="options-1" type="radio" value="home"> <span>Home</span></label>
	                <label class="btn btn-danger"><input name="options-1" type="radio" value="emergency"> <span class="hidden-xs">Emergency</span></label>
	              </div>
	            </div>
	          </div>
	
	          <div class="panel-footer">
	            <span class="label label-primary">Staff</span>
	          </div>
	        </div>
      </div>
      
      
<?php	
	}
?>
	<nav class="col-sm-offset-3 col-sm-6 text-center">
		<ul class="pagination">
			<?php if($curr_page > 1): ?>
			<li class="prev"><a href="#" data-page="<?php echo $curr_page - 1; ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
			<?php else: ?>
			<li class="disabled"><span aria-hidden="true">&laquo;</span></li>
			<?php 
				endif; 
				if($total_pages < 3 + ($adjacents * 2)):
					for($i = 1; $i <= $total_pages; $i++):
						if($curr_page == $i):
			?>
			<li class="active"><span><?php echo $i; ?></span></li>
			<?php		else: ?>
			<li class="page"><a href="#" data-page="<?php echo $i; ?>"><span><?php echo $i; ?></span></a></li>
			<?php 		
						endif;
					endfor;
				else:
					if($curr_page < 1 + ($adjacents * 2)):
						for($i = 1; $i < 2 + ($adjacents * 2); $i++):
							if($curr_page == $i):
			?>
			<li class="active"><span><?php echo $i; ?></span></li>
			<?php			else: ?>
			<li class="page"><a href="#" data-page="<?php echo $i; ?>"><span><?php echo $i; ?></span></a></li>
			<?php 		
							endif;
						endfor;
			?>
			<li><span>&hellip;</span></li>
			<li class="page"><a href="#" data-page="<?php echo $i; ?>"><span><?php echo $total_pages; ?></span></a></li>
			<?php	elseif($total_pages - ($adjacents * 2) > $curr_page && $curr_page > ($adjacents * 2)): ?>
			<li class="page"><a href="#"><span>1</span></a></li>
			<li><span>&hellip;</span></li>
			<?php		
						for($i = $curr_page - $adjacents; $i <= $curr_page + $adjacents; $i++):
							if($curr_page == $i):
			?>
			<li class="active"><span><?php echo $i; ?></span></li>
			<?php			else: ?>
			<li class="page"><a href="#" data-page="<?php echo $i; ?>"><span><?php echo $i; ?></span></a></li>
			<?php 		
							endif;
						endfor;
			?>
			<li><span>&hellip;</span></li>
			<li class="page"><a href="#" data-page="<?php echo $total_pages; ?>"><span><?php echo $total_pages; ?></span></a></li>
			<?php	else: ?>
			<li class="page"><a href="#" data-page="1"><span>1</span></a></li>
			<li><span>&hellip;</span></li>
			<?php
						for($i = $total_pages - (1 + ($adjacents * 2)); $i <= $total_pages; $i++):
							if($curr_page == $i):
			?>
			<li class="active"><span><?php echo $i; ?></span></li>
			<?php			else: ?>
			<li class="page"><a href="#" data-page="<?php echo $i; ?>"><span><?php echo $i; ?></span></a></li>
			<?php			endif;
						endfor;
					endif;
				endif;
				if($curr_page < $total_pages): ?>
			<li class="next"><a href="#" data-page="<?php echo $curr_page + 1; ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
			<?php 
				else: 
			?>
			<li class="disabled"><span aria-hidden="true">&raquo;</span></li>
			<?php 
				endif; 
			?>
		</ul>
    </nav>
<?php
} else {
?>
	<div class="text-center">No results returned</div>
<?php
}
?>