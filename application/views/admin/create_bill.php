<!DOCTYPE html>
<html lang="en">
<?php //session_start();?>
<head>
  <title>Create Bill</title>
  <script src="<?php echo base_url('asset/jQuery/jquery.min.js')?>" ></script>


  <script  type="text/javascript">
$.noConflict();
 (function($){
$(document).ready(function(){
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
   }else if(nr<=lr){
    $('#new_reading').focus();
    $('#new_reading').css('border-color','red');
    $('#new_reading').after('<span class="error error-keyup-3" style="color:red;">&nbsp; Invalid Reading!</span>');
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
//if(!$t):
?>
<div class="container" id="search_consumer">
    <?php echo form_open('billController/searchConnByCNumToCreateBill'); ?>
       <div class="col-md-12">
           <label for="exampleInputEmail1"><b>Consumer New Number </b> (11 charachters only Like 180213MA4D7)</label>
              <div class="input-group">
                  <?php echo form_input(['type'=>'text', 'name'=>'cons_new_num','placeholder'=>'Enter Consumer Number Like 180213MA4DR',"title"=>"Enter Consumer Number",'class'=>'form-control col-md-10', "onkeypress"=>"return  event.charCode>=48  && event.charCode<=90 ",'id'=>"search_cnum"]);?>
                  <button class="btn btn-primary" name="submit_Search_showBill" id="search_btn" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                 </div>
                <!--  <button class="btn btn-primary" name="submit_Search_showBill" type="button" onclick="window.print();">
                    print
                  </button> -->
              <br><span class="input-group-btn" id="spanbtn"></span>
          </div>
     </div>
 <?php  echo form_close();?><hr>
<?php if(@$t): if(isset($conn_reading_qry) && isset($_SESSION['row_reading'])): ?>
  <div class="container">
   <div class="col-lg-8" style="float: left;">
          <div class="card mb-3">
            <div class="list-group list-group-flush small list-group-item list-group-item-action">
              <!-- <a class="list-group-item list-group-item-action" href="#"> -->
                <div class="media">
                  <div class="media-body">
                    <table>
                      <tr>
                        <td>Consumer New Number &nbsp;&nbsp;&nbsp;</td>
                        <td align="right">
                          <strong><?php echo $conn_reading_qry[0]['con_consumer_new_no'];?>&nbsp;&nbsp;&nbsp;</strong>
                        </td>
                        <td>Consumer Old Number &nbsp;&nbsp;&nbsp;</td>
                        <td align="right">
                          <strong><?php echo $conn_reading_qry[0]['con_consumer_old_no'];?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td>Name &nbsp;&nbsp;&nbsp;</td>
                        <td colspan="3">
                          <h5 class="text-muted"><?php echo strtoupper($conn_reading_qry[0]['cons_fname'].' '.$conn_reading_qry[0]['cons_lname']);?> &nbsp;&nbsp;&nbsp;</h5>
                        </td>
                      </tr>
                    <tr>
                      <td>Current Address &nbsp;&nbsp;&nbsp;</td>
                      <td colspan="3">
                        <strong>
                           <?php echo $conn_reading_qry[0]['cons_current_address'];?> 
                        </strong>
                      </td>
                    </tr>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4" style="float: right;">
          <div class="card mb-3">
            <div class="list-group list-group-flush small list-group-item list-group-item-action">
                  <div class="media">
                  <div class="media-body">
                    <table>
                      <tr>
                        <td>&nbsp;&nbsp; Bill No: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $readings[0]['bill_number'];?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; Print Date: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo date('d/m/Y');?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; Connection Type: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo strtoupper($conn_reading_qry[0]['con_type_name']);?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; Meter Number: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $conn_reading_qry[0]['con_meter_number'];?></strong></td>
                      </tr>
                       <tr>
                        <td>&nbsp;&nbsp; Reading Date: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $readings[0]['reading_date'];?></strong></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; Area: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right">
                          <strong><?php echo $conn_reading_qry[0]['area_name'];?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; Bill for the Month(s) : &nbsp;&nbsp;&nbsp;</td>
                        <td align="right">
                          <strong><?php echo $readings[0]['billing_month'];?></strong>
                        </td>
                      </tr>

                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container">
      <div class="col-lg-8" style="float: left;">
          <div class="card mb-3">
            <div class="list-group list-group-flush small list-group-item list-group-item-action">
              <!-- <a class="list-group-item list-group-item-action" href="#"> -->
                <div class="media">
                  <div class="media-body">
                    <table cellspacing="5px" cellpadding="5px">
                      <thead class="text-center text-muted" >
                        <th colspan="2"><h5>Meter Reading</h5></th>
                        <th colspan="5"><h5>Unit Consumed</h5></th>
                      </thead>
                      <thead>
                        <th >Last</th>
                        <th >New</th>
                        <th >Consumed</th>
                        <th >Connection Load</th>
                        <th >Total Unit Consumed</th>
                        <th >No.of Month</th>
                        <th >Average</th>
                      </thead>
                      <tr>
                        <td >
                          <?php echo $readings[0]['last_reading'];?>
                        </td>
                        <td >
                          <?php echo $readings[0]['new_reading'];?>
                        </td>
                        <td >
                          <?php 
                            echo $consumed_unit=$readings[0]['new_reading']-$readings[0]['last_reading'];
                            ?>
                        </td>
                        <td >
                          <?php $CU=0; echo $CU;?>
                        </td>
                        <td >
                          <?php echo $total_consumed_unit=$consumed_unit+$CU;?>
                        </td>
                        <td >
                          <?php $no_of_month=1; echo $no_of_month;?>
                        </td>
                        <td >
                          <?php 
                            $average_unit_con= $total_consumed_unit/$no_of_month;
                             echo $average_unit_con;
                             ?>
                        </td>
                      </tr>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4" style="float: right;">
       <div class="card mb-3">
        <div class="list-group list-group-flush small list-group-item list-group-item-action">
          <div class="media">
            <div class="media-body">
             <table>
              <thead>
                  <th class="text-center text-muted" colspan="6">
                    <h5><?php echo strtoupper("Billing History");?></h5>
                  </th>
              </thead>
              <thead>
                  <th>Bill#</th>
                  <th>Last Reading</th>
                  <th>New Reading</th>
                  <th>Con Unit</th>
                  <th>Amount</th>
                  <th>Status</th>
              </thead>
              <tbody>
                <?php $ct=0;
                 foreach($mes as $r):?>
                <tr>
                  <td><?php //echo $r['last_reading'];?></td>
                  <td><?php echo $r['last_reading'];?></td>
                  <td><?php echo $r['new_reading'];?></td>
                  <td><?php 
                     $cu= $r['new_reading']-$r['last_reading'];
                     echo $cu;
                    $ct+=$cu; ?>
                  </td>
                  <td><?php echo $cu*2;?></td>
                  <?php 
                      switch ($r['payment_status']) {
                        case '1':
                          echo "<td>Add in Next</td>";
                          break;
                        case '2':
                          echo "<td>Paid</td>";
                          break;
                        default:
                          echo "<td style='color:red;'>Not Paid</td>";
                          break;
                      } ?>
                </tr>
                <?php endforeach;  ?>
              </tbody>
            </table>
               </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4" style="float: left;">
          <div class="card mb-12">
            <div class="list-group-flush small list-group-item list-group-item-action">
             <div class="media">
                  <div class="media-body">
                    <table cellspacing="5px" cellpadding="5px">
                      <thead>
                        <th >Unit Range</th>
                        <th >Unit Consumed</th>
                        <th >Rate</th>
                        <th >Amount</th>
                      </thead>
                      <?php
                      $total_amount=0;
                      foreach($bill_rates as $rate):?>
                      <tr>
                        <td >
                          <?php echo $rate['unit_range_from']." - ".$rate['unit_range_to'];?>
                        </td>
                        <td >
                          <?php
                          if($rate['unit_range_to']!='above'):
                            if($average_unit_con>=$rate['unit_range_to']):
                              $next= $rate['unit_range_to']-$rate['unit_range_from']+1;
                              $average_unit_con=$average_unit_con-$next;
                              $rates=$next*$rate['per_unit_rate'];
                              echo $next;
                            elseif($average_unit_con<$rate['unit_range_to']):
                              $rates=$average_unit_con*$rate['per_unit_rate'];
                              echo $average_unit_con;
                               ?>
                            <td >
                              <?php  echo $rate['per_unit_rate'];?>
                            </td>
                            <td >
                              <?php echo $rates;?>
                            </td>
                            <?php
                              $total_amount+=$rates;
                              break;
                            endif;
                          else:
                           $rates= $average_unit_con*$rate['per_unit_rate'];
                           echo $average_unit_con;
                          endif;
                          ?>
                        </td>
                        <td >
                          <?php  echo $rate['per_unit_rate'];?>
                        </td>
                        <td ><?php echo @$rates;?></td>
                      </tr>
                    <?php  $total_amount+=$rates; endforeach; ?>
                    <tr>
                    </tr>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="container">
        <div class="col-lg-4" style="float: right;">
          <div class="card mb-12">
            <div class="list-group-flush small list-group-item list-group-item-action">
             <div class="media">
                  <div class="media-body">
                    <table cellspacing="5px" cellpadding="5px">
                      <tr>
                        <th>Total Amount : </th>
                        <td align="right">
                          <?php echo $total_amount=$total_amount*$no_of_month; ?>
                        </td>
                      </tr>
                      <tr >
                          <th>Arrear :  </th>
                          <td align="right"><?php echo $arrear=0; ?> </td>
                        </tr>
                        <tr >
                          <th><?php echo $bank_charge[0]['charge_type']; ?> </th>
                          <td align="right"><?php echo $bank_charges=$bank_charge[0]['charge_amount']; ?> </td>
                        </tr>
                        <tr >
                          <th>Payble within due date : </th>
                          <td align="right"><?php echo $total_amount+$bank_charges+$arrear; ?></td>
                        </tr>
                        <tr>
                          <th>Late Payment Charge (10%) : </th>
                          <td align="right"><?php echo $late_pay=$total_amount/10; ?></td>
                        </tr>
                        <tr>
                         <th>Payble After due date : </th>
                          <td align="right"><?php echo $total_amount+$late_pay+$bank_charges+$arrear; ?></td>
                        </tr>
                        <!-- <tr>
                         <th colspan="2" align="center" class="text-muted">
                          <h4> Due Date  <?php //echo $readings[0]['due_date'];?></h4> 
                        </th>
                        </tr> -->
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="col-lg-4" style="float: left;">
          <div class="card mb-12">
            <div class="list-group-flush small list-group-item list-group-item-action">
             <div class="media">
                  <div class="media-body">
                    <table cellspacing="5px" cellpadding="5px">
                     <tr>
                       <td align="center">
                         Software Designed & Developed by Nabee 
                       </td>
                     </tr>
                     <tr>
                       <td  align="center" class="text-muted"><h4><?php //echo strtoupper("AEE Billing"); ?></h4></td>
                     </tr>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div> -->
      <div class="col-lg-4" style="float: right;">
          <div class="card mb-12">
            <div class="list-group-flush small list-group-item list-group-item-action">
             <div class="media">
                  <div class="media-body">
                    <table >
                     <tr>
                       <td  align="center" class="text-muted"><h4>Due Date  <?php echo $readings[0]['due_date'];?></h4></td>
                     </tr>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   <!--  <div class="container" style="clear: both;">
        <div class="col-lg-4" style="float: left;">
           <div class="card-header">
              <i class="fa fa-map"></i> Meter Image</div>
            <div class="list-group-flush small list-group-item list-group-item-action">
             <div class="media">
                <div class="media-body">
                  <img src="<?php //base_url('asset/images/bbb.jpg');?>" height='300' width=100%>
                </div>
            </div>
          </div>
        </div>
    </div> -->
      <div class="container" style="clear: both;">
        <div class="col-lg-4" style="float: left;" >
          <div class="card mb-3">
            <div class="list-group list-group-flush small list-group-item list-group-item-action">
                  <div class="media">
                  <div class="media-body">
                    <table>
                      <tr>
                        <td>&nbsp;&nbsp; Area: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $conn_reading_qry[0]['area_name'];?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; New#: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $conn_reading_qry[0]['con_consumer_new_no'];?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; Old#: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $conn_reading_qry[0]['con_consumer_old_no'];?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; Last Reading: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $readings[0]['last_reading'];?></strong></td>
                      </tr>
                       <tr>
                        <td>&nbsp;&nbsp; New Reading: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $readings[0]['new_reading'];?></strong></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; Bill for the Month(s): &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $readings[0]['billing_month'];?></strong></td>
                      </tr>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4" style="float: left;">
          <div class="card mb-3">
            <div class="list-group list-group-flush small list-group-item list-group-item-action">
                  <div class="media">
                  <div class="media-body">
                    <table>
                      <tr>
                        <td>Bill No: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $readings[0]['bill_number'];?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td> This Bill Amount: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $total_amount;?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td> Arrear: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $arrear;?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td> Payable with in Due Date: &nbsp;</td>
                        <td align="right"><strong><?php echo $arrear_plus_total=$total_amount+4+$arrear;?></strong></td>
                      </tr>
                       <tr>
                        <td> Payable After Due Date: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $arrear_plus_total+$late_pay; ;?></strong></td>
                      </tr>
                      <tr>
                         <th colspan="2" align="center" class="text-muted">
                          <h4> Due Date <?php echo $readings[0]['due_date'];?></h4> 
                         </th>
                      </tr>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
        <div class="col-lg-4" style="float: left;">
          <div class="card mb-3">
            <div class="list-group list-group-flush small list-group-item list-group-item-action">
                  <div class="media">
                  <div class="media-body">
                    <br><br><br>
                    <div class="text-center">
                       <strong>Sub Divisional Officer<br>W & P Billing Section Skardu</strong>
                    </div>
                    <div class="text-muted text-center" style="border: 2px dashed gray;">
                      <h5>Bank/Post Office Copy </h5>
                    </div>
                   
                </div>
            </div>
          </div>
        </div>
      </div>

      </div>
      <div class="container" style="clear: both;">
      
        <div class="col-lg-4" style="float: left;" >
          <div class="card mb-3">
            <div class="list-group list-group-flush small list-group-item list-group-item-action">
                  <div class="media">
                  <div class="media-body">
                    <table>
                      <tr>
                        <td>&nbsp;&nbsp; Area: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $conn_reading_qry[0]['area_name'];?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; New#: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $conn_reading_qry[0]['con_consumer_new_no'];?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; Old#: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $conn_reading_qry[0]['con_consumer_old_no'];?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; Last Reading: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $readings[0]['last_reading'];?></strong></td>
                      </tr>
                       <tr>
                        <td>&nbsp;&nbsp; New Reading: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $readings[0]['new_reading'];?></strong></td>
                      </tr>
                      <tr>
                        <td>&nbsp;&nbsp; Bill for the Month(s): &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $readings[0]['billing_month'];?></strong></td>
                      </tr>
                    </table>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4" style="float: left;">
          <div class="card mb-3">
            <div class="list-group list-group-flush small list-group-item list-group-item-action">
                  <div class="media">
                  <div class="media-body">
                    <table>
                      <tr>
                        <td> Bill No: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $readings[0]['bill_number'];?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td> This Bill Amount: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $total_amount;?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td> Arrear: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $arrear;?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td>Payable with in Due Date: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $arrear_plus_total=$total_amount+4+$arrear;?></strong></td>
                      </tr>
                       <tr>
                        <td> Payable After Due Date: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $arrear_plus_total+$late_pay; ;?></strong></td>
                      </tr>
                      <tr>
                         <th colspan="2" align="center" class="text-muted">
                          <h4> Due Date <?php echo $readings[0]['due_date'];?></h4> 
                         </th>
                      </tr>
                    </table>
                </div>
            </div>
          </div>
        </div>
        </div>
        <div class="col-lg-4" style="float: left;">
          <div class="card mb-3">
            <div class="list-group list-group-flush small list-group-item list-group-item-action">
                  <div class="media">
                  <div class="media-body">
                    <br><br><br>
                    <div class="text-center">
                       <strong>Sub Divisional Officer<br>W & P Billing Section Skardu</strong>
                    </div>
                    <div class="text-muted text-center" style="border: 2px dashed gray;">
                      <h5>Consumer Copy </h5>
                    </div>
                   
                </div>
            </div>
          </div>
        </div>
       </div>
      </div>
      <?php unset($_SESSION['row_reading']);
      else: ?>
      <div class="col-lg-4" style="float: left; margin-left: 30%;">
          <div class="card mb-3">
            <div class="list-group list-group-flush small list-group-item list-group-item-action text-muted text-center"><?php
        echo "No Record Found..!";
        ?>
            </div>
          </div>
        </div>
        <?php endif; endif;?>

</div>
</div>
<?php include_once("includes/jqueryFile.php"); ?>
</body>
</html>
