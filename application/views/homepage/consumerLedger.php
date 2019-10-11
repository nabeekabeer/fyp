<!DOCTYPE html>
<html lang="en">
<head>
<title>Consumer Ledger</title>
<?php include_once("includes/htmlFile.php");
//Ul7fw5B9y4 ?>
<!--<script src="<?php// echo base_url('asset/jQuery/jquery.min.js')?>" ></script>-->
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


$('#con_new_num').keyup(function() {
    $('span.error-keyup-1').hide();
    $('span.error-keyup-2').hide();
    $('span.error-keyup-3').hide();
    var inputVal = $(this).val();
    var numericReg = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
    if(!numericReg.test(inputVal)) {
        $('#spanbtn').after('<span class="error error-keyup-1" style="color:red;">&nbsp; &nbsp; Numeric characters only.</span>');
        $('#span_cnic').hide();
   }//else if($('#search_cnic').val().length!=13)
   // {
   //  $('span.error-keyup-1').hide();
   //  $('span.error-keyup-3').hide();
   //  $('#search_cnic').focus();
   //  $('#search_cnic').css('border-color','red');
   //  $('#spanbtn').after('<span class="error error-keyup-2" style="color:red;">&nbsp; &nbsp;Invalid CNIC.</span>');
   //  return false;
   // }
});
 
  $('#search_btn').click(function(){
  $('span.error-keyup-1').hide();
  $('span.error-keyup-2').hide();
  $('span.error-keyup-3').hide();
   var con_new_num=$('#con_new_num').val();
   if(con_new_num=="")
   {
    $('#con_new_num').focus();
    $('#con_new_num').css('border-color','red');
    $('#spanbtn').after('<span class="error error-keyup-3" style="color:red;">&nbsp; This field must be filled...!</span>');
    return false;
   }else if(con_new_num.length<11)
   {
    $('#con_new_num').focus();
    $('#con_new_num').css('border-color','red');
    $('#spanbtn').after('<span class="error error-keyup-2" style="color:red;">&nbsp; &nbsp;Invalid Consumer New Number, length is less than 11.</span>');
    return false;
   }else if(con_new_num.length>11){
    $('#con_new_num').focus();
    $('#con_new_num').css('border-color','red');
    $('#spanbtn').after('<span class="error error-keyup-2" style="color:red;">&nbsp; &nbsp;Invalid Consumer New Number, Length is greater than 11</span>');
    return false;
   }
   else{
    $('#search_cnic').css('border-color','green');
    return true;
   }
   //$('#test3').remove();
    //$("#test3").val("Dolly Duck");
    });

    
    
});
})(jQuery);
</script>
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
<body class="fixed-nav sticky-footer" id="page-top">
<?php include_once("includes/hpheader.php") ?>
<?php //include_once("footer.php") ?>
   <section>
  <div class="container ">
        <div class="container-fluid" >
           <div class="container col-md-6" style="border: 1px solid;" >
        <div class="card-header text-center "><h3 class="fa fa-map"> Enter Consumer New Number</h3></div>
          <?php echo form_open('adminController/searchConLedger'); ?>
                <div class="col-md-12">
                  <div class="input-group">
                  <input type="text" placeholder="Enter Consumer New Number" name="con_new_num" id="con_new_num" onkeypress="return (event.charCode>=48 && event.charCode<=57) || (event.charCode>=65 && event.charCode<=96)" class="form-control" >
                  <input type="submit" name="con_sub" id="search_btn" value="search">
              </div>
              <br><span class="input-group-btn" id="spanbtn"></span>
                </div>
           <?php  echo form_close();?><hr>
       </div>
       <?php if (isset($ledger)){ if( $ledger!=0): ?>
      <div >
            <input type="button" onclick="tableToExcel('testTable', 'Connection Detail')" value="Download">
            <!-- <input type="button" id='printBtn' onclick="printDiv(divName)"  value='print'> -->
          </div>
      <div class="card mb-3 mt-4" id="testTable" style="border: 1px solid;" >
        <div class="card-header" >
          <i class="fa fa-table"></i> &nbsp;
          <strong style="font-size: 25px; ">Gilgit Baltistan Water and Power Billing Sub-Division Skardu Baltistan </strong><br>
          <strong>Consumer New Number
            <u class="text-muted">
              <?php echo @$ledger[0]['con_consumer_new_no'];?></u></strong>&nbsp;&nbsp;
            <strong>Consumer Old Number
            <u class="text-muted">
              <?php echo @$ledger[0]['con_consumer_old_no'];?>
            </u></strong>&nbsp;&nbsp;
            <strong>Consumer Name
            <u class="text-muted">
              <?php echo @$ledger[0]['cons_fname'].' '.@$ledger[0]['cons_lname'];?>
            </u></strong>&nbsp;&nbsp;
            <strong>Address
            <u class="text-muted">
              <?php echo @$ledger[0]['cons_current_address'];?>
            </u></strong></div>
        <div class="card-body">
          <div class="table-responsive" id="divName"><!-- id="testTable" -->
            <table class="table table-bordered"   width="100%" cellspacing="0">
              <thead class="bg-dark text-white text-center">
                <tr>
                  <th>S.No</th>
                  <th>Meter Reading Date</th>
                  <th>Last Reading</th>
                  <th>New Reading</th>
                  <th>Consumed Unit</th>
                  <!-- <th>Rate</th> -->
                  <th>Payment Status</th>
                </tr>
              </thead>
              <tbody id="area_tableId">
                <?php $i=1; $paid=0; $unpaid =0; $add_in=0; $total=0;  foreach($ledger as $v): ?>
                <tr>
                  <td align='center'><?php echo $i++; ?></td>
                  <td align='center'><?php echo $v['reading_date']; ?></td>
                  <td align='center'><?php echo $v['last_reading'];?></td>
                  <td align='center'><?php echo $v['new_reading'];?></td>
                   <td align='center'><?php echo $consumedU=$v['new_reading']-$v['last_reading'];?></td>
                  <?php $s= $v['payment_status'];
                          $total+=$consumedU;
                    switch ($s) {
                        case '2':
                          $paid++;
                          echo "<td align='center' style='color:green;'><b>Paid</b></td>";
                          break;
                        case '1':
                          $add_in++;
                          echo "<td align='center' style='color:yellow;'><b>Add in Next</b></td>";
                          break;
                        default:
                        $unpaid++;
                          echo "<td  align='center' style='color:red;'><b>unpaid</b></td>";
                          break;
                    }
                  ?>   
                </tr>
              <?php endforeach;  ?> 
              <tr class="bg-dark text-white">
                <td align="right" colspan="4">Total Unit Consumed</td>
                <td align="center" ><?php echo @$total; ?></td>
                <td align="center" >Paid : <?php echo @$paid; ?> Unpaid : <?php echo @$unpaid; ?> Add in Next : <?php echo @$add_in; ?></td>
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