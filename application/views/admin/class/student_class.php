<div class="wrapper">

  <!-- Main Header -->



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Student Class
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
    <div class="col-md-3 col-sm-3 col-xs-3 pull-right">
      <div class="input-group margin-bottom-sm form-group">
        <span class="input-group-addon"><i class="fa fa-search fa-fw" aria-hidden="true"></i></span>
        <input class="form-control" type="text" placeholder="search">
      </div>
    </div>
     <!-- /.box-header -->
    <div class="box-body">
      <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin-bottom:10px" href="<?php echo base_url($this->uri->segment(1).'/manage-class')?>" role="button">
        <i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i> Back to Manage Class
      </a>
      <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin-bottom:10px" href="<?php echo base_url($this->uri->segment(1).'/add-student/'.$this->uri->segment(3))?>" role="button">
        <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Add Student
      </a>
      <table id="example1" class="table table-responsive table-bordered table-striped">
      <thead>
        <tr>
          <th>Class Name</th>
          <th>Status Class</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $result['class_name']?></td>  
          <td>
            <?php
              if($result['status_class'] == 0){
                echo "Active";
              }
              else if($result['status_class'] == 1){
                echo "Non Active";
              }
            ?>
          </td>
        </tr>
      </tbody>
      </table>

      <h3>Student</h3>
      <div class="table-responsive" style="margin-top:20px">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Username / NIS</th>
              <th>Student Name</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              if($results!=FALSE){
                $i = 1;
                foreach ($results as $rows) {
                  ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $rows->username;?></td>
                    <td><?php echo $rows->full_name;?></td>
                    <td>
                      <a title="Delete" class="btn btn-sm vcd-btn-primary btn-rd" href="<?php echo base_url($this->uri->segment(1).'/delete-student/'.$rows->id_student)?>" role="button">
                        <i class="fa fa-trash fa-fw" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>
                  <?php
                  $i++;
                }
              }
              else{
                ?>
                <tr>
                  <td colspan="3">Data Not Found</td>
                </tr>
                <?php
              }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Student Name</th>
              <th>Action</th>
            </tr>
          </tfoot>
          </table>
        </div>
    </div>
  </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->