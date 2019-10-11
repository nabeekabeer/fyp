<!DOCTYPE html>
<html lang="en">
<?php //session_start();?>
<head>
  <title>modify consumer detail</title>
  <script src="<?php echo base_url('asset/jQuery/jquery.min.js')?>" ></script>


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
  <?php include_once("includes/htmlFile.php"); ?>
  <?php //include_once("./home.php");?>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <?php require 'header.php'; ?>
  <?php require 'footer.php'; ?>
   <div class="content-wrapper">
    <div class="container-fluid">
    	<?php echo @$mge;?>
    
    <div class="card mb-3 mt-4" id="table_cons" style="border: 1px solid; ">
        <div class="card-header">
          <i class="fa fa-table"></i> &nbsp;&nbsp;&nbsp; Employees Detail</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="btn-dark">
                <tr>
                  
                  <th>S.No</th>
                  <th>Name</th>
                  <!-- <th>F/H Name</th> -->
                  <th>Employee Number</th>
                  <th>DOB</th> 
                  <th>CNIC</th>
                  <th>Phone</th>
                 <!--  <th>Cell Number</th> -->
                  <th>Email</th>
                  <!-- <th>Current Address</th> -->
                 <!--  <th>Permanent Address</th> -->
                 <th>Action</th>
                </tr>
              </thead>
             
              <tbody>
                <?php $i=1; if (isset($employees_detail)): foreach($employees_detail as $v): ?>
                <tr>
                	
                  <td><?php echo $i++; ?></td>
                  <td><?php echo strtoupper($v['emp_fname']." ".$v['emp_lname']);?></td>
                  <td><?php echo $v['emp_number'];?></td> 
                  <!-- <td><?php //echo $v['cons_father_name'];?></td>
                  <td><?php //echo $v['cons_gender'];?></td>-->
                  <td><?php echo $v['emp_dob'];?></td> 
                  <td><?php echo $v['emp_cnic'];?></td>
                  <td><?php echo $v['emp_phone_no'];?></td>
                   <!-- <td><?php //echo $v['cons_cell_number'];?></td> -->
                   <td><?php echo $v['emp_email'];?></td>
                  <!-- <td><?php echo $v['emp_current_add'];?></td> -->
                  <!-- <td><?php //echo $v['cons_permanent_address'];?></td> -->
                  <td>
                        <?php 
                        $id=$v['emp_id'];
                        echo anchor("myController/updateEmpDetail/$id","Edit",['class'=>'btn btn-primary btn-sm']); ?>
                          <?php //myController/deleteConsumer/$id 
                          //echo anchor("myController/editConsumerDetail/#",'Delete',['class'=>'btn btn-danger btn-sm']);?>
                      </td>
                </tr>
              <?php endforeach; endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
   
   </div>
  </div>
</body>
<?php include_once("includes/jqueryFile.php"); ?>
</html>