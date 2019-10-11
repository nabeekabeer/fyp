<!DOCTYPE html>
<html lang="en">
<head>
<title>Connection List</title>
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


$('#search_cnic').keyup(function() {
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
   var cnic=$('#search_cnic').val();
   if(cnic=="")
   {
    $('#search_cnic').focus();
    $('#search_cnic').css('border-color','red');
    $('#spanbtn').after('<span class="error error-keyup-3" style="color:red;">&nbsp; This field must be filled...!</span>');
    return false;
   }else if(cnic.length<13)
   {
    $('#search_cnic').focus();
    $('#search_cnic').css('border-color','red');
    $('#spanbtn').after('<span class="error error-keyup-2" style="color:red;">&nbsp; &nbsp;Invalid CNIC, length is less than 13.</span>');
    return false;
   }else if(cnic.length>13){
    $('#search_cnic').focus();
    $('#search_cnic').css('border-color','red');
    $('#spanbtn').after('<span class="error error-keyup-2" style="color:red;">&nbsp; &nbsp;Invalid CNIC, Length is greater than 13</span>');
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
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php include_once("header.php") ?>
<?php include_once("footer.php") ?>
      <div class="content-wrapper" >
        <div class="container-fluid" >
           <div class="container col-md-6" style="border: 1px solid;" >
        <div class="card-header text-center "><h3 class="fa fa-map"> Enter CNIC</h3></div>
          <?php echo form_open('myController/searchAllConecctionOfaConsumer'); ?>
                <div class="col-md-12">
                  <div class="input-group">
                  <input type="text" placeholder="Enter CNIC" name="con_cnic" id="search_cnic" onkeypress="return (event.charCode>=48 && event.charCode<=57)" class="form-control" >
                  <input type="submit" name="con_sub" id="search_btn" value="search">
              </div>
              <br><span class="input-group-btn" id="spanbtn"></span>
                </div>
           <?php  echo form_close();?><hr>
       </div>
       <?php if (isset($allConnection)){ if( $allConnection!=0): ?>
      <div >
            <input type="button" onclick="tableToExcel('testTable', 'Connection Detail')" value="Export to Excel">
            <!-- <input type="button" id='printBtn' onclick="printDiv(divName)"  value='print'> -->
          </div>
      <div class="card mb-3 mt-4" id="testTable" style="border: 1px solid;" >
        <div class="card-header" >
          <i class="fa fa-table"></i> &nbsp;<strong>Connection List of
            <u class="text-muted"><?php echo @$allConnection[0]['cons_fname'].@$allConnection[0]['cons_lname'];?></u></strong></div>
        <div class="card-body">
          <div class="table-responsive" id="divName"><!-- id="testTable" -->
            <table class="table table-bordered"   width="100%" cellspacing="0">
              <thead class="bg-dark text-white text-center">
                <tr>
                  <th>S.No</th>
                  <th>Consumer New #</th>
                  <th>Connection Type</th>
                  <th>Area</th>
                  <th>Connection Status</th>
                </tr>
              </thead>
              <tbody id="area_tableId">
                <?php $i=1; $Active=0; $inActive =0; $total=0;  foreach($allConnection as $v): ?>
                <tr>
                  <td align='center'><?php echo $i++; ?></td>
                  <td align='center'><?php echo $v['con_consumer_new_no'];?></td>
                  <td align='center'><?php echo $v['con_type_name'];?></td>
                   <td align='center'><?php echo $v['area_name'];?></td>
                  <?php $s= $v['con_status'];
                          
                    switch ($s) {
                        case '0':
                          $Active++;
                          $total++;
                          echo "<td align='center' style='color:green;'><b>Active</b></td>";
                          break;
                        default:
                        $inActive++;
                        $total++;
                          echo "<td  align='center' style='color:red;'><b>Closed</b></td>";
                          break;
                    }
                  ?>   
                </tr>
              <?php endforeach;  ?> 
              <tr class="bg-dark text-white">
                <td align="right" colspan="3">Total Connection</td>
                <td align="center" ><?php echo @$total; ?></td>
                <td align="center" >Active : <?php echo @$Active; ?> Closed : <?php echo @$inActive; ?></td>
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