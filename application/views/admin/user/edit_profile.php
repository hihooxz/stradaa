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