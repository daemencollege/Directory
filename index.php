<?php require('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Directory</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <style>
      html {
          overflow-y: scroll;
      }
      
      .row-details {
          background: #f5f5f5;
      }
      
      .table>tbody>tr>td {
          vertical-align: middle;
      }
      
      .entry:hover {
	      background-color: #D3D3D3;
      }
      
      .selected {
	      background-color: #f2ffdb;
      }
      
  </style>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
  <!--<script src="javascript/bootstrap3-typeahead.min.js" type="text/javascript"></script>-->
  <script type="text/javascript">
  	$(function() {
	  
	  $('#search').on('input', function(){
	    clearTimeout($.data(this, 'timer'));
		$(this).data('timer', setTimeout(search, 300));
	  });
	  
	  $('.input-group-btn .btn').on('click', function(){
		  search(); 
	  });
	  
	  $('#dept').on('change', function(){
		  search();
	  });
	  
	  $('#dept-admin').on('change', function(){
		  search();
	  });
	  
	  $('input[name="group"]:radio').on('change', function(){
		 search();
	  });
	  
      $(document).on('change', 'input:radio[name=options-1]', function(){
        switch ($(this).val()) {
          case 'work':
            $(this).closest('.panel-body').find('.work').show().siblings().hide();
            break;
          case 'home':
            $(this).closest('.panel-body').find('.home').show().siblings().hide();
            break;
          case 'emergency':
            $(this).closest('.panel-body').find('.emergency').show().siblings().hide();
            break;
        }
      });
      
      	$(document).on('click', 'li a', function(e) {
	      e.preventDefault();
	      var page = $(this).attr('data-page');
	      $('#results').load('ajax/search.php', {'search': $('#search').val(), 'dept': $('#dept').val(), 'dept': $('#dept').val(), 'group': $('input:radio[name="group"]:checked').val(), 'page': page});
		  });
      
       	$(document).on('click', '.entry', function(){
	    	$(this).toggleClass("selected");
        	$(this).closest('tr').next('tr').toggleClass('hidden');
      	}); 
      	
      	$(document).on('click', '.entry a', function(ev){
	    	ev.stopPropogation();
      	});
      	
      	
    });
    
    //Get results
    function search() {
	    $('#results').load('ajax/search.php', {'search': $('#search').val(), 'dept': $('#dept').val(), 'dept-admin': $('#dept-admin').val(), 'group': $('input:radio[name="group"]:checked').val(), 'page': 1});
    }
    
  </script>
</head>
<body>
  <div class="container" style="padding-top: 15px;">
    
    <!-- Search Form -->

    <div class="well col-sm-offset-1 col-sm-10">
      <form class="form-horizontal" onsubmit="return false;">
        <div class="form-group">
          <label class="control-label col-sm-2" for="search">Search:</label>

          <div class="col-sm-9">
            <div class="input-group">
              <input type="search" class="form-control" id="search">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
              </span>
            </div>
          </div>
          
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="dept">Department:</label>

          <div class="col-sm-4">
          	<select class="form-control" id="dept">
              <option value=''>Academic Department</option>
			  <?php $rows = get_departments(1); 
					foreach($rows as $row): ?>
	          <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
			  <?php endforeach; ?>
            </select>
          </div>
          
          <div class="col-sm-4">
          	<select class="form-control" id="dept-admin">
              <option value=''>Administrative Office</option>
			  <?php $rows = get_departments(2); 
					foreach($rows as $row): ?>
	          <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
			  <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Type:</label>

          <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="group" value="" checked="checked">All</label>
            <label class="radio-inline"><input type="radio" name="group" value="1">Employees</label>
            <label class="radio-inline"><input type="radio" name="group" value="2">Students</label>
          </div>
        </div>
      </form>
    </div>
    
	<div class="col-sm-12" id="results"></div>
	
	<div class="modal" id="modal-info" role="dialog">
    	<div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
	</div>

  </div>
</body>
</html>
