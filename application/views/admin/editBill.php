<!DOCTYPE html>
<html lang="en">
<?php //session_start();?>
<head>
  <title>Edit Reading</title>
  <script src="<?php echo base_url('asset/jQuery/jquery.min.js')?>" ></script>


  <script  type="text/javascript">
$.noConflict();
 (function($){
$(document).ready(function(){
  $('#conn_loadc_div').hide();
  $('#reading_div').hide();
  $('input[type=radio][name=mstatus]').change(function() {
     if(this.checked) {
       if ($(this).val()=='yes') {
        $('#conn_loadc_div').hide();
        $('#reading_div').show();
        }else{
          $('#reading_div').hide();
          $('#conn_loadc_div').show();
       }
     }
  });

  
    //$('#arrear_tbl tr:even').css('background','#CCCCCC');
    //$('#arrear_tbltr:odd').css('background','#aaaaaa');
    //$('#arrear_tbl').css('background','#CCCCCC');

    $('#closeBtn').click(function(){
      $('#card-header-msg').hide();
    });

//     $('#search_cnum').keyup(function() {
//     $('span.error-keyup-1').hide();
//     $('span.error-keyup-2').hide();
//     $('span.error-keyup-3').hide();
//     var inputVal = $(this).val();
//     var numericReg = /^\d*[0-9][A-Z](|.\d*[0-9][A-Z]|,\d*[0-9][A-Z])?$/;
//     var charc=/([A-Z])\w+$/;
//     if(!numericReg.test(inputVal) && !charc.test(inputVal)) {
//         $('#spanbtn').after('<span class="error error-keyup-1" style="color:red;">&nbsp; &nbsp; Numeric characters and Capital Alphabats only.</span>');
//         $('#span_cnic').hide();
//    }
// });
 $('#ld_chrg_inp').hide();
$("#load_charge").change(function() {
    if(this.checked) {
        $('#reading_div input').attr('disabled','disabled');
        $('#ld_chrg_inp').show();
    }else{
      $('#reading_div').fadeIn("slow");
       $('#ld_chrg_inp').hide();
      //$('#ld_chrg_inp input').prop('disabled', true);
      $('#reading_div input').prop( "disabled", false );
    }
});
//if($('').is(':checked')){
//
//}

 $('#save_reading').click(function(){


   var reading_date=$('#reading_date').val();
   var bill4month=$('#bill4month').val();
   var bill4year=$('#bill4year').val();
   var last_date=$('#last_date').val();
  $('span.error-keyup-1').hide();
  $('span.error-keyup-2').hide();
  $('span.error-keyup-3').hide();
   var nr=$('#new_reading').val();
   var lr=$('#last_reading').val();
   if(nr=="")
   {
    $('#new_reading').focus();
    $('#new_reading').css('border-color','red');
    $('#new_reading').after('<span class="error error-keyup-3" style="color:red;">&nbsp; This field must be filled...!</span>');
    return false;
   }
    if(nr<=lr){
    $('#new_reading').focus();
    $('#new_reading').css('border-color','red');
    $('#new_reading').after('<span class="error error-keyup-3" style="color:red;">&nbsp; Invalid Reading!</span>');
    return false;
   }
    if(reading_date==""){
    $('#reading_date').focus();
    $('#reading_date').css('border-color','red');
    $('#reading_date').after('<span class="error error-keyup-3" style="color:red;">&nbsp; This field must be filled...!</span>');
    return false;
   }
   if(bill4month==""){
    $('#bill4month').focus();
    $('#bill4month').css('border-color','red');
    $('#bill4month').after('<span class="error error-keyup-3" style="color:red;">&nbsp; This field must be filled...!</span>');
    return false;
   }
    if(bill4year==""){
    $('#bill4year').focus();
    $('#bill4year').css('border-color','red');
    $('#bill4year').after('<span class="error error-keyup-3" style="color:red;">&nbsp; This field must be filled...!</span>');
    return false;
   }
    if(last_date==""){
    $('#last_date').focus();
    $('#last_date').css('border-color','red');
    $('#last_date').after('<span class="error error-keyup-3" style="color:red;">&nbsp; This field must be filled...!</span>');
    return false;
   }

 });

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

 <?php if (isset($readings)):  ?>
 <div class="col-lg-7" style="float:left;" >
      <div class="card mb-3" style=" border: 1px solid;  box-shadow: 5px 5px #888888;">
        <div class="card-header text-center"><h4>Edit Reading Form</h4></div>
          <div class="list-group list-group-flush small list-group-item list-group-item-action">
          <?php echo form_open_multipart('billController/editReading'); ?>
               <div class="card-body">
                <div class="form-group">
                <div class="form-row">
                <div class="col-md-6" >
                    <label ><b>Bill No</b></label>
                    <input class="form-control"  type="text" aria-describedby="emailHelp"  title="Bill Number"  id="test3" disabled="true" value="<?php echo $readings[0]['bill_number'];?>">
                    <input class="form-control"  type="hidden"  id="" name="bill_number" value="<?php echo $readings[0]['bill_number'];?>">
                    <?php echo "<p style='color:red;'>".form_error("bill_number"," ")."</p>";?>
                    <input class="form-control"  type="hidden"  id="" name="reading_id" value="<?php echo $readings[0]['reading_id'];?>">
                </div>
                <div class="col-md-6" >
                    <label ><b>Last Reading</b></label>
                    <input class="form-control" id="last_reading"  type="text" value="<?php  echo $readings[0]['last_reading'];?>"  name="last_reading" >
                      <input class="form-control" id="last_reading1"  type="hidden" value="<?php echo $readings[0]['last_reading']; ?>"  name="last_reading">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
               <div class="col-md-6" >
                    <label ><b>New Reading</b></label>
                      <input class="form-control" id="new_reading"  type="text" placeholder="New Reading" value="<?php echo $readings[0]['new_reading'];?>" name="new_reading" onkeypress="return  event.charCode>=48  && event.charCode<=57">
                      <input class="form-control"  type="hidden"  name="connection_id"  value="<?php echo $readings[0]['new_reading'];?>">
                  <?php echo "<p style='color:red;'>".form_error("new_reading"," ")."</p>";?>
                </div>

                <div class="col-md-6">
                  <label ><b>Reading Date</b></label>
                  <input class="form-control"  type="date"  title="date of meter reading" name="reading_date" id="reading_date" value="<?php echo $readings[0]['reading_date'];?>" >
                  <?php echo "<p style='color:red;'>".form_error("reading_date"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
              	<?php  $arr=$readings[0]['billing_month'];
              			//echo $s[]=explode('/', $arr);
              	 ?>
                <div class="col-md-6">
                  <label ><b>Bill For The Month</b></label>
                  <select class="form-control" name="bill4month[]" id="bill4month" multiple>
                    <option value="">--- select month ---</option>
                    <?php 

                        // for ($i = 0; $i < 12;   $i++) {
                        //   $date_num = date('m', strtotime("- $i months"));
                        //   $date_str = date('M', strtotime("- $i months"));
                        // echo "<option value=$date_num>".$date_str ."</option>";}
                         ?>
                    <option value="01">Jan</option>
                    <option value="02">Feb</option>
                    <option value="03">Mar</option>
                    <option value="04">Apr</option>
                    <option value="05">May</option>
                    <option value="06">Jun</option>
                    <option value="07">Jul</option>
                    <option value="08">Aug</option>
                    <option value="09">Sep</option>
                    <option value="10">Oct</option>
                    <option value="11">Nov</option>
                    <option value="12">Dec</option>  
                  </select>
                  <?php echo "<p style='color:red;'>".form_error("bill4month"," ")."</p>";?>
                </div>
                <div class="col-md-6">
                  <label ><b>Year</b></label>
                  <select class="form-control" name="bill4year" id="bill4year">
                    <option value="">--select year--</option>
                    <?php  for( $i=0; $i<2; $i++):?>
                      <?php $year= date('Y')-$i;?>
                        <option value="<?php echo $year;?>">
                          <?php echo $year;?>
                        </option>
                  <?php endfor;?>
                  </select> 
                  <?php echo "<p style='color:red;'>".form_error("bill4year"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <label ><b>Last Date to Pay</b></label>
                  <input class="form-control"  type="date" value="<?php echo $readings[0]['due_date'];?>" title="date of meter reading" name="last_date" id="last_date" >
                  <?php echo "<p style='color:red;'>".form_error("reading_date"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
             <?php
                echo form_submit(['name'=>'reading_scroll', 'value'=>'save','class'=>'btn btn-success btn-block col-md-4','data-target'=>'#cirm_connection','data-toggle'=>'modal','id'=>'save_reading']); ?>
            </div>
           <?php  echo form_close(); //endforeach;?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

    </div>
  </div>
  <?php include_once("includes/jqueryFile.php"); 
?>
</body>
</html>