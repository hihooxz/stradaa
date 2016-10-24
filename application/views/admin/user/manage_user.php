<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  </head>
<body class="hold-transition skin-blue sidebar-mini">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data User</h3>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-3 pull-right">
      <div class="input-group margin-bottom-sm form-group">
        <span class="input-group-addon"><i class="fa fa-search fa-fw" aria-hidden="true"></i></span>
        <input class="form-control" type="text" placeholder="search">
      </div>
    </div>
     <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-responsive table-bordered table-striped">
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Last Login</th>
          <th>Permission</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if($results!=FALSE){
            foreach ($results as $rows) {
              ?>
              <tr>
                <td><?php echo $rows->full_name ?></td>
                <td><?php echo $rows->username ?></td>
                <td><?php echo $rows->email ?></td>
                <td><?php echo date('D, d M Y H:i',strtotime($rows->last_login)) ?></td>
                <td><?php if($rows->permission==1) echo "Admin"; elseif($rows->permission==2) echo "Guru"; elseif($rows->permission==3) echo "Murid";?></td>
                <td>
            <a class="btn btn-sm vcd-btn-primary btn-rd" href="<?php echo base_url($this->uri->segment(1).'/edit-user/'.$rows->id_user)?>" role="button">
              <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
            </a>
            <a class="btn btn-sm vcd-btn-primary btn-rd" href="<?php echo base_url($this->uri->segment(1).'/delete-user/'.$rows->id_user)?>" role="button">
              <i class="fa fa-trash fa-fw" aria-hidden="true"></i>
            </a>
          </td>
        </tr>
        <?php
        }
      }
        ?>
          <?php
            echo $links;
            ?>
    </tbody>
      <tfoot>
        <tr>
          <th>Full Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Last Login</th>
          <th>Permission</th>
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

  <!-- Main Footer -->

</body>
</html>