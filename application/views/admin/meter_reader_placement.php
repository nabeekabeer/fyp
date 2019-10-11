<!DOCTYPE html>
<html lang="en">
<head>
<title>Meter Reader Placement</title>
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
           <?php echo @$mge; ?>
          </div>
        <div class="container col-md-12"  >
        <div class="card-header text-center "><h3 class="fa fa-map"> Meter Reader Placement</h3></div>
          <?php echo form_open('myController/add_meter_reader_placement'); ?>
           <div class="form-row">
                <div class="col-md-6">
                  <div class="input-group">
                  <select name="area_id" required="true" class="form-control">
                    <option value="">--Select Area--</option>
                    <?php if (isset($area_detail)) {
                      foreach ($area_detail as $value) {
                       echo "<option value=".$value['area_id'].">".$value['area_name']."</option>";
                      }
                    } ?>
                  </select>
                  
              </div>
             </div>
             <div class="col-md-6">
                  <div class="input-group">
                  <select name="emp_id" required="true" class="form-control">
                    <option value="">--Select Meter Reader--</option>
                    <?php if (isset($meter_reasers)) {
                      foreach ($meter_reasers as $v) {
                       echo "<option value=".$v['emp_id'].">".$v['emp_fname'].' '.$v['emp_lname'].' '.$v['emp_number']."</option>";
                      }
                    } ?>
                  </select>
                  
              </div>
             </div>
           </div>
           <div class="form-row" style="margin-top: 2%;">
                <div class="col-md-6">
                  <div class="input-group">
                  <input type="text" name="asign_role" placeholder="asign role" class="form-control" required="true">
                  
              </div>
             </div>
             <div class="col-md-6">
                  <div class="input-group">
                  <input type="date" name="asign_date" required="true" class="form-control">                  
              </div>
             </div>
           </div>
           <div class="form-row" style="float: right; margin:2%;">
            <div class="col-md-12">
                  <div class="input-group" >
                      <input type="submit" name="save_placement" value="SAVE" class="btn btn-success">
                    </div>
                  </div>
           </div>
           <?php  echo form_close();?><hr>
       </div>
       <?php if($meterReaderList!=0): ?>
      <div style="margin-top: 5%;">
            <input type="button" onclick="tableToExcel('testTable', 'Connection Detail')" value="Export to Excel">
           <!--  <input type="button" id='printBtn' onclick="printDiv(divName)"  value='print'> -->
          </div>
      <div class="card mb-3 mt-4" id="testTable"  >
        <div class="card-header" >
          <i class="fa fa-table"></i> &nbsp;<strong>Meter Reader List</strong></div>
        <div class="card-body">
          <div class="table-responsive" id="divName"><!-- id="testTable" -->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="3">
              <thead class="">
                <tr>
                  <th>S.No</th>
                  <th>Meter Reader Name</th>
                  <th>Employee Number</th>
                  <th>Area</th>
                  <th>Asign Date</th>
                  <th>Action</th>
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
                  <td><?php  $id=$v['emp_area_asign_id'];
                  echo anchor("myController/editAsignedMeterReader/$id",'Edit',['class'=>'btn btn-primary btn-sm']);?> &nbsp;
                  <?php  echo anchor("myController/deleteAsignedMeterReader/$id",'Delete',['class'=>'btn btn-danger btn-sm']);?>
                  </td>      
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