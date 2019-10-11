<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<?php //include_once('logInFormCssPjs.php');?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--=============================================================================================== rel="icon" type="image/png"-->	
<?php // echo base_url("asset/loginForm/login_v3/images/icons/favicon.ico")?>
<?php echo anchor("myController/index","<img src='http://[::1]/my_fyp/asset/loginForm/login_v3/images/icons/favicon.ico' height='40' width='50'> &nbsp; &nbsp;<b> Electricity Billing Management System</b>",['rel'=>"icon", 'type'=>'image/png']); ?>
<!--===============================================================================================-->
 <?= link_tag("asset/loginForm/login_v3/vendor/bootstrap/css/bootstrap.min.css")?>
<!--===============================================================================================-->
<?= link_tag("asset/loginForm/login_v3/fonts/font-awesome-4.7.0/css/font-awesome.min.css")?>
<!--===============================================================================================-->
 <?= link_tag("asset/loginForm/login_v3/fonts/iconic/css/material-design-iconic-font.min.css")?>
<!--===============================================================================================-->
<?= link_tag("asset/loginForm/login_v3/vendor/animate/animate.css")?>
<!--===============================================================================================-->	
<?= link_tag("asset/loginForm/login_v3/vendor/css-hamburgers/hamburgers.min.css")?>
<!--===============================================================================================-->
<?= link_tag("asset/loginForm/login_v3/vendor/animsition/css/animsition.min.css")?>
<!--===============================================================================================-->
<?= link_tag("asset/loginForm/login_v3/vendor/select2/select2.min.css")?>
<!--===============================================================================================-->	
<?= link_tag("asset/loginForm/login_v3/vendor/daterangepicker/daterangepicker.css")?>
<!--===============================================================================================-->
<?= link_tag("asset/loginForm/login_v3/css/util.css")?>
<?= link_tag("asset/loginForm/login_v3/css/main.css")?>
<!--===============================================================================================-->


 

</head>
<body>

	<?php include_once('includes/hpheader.php');?><hr>
	<!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Electricity Billing Management System</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#logIN">LOG IN or SIGN UP</a>
            </li>
          </ul>
        </div>
      </div>
    </nav> -->
    <div>
	<div class="limiter">
		<div class="container-login100" style='background-image: url("<?php echo base_url('asset/loginForm/login_v3/images/the-river-wallpaper-for-1920x1200-71-736.jpg')?>");'>
			<div class="wrap-login100">
				<!-- <form class="login100-form validate-form"> -->
				<?php echo form_open('myController/home_index',['class'=>'login100-form validate-form']); ?>
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<?php if(isset($msg)):?>
					<span class="p-b-34 p-t-27" style="color: red;">
						<?php echo  @$msg;?>
					</span>
				   <?php endif; ?>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						 <input class="input100" type="text" name="username" placeholder="Username">
						
					<?php //echo form_input(['type'=>'text','name'=>'username','placeholder'=>'User Name',"value"=>"",'class'=>'input100','title'=>'User Name']);
                //echo "<p style='color:red;'>".form_error("username"," ")."</p>"; ?>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<!-- <button class="login100-form-btn">
							Login
						</button> -->
					<?php
                       echo form_submit(['name'=>'add_meter_type', 'value'=>'Login','class'=>'login100-form-btn']);
                       ?>
                       <?php  echo form_close();?>
					</div>
					<div class="text-center p-t-90">
						|<?php echo anchor("myController/#","<b> Register an Account</b>",['class'=>'txt1']);?>|
						<!-- <a class="txt1"  >
							Forgot Password?
						</a> -->
						&nbsp; &nbsp;|<?php echo anchor("myController/#","<b> Forgot Password?</b>",['class'=>'txt1']);?>|
					</div><!-- </form> -->
			</div>

 		 	<?php if(isset($v)):?>
			<div class="wrap-login100">
				<!-- <form class="login100-form validate-form"> -->
				<?php echo form_open('myController/home_index',['class'=>'login100-form validate-form']); ?>
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<?php if(isset($msg)):?>
					<span class="p-b-34 p-t-27" style="color: red;">
						<?php echo  @$msg;?>
					</span>
				   <?php endif; ?>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						 <input class="input100" type="text" name="username" placeholder="Username">
						
					<?php //echo form_input(['type'=>'text','name'=>'username','placeholder'=>'User Name',"value"=>"",'class'=>'input100','title'=>'User Name']);
                //echo "<p style='color:red;'>".form_error("username"," ")."</p>"; ?>
                <span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<!-- <button class="login100-form-btn">
							Login
						</button> -->
						<?php
                      echo form_submit(['name'=>'add_meter_type', 'value'=>'Login','class'=>'login100-form-btn']);
                       ?>
                       <?php  echo form_close();?>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" >
							Forgot Password?
						</a>
					</div><!-- </form> -->
			</div><?php endif;?>
		</div>
	</div>
	
</div>
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/loginForm/login_v3/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/loginForm/login_v3/vendor/animsition/js/animsition.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/loginForm/login_v3/vendor/bootstrap/js/popper.js')?>"></script>
	<script src="<?php echo base_url('asset/loginForm/login_v3/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/loginForm/login_v3/vendor/select2/select2.min.js"')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/loginForm/login_v3/vendor/daterangepicker/moment.min.js')?>"></script>
	<script src="<?php echo base_url('asset/loginForm/login_v3/vendor/daterangepicker/daterangepicker.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/loginForm/login_v3/vendor/countdowntime/countdowntime.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/loginForm/login_v3/js/main.js')?>"></script>
<!-- 1.............................. -->
<?php include_once('includes/hpfooter.php');?>

<!-- Bootstrap core JavaScript -->
    
</body>
</html>