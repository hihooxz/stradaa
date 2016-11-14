<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>

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
        Manage Subject
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Subject</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

  <div class="box">
    <div class="box-header">

    </div>
    <div class="row" style="margin-bottom:10px">
      <form method="POST" action="">
      <div class="col-md-3">
      </div>
      <div class="col-md-3">
        <input type="text" name="search" class="form-control"><br />
      </div>
      <div class="col-md-3">
        <?php
          $options = array(
                'subject'=>'Subject',
                'description'=> 'Description'
              );
          echo form_dropdown('by',$options,set_value('by'),"class='form-control'");
        ?><br />
      </div>
      <div class="col-md-3">
        <button type="submit"class="btn btn-default">Search</button><br />
      </div>
    </form>
    </div>
     <!-- /.box-header -->
    <div class="box-body">
      <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin-bottom:10px" href="<?php echo base_url($this->uri->segment(1).'/add-subject')?>" role="button">
        <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Add Subject
      </a>
      <table id="example1" class="table table-responsive table-bordered table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>Subject</th>
          <th width="70%" class="text-center">Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php

          if($results!=FALSE){
            $i=1;
            foreach ($results as $rows) {

              ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $rows->subject ?></td>
                <td><?php echo $rows->description?></td>


          <td>
            <a class="btn btn-sm vcd-btn-primary btn-rd" href="<?php echo base_url($this->uri->segment(1).'/edit-subject/'.$rows->id_subject)?>" role="button">
              <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
            </a>
            <a class="btn btn-sm vcd-btn-primary btn-rd" href="<?php echo base_url($this->uri->segment(1).'/delete-subject/'.$rows->id_subject)?>" role="button">
              <i class="fa fa-trash fa-fw" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
        <?php
        $i++;
        }
      }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>No.</th>
          <th>Subject</th>
          <th class="text-center">Description</th>
          <th>Action</th>
        </tr>
      </tfoot>
      </table>
      <center>
        <?php
            echo $links;
            ?>
      </center>
    </div>
  </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->

</body>
</html>
