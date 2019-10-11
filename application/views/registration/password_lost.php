<!DOCTYPE html>
<html lang="en">

<head>
  <title>forgot password</title>
  <?php include_once("includes/htmlFile.php"); ?>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <a class="d-block link" href="index">
            <b><img src="<?php echo base_url('asset/images/back-button.jpg');?>" height="50" width="50">Back to Home</b>
          </a>
      <div class="card-header"><h2>Reset Password</h2></div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h3 class="card-login">Forgot your password?</h3>
          <p>&nbsp; &nbsp; Enter your email address and we will send you a key which is related to your password.</p>
        </div>
       <?php echo form_open("myController/login"); ?>
          <div class="form-group">
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" required="true" title="Enter Email Address" placeholder="Enter email address">
          </div>         
          <?php echo form_input(['type'=>'submit', 'name'=>'forgot_pass', "title"=>"Forgot",'class'=>'btn btn-primary btn-block', 'value'=>"Reset Password" ]);?>
          <?php  echo form_close();?>
        <div class="text-center">
          <a class="d-block small mt-3" href="newRegistration"><b>Register an Account</b></a>
          <a class="d-block small" href="login"><b>Login Page</b></a>
        </div>
      </div>
    </div>
  </div>
  <?php include_once("includes/jqueryFile.php"); ?>
</body>
</html>