<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>STD</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>STRADA</b></span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->

        <!-- /.messages-menu -->

        <!-- Notifications Menu -->

        <!-- Tasks Menu -->

        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <!-- <img src="<?php echo base_url('asset/asset_default/dist/img/user2-160x160.jpg')?>" class="user-image" alt="User Image"> -->
            <i class="fa fa-user fa-2x fa-inverse user-image"></i>
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"><?php echo $this->session->userdata('username');?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->

            <!-- Menu Body -->

            <!-- Menu Footer-->
            <li class="user-footer">
              
              <div class="pull-right">
                <a href="<?php echo base_url('dashboard/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->

      </ul>
    </div>
  </nav>
</header>
