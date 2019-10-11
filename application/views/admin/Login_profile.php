  <!DOCTYPE html>
<html lang="en">
<?php //session_start();?>
<head>
  <title><?php echo $_SESSION['login_data'][0]['emp_fname'].' '.$_SESSION['login_data'][0]['emp_lname'];?></title>
  <?php include_once("includes/htmlFile.php"); ?>
  <script src="<?php echo base_url('asset/jQuery/jquery.min.js')?>" ></script>
  <script  type="text/javascript">
$.noConflict();
 (function($){
$(document).ready(function(){
    $('#closeBtn').click(function(){
      $('#card-header-msg').hide();
    });
  });
})(jQuery);
</script>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <?php require 'header.php'; ?>
  <?php require 'footer.php'; ?>
<div class="content-wrapper">
 <div class="container-fluid">

<div class="col-lg-6 center" >
       <?php echo @$mge; ?>
       </div>
<?php 
foreach($_SESSION['login_data'] as $v):
 ?>
 <div class="col-lg-6 center" >
          <div class="card mb-8" style="border: 1px solid; box-shadow: 5px 5px #888888;">
            <div class="card-header">
              <i class="fa fa-user"></i> &nbsp;&nbsp;&nbsp; <strong>Edit Your Profile</strong><div style="float: right;"><?php
                       echo anchor("myController/home","go back",['class'=>'btn btn-success btn-sm ']);  ?></div></div>
            <div class="list-group list-group-flush large list-group-item list-group-item-action">
                    <table>
                      <tr>
                        <td>Name &nbsp;&nbsp;&nbsp;</td>
                        <td>
                          <strong><?php echo strtoupper($v['emp_fname'].' '.$v['emp_lname']);?></strong>
                        </td>
                      
                    
                      <td>&nbsp;&nbsp;&nbsp;CNIC &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $v['emp_cnic'];?></strong>
                      </td>
                    </tr>
                    
                     <tr>
                      <td>Current Address &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $v['emp_current_add'];?></strong>
                      </td>
                    
                      <td>&nbsp;&nbsp;&nbsp;Email &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $v['emp_email'];?></strong>
                      </td>
                    </tr>
                    <tr>
                      <td>UserName &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <?php echo form_open('myController/updateLoginInfo'); ?>
                        
                        <input type="text" class="form-control" required="true" name='user_name' value="<?php echo $v['user_name'];?>" >
                        <input type="hidden"  name='login_id' value="<?php echo $v['login_id'];?>">
                      </td>
                    
                      <td>&nbsp;&nbsp;&nbsp;Password &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <input type="password" class="form-control"  required="true" name='password' value="<?php echo $v['password'];?>" >
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" align="center">
                        <input type="submit" class="btn btn-sm btn-success" name='save_profile' value="save">
                      </td><?php  echo form_close();?>
                    </tr>
                  </table>
                  </div>
                </div>
            </div>        
    <?php endforeach; ?>
     </div>
  </div>
  <?php include_once("includes/jqueryFile.php"); ?>
</body>
</html>