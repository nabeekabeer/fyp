<!DOCTYPE html>
<html lang="en">

<head>
  <title>new registration</title>
  <?php include_once("includes/htmlFile.php"); ?>
  <?php //include_once("./home.php");?>
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <a class="d-block link" href="index">
            <b><img src="<?php echo base_url('asset/images/back-button.jpg');?>" height="50" width="50">Back to Home</b>
          </a>
      <div class="card-header"><h3>Register an Account</h3> <?php echo @$mge; ?></div>
      
      <div class="card-body">
          <?php  echo form_open("adminController/AddRegistration"); ?>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label><b>Employee first name</b></label>
                <?php 
                  echo form_input(['type'=>'text', 'name'=>'first_name','placeholder'=>'Enter First Name','class'=>'form-control','title'=>'first name','required'=>'true']);
                  echo "<p style='color:red;'>".form_error("first_name"," ")."</p>"; ?>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName"><b>Employee last name</b></label>
                <?php 
                  echo form_input(['type'=>'text', 'name'=>'last_name','placeholder'=>'Enter Last Name','class'=>'form-control', 'required'=>'true','title'=>'last name']);
                  echo "<p style='color:red;'>".form_error("last_name"," ")."</p>"; ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1"><b>Employee Type</b></label>
                <select  name='emp_type' required='true' class='form-control' title='select employee type'>
                  <option value="">---select one---</option>
                  <?php if (isset($emp_type_detail)) {
                    foreach ($emp_type_detail as $value) {
                      ?>
                        <option value="<?php echo $value['emp_type_id']; ?>"><?php echo $value['emp_type_name']; ?></option>
                      <?php
                    }
                  } ?>
                </select>
                <?php 
                  echo "<p style='color:red;'>".form_error("password"," ")."</p>"; ?>
              </div>
              <div class="col-md-6">
                <label ><b>Employee Number</b></label>
                <?php 
                echo form_input(['type'=>'text', 'name'=>'emp_number','placeholder'=>'Enter Employee Number','required'=>'true','class'=>'form-control','title'=>'Employee Number']);
                echo "<p style='color:red;'>".form_error("emp_number"," ")."</p>"; ?>
              </div>
          </div>
        </div>
          <div class="form-group">
            <label for="exampleInputEmail1"><b>User Name</b></label>
            <?php 
            echo form_input(['type'=>'text', 'name'=>'user_name','placeholder'=>'Enter User Name','class'=>'form-control','required'=>'true','title'=>'user name']);
            echo "<p style='color:red;'>".form_error("user_name"," ")."</p>"; ?>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1"><b>Password</b></label>
                <?php 
                  echo form_input(['type'=>'Password', 'name'=>'password','placeholder'=>'Enter Password','required'=>'true','class'=>'form-control','title'=>'Password']);
                  echo "<p style='color:red;'>".form_error("password"," ")."</p>"; ?>
              </div>
              <div class="col-md-6">
                <label><b>Confirm password</b></label>
                <?php 
                  echo form_input(['type'=>'password', 'name'=>'re_password','placeholder'=>'Re-enter Your Password','required'=>'true','class'=>'form-control','title'=>'confirm password']);
                  echo "<p style='color:red;'>".form_error("re_password"," ")."</p>"; ?>
              </div>
            </div>
          </div>
        <?php echo form_submit(['name'=>'registration', 'value'=>'register','class'=>'btn btn-primary btn-block','data-targe'=>'#confirm_registration']);
        echo form_close(); ?>
        <div class="text-center">
          <a class="d-block small mt-3" href="login"><b>Login Page</b></a>
          <a class="d-block small" href="forgot_password"><b>Forgot Password?</b></a>
        </div>
      </div>
    </div>
  </div>

  <!--Pop up-->
    <div class="modal fade" id="confirm_registration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Alert!</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Your account has been created successfully.</div>
          <div class="modal-footer">
            <!--button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button-->
            <a class="btn btn-primary" href="index">OK</a>
          </div>
        </div>
      </div>
    </div>
<?php include_once("includes/jqueryFile.php"); ?>
</body>
</html>