<!DOCTYPE html>


<div class="wrapper">

  <!-- Main Header -->

  <!-- Left side column. contains the logo and sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Schedule
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Schedule</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
      <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin-bottom:10px" href="<?php echo base_url($this->uri->segment(1).'/add-schedule')?>" role="button">
        <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Add Schedule
      </a>
      <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin-bottom:10px" href="<?php echo base_url($this->uri->segment(1).'/manage-schedule')?>" role="button">
        <i class="fa fa-calendar fa-fw" aria-hidden="true"></i> Calendar Style
      </a>

          <div class="box box-primary">
               <table id="example1" class="table table-responsive table-bordered table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>Name Schedule</th>
          <th>Date</th>
          <th>Hour Start</th>
          <th>Hour End</th>
          <th>Classroom</th>
          <th>Class</th>
          <th>Subject</th>
          <th>Pengawas 1</th>
          <th>Pengawas 2</th>
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
                <td><?php echo $rows->name_schedule?></td>
                <td><?php echo date('D, d M Y',strtotime($rows->date_schedule)) ?></td>
                <td><?php echo $rows->hour_start ?></td>
                <td><?php echo $rows->hour_end ?></td>
                <td><?php echo $rows->name_classroom?></td>
                <td><?php echo $rows->class_name?></td>
                <td><?php echo $rows->subject?></td>
                <td><?php ?></td>
                <td><?php ?></td>
          <td>
            <a class="btn btn-sm vcd-btn-primary btn-rd" href="<?php echo base_url($this->uri->segment(1).'/edit-schedule/'.$rows->id_schedule)?>" role="button">
              <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
            </a>
            <a class="btn btn-sm vcd-btn-primary btn-rd" href="<?php echo base_url($this->uri->segment(1).'/delete-schedule/'.$rows->id_schedule)?>" role="button">
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
      </tfoot>

      </table>
          </div>
          <!-- /. box -->
        </div>
    </section>
    <!-- /.content -->
  </div>
</div>
  <!-- /.content-wrapper -->
