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
      <div class="box container">
      <?php
        if($this->session->userdata('permission') == 1){
      ?>
      <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin:10px 0" href="<?php echo base_url($this->uri->segment(1).'/add-schedule')?>" role="button">
        <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Add Schedule
      </a>
      <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin:10px 0" href="<?php echo base_url($this->uri->segment(1).'/manage-schedule-grid')?>" role="button">
        <i class="fa fa-list fa-fw" aria-hidden="true"></i> Grid Style
      </a>
      <?php
      }
      else if($this->session->userdata('permission') != 1){
        ?>
        <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin:10px 0" href="<?php echo base_url($this->uri->segment(1).'/view-schedule')?>" role="button">
          <i class="fa fa-calendar fa-fw" aria-hidden="true"></i> Calendar Style
        </a>
        <?php
      }
      ?>

          <div class="box box-primary">
               <table id="example1" class="table table-responsive table-bordered table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>Name Schedule</th>
          <th>Subject</th>
          <th>Date</th>
          <th>Hour Start</th>
          <th>Hour End</th>
          <th>Classroom</th>
          <?php
            if($this->session->userdata('permission') != 3){
          ?>
          <th>Class</th>
          <th>Pengawas 1</th>
          <th>Pengawas 2</th>
          <?php
          }
            if($this->session->userdata('permission') == 1){
          ?>
          <th>Action</th>
          <?php
          }
          ?>
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
                <td><?php echo $rows->subject?></td>
                <td><?php echo date('D, d M Y',strtotime($rows->date_schedule)) ?></td>
                <td><?php echo $rows->hour_start ?></td>
                <td><?php echo $rows->hour_end ?></td>
                <td><?php echo $rows->name_classroom?></td>
                <?php
                  if($this->session->userdata('permission') != 3){
                    ?>
                    <td><?php echo $rows->class_name?></td>
                    <?php
                    $pengawas = $this->mschedule->fetchTeacher($rows->id_schedule);
                    if($pengawas!=FALSE){
                      foreach ($pengawas as $rows) {
                        ?>
                        <td><?php echo $rows->full_name?></td>
                        <?php
                      }
                    }
                    else{
                      ?>
                      <td>No Data</td>
                      <td>No Data</td>
                      <?php
                    }
                  }
                ?>
                <?php
                  if($this->session->userdata('permission') == 1){
                ?>
          <td>
            <a class="btn btn-sm vcd-btn-primary btn-rd" href="<?php echo base_url($this->uri->segment(1).'/edit-schedule/'.$rows->id_schedule)?>" role="button">
              <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
            </a>
            <a class="btn btn-sm vcd-btn-primary btn-rd" href="<?php echo base_url($this->uri->segment(1).'/delete-schedule/'.$rows->id_schedule)?>" role="button">
              <i class="fa fa-trash fa-fw" aria-hidden="true"></i>
            </a>
          </td>
          <?php
            }
          ?>
        </tr>
        <?php
        $i++;
        }

      }
        ?>
      </tbody>
      </tfoot>

      </table>
      <center>
        <?php
            echo $links;
            ?>
      </center>
          </div>
          <!-- /. box -->
        </div>
    </section>
    <!-- /.content -->
  </div>
</div>
  <!-- /.content-wrapper -->
