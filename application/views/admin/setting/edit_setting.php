<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>

  <!-- Tell the browser to be responsive to screen width -->

  <link rel="stylesheet" href="<?php echo base_url('asset/asset_default/plugins/datepicker/datepicker3.css')?>">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->

  <!-- Left side column. contains the logo and sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Setting
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Settings</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box body">
    <div class="container">
      <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin-top:10px" href="#" role="button">
        <i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i>Back to Dashboard
      </a>
      <form class="" method="post">
        <?php echo validation_errors()?>  
        <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Website Title</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <input type="text" class="form-control col-md-7 col-xs-12"name="title_website" value="<?php echo $result['title_website']?>">
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
        </div>
        <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Date</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
          <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
            <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin-top:10px" href="#" role="button" name="downloadable_date" value="<?php echo $result['downloadable_date']?>">
              Save
            </a>
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      </form>
     <!-- <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
              <div class="form-group">
                <label>Website Title:</label>
              </div>

              <div class="form-group">
                <label>Downloadable Date:</label>
              </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <div class="form-group">
              <input type="text" class="form-control col-md-7 col-xs-12">
            </div>
            <div class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
              </div>
            <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin-top:10px" href="#" role="button">
              Save
            </a>
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div> -->



          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      </form>
      </div>

    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->

  <!-- Main Footer -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->

<script src="<?php echo base_url('asset/asset_default/plugins/datepicker/bootstrap-datepicker.js')?>"></script>
<script>
$('#datepicker').datepicker({
      autoclose: true
    });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
