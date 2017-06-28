<?php
include('classes/autoloader.php');

spl_autoload_register('Autoloader::loader');
    
$db = new Database;

//Variables
$num_per_page = 10;
$adjacents = 2;
$results = "";

$search = trim($_POST['search']);

if($search){
	$search = preg_replace('/\s+/', '|', $search);
	$search = $db->quote($search);
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


if (!empty($sql)) {
    $count_query = "SELECT COUNT(DISTINCT people.id) as count FROM people JOIN in_department ON people.id = in_department.person_id JOIN in_group ON people.id = in_group.person_id";
    $count_query .= ' WHERE ' . implode(' AND ', $sql);
    $count = $db->select($count_query);
    $count = $count[0]->count;
    
    $query = "SELECT DISTINCT people.id as id, first_name as firstName, last_name as lastName, photo, title, email, phone, office, mailbox, group_id FROM people JOIN in_department ON people.id = in_department.person_id JOIN in_group ON people.id = in_group.person_id";
    $query .= ' WHERE ' . implode(' AND ', $sql);
    $query .= " ORDER BY lastName, firstName LIMIT $offset, $num_per_page";
    $results = $db->select($query);
}


echo '<pre>'.$query.'</pre>';
//var_dump($count);

if ($results) {
	$total_pages = ceil($count / $num_per_page);
	$page_end = min($offset + $num_per_page, $count);
?>
    <table class="table">
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
	foreach ($results as $result) :
	    /*$dept_rows = in_departments($row['id']);
	    $dept_names = array();
        foreach($dept_rows as $dept_row){
            $dept_names[] = $dept_row['name'];
        }
        $dept_names = implode(', ', $dept_names);*/
        if ($result->group_id == 1) :
        $result = new Employee($result);
?>
            <tr>
                <td class="hidden-xs"><img class="img-responsive img-rounded" src="<?php echo 'icons/'.$result->getPhoto().'.png'; ?>"></td>
                <td><?php echo $result->getFullName(); ?><br><em><?php echo $result->getTitle(); ?></em></td>
                <td class="hidden-xs"><?php $result->printEmailAsLink(); ?></td>
                <td class="hidden-xs"><?php $result->printPhoneAsLink(); ?></td>
                <td class="hidden-xs hidden-sm"><?php echo $result->getDepartments(); ?></td>
                <td><button type="button" class="btn btn-primary btn-sm" data-id="<?php echo $result->getId(); ?>">View</button></td>
            </tr>
            <tr class="row-details hidden">
                <td colspan="6">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <h5>Work Info</h5>
                            <ul class="list-unstyled" style="margin-bottom: 0;">
                                <li class="row"><label class="col-xs-4 control-label">Email:</label><span class="col-xs-8"><?php $result->printEmailAsLink(); ?></span></li>
                                <li class="row"><label class="col-xs-4 control-label">Phone:</label><span class="col-xs-8"><?php $result->printPhoneAsLink(); ?></span></li>
                                <li class="row"><label class="col-xs-4 control-label">Office:</label><span class="col-xs-8"><?php echo $result->getOffice(); ?></span></li>
                                <li class="row"><label class="col-xs-4 control-label">Mailbox:</label><span class="col-xs-8"><?php echo $result->getMailbox(); ?></span></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <h5>Additional Info</h5>
                            <ul class="list-unstyled" style="margin-bottom: 0;">
                                <li class="row"><label class="col-xs-4 control-label">Alt Email:</label><span class="col-xs-8"><?php $result->printEmailAsLink(); ?></span></li>
                                <li class="row"><label class="col-xs-4 control-label">Alt Phone:</label><span class="col-xs-8"><?php $result->printPhoneAsLink(); ?></a></span></li>
                                <li class="row"><label class="col-xs-4 control-label">Address:</label><span class="col-xs-8"><?php echo $result->getOffice(); ?><br>Amherst, NY 14226</span></li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <h5 class="text-danger">Emergency Info</h5>
                            <ul class="list-unstyled" style="margin-bottom: 0;">
                                <li class="row"><label class="col-xs-4 control-label">Name:</label><span class="col-xs-8"><?php echo $result->getFullName(); ?></span></li>
                                <li class="row"><label class="col-xs-4 control-label">Relation:</label><span class="col-xs-8">Myself</span></li>
                                <li class="row"><label class="col-xs-4 control-label">Phone:</label><span class="col-xs-8"><?php $result->printPhoneAsLink(); ?></span></li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
            
<?php
        else:
        $result = new Student($result);
?>
            <tr>
                <td class="hidden-xs"><img class="img-responsive img-rounded" src="<?php echo 'icons/'.$result->photo.'.png'; ?>"></td>
                <td><?php echo $result->first_name.' '.$result->last_name; ?><br><em><?php echo $result->title; ?></em></td>
                <td class="hidden-xs"><a href="mailto:"><?php echo $result->email; ?></a></td>
                <td class="hidden-xs"></td>
                <td class="hidden-xs hidden-sm"><?php echo 'Hold on'; ?></td>
                <td><button type="button" class="btn btn-primary btn-sm" data-id="<?php echo $result->id; ?>">View</button></td>
            </tr>
            <tr style="display: none;">
                <td colspan="6">
                    <div class="row">
                        <div class="col-xs-12">
                            <h5>Student Info</h5>
                        </div>
                    </div>
                </td>
            </tr>
<?php
        endif;
    endforeach;
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