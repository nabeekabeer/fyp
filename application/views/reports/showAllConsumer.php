<!DOCTYPE html>
<html lang="en">
<head>
<title>All Consumer</title>
<?php include_once("htmlFile.php");
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
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php include_once("header.php") ?>
<?php include_once("footer.php") ?>
      

      <div class="content-wrapper" id="table_cons">
    <div class="container-fluid" >
      <div >
            <input type="button" onclick="tableToExcel('testTable', 'Connection Detail')" value="Export to Excel">
            <!-- <input type="button" id='printBtn' onclick="printDiv(divName)"  value='print'> -->
          </div>
      <div class="card mb-3 mt-4"  style="border: 1px solid;" >
        <div class="card-header">
          <i class="fa fa-table"></i> &nbsp;<strong>Consumer Details </strong> 
          <div style="float: right;"><strong>Total No.of Consumer (<?php echo @$total_connection;?>)</strong></div></div>
        <div class="card-body">
          <div class="table-responsive" id="divName"><!-- id="testTable" -->
            <table class="table table-bordered" id="testTable" width="100%" cellspacing="0">
              <thead class="bg-dark text-white">
                <tr>
                  <th>S.No</th>
                  <th>Consumer Old #</th>
                  <th>Consumer New #</th>
                  <th>Name</th>
                  <!-- <th>F/H Name</th>
                  <th>Gender</th>
                  <th>Date Of Birth</th> -->
                  <th>CNIC</th>
                 <!-- <th>Phone</th>
                  <th>Cell Number</th>
                  <th>Email</th>
                  <th>Current Address</th>
                  <th>Permanent Address</th> -->
                  <th>Meter Number</th>
                  <th>Connection Date</th>
                  <th>Connection Type</th>
                  <th>Connection Area</th>
                  <th>Connection Status</th>
                </tr>
              </thead>
              <!-- <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Consumer Old Number</th>
                  <th>Consumer New Number</th>
                  <th>Consumer Name</th>
                   <th>F/H Name</th>
                  <th>Gender</th>
                  <th>Date Of Birth</th> 
                  <th>CNIC</th>
                  <th>Phone</th>
                  <th>Cell Number</th>
                  <th>Email</th>
                  <th>Current Address</th>
                  <th>Permanent Address</th>
                  <th>Meter Number</th>
                  <th>Connection Date</th>
                  <th>Connection Type</th>
                  <th>Connection Area</th>
                  <th>Connection Status</th>
                </tr>
              </tfoot> -->
              <tbody>
                <?php $i=1; if (isset($connection_detail)): foreach($connection_detail as $v): ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $v['con_consumer_old_no'];?></td>
                  <td><?php echo $v['con_consumer_new_no'];?></td>
                  <td><?php echo $v['cons_fname']." ".$v['cons_lname'];?></td>
                  <!-- <td><?php //echo $v['cons_father_name'];?></td>
                  <td><?php //echo $v['cons_gender'];?></td>
                  <td><?php //echo $v['cons_dob'];?></td> -->
                  <td><?php echo $v['cons_cnic'];?></td>
                 <!-- <td><?php //echo $v['cons_phone_number'];?></td>
                  <td><?php //echo $v['cons_cell_number'];?></td>
                  <td><?php //echo $v['cons_email'];?></td>
                  <td><?php //echo $v['cons_current_address'];?></td>
                  <td><?php //echo $v['cons_permanent_address'];?></td> -->
                  <td><?php echo $v['con_meter_number'];?></td>
                  <td><?php echo $v['con_date'];?></td>
                  <td><?php echo $v['con_type_name'];?></td>
                  <td><?php echo $v['area_name'];?></td>
                  <?php 
                      switch ($v['con_status']) {
                        case '1':
                          echo "<td class='text-danger'>Closed</td>";
                          break;
                        
                        default:
                          echo "<td class='text-success'>Active</td>";
                          break;
                      }
                   ?>
                  
                </tr>
              <?php endforeach; endif; ?>
              </tbody>
            </table>
          </div>
        </div>
       <!--  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
      </div>
    

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
  <?php include_once("jqueryFile.php") ?>
</body>
</html>