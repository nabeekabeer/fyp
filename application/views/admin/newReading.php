<!DOCTYPE html>
<html lang="en">
<?php //session_start();?>
<head>
  <title>New Reading</title>
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
   var n=$('#new_reading').val();
   var l=$('#last_reading').val();
   if(n==0)
   {
    $('#new_reading').focus();
    $('#new_reading').css('border-color','red');
    $('#new_reading').after('<span class="error error-keyup-3" style="color:red;">&nbsp; This field must be filled...!</span>');
    return false;
   }else if((n-l)<=0){
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
   
<?php echo @$mge;
if(!$t):
?>
<div class="container" id="search_consumer">
      <div class="card card-register mx-auto mt-5" style=" border: 1px solid; box-shadow: 5px 5px #888888;">
        <div class="card-header text-center"><h3>Search Consumer</h3></div>
        <div class="card-body">
          <?php echo form_open('billController/searchConnByCNum'); ?>
            
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <label for="exampleInputEmail1"><b>Consumer New Number </b> (11 charachters only Like 180213MA4D7)</label>
                  <div class="input-group">
                  <?php echo form_input(['type'=>'text', 'name'=>'cons_new_num','placeholder'=>'Enter Consumer Number Like 180213MA4DR',"title"=>"Enter Consumer Number",'class'=>'form-control col-md-10', "onkeypress"=>"return  event.charCode>=48  && event.charCode<=90 ",'id'=>"search_cnum"]);?>
                  <button class="btn btn-primary" name="submit_SearchCN" id="search_btn" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
              </div>
              <br><span class="input-group-btn" id="spanbtn"></span>
                </div>
            </div>
           <?php  echo form_close();?><hr>
        </div>
      </div>
    </div>
  </div>


  <?php unset($_SESSION['cons_new_num']); else: foreach($conn_reading_qry as $v): ?>
  <div class="col-lg-4 pull-left">
          <div class="card mb-3" style=" border: 1px solid; box-shadow: 5px 5px #888888;">
            <div class="card-header"><h3>
              Is the meter concern to this consumer, working properly?</h3></div>
            <div class="list-group list-group-flush small list-group-item list-group-item-action">
              <!-- <canvas id="myPieChart" width="100%" height="100"></canvas> -->
                  <div class="media">
                  <div class="media-body">
                    <table>
                      <tr>
                        <td><input type="radio" name="mstatus" value="yes" id="ms"></td>
                        <td>&nbsp; &nbsp;Yes&nbsp;&nbsp;</td>
                      
                        <td><input type="radio" name="mstatus" value="no" id="ms" ></td>
                        <td>&nbsp;&nbsp;No&nbsp;&nbsp;</td>
                      </tr>
                    </table>
                  </div>
                </div>
            </div>
          </div>
        </div>
          <div class="col-lg-4" style="float: right; ">
          <div class="card mb-3" style=" border: 1px solid; box-shadow: 5px 5px #888888;">
            <div class="card-header">
              <i class="fa fa-user"></i> Consumer Info</div>
            <div class="list-group list-group-flush small list-group-item list-group-item-action">
              <!-- <a class="list-group-item list-group-item-action" href="#"> -->
                <div class="media">
                  <div class="media-body">
                    <table>
                      <tr>
                        <td>Name &nbsp;&nbsp;&nbsp;</td>
                        <td>
                          <strong><?php echo $v['cons_fname'].' '.$v['cons_lname'];?></strong>
                        </td>
                      </tr>
                    <tr>
                      <td>F/H Name &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $v['cons_father_name'];?></strong>
                      </td>
                    </tr>
                     <tr>
                      <td>Phone Number &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $v['cons_phone_number'];?></strong>
                      </td>
                    </tr>
                    <tr>
                      <td>Current Address &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $v['cons_current_address'];?></strong>
                      </td>
                    </tr>
                    <!-- <tr>
                      <td>Permanent Address &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php //echo $v['cons_permanent_address'];?></strong>
                      </td>
                    </tr> -->
                  </table>
                    <!-- <div class="text-muted smaller">Today at 5:43 PM - 5m ago</div> -->
                  </div>
                </div>
              <!-- </a> -->
              <!-- <a class="list-group-item list-group-item-action" href="#">View all activity...</a> -->
            </div>
            <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
          </div>
        </div>
        <div class="col-lg-4" style="float: right; ">
          <div class="card mb-3" style="border: 1px solid; box-shadow: 5px 5px #888888;">
            <div class="card-header">
              <i class="fa fa-map"></i> Conection Info</div>
            <div class="list-group list-group-flush small list-group-item list-group-item-action">
              <!-- <canvas id="myPieChart" width="100%" height="100"></canvas> -->
                  <div class="media">
                  <div class="media-body">
                    <table>
                      <tr>
                        <td>&nbsp;&nbsp; Connection Type &nbsp;&nbsp;&nbsp;</td>
                        <td><strong><?php echo $v['con_type_name'];?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; New Consumer Number &nbsp;&nbsp;&nbsp;</td>
                        <td><strong><?php echo $v['con_consumer_new_no'];?></strong></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; Old Consumer Number &nbsp;&nbsp;&nbsp;</td>
                        <td><strong><?php echo $v['con_consumer_old_no'];?></strong></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; Meter Number &nbsp;&nbsp;&nbsp;</td>
                        <td><strong><?php 
                        if($v['con_meter_number']!="")
                          {echo $v['con_meter_number'];}
                        else{
                          echo "Required";
                        }?></strong></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; Area &nbsp;&nbsp;&nbsp;</td>
                        <td><strong><?php echo $v['area_name'];?></strong></td>
                      </tr>
                    </table>
                    <!-- <div class="text-muted smaller">Today at 5:43 PM - 5m ago</div> -->
                  </div>
                </div>
            </div>
            <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
          </div>
        </div>
  <div class="col-lg-7" style="float:left;" id='reading_div'>
      <div class="card mb-3" style=" border: 1px solid; box-shadow: 5px 5px #888888;">
        <div class="card-header text-center"><h4>Reading Form</h4></div>
          <div class="list-group list-group-flush small list-group-item list-group-item-action">
          <?php echo form_open_multipart('billController/addNewReading'); ?>
               <div class="card-body">
                <div class="form-group">
                <div class="form-row">
                <div class="col-md-6" >
                    <label ><b>Bill No</b>&nbsp;&nbsp;&nbsp;<?php echo @$bill_num;?></label>
                      <?php $cd=date('Y')."/".date('m', strtotime("- 1 months"))."/"; 
                      $ccdd= $cd.random_number(9);?>
                    <input class="form-control"  type="text" aria-describedby="emailHelp" placeholder="Create Consumer Number" title="Bill Number"  id="test3" disabled="true" value="<?php echo $ccdd;?>">
                    <input class="form-control"  type="hidden"  id="" name="bill_number" value="<?php echo $ccdd;?>">
                    <?php echo "<p style='color:red;'>".form_error("bill_number"," ")."</p>";?>
                </div>
                <div class="col-md-6" >
                    <label ><b>Last Reading</b>&nbsp;&nbsp;&nbsp;<?php //echo @$last_reading;?></label>
                    <input class="form-control" id="last_reading"  type="text" value="<?php if(isset($last_reading)){ echo @$last_reading;}else{ echo "0";}?>"  name="last_reading" disabled>
                      <input class="form-control" id="last_reading1"  type="hidden" value="<?php if(isset($last_reading)){ echo @$last_reading;}else{ echo "0";}?>"  name="last_reading">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
               <div class="col-md-6" >
                    <label ><b>New Reading</b></label>
                      <input class="form-control" id="new_reading"  type="text" placeholder="New Reading" name="new_reading" onkeypress="return  event.charCode>=48  && event.charCode<=57">
                      <input class="form-control"  type="hidden"  name="connection_id"  value="<?php echo $v['connection_id'];?>">
                  <?php echo "<p style='color:red;'>".form_error("new_reading"," ")."</p>";?>
                </div>

                <div class="col-md-6">
                  <label ><b>Reading Date</b></label>
                  <input class="form-control"  type="date"  title="date of meter reading" name="reading_date" id="reading_date" >
                  <?php echo "<p style='color:red;'>".form_error("reading_date"," ")."</p>";?>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label ><b>Bill For The Month</b></label>
                  <select class="form-control" name="bill4month[]" id="bill4month" multiple>
                    <option value="">--- select month ---</option>
                    <!-- <?php

                        //for ($i = 0; $i < 12;   $i++) {
                         // $date_num = date('m', strtotime("- $i months"));
                         // $date_str = date('M', strtotime("- $i months"));
                       // echo "<option value='$date_num'>".$date_str ."</option>";}
                         ?> -->
                    
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
                    <option value="12">Dec</option>                   </select>
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
                  <input class="form-control"  type="date"  title="date of meter reading" name="last_date" id="last_date" >
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

  <div class="col-lg-7" style="float:left;" id='conn_loadc_div'>
      <div class="card mb-3" style="border: 1px solid; box-shadow: 5px 5px #888888;">
        <div class="card-header text-center"><h4>Connection Load Charge Form</h4></div>
          <div class="list-group list-group-flush small list-group-item list-group-item-action">
          <?php echo form_open_multipart('billController/add_connection_load'); ?>
               <div class="card-body">
                <div class="form-group">
                <div class="form-row">
                <div class="col-md-6" >
                  <input class="form-control"  type="hidden"  name="connection_id"  value="<?php echo $v['connection_id'];?>">
                    <label ><b>Bill No</b>&nbsp;&nbsp;&nbsp;<?php echo @$bill_num;?></label>
                      <?php $cd=date('Y')."/".date('m', strtotime("- 1 months"))."/"; $ccdd= $cd.random_number(9);?>
                    <input class="form-control"  type="text" aria-describedby="emailHelp" placeholder="Create Consumer Number" title="Bill Number" name="bill_number"  id="test3" disabled="true" value="<?php echo $ccdd;?>" >
                    <input class="form-control"  type="hidden"  id="" name="bill_number" value="<?php echo $ccdd;?>">
                </div>
              </div>
              </div>
                 <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label ><b>Connection Load Charged Unit</b></label>
                  <input class="form-control"  type="text"  title="Connection Load Charged Unit" name="load_charge_unit" onkeypress="return event.charCode>=48 && event.charCode<=57"  required >
                </div>
                <div class="col-md-6">
                  <label ><b>Reason of Load Charge</b></label>
                  <textarea class="form-control" rows="1" title="Reason of Connection Load Charged" name="reason_load_charge" required ></textarea> 
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label ><b>Bill For The Month</b></label>
                  <select class="form-control" required name="bill4month_cl[]" id="bill4month" multiple>
                    <option value="">--- select month ---</option>
                     <?php

                        for ($i = 0; $i < 12;   $i++) {
                          $date_num = date('m', strtotime("- $i months"));
                          $date_str = date('M', strtotime("- $i months"));
                        echo "<option value=$date_num>".$date_str ."</option>";}
                         ?>
                    
                    <!-- <option value="01">Jan</option>
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
                    <option value="12">Dec</option> -->
                  </select>
                </div>
                <div class="col-md-6" >
                  <label ><b>Year</b></label>
                  <select class="form-control" required name="bill4year_cl">
                    <option value="">--select year--</option>
                    <?php  for( $i=0; $i<2; $i++):?>
                      <?php $year= date('Y')-$i;?>
                        <option value="<?php echo $year;?>">
                          <?php echo $year;?>
                        </option>
                  <?php endfor;?>
                  </select> 
                </div>
              </div>
            </div>
           
            <div class="modal-footer">
             <?php
                echo form_submit(['name'=>'reading_scroll', 'value'=>'save','class'=>'btn btn-success btn-block col-md-4','data-target'=>'#cirm_connection','data-toggle'=>'modal','id'=>'save_reading1']); ?>
            </div>
           <?php  echo form_close(); //endforeach;?>
        </div>
      </div>
    </div>
  </div>
      
        
        
      
<?php endforeach; endif;?>

    </div>
  </div>
  <?php include_once("includes/jqueryFile.php"); 

  function random_number($maxlength = 17) {
  $chary = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    $return_str = "";
    for ( $x=0; $x<=$maxlength; $x++ ) {
        $return_str .= $chary[rand(0, count($chary)-1)];
    }
    return $return_str;
}
?>
</body>
</html>