<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.


  <!-- Main Header -->

  <!-- Left side column. contains the logo and sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Class
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Class</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box body">
    <div class="container">
      <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin-top:10px" href="<?php echo base_url($this->uri->segment(1).'/manage-class')?>" role="button">
        <i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i>Back to Manage Class
      </a>
      <form class="" method="post">
        <?php echo validation_errors()?>
        <div class="form-group">
          <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3 text-right">
              <label class="control-label">Status Class</label>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-9">
              <?php
                $options = array(
                  '0' => 'Active',
                  '1' => 'Non Active'
                );
                echo form_dropdown('status_class',$options,$result['status_class'],"class='form-control'");
               ?>
            </div>
            <div class="col-md-3 col-sm-3 hidden-xs"></div>
          </div>
        </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Class Name</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <input type="text" class="form-control col-md-7 col-xs-12" name="class_name" value="<?php echo $result['class_name']?>">
            <button class="btn btn-sm vcd-btn-primary btn-rd" style="margin-top:10px" href="#" role="button">
              Save
            </button>
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>



          
