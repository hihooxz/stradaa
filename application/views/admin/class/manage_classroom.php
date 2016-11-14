n<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->


  <!-- Main Header -->



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Classroom
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Classroom</li>
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
                'name_classroom'=>'Classroom Name'
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
      <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin-bottom:10px" href="<?php echo base_url($this->uri->segment(1).'/add-classroom')?>" role="button">
        <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Add Classroom
      </a>
      <table id="example1" class="table table-responsive table-bordered table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>Classroom Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $i=1;
          if($results!=FALSE){
            foreach ($results as $rows) {

              ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $rows->name_classroom ?></td>

          <td>
            <a class="btn btn-sm vcd-btn-primary btn-rd" href="<?php echo base_url($this->uri->segment(1).'/edit-classroom/'.$rows->id_classroom)?>" role="button">
              <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
            </a>
            <a class="btn btn-sm vcd-btn-primary btn-rd" href="<?php echo base_url($this->uri->segment(1).'/delete-classroom/'.$rows->id_classroom)?>" role="button">
              <i class="fa fa-trash fa-fw" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
        <?php
        $i++;
        }

      }
        ?>
          <?php
            echo $links;
            ?>

      </tbody>
      <tfoot>
        <tr>
          <th>No.</th>
          <th>Classroom Name</th>
          <th>Action</th>
        </tr>
      </tfoot>

      </table>
    </div>
  </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
