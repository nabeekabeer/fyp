<!DOCTYPE html>
<html lang="en">
<?php //session_start();?>
<head>
  <title>edit Consumer</title>
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
   <div class="container">
      <div class="card card-register mx-auto mt-9" style="border: 1px solid; ">
         <div class="card-header">
          <h3>Edit Employee Detail</h3></div>
        <div class="card-body">
          <hr>
         <?php foreach($updateEmp as $v):
          echo form_open('myController/updateEmployeeDetail'); ?>
            
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="hidden" name="emp_id" value="<?php echo $v['emp_id'];?>">
                    <label for="exampleInputName"><b>First Name</b></label>
                    <input class="form-control" name="cons_fname" type="text"  value="<?php echo $v['emp_fname'];?>" required="true"  >
                    <?php echo "<p style='color:red;'>".form_error("cons_fname"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Last Name</b></label>
                  <input class="form-control" name="cons_lname" type="text" value="<?php echo $v['emp_lname'];?>" required="true">
                  <?php echo "<p style='color:red;'>".form_error("cons_lname"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputName"><b>Father/Husband Name</b></label>
                  <input class="form-control" name="cons_fathername" type="text" value="<?php echo $v['emp_father_name'];?>" required="true">
                  <?php echo "<p style='color:red;'>".form_error("cons_fathername"," ")."</p>";?>
                </div>
                 <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Gender</b></label>
                  <div class="form-control">
                  <input  type="radio" required="true" name="cons_gender" <?php if($v['emp_gender']=='male'){ echo 'checked';};?> value="male" >&nbsp; Male  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  type="radio" required="true" name="cons_gender" value="female" <?php if($v['emp_gender']=='female'){echo 'checked';};?> > &nbsp;Female</div>
                  <?php echo "<p style='color:red;'>".form_error("cons_gender"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Date of Birth</b></label>
                  <input class="form-control" required="true" name="cons_dob"  type="date"  title="select D.O.B" value="<?php echo $v['emp_dob'];?>">
                  <?php echo "<p style='color:red;'>".form_error("cons_dob"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>CNIC</b></label>
                  <input class="form-control" required="true" name="cons_cnic" type="text"  value="<?php echo $v['emp_cnic'];?>">
                  <?php echo "<p style='color:red;'>".form_error("cons_cnic1"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputName"><b>Phone</b></label>
                  <input class="form-control" required="true" name="cons_phone" type="text" value="<?php echo $v['emp_phone_no'];?>">
                  <?php echo "<p style='color:red;'>".form_error("cons_phone"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Cell Number</b></label>
                  <input class="form-control" required="true" name="cons_cellnumber" type="text" value="<?php echo $v['emp_cell_no'];?>">
                  <?php echo "<p style='color:red;'>".form_error("cons_cellnumber"," ")."</p>";?>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputName"><b>Permanent Address</b></label>
                  <textarea class="form-control" required="true" name="cons_permanent_address" ><?php echo $v['emp_permanent_add'];?></textarea>
                  <?php echo "<p style='color:red;'>".form_error("cons_permanent_address"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Current Address</b></label>
                  <textarea class="form-control" required="true" name="cons_current_address" ><?php echo $v['emp_current_add'];?></textarea>
                  <?php echo "<p style='color:red;'>".form_error("cons_current_address"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for=""><b>Joining Date</b></label>
                  <input class="form-control" required="true" name="Joining_date" value="<?php echo $v['emp_joining_date'];?>" type="date" required="true">
                  <?php echo "<p style='color:red;'>".form_error("Joining_date"," ")."</p>";?>
              </div>
              <div class="col-md-6">
                <label for=""><b>Employee Number</b></label>
                <input class="form-control" required="true" value="<?php echo $v['emp_number'];?>" name="empNo" type="text" required="true">
                <?php echo "<p style='color:red;'>".form_error("emp_no"," ")."</p>";?>
              </div>
             </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                <label for=""><b>Email address</b> (Optional)</label>
                <input class="form-control" name="cons_email" type="text" value="<?php echo $v['emp_email'];?>">
              </div>
              <div class="col-md-6">
                <label for=""><b>Employee Type</b></label>
                <select class="form-control"  name="emp_type" required="true" aria-describedby="nameHelp">
                    <option value="">--select one--</option> 
                  <?php  $i=1; if(isset($emp_type)): foreach ($emp_type as $value):?>
                  <option value="<?php echo $value['emp_type_id'];?>" <?php if($value['emp_type_id']==$v['emp_emp_type_id']): 
                  echo 'selected'; endif;?>>
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
                echo form_submit(['name'=>'updateEmp', 'value'=>'save','class'=>'btn btn-primary btn-block col-md-2','data-target'=>'#cirm_connection','data-toggle'=>'modal']); ?>
            </div>
           <?php  echo form_close(); endforeach;?>
           <hr>

          </div>
        </div>
      </div>

    </div>
  </div>
  <?php include_once("includes/jqueryFile.php"); ?>
</body></html>
              <!-- 