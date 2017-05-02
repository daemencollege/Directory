<!DOCTYPE html>
<html>
<head>
  <title>Directory</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
  <script type="text/javascript">
  $(function() {
      $('input[type=radio]').on('change', function(){
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
    });
  </script>
</head>
<body>
  <div class="container" style="padding-top: 15px;">
    <!--<div class="row">
      <div class="col-xs-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Alex Herdzik</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-3">
                <img class="img-rounded img-responsive" src="https://cdn.pixabay.com/photo/2017/01/25/08/05/unicorn-2007257_1280.png">
              </div>
              <div class="col-xs-9">
                <div class="text-center">
                  <div class="btn-group" data-toggle="buttons" role="group">
                    <label class="btn btn-primary active">
                      <input name="options-1" type="radio" value="work" checked=""><i class="fa fa-briefcase" aria-hidden="true"></i><span class="hidden-xs"> Work</span>
                    </label>
                    <label class="btn btn-primary">
                      <input name="options-1" type="radio" value="home"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs"> Home</span>
                    </label>
                    <label class="btn btn-primary">
                      <input name="options-1" type="radio" value="emergency"><i class="fa fa-medkit" aria-hidden="true"></i><span class="hidden-xs"> Emergency</span>
                    </label>
                  </div>
                </div>
                <div>
                  <p>Garbage</p>
                  <p>Text</p>
                  <p>Unicorn Lover</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Alex Herdzik</h3>
          </div>
          <div class="panel-body">
            <div class="media">
              <div class="media-left media-middle">
                <img class="media-object" src="https://cdn.pixabay.com/photo/2017/01/25/08/05/unicorn-2007257_1280.png" style="width:64px">
              </div>
              <div class="media-body">
                <div class="text-center">
                  <div class="btn-group" data-toggle="buttons" role="group">
                    <label class="btn btn-primary active">
                      <input name="options-1" type="radio" value="work" checked=""><i class="fa fa-briefcase" aria-hidden="true"></i><span class="hidden-xs"> Work</span>
                    </label>
                    <label class="btn btn-primary">
                      <input name="options-1" type="radio" value="home"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs"> Home</span>
                    </label>
                    <label class="btn btn-danger">
                      <input name="options-1" type="radio" value="emergency"><i class="fa fa-medkit" aria-hidden="true"></i><span class="hidden-xs"> Emergency</span>
                    </label>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="work">
                    <ul class="list-unstyled">
                      <li>Office: Unicorns</li>
                      <li>Mail Box: 44</li>
                      <li>Phone: (555) 555-1212</li>
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
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-xs-12 col-sm-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Alex Herdzik</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <div class="btn-group" data-toggle="buttons" role="group">
                <label class="btn btn-primary active">
                  <input name="options-1" type="radio" value="work" checked=""><i class="fa fa-briefcase" aria-hidden="true"></i><span class="hidden-xs"> Work</span>
                </label>
                <label class="btn btn-primary">
                  <input name="options-1" type="radio" value="home"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs"> Home</span>
                </label>
                <label class="btn btn-danger">
                  <input name="options-1" type="radio" value="emergency"><i class="fa fa-medkit" aria-hidden="true"></i><span class="hidden-xs"> Emergency</span>
                </label>
              </div>
            </div>
            <div class="media">
              <div class="media-left media-middle">
                <img class="media-object" src="https://cdn.pixabay.com/photo/2017/01/25/08/05/unicorn-2007257_1280.png" style="width:64px">
              </div>
              <div class="media-body">
                <div class="work">
                  <ul class="list-unstyled" style="margin-bottom: 0;">
                    <li>Office: Unicorns</li>
                    <li>Mail Box: 44</li>
                    <li>Phone: (555) 555-1212</li>
                    <li>Email: unicornlover@unicorns.com</li>
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
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
            
      <div class="col-xs-12 col-sm-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Alex Herdzik</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="media">
                <div class="col-xs-3">
                  <div class="media-left media-middle">
                    <div class="thumbnail" style="margin-bottom: 0;">
                      <img class="media-object" src="https://cdn.pixabay.com/photo/2017/01/25/08/05/unicorn-2007257_1280.png" style="width:100%">
                      <div class="caption">
                        <span>Department</span><br>
                        <span>Title</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-9">
                  <div class="media-body">
                    <div class="text-center">
                      <div class="btn-group" data-toggle="buttons" role="group">
                        <label class="btn btn-primary active">
                          <input name="options-1" type="radio" value="work" checked=""><i class="fa fa-briefcase" aria-hidden="true"></i><span class="hidden-xs"> Work</span>
                        </label>
                        <label class="btn btn-primary">
                          <input name="options-1" type="radio" value="home"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs"> Home</span>
                        </label>
                        <label class="btn btn-danger">
                          <input name="options-1" type="radio" value="emergency"><i class="fa fa-medkit" aria-hidden="true"></i><span class="hidden-xs"> Emergency</span>
                        </label>
                      </div>
                    </div>
                    <div class="media">
                      <div class="work">
                        <ul class="list-unstyled" style="margin-bottom: 0;">
                          <li>Office: Unicorns</li>
                          <li>Mail Box: 44</li>
                          <li>Phone: (555) 555-1212</li>
                          <li>Email: unicornlover@unicorns.com</li>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
      
      <div class="col-xs-12 col-sm-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Alex Herdzik</h3>
          </div>
          <div class="panel-body">
            <div class="text-center">
              <div class="btn-group" data-toggle="buttons" role="group">
                <label class="btn btn-primary active">
                  <input name="options-1" type="radio" value="work" checked=""><i class="fa fa-briefcase" aria-hidden="true"></i><span> Work</span>
                </label>
                <label class="btn btn-primary">
                  <input name="options-1" type="radio" value="home"><i class="fa fa-home" aria-hidden="true"></i><span> Home</span>
                </label>
                <label class="btn btn-danger">
                  <input name="options-1" type="radio" value="emergency"><i class="fa fa-medkit" aria-hidden="true"></i><span class="hidden-xs"> Emergency</span>
                </label>
              </div>
            </div>
            <div class="media">
              <div class="row">
                <div class="col-xs-4 col-xs-offset-4 col-sm-3 col-sm-offset-0">
                  <img class="img-responsive img-rounded" src="https://cdn.pixabay.com/photo/2017/01/25/08/05/unicorn-2007257_1280.png">
                </div>
                <div class="col-xs-12 col-sm-9">
                  <div class="work">
                    <ul class="list-unstyled" style="margin-bottom: 0;">
                      <li class="row"><label class="col-xs-3 control-label">Office:</label><span class="col-xs-9">64 Unicorns</span></li>
                      <li class="row"><label class="col-xs-3 control-label">Mailbox:</label><span class="col-xs-9">44</span></li>
                      <li class="row"><label class="col-xs-3 control-label">Phone:</label><span class="col-xs-9">(555) 555-1212</span></li>
                      <li class="row"><label class="col-xs-3 control-label">Email:</label><a href="mailto:" class="col-xs-9">unicornlover@unicorns.com</a></li>
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
            </div>
          </div>
          <div class="panel-footer"><b>Department of Unicorns</b></div>
        </div>
      </div>
    </div>-->
    <!-- Search Form -->

    <div class="well col-sm-offset-1 col-sm-10">
      <form class="form-horizontal">
        <div class="form-group">
          <label class="control-label col-sm-2" for="search">Search:</label>

          <div class="col-sm-9">
            <div class="input-group">
              <input type="text" class="form-control" id="search" placeholder="Search for...">
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
              <option>All Departments</option>
              <option>Soldier 76</option>
              <option>McCree</option>
              <option>Junkrat</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2">Filter:</label>

          <div class="col-sm-10">
            <label class="radio-inline"><input type="radio" name="optradio" checked="checked">All Matches</label> <label class="radio-inline"><input type="radio" name="optradio">Employees Only</label> <label class="radio-inline"><input type="radio" name="optradio">Students Only</label>
          </div>
        </div>
      </form>
    </div><!-- Pagination -->

    <nav aria-label="Page navigation">
      <ul class="pagination">
        <li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>

        <li class="active"><a href="#">1</a></li>

        <li><a href="#">2</a></li>

        <li><a href="#">3</a></li>

        <li><a href="#">4</a></li>

        <li><a href="#">5</a></li>

        <li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
      </ul>
    </nav><!-- Data Sample -->

    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Alex Herdzik</h3>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-xs-4 col-xs-offset-4 col-md-3 col-md-offset-0"><img class="img-responsive img-rounded" src="https://cdn.pixabay.com/photo/2017/01/25/08/05/unicorn-2007257_1280.png"></div>

              <div class="col-xs-12 col-sm-9" style="min-height: 100px;">
                <div class="work">
                  <ul class="list-unstyled" style="margin-bottom: 0;">
                    <li class="row"><label class="col-xs-3 control-label text-right">Office:</label><span class="col-xs-9">64 Unicorns</span></li>

                    <li class="row"><label class="col-xs-3 control-label text-right">Mailbox:</label><span class="col-xs-9">44</span></li>

                    <li class="row"><label class="col-xs-3 control-label text-right">Phone:</label><span class="col-xs-9">(555) 555-1212</span></li>

                    <li class="row"><label class="col-xs-3 control-label text-right">Email:</label><a href="mailto:" class="col-xs-9">unicornlover@unicorns.com</a></li>
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
                <label class="btn btn-primary active"><input name="options-1" type="radio" value="work" checked> <span>Work</span></label> <label class="btn btn-primary"><input name="options-1" type="radio" value="home"> <span>Home</span></label> <label class="btn btn-danger"><input name="options-1" type="radio" value="emergency"> <span class="hidden-xs">Emergency</span></label>
              </div>
            </div>
          </div>

          <div class="panel-footer">
            <span class="label label-primary">Department of Unicorns</span> <span class="label label-info">Overwatch</span>
          </div>
        </div>
      </div>

      <div class="col-xs-12 col-sm-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Alex Herdzik</h3>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-xs-4 col-xs-offset-4 col-md-3 col-md-offset-0"><img class="img-responsive img-rounded" src="https://cdn.pixabay.com/photo/2017/01/25/08/05/unicorn-2007257_1280.png"></div>

              <div class="col-xs-12 col-sm-9" style="min-height: 100px;">
                <div class="work">
                  <ul class="list-unstyled" style="margin-bottom: 0;">
                    <li class="row"><label class="col-xs-3 control-label text-right">Office:</label><span class="col-xs-9">64 Unicorns</span></li>

                    <li class="row"><label class="col-xs-3 control-label text-right">Mailbox:</label><span class="col-xs-9">44</span></li>

                    <li class="row"><label class="col-xs-3 control-label text-right">Phone:</label><span class="col-xs-9">(555) 555-1212</span></li>

                    <li class="row"><label class="col-xs-3 control-label text-right">Email:</label><a href="mailto:" class="col-xs-9">unicornlover@unicorns.com</a></li>
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
                <label class="btn btn-primary active"><input name="options-1" type="radio" value="work" checked> <span>Work</span></label> <label class="btn btn-primary"><input name="options-1" type="radio" value="home"> <span>Home</span></label> <!--<label class="btn btn-danger">
                  <input name="options-1" type="radio" value="emergency"><i class="fa fa-medkit" aria-hidden="true"></i><span class="hidden-xs"> Emergency</span>
                </label>-->
              </div>
            </div>
          </div>

          <div class="panel-footer">
            <span class="label label-primary">Department of Unicorns</span> <span class="label label-info">Overwatch</span>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Alex Herdzik</h3>
          </div>

          <div class="panel-body">
            <div class="row">
              <div class="col-xs-4 col-xs-offset-4 col-md-3 col-md-offset-0"><img class="img-responsive img-rounded" src="https://cdn.pixabay.com/photo/2017/01/25/08/05/unicorn-2007257_1280.png"></div>

              <div class="col-xs-12 col-sm-9" style="min-height: 100px;">
                <div class="work">
                  <ul class="list-unstyled" style="margin-bottom: 0;">
                    <li class="row"><label class="col-xs-3 control-label text-right">Office:</label><span class="col-xs-9">64 Unicorns</span></li>

                    <li class="row"><label class="col-xs-3 control-label text-right">Mailbox:</label><span class="col-xs-9">44</span></li>

                    <li class="row"><label class="col-xs-3 control-label text-right">Phone:</label><span class="col-xs-9">(555) 555-1212</span></li>

                    <li class="row"><label class="col-xs-3 control-label text-right">Email:</label><a href="mailto:" class="col-xs-9">unicornlover@unicorns.com</a></li>
                  </ul>
                </div>

                <div class="home" style="display:none;">
                  <p>Home info loads here</p>
                </div>

                <div class="emergency" style="display:none;">
                  <p>Emergency info loads here</p>
                </div>
              </div>
            </div><!--<div class="text-center">
              <div class="btn-group btn-group-sm" data-toggle="buttons" role="group">
                <label class="btn btn-primary active">
                  <input name="options-1" type="radio" value="work" checked=""><i class="fa fa-briefcase" aria-hidden="true"></i><span> Work</span>
                </label>
                <label class="btn btn-primary">
                  <input name="options-1" type="radio" value="home"><i class="fa fa-home" aria-hidden="true"></i><span> Home</span>
                </label>
                <label class="btn btn-danger">
                  <input name="options-1" type="radio" value="emergency"><i class="fa fa-medkit" aria-hidden="true"></i><span class="hidden-xs"> Emergency</span>
                </label>
              </div>
            </div>-->
          </div>

          <div class="panel-footer">
            <span class="label label-primary">Department of Unicorns</span> <span class="label label-info">Overwatch</span>
          </div>
        </div>
      </div>
    </div><!-- Pagination -->

    <nav aria-label="Page navigation">
      <ul class="pagination">
        <li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>

        <li class="active"><a href="#">1</a></li>

        <li><a href="#">2</a></li>

        <li><a href="#">3</a></li>

        <li><a href="#">4</a></li>

        <li><a href="#">5</a></li>

        <li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
      </ul>
    </nav>
  </div>
</body>
</html>
