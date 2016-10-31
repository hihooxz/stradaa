<!DOCTYPE html>
<html lang=en>
<head>
	<title>SMA Strada</title>
	<link href="asset/asset_index/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Vollkorn|Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/asset_default/custom.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/asset_default/default.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/asset_default/asset_index/fa/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/asset_default/bootstrap/js/jquery.min.js')?>">
  	<link rel="stylesheet" href="<?php echo base_url('asset/asset_default/bootstrap/js/bootstrap.min.js')?>">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>
<body class="login" style="background-color:#002B6F;margin-top:50px">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

			<div class="login_wrapper" style="margin-top:0px">
        <div class="animate form login_form">
          <section class="login_content">
            <form  action="" method="POST">
            <img src="<?php echo base_url('asset/asset_default/images/logo.jpg')?>" class="img-responsive" alt="Strada" style="margin-bottom:50px;">
              <div class="clearfix">
                              </div>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" />
              </div>
              <div>
                <button type="submit" class="log-btn btn-submit" style="color:#333" >Log in</button>
                </form>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                  <a href="#signup" class="to_register">  </a>
                </p>


                <br />
                <?php 
                  echo validation_errors();
                ?>
                <div class="loginh1" style="color:#fff">
                  <h1>Strada Santo Thomas Aquino</h1>
                  <p>&copy;2016 All Rights Reserved. Developed By <a href="http://dzillaweb.com">Dzilla Web</a></p>
                </div>
              </div>
          </section>
        </div>


      </div>
    </div>
  </body>
</html>
