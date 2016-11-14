<div class="wrapper">

  <!-- Main Header -->



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Class
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Class</li>
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
                'class_name'=>'Class Name',
                'status_class'=> 'Status'
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
      <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin-bottom:10px" href="<?php echo base_url($this->uri->segment(1).'/add-class')?>" role="button">
        <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Add Class
      </a>
      <table id="example1" class="table table-responsive table-bordered table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>Class Name</th>
          <th>Status Class</th>
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
                <td><?php echo $rows->class_name ?></td>
                <td><?php if($rows->status_class == 0) echo "Active"; else echo "Non Active"; ?></td>
          <td>
            <a title="Edit" class="btn btn-sm vcd-btn-primary btn-rd" href="<?php echo base_url($this->uri->segment(1).'/edit-class/'.$rows->id_class)?>" role="button">
              <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
            </a>
            <a title="Student Class" class="btn btn-sm vcd-btn-primary btn-rd" href="<?php echo base_url($this->uri->segment(1).'/student-class/'.$rows->id_class)?>">
              <i class="fa fa-users fa-fw" aria-hidden="true"></i>
            </a>
            <a title="Delete" class="btn btn-sm vcd-btn-primary btn-rd" href="<?php echo base_url($this->uri->segment(1).'/delete-class/'.$rows->id_class)?>" role="button">
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
          <th>Class Name</th>
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
