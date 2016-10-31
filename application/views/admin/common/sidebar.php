<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <!-- <img src="<?php echo base_url('asset/asset_default/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image"> -->
        <i class="fa fa-user fa-3x fa-inverse"></i>
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('username');?></p>
        <!-- Status -->
        <p>
          <?php 
            $user = $this->mod->getDataWhere('user','id_user',$this->session->userdata('idUser'));
            echo $user['full_name'];  
          ?>
        </p>
      </div>
    </div>

    <!-- search form (Optional) -->

    <!-- /.search form -->
    <?php
      if($this->session->userdata('permission') == 1){
    ?>
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header"></li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href=""><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-user"></i> <span>User</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url($this->uri->segment(1).'/add-user')?>"><i class="fa fa-plus"> Add User</i></a></li>
          <li><a href="<?php echo base_url($this->uri->segment(1).'/manage-user')?>"><i class="fa fa-cog"> Manage User</i></a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-book"></i> <span>Subject</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url($this->uri->segment(1).'/add-subject')?>"><i class="fa fa-plus"> Add Subject</i></a></li>
          <li><a href="<?php echo base_url($this->uri->segment(1).'/manage-subject')?>"><i class="fa fa-cog"> Manage Subject</i></a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-home"></i> <span>Class</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url($this->uri->segment(1).'/add-class')?>"><i class="fa fa-plus"> Add Class</i></a></li>
          <li><a href="<?php echo base_url($this->uri->segment(1).'/manage-class')?>"><i class="fa fa-cog"> Manage Class</i></a></li>
          <li><a href="<?php echo base_url($this->uri->segment(1).'/add-classroom')?>"><i class="fa fa-plus"> Add Classroom</i></a></li>
          <li><a href="<?php echo base_url($this->uri->segment(1).'/manage-classroom')?>"><i class="fa fa-cog"> Manage Classroom</i></a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-calendar"></i> <span>Schedule</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url($this->uri->segment(1).'/add-schedule')?>"><i class="fa fa-plus"> Add Schedule</i></a></li>
          <li><a href="<?php echo base_url($this->uri->segment(1).'/manage-schedule')?>"><i class="fa fa-cog"> Manage Schedule</i></a></li>
            <li><a href="<?php echo base_url($this->uri->segment(1).'/manage-schedule-grid')?>"><i class="fa fa-cog"> Manage Schedule Grid</i></a></li>
        </ul>
      </li>
      <li><a href="<?php echo base_url($this->uri->segment(1).'/edit-setting')?>"><i class="fa fa-cogs"></i> <span>Setting</span></a></li>
    </ul>
    <?php
      }
      else if($this->session->userdata('permission') == 3 || $this->session->userdata('permission') == 2){
        ?>
        <ul class="sidebar-menu">
          <li class="header">HEADER</li>
          <!-- Optionally, you can add icons to the links -->
          <li class="active"><a href="<?php echo base_url($this->uri->segment(1)) ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-user"></i> <span>Profile</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url($this->uri->segment(1).'/edit-profile')?>"><i class="fa fa-cog"> Edit Profile</i></a></li>
              <li><a href="<?php echo base_url($this->uri->segment(1).'/change-password')?>"><i class="fa fa-key"> Change Password</i></a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-calendar"></i> <span>Schedule</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url($this->uri->segment(1).'/view-schedule')?>"><i class="fa fa-calendar"> View Schedule</i></a></li>
              <li><a href="<?php echo base_url($this->uri->segment(1).'/download-schedule')?>"><i class="fa fa-download"> Download Schedule</i></a></li>
            </ul>
          </li>    
        </ul>
        <?php
      }
    ?>

    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
