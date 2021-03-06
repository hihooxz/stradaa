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
                'username'=>'Username',
                'full_name'=> 'Full Name',
                'email' => 'Email'
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
    <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin:10px 0" href="<?php echo base_url($this->uri->segment(1).'/add-user')?>" role="button">
        <i class="fa fa-plus fa-fw" aria-hidden="true"></i>Add User
      </a>
      <table id="example1" class="table table-responsive table-bordered table-striped">
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Last Login</th>
          <th>Permission</th>
          <th>Address</th>
          <th>Telephone</th>
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
                <td><?php echo substr($rows->address,0,35) ?>..</td>
                <td><?php echo $rows->telephone?></td>
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
