<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Schedule
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Edit Schedule</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
  <div class="box body">
  <div class="container">
      <a class="btn btn-sm vcd-btn-primary btn-rd" style="margin-top:10px" href="<?php echo base_url($this->uri->segment(1).'/manage-schedule')?>" role="button">
        <i class="fa fa-arrow-left fa-fw" aria-hidden="true"></i>Back to Manage Schedule
      </a>
    <form class="" method="post">
        <?php echo validation_errors()?>
    <div class="form-group">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3 text-right">
          <label class="control-label">Schedule Name</label>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-9">
          <input type="text" class="form-control col-md-7 col-xs-12"name="name_schedule" value="<?php echo $result['name_schedule']?>">
        </div>
        <div class="col-md-3 col-sm-3 hidden-xs"></div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3 text-right">
          <label class="control-label">Class</label>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-9">
          <?php

            $options = array();
            if($class!=FALSE){
              foreach ($class as $rows) {

                  $options[$rows->id_class] = $rows->class_name;
              }
              echo form_dropdown('class',$options,$result['id_class'],"class='form-control'");
            }


           ?>
        </div>
        <div class="col-md-3 col-sm-3 hidden-xs"></div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3 text-right">
          <label class="control-label">Subject</label>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-9">
          <?php

            $options = array();
            if($subject!=FALSE){

              foreach ($subject as $rows) {

                  $options[$rows->id_subject] = $rows->subject;
              }
              echo form_dropdown('subject',$options,$result['id_subject'],"class='form-control'");
            }


           ?>
        </div>
        <div class="col-md-3 col-sm-3 hidden-xs"></div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3 text-right">
          <label class="control-label">Class Room</label>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-9">
          <?php

            $options = array();
            if($classroom!=FALSE){

              foreach ($classroom as $rows) {

                  $options[$rows->id_classroom] = $rows->name_classroom;
              }
              echo form_dropdown('classroom',$options,$result['id_classroom'],"class='form-control'");
            }


           ?>
        </div>
        <div class="col-md-3 col-sm-3 hidden-xs"></div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3 text-right">
          <label class="control-label">Exam Date</label>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-9">
           <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="datepicker"name="date_schedule" value="<?php echo date('d M Y',strtotime($result['date_schedule']))?>">
            </div>
        </div>
        <div class="col-md-3 col-sm-3 hidden-xs"></div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3 text-right">
          <label class="control-label">Hour Start</label>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-9">
          <div class="bootstrap-timepicker">
              <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" class="form-control timepicker" name="hour_start" value="<?php echo $result['hour_start']?>">
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 hidden-xs"></div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3 text-right">
          <label class="control-label">Hour End</label>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-9">
          <div class="bootstrap-timepicker">
              <div class="form-group">
                <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" class="form-control timepicker2" name="hour_end" value="<?php echo $result['hour_end']?>">
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 hidden-xs"></div>
      </div>
    </div>
    <?php
      if($results!=FALSE){
        foreach ($results as $rows) {
          $pengawas[$rows->role] = $rows->username;
        }
      }
    ?>
    <div class="form-group">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3 text-right">
          <label class="control-label">Pengawas 1</label>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-9">
          <input type="text" name="pengawas1" class="form-control col-md-7 col-xs-12" value="<?php if(isset($pengawas[1])) echo $pengawas[1]?>" id="pengawas1">
        </div>
        <div class="col-md-3 col-sm-3 hidden-xs"></div>
      </div>
    </div>
    <div class="form-group">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-3 text-right">
          <label class="control-label">Pengawas 2</label>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-9">
          <input type="text" name="pengawas2" class="form-control col-md-7 col-xs-12" value="<?php if(isset($pengawas[2])) echo $pengawas[2]?>" id="pengawas2">
          <button class="btn btn-sm vcd-btn-primary btn-rd" style="margin-top:10px" href="#" role="button">
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
<!-- /.content-wrapper -->
