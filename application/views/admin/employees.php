<!DOCTYPE html>
<html lang="en">
<?php //session_start();?>
<head>
  <title>Add New Employee</title>
  <script src="<?php echo base_url('asset/jQuery/jquery.min.js')?>" ></script>


  <script  type="text/javascript">
$.noConflict();
 (function($){
$(document).ready(function(){
    //$('tr:even').css('background','#CCCCCC');
    //$('tr:odd').css('background','#aaaaaa');
    $('#closeBtn').click(function(){
      $('#card-header-msg').hide();
    });

    $('#createNum').click(function(){
     var sea=$('#areaselect').val();
     if (sea=="") {
        $('#areaselect').focus();
        $('#areaselect').css('border-color','red');
     }else{
        $("#test3").val(sea+"<?php echo uniqid();?>");
      }

    });
    
});
})(jQuery);
</script>
  <?php include_once("includes/htmlFile.php"); ?>
  <?php //include_once("./home.php");?>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <?php require 'header.php'; ?>
  <?php require 'footer.php'; ?>
<div class="content-wrapper">
 <div class="container-fluid">
  <?php  echo @$mge; ?>
   <div class="container">

      <div class="card card-register mx-auto mt-9" style="border: 1px solid; ">
         <div class="card-header">
          <h3>Add New Employee</h3></div>
        <div class="card-body">
          <hr>
         <?php 
          echo form_open('myController/addemployee'); ?>
            
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="hidden" name="up_id" >
                    <label for="exampleInputName"><b>First Name</b></label>
                    <input class="form-control" name="cons_fname" type="text" required="true" >
                    <?php echo "<p style='color:red;'>".form_error("cons_fname"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Last Name</b></label>
                  <input class="form-control" name="cons_lname" type="text" required="true">
                  <?php echo "<p style='color:red;'>".form_error("cons_lname"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputName"><b>Father/Husband Name</b></label>
                  <input class="form-control" name="cons_fathername" type="text" required="true" >
                  <?php echo "<p style='color:red;'>".form_error("cons_fathername"," ")."</p>";?>
                </div>
                 <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Gender</b></label>
                  <div class="form-control">
                  <input  type="radio" name="cons_gender" value="male" required="true" >&nbsp; Male  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  type="radio" name="cons_gender" value="female"> &nbsp;Female</div>
                  <?php echo "<p style='color:red;'>".form_error("cons_gender"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Date of Birth</b></label>
                  <input class="form-control" name="cons_dob"  type="date"  title="D.O.B" required="true" >
                  <?php echo "<p style='color:red;'>".form_error("cons_dob"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>CNIC</b></label>
                  <input class="form-control" name="cons_cnic1" type="text"  required="true" >
                  <?php echo "<p style='color:red;'>".form_error("cons_cnic1"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputName"><b>Phone</b></label>
                  <input class="form-control" name="cons_phone" type="text" required="true" >
                  <?php echo "<p style='color:red;'>".form_error("cons_phone"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Cell Number</b></label>
                  <input class="form-control" name="cons_cellnumber" type="text" required="true" >
                  <?php echo "<p style='color:red;'>".form_error("cons_cellnumber"," ")."</p>";?>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputName"><b>Permanent Address</b></label>
                  <textarea class="form-control" name="cons_permanent_address" required="true" ></textarea>
                  <?php echo "<p style='color:red;'>".form_error("cons_permanent_address"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Current Address</b></label>
                  <textarea class="form-control" name="cons_current_address" required="true" >
                  </textarea>
                  <?php echo "<p style='color:red;'>".form_error("cons_current_address"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                 <div class="col-md-6">
                <label for=""><b>Employee Number</b></label>
                <input class="form-control" name="emp_no" type="text" required="true">
                <?php echo "<p style='color:red;'>".form_error("emp_no"," ")."</p>";?>
              </div>
                <div class="col-md-6">
                <label for=""><b>Email address</b> (Optional)</label>
                <input class="form-control" name="cons_email" type="email">
              </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                 <div class="col-md-6">
                <label for=""><b>Joining Date</b></label>
                <input class="form-control" name="Joining_date" type="date" required="true">
                <?php echo "<p style='color:red;'>".form_error("Joining_date"," ")."</p>";?>
              </div>
                <div class="col-md-6">
                <label for=""><b>Employee Type</b></label>
                <select class="form-control"  name="emp_type" required="true" aria-describedby="nameHelp">
                    <option value="">--select one--</option> 
                  <?php  $i=1; if(isset($emp_type)): foreach ($emp_type as $value):?>
                  <option value="<?php echo $value['emp_type_id'];?>">
                    <?php echo $value['emp_type_name'];?>
                  </option>
                <?php endforeach; endif;?>
                  </select>
                  <?php echo "<p style='color:red;'>".form_error("cons_area"," ")."</p>";?>
              </div>
              </div>
            </div>
            <hr>
            <div class="modal-footer">
             <?php
                echo form_input(['name'=>'addEmp', 'value'=>'save','class'=>'btn btn-primary btn-block col-md-2','data-target'=>'#cirm_connection','data-toggle'=>'modal', 'type'=>'submit']); ?>
            </div>
           <?php  echo form_close(); ?>
           <hr>

          </div>
        </div>
      </div>

    </div>
  </div>
  <?php include_once("includes/jqueryFile.php"); ?>
</body></html>
              <!-- 