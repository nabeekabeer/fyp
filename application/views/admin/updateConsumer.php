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
      <div class="card card-register mx-auto mt-9">
         <div class="card-header">
          <h3>Modify Consumer Detail</h3></div>
        <div class="card-body">
          <hr>
         <?php foreach($update as $v):
          echo form_open('myController/updateConsumerDetail2'); ?>
            
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="hidden" name="up_id" value="<?php echo $v['consumer_id'];?>">
                    <label for="exampleInputName"><b>First Name</b></label>
                    <input class="form-control" name="cons_fname" type="text"  value="<?php echo $v['cons_fname'];?>" required='true' >
                    <?php echo "<p style='color:red;'>".form_error("cons_fname"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Last Name</b></label>
                  <input class="form-control" name="cons_lname" type="text" value="<?php echo $v['cons_lname'];?>" required='true'>
                  <?php echo "<p style='color:red;'>".form_error("cons_lname"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputName"><b>Father/Husband Name</b></label>
                  <input class="form-control" name="cons_fathername" type="text" value="<?php echo $v['cons_father_name'];?>" required='true'>
                  <?php echo "<p style='color:red;'>".form_error("cons_fathername"," ")."</p>";?>
                </div>
                 <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Gender</b></label>
                  <div class="form-control">
                  <input  type="radio" required='true' name="cons_gender" <?php if($v['cons_gender']=='male'){ echo 'checked';};?> value="male" >&nbsp; Male  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  type="radio" name="cons_gender" required='true' value="female" <?php if($v['cons_gender']=='female'){echo 'checked';};?> > &nbsp;Female</div>
                  <?php echo "<p style='color:red;'>".form_error("cons_gender"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Date of Birth</b></label>
                  <input class="form-control" required='true' name="cons_dob"  type="date"  title="select D.O.B" value="<?php echo $v['cons_dob'];?>">
                  <?php echo "<p style='color:red;'>".form_error("cons_dob"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>CNIC</b></label>
                  <input class="form-control" required='true' name="cons_cnic1" type="text"  value="<?php echo $v['cons_cnic'];?>">
                  <?php echo "<p style='color:red;'>".form_error("cons_cnic1"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputName"><b>Phone</b></label>
                  <input class="form-control" required='true' name="cons_phone" type="text" value="<?php echo $v['cons_phone_number'];?>">
                  <?php echo "<p style='color:red;'>".form_error("cons_phone"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Cell Number</b></label>
                  <input class="form-control" required='true' name="cons_cellnumber" type="text" value="<?php echo $v['cons_cell_number'];?>">
                  <?php echo "<p style='color:red;'>".form_error("cons_cellnumber"," ")."</p>";?>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleInputName"><b>Permanent Address</b></label>
                  <textarea class="form-control" required='true' name="cons_permanent_address" ><?php echo $v['cons_permanent_address'];?></textarea>
                  <?php echo "<p style='color:red;'>".form_error("cons_permanent_address"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label for="exampleInputLastName"><b>Current Address</b></label>
                  <textarea class="form-control" required='true' name="cons_current_address" ><?php echo $v['cons_current_address'];?></textarea>
                  <?php echo "<p style='color:red;'>".form_error("cons_current_address"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                <label for=""><b>Email address</b> (Optional)</label>
                <input class="form-control" name="cons_email" type="text" value="<?php echo $v['cons_email'];?>">
              </div>
              </div>
            </div>
            <hr>
            <div class="modal-footer">
             <?php
                echo form_submit(['name'=>'updateConsumer', 'value'=>'save','class'=>'btn btn-primary btn-block col-md-2','data-target'=>'#cirm_connection','data-toggle'=>'modal']); ?>
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