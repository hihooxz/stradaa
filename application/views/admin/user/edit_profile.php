<div class="content-wrapper">
<!-- Main content -->
    <section class="content">
      <h2>Edit Profile</h2>
      <div class="box">
        <div class="box-body">

        <div class="container">
          <?php
            if(!$this->form_validation->run() && isset($_POST['full_name'])){
              ?>
              <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning!!</strong> <br />
                <?php
                  echo validation_errors();
                ?>
              </div>
              <?php
            }
            if($this->session->flashdata('success') == TRUE){
              ?>
              <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!!</strong> You have Successfully changed your profile.
              </div>
              <?php
            }
          ?>
          <form class="fr" method="POST" action="">
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
                <label class="control-label">Gender</label>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-9">
                <label><input type="radio" name="gender" value="1" <?php if($result['gender'] == 1) echo "checked"?>> Male</label>
                <label><input type="radio" name="gender" value="2" <?php if($result['gender'] == 2) echo "checked"?>> Female</label>
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
                <label class="control-label">Birthday</label>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-9">
                <input type="text" class="form-control col-md-7 col-xs-12" name="birthday" id="datepicker" value="<?php if($result['birthday'] != "0000-00-00") echo date('d M Y',strtotime($result['birthday']))?>">
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
                <label class="control-label">Email</label>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-9">
                <input type="text" class="form-control col-md-7 col-xs-12" name="email" value="<?php echo $result['email']?>">
                <button class="btn btn-sm vcd-btn-primary btn-rd" style="margin-top:10px" role="button">
                  Save
                </button>
              </div>
              <div class="col-md-3 col-sm-3 hidden-xs"></div>
            </div>
          </div>
          </form>
          </div>

        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>