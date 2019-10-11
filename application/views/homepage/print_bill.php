 
<script src="<?php echo base_url('asset/jQuery/jquery.min.js')?>" ></script>
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
 <script  type="text/javascript">
$.noConflict();
 (function($){
$(document).ready(function(){
 $('#ld_chrg_inp').hide();
// $('#printBtn').click(function(){

//      var printContents = $('#divName').innerHTML;
     
//      var originalContents = document.body.innerHTML;

//      document.body.innerHTML = printContents;

//      window.print();
     

//      document.body.innerHTML = originalContents;
// });
 $('#sub').click(function(){
  $('span.error-keyup-1').hide();
  $('span.error-keyup-2').hide();
  $('span.error-3').hide();
   var nr=$('#cn').val();
   if(nr=="")
   {
    $('#cn').focus();
    $('#cn').css('border-color','red');
    $('#sp').after('<span class="error error-3" style="color:red;">&nbsp; This field must be filled...!</span>');
    return false;
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

<?php include_once("includes/hpheader.php");?>
<?php include_once("includes/htmlFile.php");?>

<script src="<?php echo base_url('asset/jQuery/jquery.min.js')?>" ></script>
<section>
  <div class="container ">
    <div class="card mx-auto col-md-8">
      <?php echo "<h4 style='color:red;'>".@$mge."</h4>"; ?>
        <h4 style="text-align: center;">Search Your Billing History</h4>
      <div class="card-body ">
        <?php echo form_open('adminController/printBill'); ?>
        <div class="input-group">
              <?php echo form_input(['type'=>'text', 'name'=>'cn','placeholder'=>'Enter Consumer Number','class'=>'form-control','id'=>'cn']);?>
              <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit" id="sub">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
              <div >
                <span  id="sp"></span>
            </div>
              <?php  echo form_close();?>
            </div>
        </div>
    </div>
  
<?php  if(isset($mes)):  if(@$mes[0]['reading_date']!=''):?>
  
<div class="content" >
 <div class="container-fluid">
          <div >
            <input type="button" onclick="tableToExcel('testTable', 'Ledger')" value="Export to Excel">
            <!-- <input type="button" id='printBtn' onclick="printDiv(divName)"  value='print'> -->

           <!--   <a href="mailto:ghulam.nabi95.kiu@gmail.com" class="btn btn-success btn-sm">mail</a> -->
          </div>
    <div class="card mb-3 mt-4" id="testTable">
        <div class="card-header">
          <i class="fa fa-table"></i><h3> &nbsp; &nbsp;Your Billing History</h3> 
         </div>
        <div class="card-body" id="divName"> 
          <div class="table-responsive"  >
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="3">
              <thead>
                <tr class="bg-dark text-white" >
                  <th>S.No</th>
                  <th>Billing Month</th>
                  <th>Last Reading</th>
                  <th>New Reading</th>
                  <th>Consumed Unit</th>
                  <th>Amount</th>
                  <th>Payment Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $ct=0;
                $i=1; foreach($mes as $r):?>
                <tr>
                  <td><?php echo $i++;?></td>
                  <td><?php echo $r['reading_date'];?></td>
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
                          echo "<td>Paid</td>";
                          break;
                        
                        default:
                          echo "<td>Not Paid</td>";
                          break;
                      } ?>
                </tr>
                <?php endforeach; ?>
                <tr class="bg-info">
                  <th colspan="4">Total Unit Consumed Till</th>
                  <th colspan="3"><?php echo $ct;?></th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

<?php else: ?>
  <div class="col-lg-4" style="float: left; margin-top: 20; margin-left: 30%;">
          <div class="card mb-3">
            <div class="list-group list-group-flush small list-group-item list-group-item-action text-muted text-center">
            <?php
          echo "No Record Found....!";
          ?>
       </div>
    </div>
</div>
</div>
</div>
<?php
endif;
endif;?>
</section>
<?php include_once("includes/hpfooter.php");?>
<?php include_once("includes/jqueryFile.php");?>
<!--  <div><a href="javascript:void(0)" id="export-to-excel">Export to excel</a></div>
 <form action="<?php //echo $_SERVER["PHP_SELF"]; ?>" method="post" id="export-form">
  <input type="hidden" value='' id='hidden-type' name='ExportType'/>
   </form>


if(isset($_POST["ExportType"]))
{
   
    switch($_POST["ExportType"])
    {
        case "export-to-excel" :
            // Submission from
      $filename = $_POST["ExportType"] . ".xls";     
            header("Content-Type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename=\"$filename\"");
      ExportFile($data);
      //$_POST["ExportType"] = '';
            exit();
        default :
            die("Unknown action : ".$_POST["action"]);
            break;
    }
}
function ExportFile($records) {
  $heading = false;
    if(!empty($records))
      foreach($records as $row) {
      if(!$heading) {
        // display field/column names as a first row
        echo implode("\t", array_keys($row)) . "\n";
        $heading = true;
      }
      echo implode("\t", array_values($row)) . "\n";
      }
    exit;
}

 ?>  
<script  type="text/javascript">
$(document).ready(function() {
jQuery('#Export to excel').bind("click", function() {
var target = $(this).attr('id');
switch(target) {
 case 'export-to-excel' :
 $('#hidden-type').val(target);
 //alert($('#hidden-type').val());
 $('#export-form').submit();
 $('#hidden-type').val('');
 break
}
});
    });
</script> 
    -->