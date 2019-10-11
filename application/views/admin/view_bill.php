<!DOCTYPE html>
<html lang="en">
<?php //session_start();?>
<head>
  <title>Bill of <?php echo strtoupper(@$conn_reading_qry[0]['cons_fname'].' '.@$conn_reading_qry[0]['cons_lname']);?></title>
  <script src="<?php echo base_url('asset/jQuery/jquery.min.js')?>" ></script>


  <script  type="text/javascript">
$.noConflict();
 (function($){
$(document).ready(function(){
    
});
})(jQuery);
</script>
  <?php include_once("includes/htmlFile.php"); ?>
  <?php //include_once("./home.php");?>
</head>
<body >
  <?php //require 'header.php'; ?>
  <?php //require 'footer.php'; ?>
   
<?php echo @$mge;
?>

<?php if(@$t): if(isset($conn_reading_qry) && isset($_SESSION['row_reading'])): ?>
 <div  style=" border: 2px solid; margin-left: 4%;">
  <div style="margin-left: 2%;">
   <div style="float: left; " >
          <div  >
                    <table >
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
                        <td>Consumer Name &nbsp;&nbsp;&nbsp;</td>
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
      
    
      <div  style=" float:left; ">
          
                    <table border='1px solid' >
                      <thead class="text-center text-muted" >
                        <th colspan="2"><h5>Meter Reading</h5></th>
                        <th colspan="4"><h5>Unit Consumed</h5></th>
                      </thead>
                      <thead>
                        <th >Last</th>
                        <th >New</th>
                        <th >Consumed</th>
                        <!-- <th >Connection Load</th> -->
                        <th >Total Unit Consumed</th>
                        <th >No.of Month</th>
                        <th >Average</th>
                      </thead>
                      <tr>
                        <td align="center" >
                          <?php echo $readings[0]['last_reading'];?>
                        </td>
                        <td align="center" >
                          <?php echo $readings[0]['new_reading'];?>
                        </td>
                        <td  align="center" >
                          <?php 
                            echo $consumed_unit=$readings[0]['new_reading']-$readings[0]['last_reading'];
                            ?>
                        </td>
                       <!--  <td  align="center" >
                          <?php $connection_load=0; echo $connection_load;?>
                        </td> -->
                        <td align="center" >
                          <?php echo $total_consumed_unit=$consumed_unit;?>
                        </td>
                        <td  align="center" >
                          <?php
                          $no_of_month=1;
                           if (isset($no_of_months) && $no_of_months!="") {
                            $arrr=explode('/', $no_of_months);
                           // print_r($arrr);exit;
                          $no_of_month=count($arrr)-1;
                          }
                          //   $arr=explode('/', $readings[0]['billing_month']);
                          // for ($i=0; $i <count($arr) ; $i++) { 
                          //   $month=0;
                          //   $year=0;
                          //   switch ($month) {
                          //       case '1': $month=$arr[$i]; break;
                          //       case '2': $month=$arr[$i]; break;
                          //       case '3': $month=$arr[$i]; break;
                          //       case '4': $month=$arr[$i]; break;
                          //       case '5': $month=$arr[$i]; break;
                          //       case '6': $month=$arr[$i]; break;
                          //       case '7': $month=$arr[$i]; break;
                          //       case '8': $month=$arr[$i]; break;
                          //       case '9': $month=$arr[$i]; break;
                          //       case '10': $month=$arr[$i]; break;
                          //       case '11': $month=$arr[$i]; break;
                          //       case '12': $month=$arr[$i]; break;
                              
                          //     default:
                          //     $year= $arr[$i];
                          //       break;
                          //   }
                          // }
                          //  $arrr=explode('/', $no_of_months);
                          // for ($i=0; $i <count($arrr) ; $i++) { 
                          //   $monthr=0;
                          //   $yearr=0;
                          //   switch ($monthr) {
                          //       case '1': $monthr=$arrr[$i]; break;
                          //       case '2': $monthr=$arrr[$i]; break;
                          //       case '3': $monthr=$arrr[$i]; break;
                          //       case '4': $monthr=$arrr[$i]; break;
                          //       case '5': $monthr=$arrr[$i]; break;
                          //       case '6': $monthr=$arrr[$i]; break;
                          //       case '7': $monthr=$arrr[$i]; break;
                          //       case '8': $monthr=$arrr[$i]; break;
                          //       case '9': $monthr=$arrr[$i]; break;
                          //       case '10': $monthr=$arrr[$i]; break;
                          //       case '11': $monthr=$arrr[$i]; break;
                          //       case '12': $monthr=$arrr[$i]; break;
                              
                          //     default:
                          //     $yearr= $arrr[$i];
                          //       break;
                          //   }
                            
                          // }
                          // if ($month<$monthr) {
                          //  $no_of_month= $year-$yearr;
                          //   //$no_of_month=1;
                          // }elseif ($monthr<$month) {
                          //   $no_of_month=$month-$monthr;
                          // }else{

                          //  $no_of_month=2;
                          // }
                          // }else{
                          //   $no_of_month=1;
                          // }
                          echo @$no_of_month;?>
                        </td>
                        <td align="center" >
                          <?php 
                            $average_unit_con= ($total_consumed_unit/$no_of_month);
                            $average_unit_con=ceil($average_unit_con);
                             echo $average_unit_con;
                             ?>
                        </td>
                      </tr>
              </table>
      </div>
    </div>
      <div >
          
                    <table >
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
                        <td>&nbsp;&nbsp; Bill for the Month: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right">
                          <strong><?php 
                          $arr=explode('/', $readings[0]['billing_month']);
                          for ($i=0; $i <count($arr) ; $i++) { 
                            $month=$arr[$i];
                            switch ($month) {
                              case '1':
                                echo 'JAN, ';
                                break;
                                case '2':
                                echo 'FEB, ';
                                break;
                                case '3':
                                echo 'MAR, ';
                                break;
                                case '4':
                                echo 'APR, ';
                                break;
                                case '5':
                                echo 'MAY, ';
                                break;
                                case '6':
                                echo 'JUN, ';
                                break;
                                case '7':
                                echo 'JUL, ';
                                break;
                                case '8':
                                echo 'AUG, ';
                                break;
                                case '9':
                                echo 'SEP, ';
                                break;
                                case '10':
                                echo 'OCT, ';
                                break;
                                case '11':
                                echo 'NOV, ';
                                break;
                                case '12':
                                echo 'DEC, ';
                                break;
                              
                              default:
                                echo $arr[$i];
                                break;
                            }
                          }
                          //echo $readings[0]['billing_month'];?></strong>
                        </td>
                      </tr>
                        </table>
                
      </div>
    </div>
      <div style="clear: both; margin-left: 2%;">
      <div  style="float: left;  ">
          <div>
                    <table border='1px solid'>
                      <thead>
                        <th >Unit Range</th>
                        <th >Unit Consumed</th>
                        <th >Rate</th>
                        <th >Amount</th>
                      </thead>
                      <?php
                      $total_amount=0;
                      foreach($bill_rates as $rate):
                       if($average_unit_con==0) break;?>
                      <tr>
                        <td align="center" >
                          <?php echo $rate['unit_range_from']." - ".$rate['unit_range_to'];?>
                        </td>
                        <td align="center">
                          <?php
                          if($rate['unit_range_to']!='above'):
                              $next= ($rate['unit_range_to']-$rate['unit_range_from'])+1;
                            if($average_unit_con>=$next ):
                          
                              $average_unit_con=$average_unit_con-$next;
                              $rates=$next*$rate['per_unit_rate'];
                              echo $next;
                            
                            elseif($average_unit_con<$next):
                              $rates=$average_unit_con*$rate['per_unit_rate'];
                              echo $average_unit_con;
                               ?>
                            <td align="center" >
                              <?php  echo $rate['per_unit_rate'];?>
                            </td>
                            <td  align="center">
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
                        <td align="center">
                          <?php  echo $rate['per_unit_rate'];?>
                        </td>
                        <td align="center" ><?php echo @$rates;?></td>
                      </tr>
                    <?php  $total_amount+=$rates; endforeach; ?>
                    <tr>
                    </tr>
                  </table>
                
      </div>
      <div style="float: left; margin: 5%;  border: 2px solid;">
         
                    <table border='1px solid'>
                     <tr>
                       <td  align="center" class="text-muted"><h4>Due Date  <?php echo $readings[0]['due_date'];?></h4></td>
                     </tr>
                  </table>
                
      </div>
      </div>  
        <div style="float: left; margin-left: 1%; ">
          
                    <table >
                      <tr>
                        <th>Total Amount : </th>
                        <td align="right">
                          <?php echo $total_amount=$total_amount*$no_of_month; ?>
                        </td>
                      </tr>
                      <tr >
                          <th>Arrear :  </th>
                          <td align="right"><?php echo @$arrear_amount; ?> </td>
                        </tr>
                        <tr >
                          <th><?php echo @$bank_charge[0]['charge_type']; ?> </th>
                          <td align="right"><?php echo $bank_charges=@$bank_charge[0]['charge_amount']; ?> </td>
                        </tr>
                        <tr >
                          <th>Payble within due date : </th>
                          <td align="right"><?php echo $total_amount+$bank_charges+@$arrear_amount; ?></td>
                        </tr>
                        <tr>
                          <th><?php $lpamount=10; echo @$late_pay_charge[0]['lpc'];?>(<?php echo $lpamount=$late_pay_charge[0]['camount'];?>%) : </th>
                          <td align="right"><?php echo $late_pay=$total_amount/$lpamount; ?></td>
                        </tr>
                        <tr>
                         <th>Payble After due date : </th>
                          <td align="right"><?php echo $total_amount+$late_pay+$bank_charges+@$arrear_amount; ?></td>
                        </tr>
                  </table>
                
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
      
   
      <div  style="float: left; margin-left: 2%;">
      
             <table border='1px solid'>
              <thead>
                  <th class="text-center text-muted" colspan="6">
                    <h5><?php echo strtoupper("Billing History");?></h5>
                  </th>
              </thead>
              <thead>
                  <!-- <th>Bill#</th> -->
                  <th>Last Reading</th>
                  <th>New Reading</th>
                  <!-- <th>Con Unit</th> -->
                  <!-- <th>Amount</th> -->
                  <th>Payment Status</th>
              </thead>
              <tbody>
                <?php $ct=0;
                 foreach($mes as $r):?>
                <tr>
                  <!-- <td align="center"><?php //echo $r['rh_bill_number'];?></td> -->
                  <td align="center"><?php echo $r['last_reading'];?></td>
                  <td align="center"><?php echo $r['new_reading'];?></td>
                 <!--  <td align="center"><?php 
                     $cu= $r['new_reading']-$r['last_reading'];
                     echo $cu;
                    $ct+=$cu; ?>
                  </td> -->
                 <!--  <td><?php //echo $cu*2;?></td> -->
                  <?php 
                      switch ($r['payment_status']) {
                        case '1':
                          echo "<td align='center' class='text-warning'><b>Add in Next</b></td>";
                          break;
                        case '2':
                          echo "<td align='center'><b>Paid</b></td>";
                          break;
                        default:
                          echo "<td  align='center' style='color:red;'><b>Not Paid</b></td>";
                          break;
                      } ?>
                </tr>
                <?php endforeach;  ?>
              </tbody>
            </table>
              
      </div>
     </div>

      <div style="clear: both;  margin-top: 3%; ">
        <div  style="float: left; margin-left: 2%; " >
          
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
                        <td align="right">
                          <strong><?php 
                          $arr=explode('/', $readings[0]['billing_month']);
                          for ($i=0; $i <count($arr) ; $i++) { 
                            $month=$arr[$i];
                            switch ($month) {
                              case '1':
                                echo 'JAN, ';
                                break;
                                case '2':
                                echo 'FEB, ';
                                break;
                                case '3':
                                echo 'MAR, ';
                                break;
                                case '4':
                                echo 'APR, ';
                                break;
                                case '5':
                                echo 'MAY, ';
                                break;
                                case '6':
                                echo 'JUN, ';
                                break;
                                case '7':
                                echo 'JUL, ';
                                break;
                                case '8':
                                echo 'AUG, ';
                                break;
                                case '9':
                                echo 'SEP, ';
                                break;
                                case '10':
                                echo 'OCT, ';
                                break;
                                case '11':
                                echo 'NOV, ';
                                break;
                                case '12':
                                echo 'DEC, ';
                                break;
                              
                              default:
                                echo $arr[$i];
                                break;
                            }
                          }
                          //echo $readings[0]['billing_month'];?></strong>
                        </td>
                      </tr>
                    </table>
               
      </div>
      <div  style="float: left; margin-left: 2%; ">
         
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
                        <td align="right"><strong><?php echo @$arrear_amount;?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td> Payable with in Due Date: &nbsp;</td>
                        <td align="right"><strong><?php echo $arrear_plus_total=$total_amount+@$bank_charges+@$arrear_amount;?></strong></td>
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
        <div  style="float: left; margin-left: 2%;">
          
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
     
      <div  style="clear: both; border: 2px solid; margin-left: 6%;">
        <div  style="float: left;  margin-left: 0%;  " >
          
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
                        <td align="right">
                        <strong><?php 
                          $arr=explode('/', $readings[0]['billing_month']);
                          for ($i=0; $i <count($arr) ; $i++) { 
                            $month=$arr[$i];
                            switch ($month) {
                              case '1':
                                echo 'JAN, ';
                                break;
                                case '2':
                                echo 'FEB, ';
                                break;
                                case '3':
                                echo 'MAR, ';
                                break;
                                case '4':
                                echo 'APR, ';
                                break;
                                case '5':
                                echo 'MAY, ';
                                break;
                                case '6':
                                echo 'JUN, ';
                                break;
                                case '7':
                                echo 'JUL, ';
                                break;
                                case '8':
                                echo 'AUG, ';
                                break;
                                case '9':
                                echo 'SEP, ';
                                break;
                                case '10':
                                echo 'OCT, ';
                                break;
                                case '11':
                                echo 'NOV, ';
                                break;
                                case '12':
                                echo 'DEC, ';
                                break;
                              
                              default:
                                echo $arr[$i];
                                break;
                            }
                          }
                          //echo $readings[0]['billing_month'];?></strong>
                        </td>
                      </tr>
                    </table>
               
      </div>
      <div style="float: left; margin-left: 2%;">
          
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
                        <td align="right"><strong><?php echo @$arrear_amount;?></strong>
                        </td>
                      </tr>
                      <tr>
                        <td>Payable with in Due Date: &nbsp;&nbsp;&nbsp;</td>
                        <td align="right"><strong><?php echo $arrear_plus_total=$total_amount+$bank_charges+@$arrear_amount;?></strong></td>
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
        <div style="float: left; margin-left: 2%;">
          
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

<?php include_once("includes/jqueryFile.php"); ?>
</body>
</html>
