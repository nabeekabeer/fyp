<!DOCTYPE html>
<html lang="en">
<?php //session_start();?>
<head>
  <title>Edit payment</title>
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
<div class="card mb-3 mt-4" >
       <?php echo @$mge; ?>
       </div>
 
<?php //if(isset($n)): ?>

  <div class="col-lg-6" style="float:left;" id='reading_div'>
      <div class="card mb-3" style="border: 1px solid; box-shadow: 5px 5px #888888;">
        <div class="card-header text-center"><h4>Edit Payment Detail</h4></div>
          <div class="list-group list-group-flush small list-group-item list-group-item-action">
          <?php echo form_open_multipart('billController/paymentEdit'); ?>
               <div class="card-body">
                <div class="form-group">
                <div class="form-row"> 
                <div class="col-md-6" >
                    <label ><b>Bill Collection Point</b></label>
                    <select class="form-control" required="true" name="bill_collection_point">
                    	<option value="">--Select One--</option>
                    	<?php foreach($points as $v):?>
                    		<option value="<?php echo $v['bill_collection_point_id'];?>" <?php if($v['bill_collection_point_id']==$paid_bills_edit[0]['bill_collection_point_id']){
                          echo "selected";
                        } ?>>
                    			<?php echo  $v['bill_collection_point_name']; ?>
                    			</option>
                    	<?php endforeach;?>
                    </select>
                </div>
                <div class="col-md-6" >
                    <label ><b>Bill No</b></label>
                      <input class="form-control" disabled="true" required="true"  type="text" placeholder="Bill No" name="bill_no" value="<?php echo $paid_bills_edit[0]['bill_no'];?>"  >
                      <input class="form-control"   type="hidden" placeholder="Bill No" name="payment_id" value="<?php echo $paid_bills_edit[0]['payment_id'];?>">
                      
                  <?php echo "<p style='color:red;'>".form_error("new_reading"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
                <div class="form-row"> 
                <div class="col-md-6" >
                     <label ><b>Paid On</b></label>
                      <input class="form-control" required="true"  type="date"  name="bill_paid_date" value="<?php echo $paid_bills_edit[0]['payment_date'];?>" >
                   <?php echo "<p style='color:red;'>".form_error("bill_paid_date"," ")."</p>";?>
                </div>
                <div class="col-md-6" >
                    <label ><b>Paid Amount</b></label>
                      <input class="form-control" required="true"  type="text" placeholder="Amout" name="paid_amount" value="<?php echo $paid_bills_edit[0]['paid_amount'];?>" >
                   <?php echo "<p style='color:red;'>".form_error("paid_amount"," ")."</p>";?>
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
  <div class="col-lg-6 center" style="float:left;">
          <div class="card mb-8" style="border: 1px solid; box-shadow: 5px 5px #888888;">
            <div class="card-header">
              <i class="fa fa-user"></i> &nbsp;&nbsp;&nbsp; <strong>Consumer Detail</strong></div>
            <div class="list-group list-group-flush large list-group-item list-group-item-action">
                    <table>
                      <tr>
                        <td>Name &nbsp;&nbsp;&nbsp;</td>
                        <td>
                          <strong><?php echo strtoupper($paid_bills_edit[0]['cons_fname'].' '.$paid_bills_edit[0]['cons_lname']);?></strong>
                        </td>
                      </tr>
                       <tr>
                        <td>New Consumer Number &nbsp;&nbsp;&nbsp;</td>
                        <td>
                          <strong><?php echo strtoupper($paid_bills_edit[0]['con_consumer_new_no']);?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td>Old Consumer Number &nbsp;&nbsp;&nbsp;</td>
                        <td>
                          <strong><?php echo strtoupper($paid_bills_edit[0]['con_consumer_old_no']);?></strong>
                        </td>
                      </tr>
                     <tr>
                      <td>CNIC &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $paid_bills_edit[0]['cons_cnic'];?></strong>
                      </td>
                    </tr>
                     <tr>
                      <td>Current Address &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $paid_bills_edit[0]['cons_current_address'];?></strong>
                      </td>
                    </tr>
                  </table>
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