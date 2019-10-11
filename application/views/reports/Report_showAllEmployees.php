<!DOCTYPE html>
<html lang="en">
<head>
<title>Defaulter List</title>
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
      <div class="content-wrapper" >
        <div class="container-fluid" >
          <?php if($employees_detail!=0): ?>
      <div >
            <input type="button" onclick="tableToExcel('testTable', 'Connection Detail')" value="Export to Excel">
            <!-- <input type="button" id='printBtn' onclick="printDiv(divName)"  value='print'> -->
          </div>
      <div class="card mb-3 mt-4" id="table_cons" style="border: 1px solid; ">
        <div class="card-header">
          <i class="fa fa-table"></i> &nbsp;&nbsp;&nbsp; Employees Detail
        <div style="float: right;"><strong>Total No.of Employee (<?php echo @$no_of_emp;?>)</strong></div>
      </div>
        <div class="card-body">
          <div class="table-responsive" id="testTable">
            <table class="table table-bordered"  width="100%" cellspacing="0">
              <thead class="btn-dark">
                <tr>
                  
                  <th>S.No</th>
                  <th>Name</th>
                  <th>F/H Name</th>
                  <th>Employee Number</th>
                  <th>DOB</th> 
                  <th>CNIC</th>
                  <th>Phone</th>
                 <!--  <th>Cell Number</th> -->
                  <th>Email</th>
                  <!-- <th>Current Address</th> -->
                 <!--  <th>Permanent Address</th> -->
                 <!-- <th>Action</th> -->
                </tr>
              </thead>
             
              <tbody>
                <?php $i=1; if (isset($employees_detail)): foreach($employees_detail as $v): ?>
                <tr>
                  
                  <td><?php echo $i++; ?></td>
                  <td><?php echo strtoupper($v['emp_fname']." ".$v['emp_lname']);?></td>
                  <td><?php echo $v['emp_father_name'];?></td>
                  <td><?php echo $v['emp_number'];?></td> 
                  <!--<td><?php //echo $v['cons_gender'];?></td>-->
                  <td><?php echo $v['emp_dob'];?></td> 
                  <td><?php echo $v['emp_cnic'];?></td>
                  <td><?php echo $v['emp_phone_no'];?></td>
                   <!-- <td><?php //echo $v['cons_cell_number'];?></td> -->
                   <td><a href="mailto:<?php echo $v['emp_email'];?>"><?php echo $v['emp_email']; ?></a>
                   </td>
              </tr>
              <?php endforeach; endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <?php else: ?>
       <div id="norecord">
          No Record Found
      </div>
    <?php endif; ?>
    </div>
  </div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
  <?php include_once("jqueryFile.php") ?>
</body>
</html>