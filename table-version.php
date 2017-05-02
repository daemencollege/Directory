<!DOCTYPE html>
<html>
<head>
	<title>Directory</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
		td.details-control {
		    background: url('https://datatables.net/examples/resources/details_open.png') no-repeat center center;
		    cursor: pointer;
		}
		tr.shown td.details-control {
		    background: url('https://datatables.net/examples/resources/details_close.png') no-repeat center center;
		}
	</style>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/v/bs/dt-1.10.13/datatables.min.js"></script>
	<script>
		/* Formatting function for row details - modify as you need */
		function format ( d ) {
		    // `d` is the original data object for the row
		    return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
		        '<tr>'+
		        	'<td><img src="'+d.src+'" style="width:50px;height:50px"></td>'+
		        '</tr>'+
		        '<tr>'+
		            '<td>Full name:</td>'+
		            '<td>'+d.name+'</td>'+
		        '</tr>'+
		        '<tr>'+
		            '<td>Phone number:</td>'+
		            '<td>'+d.phone_number+'</td>'+
		        '</tr>'+
		        '<tr>'+
		            '<td>Extra info:</td>'+
		            '<td>And any further details here...</td>'+
		        '</tr>'+
		    '</table>';
		}
		
		$(document).ready(function() {
			var table = $('#example').DataTable( {
				"ajax": "./ajax/data/objects.txt",
				"columns": [
					{
						"className": 'details-control',
						"orderable": false,
						"data": null,
						"defaultContent": ''
					},
					{
						"data": "name"
					},
					{
						"data": "department"
					},
					{
						"orderable": false,
						"data": "phone_number"
					}
				],
				"order": [[1, 'asc']],
				"searching": false
			} );
			
			// Add event listener for opening and closing details
		    $('#example tbody').on('click', 'td.details-control', function () {
		        var tr = $(this).closest('tr');
		        var row = table.row( tr );
		 
		        if ( row.child.isShown() ) {
		            // This row is already open - close it
		            row.child.hide();
		            tr.removeClass('shown');
		        }
		        else {
		            // Open this row
		            row.child( format(row.data()) ).show();
		            tr.addClass('shown');
		        }
		    } );
		} );
	</script>
</head>
<body>
	<div class="container">
		<p>Search stuff up here...</p>
		<div>
			<table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th></th>
						<th>Name</th>
						<th>Department</th>
						<th>Phone Number</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>