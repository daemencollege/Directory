<!DOCTYPE html>
<html>
<head>
  <title>Directory</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
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
	      $('#results').load('ajax/search.php', {'search': $('#search').val(), 'dept': $('#dept').val(), 'group': $('input:radio[name="group"]:checked').val(), 'page': page});
      });
      
    });
    
    //Get results
    function search() {
	    $('#results').load('ajax/search.php', {'search': $('#search').val(), 'dept': $('#dept').val(), 'group': $('input:radio[name="group"]:checked').val()});
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
              <input type="search" class="form-control" id="search" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
              </span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="dept">Department:</label>

          <div class="col-sm-9">
            <select class="form-control" id="dept">
              <option value=''>All Departments</option>
              <option value='offense'>Offense</option>
              <option value='defense'>Defense</option>
              <option value='tank'>Tank</option>
              <option value='support'>Support</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Type:</label>

          <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="group" value="" checked="checked">All Matches</label>
            <label class="radio-inline"><input type="radio" name="group" value="1">Original Members</label>
            <label class="radio-inline"><input type="radio" name="group" value="0">Non-Members</label>
          </div>
        </div>
      </form>
    </div>
    
	<div class="col-sm-12" id="results"></div>

  </div>
</body>
</html>
