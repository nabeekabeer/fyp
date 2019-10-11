<!DOCTYPE html>
<html lang="en">
<head>
<title>Area wise Bill Report</title>
<?php include_once("includes/htmlFile.php");
//Ul7fw5B9y4 ?>
<!--<script src="<?php// echo base_url('asset/jQuery/jquery.min.js')?>" ></script>-->
<script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()

function printDiv(divName) {
  //alert();

     var printContents = document.getElementById(divName).innerHTML;

     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();
     
     document.body.innerHTML = originalContents;
}
</script>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php include_once("header.php") ?>
<?php include_once("footer.php") ?>
      <div class="content-wrapper" >
        <div class="container-fluid" >
           <div class="container col-md-6" style="border: 1px solid;" >
        <div class="card-header text-center "><h3 class="fa fa-map"> Select Month And Year</h3></div>
          <?php echo form_open('myController/monthWiseElectricityConsumption1'); ?>
                <div class="col-md-12">
                  <div class="input-group">
                  <select name="month" class="form-control" required="true">
                    <option value="">--Select Month--</option>
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
                  <select name="year" class="form-control" required="true">
                    <option value="">--Select Year--</option>
                   <?php  for( $i=0; $i<12; $i++):?>
                      <?php $year= date('Y')-$i;?>
                        <option value="<?php echo $year;?>">
                          <?php echo $year;?>
                        </option>
                  <?php endfor;?>
                  </select>
                  <input type="submit" name="sub" value="search">
              </div>
              <br><span class="input-group-btn" id="spanbtn"></span>
                </div>
           <?php  echo form_close();?><hr>
       </div>
       <?php if (isset($month_wise_bill)){ if( $month_wise_bill!=0): ?>
      <div >
            <input type="button" onclick="tableToExcel('testTable', 'Connection Detail')" value="Export to Excel">
            <!-- <input type="button" id='printBtn' onclick="printDiv(divName)"  value='print'> -->
          </div>
      <div class="card mb-3 mt-4" id="testTable" style="border: 1px solid;" >
        <div class="card-header" >
          <i class="fa fa-table"></i> &nbsp;<strong> 
            <u><?php 
            switch (@$month) {
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
                                echo '0';
                                break;
                            }
                            echo @$yearr;?></u></strong></div>
        <div class="card-body">
          <div class="table-responsive" id="divName"><!-- id="testTable" -->
            <table class="table table-bordered"   width="100%" cellspacing="0">
              <thead class="bg-dark text-white text-center">
                <tr>
                  <th>S.No</th>
                  <th>Consumer New #</th>
                  <th>Consumer Name</th>
                  <th>Consumed Unit</th>
                  <th>Payment Status</th>
                </tr>
              </thead>
              <tbody id="area_tableId">
                <?php $i=1; $count_add_in_next=0; $count_paid=0; $count_unpaid =0; $total_unit=0;  foreach($month_wise_bill as $v): ?>
                <tr>
                  <td align='center'><?php echo $i++; ?></td>
                  <td align='center'><?php echo $v['con_consumer_new_no'];?></td>
                  <td align='center'><?php echo $v['cons_fname']." ".$v['cons_lname'];?></td>
                  <td align='center'><?php echo $v['new_reading']-$v['last_reading'];
                  $total_unit+=$v['new_reading']-$v['last_reading'];?></td> 
                  <?php $s= $v['payment_status'];
                          
                    switch ($s) {
                        case '1':
                          $count_add_in_next++;
                          echo "<td align='center' style='color:yellow;'><b>Add in Next</b></td>";
                          break;
                          case '2':
                          $count_paid++;
                          echo "<td align='center' style='color:green;'><b>Paid</b></td>";
                          break;
                        default:
                        $count_unpaid++;
                          echo "<td  align='center' style='color:red;'><b>Not Paid</b></td>";
                          break;
                    }
                  ?>   
                </tr>
              <?php endforeach;  ?> 
              <tr class="bg-dark text-white">
                <td align="right" colspan="3">Total Unit Consumed</td>
                <td align="center" ><?php echo @$total_unit; ?></td>
                <td align="center" >Paid : <?php echo @$count_paid; ?> UnPaid : <?php echo @$count_unpaid; ?></td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <?php else: ?>
      <div class="col-lg-4" style="margin-top: 10%; float: left;  margin-left: 30%;">
          <div class="card mb-3">
            <div class="list-group list-group-flush small list-group-item list-group-item-action text-muted text-center text-success">
            <?php
          echo "No Record Found....!";
          ?>
       </div>
    </div>
</div>
      <?php endif; } ?>
    </div>
  </div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
  <?php include_once("includes/jqueryFile.php") ?>
  <script type="text/javascript">

$(document).ready(function() {

$("#areaId").on("change",function(){
    var value = $(this).val();
    $.ajax({
         url : "<?= base_url()?>myController/get_dataaArea/"+value,
         type: "post",
         data: {"value":value},
         success : function(data){
          // alert(data);
             $("#area_tableId").html(data);
         }
    });
});
 });
    
</script>
</body>
</html>
<?php /*

AJAX
          <div id="selectHere">
       
           <td>class Name</td>    <td>
              <select name="class_id" id="class_idd" class="form-control">
                <option>--select option--</option>
              <?php foreach ($ww as $key):?>

                <option value="<?php echo $key['class_id']?>">   
                          <?php echo $key['class_name']?>
                </option>
              <?php endforeach;?>
              </select>
              </td>
          </tr>

         
          <tr> 
          <td>Section Name</td>    <td>
              <div class="form-group">                
                <select name="section_id" id="section_idd" class="form-control">
                  <option>---select option---</option>
                </select>
            </div>
              </td>
          
          </tr>
          
       
       
        </table>
        
           <td>class Name</td>    <td>
              <select name="class_id" id="class_idd" class="form-control" >
                <option>---select option---</option>
              <?php foreach ($ww as $key):?>
                <option value="<?php echo $key['class_id']?>">   
                          <?php echo $key['class_name']?>
                </option>
              <?php endforeach;?>
              </select>
              </td>
          </tr>

         
          <tr> 
          <td>Section Name</td>    <td>
              <div class="form-group">                
                <select name="section_id" id="section_idd" class="form-control">
                  <option>---select option---</option>
                </select>
            </div>
              </td>
          </tr>
          <tr>
          
      <script type="text/javascript">

$(document).ready(function() {

$("#class_idd").on("change",function(){
    var value = $(this).val();
    $.ajax({
         url : "<?= base_url()?>adminController/get_dataa",
         type: "post",
         data: {"value":value},
         success : function(data){
          // alert(data);
             $("#section_idd").html(data);
         }
    });
});
 });
    
</script>



controller
 public function get_dataa()
      {
          //$value = $this->input->post("value");
      if (isset($_POST['value'])) {
           $value=$_POST['value'];
          $this->load->model("adminModel","a");
            $data = $this->a->get_data($value);
            
            foreach($data as $d)
            {
              //echo "<option >".$d['section_name']."</option>";
              echo "<option value='".$d['section_id']."' >".$d['section_name']."</option>";
            }
      }
    
     
       //echo $option;
    }


model
public function get_data($value)
       {
        $query=$this->db->query("SELECT section_name ,section_id from section where class_id='$value'");
        $re=$query->result_array();
        return $re;
          // $this->db->where("class_id",$value);
          // return $this->db->get("section")->result();
       }
*/?>