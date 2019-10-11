<!DOCTYPE html>
<html lang="en">
<?php //session_start();?>
<head>
  <title>Bill Collection</title>
  <script src="<?php echo base_url('asset/jQuery/jquery.min.js')?>" ></script>

<script  type="text/javascript">
$.noConflict();
 (function($){
$(document).ready(function(){
  $('#closeBtn').click(function(){
  $('#card-header-msg').hide();
});
//$('#reading_div').hide();
$('#search_btn').click(function(){
  $('span.error-keyup-1').hide();
  $('span.error-keyup-2').hide();
  $('span.error-keyup-3').hide();
   var cn=$('#search_cnum').val();
   if(cn=="")
   {
    $('#search_cnum').focus();
    $('#search_cnum').css('border-color','red');
    $('#spanbtn').after('<span class="error error-keyup-3" style="color:red;">&nbsp; This field must be filled...!</span>');
    return false;
   }else if(cn.length<11)
   {
    $('#search_cnum').focus();
    $('#search_cnum').css('border-color','red');
    $('#spanbtn').after('<span class="error error-keyup-2" style="color:red;">&nbsp; &nbsp;Invalid Consumer Number or length is less than 11.</span>');
    return false;
   }else if(cn.length>11){
    $('#search_cnum').focus();
    $('#search_cnum').css('border-color','red');
    $('#spanbtn').after('<span class="error error-keyup-2" style="color:red;">&nbsp; &nbsp;Invalid Consumer Number or Length is greater than 11</span>');
    return false;
   }
   else{
    $('#search_cnic').css('border-color','green');
    return true;
   }
    });  });
 
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
   <div class="col-lg-7" style="float:left;">
<div class="card mb-3 mt-4" >
       <?php echo @$mge; ?>
       </div>
 </div>
<?php //if(isset($n)): ?>

  <div class="col-lg-7" style="float:left;" id='reading_div'>
      <div class="card mb-3" style="border: 1px solid; box-shadow: 5px 5px #888888;">
        <div class="card-header text-center"><h4>Bill Collection Form</h4></div>
          <div class="list-group list-group-flush small list-group-item list-group-item-action">
          <?php echo form_open_multipart('billController/billPayment'); ?>
               <div class="card-body">
                <div class="form-group">
                <div class="form-row"> 
                <div class="col-md-6" >
                    <label ><b>Bill Collection Point</b></label>
                    <select class="form-control" required="true" name="bill_collection_point">
                    	<option value="">--Select One--</option>
                    	<?php foreach($points as $v):?>
                    		<option value="<?php echo $v['bill_collection_point_id'];?>">
                    			<?php echo  $v['bill_collection_point_name']; ?>
                    			</option>
                    	<?php endforeach;?>
                    </select>
                </div>
                <div class="col-md-6" >
                    <label ><b>Bill No</b></label>
                      <input class="form-control" required="true"  type="text" placeholder="Bill No" name="bill_no" >
                      
                  <?php echo "<p style='color:red;'>".form_error("new_reading"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
                <div class="form-row"> 
                <div class="col-md-6" >
                     <label ><b>Paid On</b></label>
                      <input class="form-control" required="true"  type="date"  name="bill_paid_date" >
                   <?php echo "<p style='color:red;'>".form_error("bill_paid_date"," ")."</p>";?>
                </div>
                <div class="col-md-6" >
                    <label ><b>Paid Amount</b></label>
                      <input class="form-control" required="true"  type="text" placeholder="Amout" name="paid_amount" >
                   <?php echo "<p style='color:red;'>".form_error("paid_amount"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
                <div class="form-row"> 
                <div class="col-md-6" >
                 <input  required="true"  type="radio" value="in_time"  name="time_payment" > &nbsp;&nbsp;&nbsp;<b>In Time Payment</b>
            </div>
            <div class="col-md-6" >
                 <input  required="true"  type="radio" value="late" name="time_payment" > &nbsp;&nbsp;&nbsp;<b>Late Payment</b>
            </div>
          </div>
        </div>
            <div class="modal-footer">
              
             <?php
                echo form_submit(['name'=>'pay_bill', 'value'=>'save','class'=>'btn btn-success btn-block col-md-4','data-target'=>'#cirm_connection','data-toggle'=>'modal','id'=>'save_reading']); ?>
            </div>
           <?php  echo form_close(); //endforeach;?>
        </div>
      </div>
    </div>
  </div>
<?php //endif; ?>
    </div>
  </div>
  <?php include_once("includes/jqueryFile.php"); 
?>
</body>
</html>