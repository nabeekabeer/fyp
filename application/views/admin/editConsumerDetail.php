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
    <!-- <div class="container" id="search_consumer">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header"><h3>Search Consumer Detail</h3></div>
        <div class="card-body">

        </div>
      </div>
    </div> -->
    <div class="card mb-3 mt-4" id="table_cons" style="border: 1px solid;">
        <div class="card-header">
          <i class="fa fa-table"></i> &nbsp;&nbsp;&nbsp; Consumers Detail</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="btn-dark">
                <tr>
                  
                  <th>S.No</th>
                  <th>Name</th>
                  <!-- <th>F/H Name</th> -->
                  <!-- <th>Gender</th>
                  <th>DOB</th> -->
                  <th>CNIC</th>
                  <th>Phone</th>
                 <!--  <th>Cell Number</th> -->
                <!--   <th>Email</th> -->
                  <th>Current Address</th>
                 <!--  <th>Permanent Address</th> -->
                 <th>Action</th>
                </tr>
              </thead>
              <!-- <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>F/H Name</th>
                  <th>Gender</th>
                  <th>Date Of Birth</th>
                  <th>CNIC</th>
                  <th>Phone</th>
                  <th>Cell Number</th>
                  <th>Email</th>
                  <th>Current Address</th>
                  <th>Permanent Address</th>
                </tr>
              </tfoot> -->
              <tbody>
                <?php $i=1; if (isset($consumer_detail)): foreach($consumer_detail as $v): ?>
                <tr>
                	
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $v['cons_fname']." ".$v['cons_lname'];?></td>
                  <!-- <td><?php //echo $v['cons_lname'];?></td> -->
                  <!-- <td><?php //echo $v['cons_father_name'];?></td>
                  <td><?php //echo $v['cons_gender'];?></td>
                  <td><?php //echo $v['cons_dob'];?></td> -->
                  <td><?php echo $v['cons_cnic'];?></td>
                  <td><?php echo $v['cons_phone_number'];?></td>
                   <!-- <td><?php //echo $v['cons_cell_number'];?></td> -->
                  <!-- <td><?php //echo $v['cons_email'];?></td> -->
                  <td><?php echo $v['cons_current_address'];?></td>
                  <!-- <td><?php //echo $v['cons_permanent_address'];?></td> -->
                  <td>
                        <?php 
                        $id=$v['consumer_id'];
                        echo anchor("myController/updateConsumerDetail?edit_id=$id","Edit",['class'=>'btn btn-primary btn-sm']); ?>
                          <?php //myController/deleteConsumer/$id 
                          //echo anchor("myController/editConsumerDetail/#",'Delete',['class'=>'btn btn-danger btn-sm']);?>&nbsp;<?php
                          echo anchor("myController/viewConsumerDetail/$id","View Detail",['class'=>'btn btn-success btn-sm', 'target'=>'blank']);?>
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