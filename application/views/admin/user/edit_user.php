<!DOCTYPE html>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box body">
    <div class="container">
       <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin-top:10px" href="<?php echo base_url($this->uri->segment(1).'/manage-user')?>" role="button">
        <i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i>Back to Manage User
      </a>
      <form class="" method="post">
        <?php echo validation_errors()?>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Username</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <input type="text" class="form-control col-md-7 col-xs-12" name="username" value="<?php echo $result['username']?>">
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Password</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <input type="password" class="form-control col-md-7 col-xs-12" name="password">
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Confirm Password</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <input type="password" name="confirm" class="form-control col-md-7 col-xs-12" >
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Full Name</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <input type="text" class="form-control col-md-7 col-xs-12" name="full_name" value="<?php echo $result['full_name']?>">
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Address</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <textarea class="form-control" rows="3"  name="address"><?php echo $result['address']?></textarea>
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Permission</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <?php
              $options = array(
                  1 => 'Admin',
                  2 => 'Guru',
                  3 => 'Murid'
                );
              echo form_dropdown('permission',$options,$result['permission'],'class="form-control"');
            ?>
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Telephone</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <input type="text" class="form-control col-md-7 col-xs-12" name="telephone"  value="<?php echo $result['telephone']?>">
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-3 text-right">
            <label class="control-label">Email</label>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-9">
            <input type="text" class="form-control col-md-7 col-xs-12" name="email" value="<?php echo $result['email']?>">
            <button class="btn btn-sm vcd-btn-primary btn-rd" style="margin-top:10px" href="#" role="button" type="submit">
              Save
            </button>
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
      </div>
      </form>
      </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
