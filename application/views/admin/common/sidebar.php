<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">HEADER</li>
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
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="fa fa-calendar"></i> <span>Schedule</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-plus"> Add Schedule</i></a></li>
          <li><a href="#"><i class="fa fa-cog"> Manage Schedule</i></a></li>
        </ul>
      </li>
      <li><a href="#"><i class="fa fa-cogs"></i> <span>Setting</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
