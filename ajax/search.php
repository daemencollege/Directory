<?php
require('../functions.php');	

$link = db_connect();

//Variables
$num_per_page = 10;
$adjacents = 2;
$rows = "";

$search = trim($_POST['search']);

if($search){
	$search = preg_replace('/\s+/', '|', $search);
	$search = db_quote($search);
	$sql[] = "(last_name REGEXP $search OR first_name REGEXP $search OR email REGEXP $search OR phone REGEXP $search)";
}

if($_POST['dept']){
	$dept = intval($_POST['dept']);
	$sql[] = "department_id = $dept";
}


if($_POST['group']){
	$group = intval($_POST['group']);
	$sql[] = "group_id = $group";
}

if(isset($_POST['page'])){
	$curr_page = intval($_POST['page']);
	$offset = ($curr_page - 1) * $num_per_page;
} else {
	$curr_page = 1;
	$offset = 0;
}

$query = "SELECT DISTINCT people.id, first_name, last_name, photo, title, email, phone, office, mailbox, group_id FROM people JOIN work_info ON people.id = work_info.id JOIN in_department ON people.id = in_department.person_id JOIN in_group ON people.id = in_group.person_id";

if (!empty($sql)) {
    $query .= ' WHERE ' . implode(' AND ', $sql);
    $query .= " ORDER BY last_name, first_name";
    $rows = db_select($query);
}


//echo '<pre>'.$query.'</pre>';

if($rows){
	$total_pages = ceil(count($rows) / $num_per_page);
	$page_end = min($offset + $num_per_page, count($rows));
?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="hidden-xs col-sm-1"></th>
                <th class="col-xs-9 col-sm-3 col-md-3">Name/Affiliation</th>
                <th class="hidden-xs col-sm-3 col-md-2">Email</th>
                <th class="hidden-xs col-sm-3 col-md-2">Phone</th>
                <th class="hidden-xs hidden-sm col-md-3">Department</th>
                <th class="col-xs-3 col-sm-2 col-md-1"></th>
            </tr>
        </thead>
        <tbody>   
<?php
	for($i = $offset; $i < $page_end; $i++):
	    $dept_rows = in_departments($rows[$i]['id']);
	    $dept_names = array();
        foreach($dept_rows as $dept_row){
            $dept_names[] = $dept_row['name'];
        }
        $dept_names = implode(', ', $dept_names);
        if($rows[$i]['group_id'] == 1):
?>
            <tr>
                <td class="hidden-xs"><img class="img-responsive img-rounded" src="<?php echo 'icons/'.$rows[$i]['photo'].'.png'; ?>"></td>
                <td><?php echo $rows[$i]['first_name'].' '.$rows[$i]['last_name']; ?><br><em><?php echo $rows[$i]['title']; ?></em></td>
                <td class="hidden-xs"><a href="mailto:"><?php echo $rows[$i]['email']; ?></a></td>
                <td class="hidden-xs"><a href="tel:1-555-555-5555"><?php echo '(555) ' . substr($rows[$i]['phone'],0,3) . '-' . substr($rows[$i]['phone'],3); ?></a></td>
                <td class="hidden-xs hidden-sm"><?php echo $dept_names; ?></td>
                <td><button type="button" class="btn btn-primary btn-sm" data-id="<?php echo $rows[$i]['id']; ?>" data-toggle="modal" data-target="#modal-info">View</button></td>
            </tr>
            
<?php
        else:
?>
            <tr>
                <td class="hidden-xs"><img class="img-responsive img-rounded" src="<?php echo 'icons/'.$rows[$i]['photo'].'.png'; ?>"></td>
                <td><?php echo $rows[$i]['first_name'].' '.$rows[$i]['last_name']; ?><br><em><?php echo $rows[$i]['title']; ?></em></td>
                <td class="hidden-xs"><a href="mailto:"><?php echo $rows[$i]['email']; ?></a></td>
                <td class="hidden-xs"></td>
                <td class="hidden-xs hidden-sm"><?php echo $dept_names; ?></td>
                <td><button type="button" class="btn btn-primary btn-sm" data-id="<?php echo $rows[$i]['id']; ?>" data-toggle="modal" data-target="#modal-info">View</button></td>
            </tr>
<?php
        endif;
    endfor;
?>
        </tbody>
    </table>
	
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