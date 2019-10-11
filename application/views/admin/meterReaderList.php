<!DOCTYPE html>
<html lang="en">
<head>
<title>Meter Reader List</title>
<?php include_once("includes/htmlFile.php");
//Ul7fw5B9y4 ?>
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
<script src="<?php echo base_url('asset/jQuery/jquery.min.js')?>" ></script>
  <script  type="text/javascript">
$.noConflict();
 (function($){
$(document).ready(function(){
$('#closeBtn').click(function(){
  $('#card-header-msg').hide();
});
});
})(jQuery);</script>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php include_once("header.php") ?>
<?php include_once("footer.php") ?>
      <div class="content-wrapper" >
        <div class="container-fluid" >
          <div class="card mb-3 mt-4" >
           
       <?php if($meterReaderList!=0): ?>
      <div style="margin-top: 5%;">
            <input type="button" onclick="tableToExcel('testTable', 'Connection Detail')" value="Download">
            <!-- <input type="button" id='printBtn' onclick="printDiv(divName)"  value='print'> -->
          </div>
      <div class="card mb-3 mt-4"   >
        <div class="card-header" >
          <i class="fa fa-table"></i> &nbsp;<strong>Meter Reader List </strong>
        <div style="float: right;"><strong>Total No.of Meter Reader (<?php echo @$no_of_meterReader;?>)</strong></div>
      </div>
        <div class="card-body">
          <div class="table-responsive" id="divName"><!-- id="testTable" -->
            <table class="table table-bordered" id="testTable"  width="100%" cellspacing="3">
              <thead class="">
                <tr>
                  <th>S.No</th>
                  <th>Meter Reader Name</th>
                  <th>Employee Number</th>
                  <th>Area</th>
                  <th>Asign Date</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; if (isset($meterReaderList)): foreach($meterReaderList as $v): ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $v['emp_fname'].' '.$v['emp_lname'];?></td>
                  <td><?php echo $v['emp_number'];?></td>
                  <td><?php  echo $v['area_name']; ?></td> 
                  <td><?php echo $v['asign_date'];?></td>   
                      
                </tr>
              <?php endforeach; endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div><?php endif; ?>
    </div>
  </div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
  <?php include_once("includes/jqueryFile.php") ?>
</body>
</html>