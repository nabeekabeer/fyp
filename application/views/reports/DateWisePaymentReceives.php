<!DOCTYPE html>
<html lang="en">
<?php //session_start();?>
<head>
  <title>Date Wise Payment Search</title>

<style type="text/css">
  div#norecord{
margin-top:20%;
background: #e0ffc1;
width:40%;
height: 20%;
color: #008000;
text-align: center;
margin-left: auto;
margin-right: auto;
}
</style>

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
$('#closeBtn').click(function(){
  $('#card-header-msg').hide();
});
    
});
})(jQuery);
</script>
  <?php include_once("htmlFile.php"); ?>
  <?php //include_once("./home.php");?>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <?php require 'header.php'; ?>
  <?php require 'footer.php'; ?>
   <div class="content-wrapper">
    <div class="container-fluid">
       <div class="container col-md-6" style="border: 1px solid;" >
        <div class="card-header text-center "><h3 class="fa fa-map"> Select Date</h3></div>
          <?php echo form_open('myController/DateWisePaymentSearch'); ?>
                <div class="col-md-12">
                  <div class="input-group">
                  <span><b>From :</b> &nbsp;&nbsp;</span>
                  <input type="date" class="form-control" required="true" name="from_date" >&nbsp;&nbsp;
                  <b>To :</b>&nbsp;&nbsp;<input type="date" class="form-control" required="true" name="to_date">
                  <input type="submit" name="sub" value="search">
              </div>
              <br><span class="input-group-btn" id="spanbtn"></span>
                </div>
           <?php  echo form_close();?><hr>
       </div>
    	<?php if (isset($paid_bills_detail)) {
        if ($paid_bills_detail!=0):?>
    <div >
            <input type="button" onclick="tableToExcel('testTable', 'Connection Detail')" value="Export to Excel">
            <!-- <input type="button" id='printBtn' onclick="printDiv(divName)"  value='print'> -->
          </div>
    <div class="card mb-3 mt-4" id="table_cons" style="border: 1px solid; ">
        <div class="card-header">
          <i class="fa fa-table"></i> &nbsp;&nbsp;&nbsp;
            <strong> Paid Bills Detail</strong>
           <div style="float: right;"> <?php echo date('d-m-Y'); ?></div>
         </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">  
              <thead class="btn-dark">
                <tr>
                  <th>S.No</th>
                  <th>Consumer Name</th>
                  <th>Consumer Number</th>
                  <th>Bill Number</th>
                  <th>Received Amount</th> 
                  <th>Payment Date</th>
                </tr>
              </thead>
             
              <tbody>
                <?php $total_amount=0; $i=1; if (isset($paid_bills_detail)): foreach($paid_bills_detail as $v): ?>
                <tr>
                	
                  <td><?php echo $i++; ?></td>
                  <td><?php echo strtoupper($v['cons_fname']." ".$v['cons_lname']);?></td>
                  <td><?php echo $v['con_consumer_new_no'];?></td> 
                  <td><?php echo $v['bill_no'];?></td> 
                  <td><?php echo $v['paid_amount']; 
                  $total_amount+= $v['paid_amount']; 
                  ?></td>
                  <td><?php echo $v['payment_date'];?></td>
                <tr>
              <?php endforeach; endif; ?>
              <tr class="bg-dark text-white">
                <td colspan="4"><strong>Total Amount Received</strong></td>
                <td colspan="2"><strong><?php echo $total_amount; ?></strong></td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
   <?php else: ?>
    <div id="norecord">
          No Record Found
      </div>
    <?php endif; } ?>
   </div>
  </div>
</body>
<?php include_once("jqueryFile.php"); ?>
</html>