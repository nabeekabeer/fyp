<!DOCTYPE html>
<html lang="en">
<head>
  <title>login</title>
<?php include_once("includes/htmlFile.php") ?>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header" >
          <a class="d-block link" href="index">
            <b><img src="<?php echo base_url('asset/images/back-button.jpg');?>" height="50" width="50">Back to Home</b>
          </a>
        <h3>Login</h3></div>
      <div class="card-body">
        <?= @$msg;?>
        <?= form_open('adminController/home_admin') ?>
          <div class="form-group">
            <label ><b>User Name</b></label>
            <?php 
            echo form_input(['type'=>'text', 'name'=>'user_name','placeholder'=>'Enter User Name','class'=>'form-control','title'=>'user name']); ?>
            <?php echo "<p style='color:red;'>".form_error("user_name"," ")."</p>";?>
          </div>
          <div class="form-group">
            <label ><b>Password</b></label>
            <?php 
            echo form_input(['type'=>'password', 'name'=>'password','placeholder'=>'Enter Password','class'=>'form-control','title'=>'password']); ?>
            <?php echo "<p style='color:red;'>".form_error("password"," ")."</p>";?>
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
           <button class="btn btn-primary btn-block" type="submit">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="newRegistration"><b>Register an Account</b></a>
          <a class="d-block small" href="forgot_password"><b>Forgot Password?</b></a>
        </div>
      </div>
    </div>
  </div>
 <?php include_once("includes/jqueryFile.php") ?> 
</body>

</html>
