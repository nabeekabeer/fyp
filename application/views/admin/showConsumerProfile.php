  <!DOCTYPE html>
<html lang="en">
<?php //session_start();?>
<head>
  <title><?php echo $consumer_detail[0]['cons_fname'].' '.$consumer_detail[0]['cons_lname'];?></title>
  <?php include_once("includes/htmlFile.php"); ?>
</head>
<body class="fixed-nav sticky-footer" id="page-top">
  <?php require 'header.php'; ?>
  <?php require 'footer.php'; ?>
<div class="content-wrapper">
 <div class="container-fluid">


<?php 
foreach($consumer_detail as $v):
 ?>
 <div class="col-lg-6 center" >
          <div class="card mb-8" style="border: 1px solid; box-shadow: 5px 5px #888888;">
            <div class="card-header">
              <i class="fa fa-user"></i> &nbsp;&nbsp;&nbsp; <strong>Consumer Profile</strong><div style="float: right;"><?php
                       echo anchor("myController/editConsumerDetail","go back",['class'=>'btn btn-success btn-sm ']);  ?></div></div>
            <div class="list-group list-group-flush large list-group-item list-group-item-action">
                    <table>
                      <tr>
                        <td>Name &nbsp;&nbsp;&nbsp;</td>
                        <td>
                          <strong><?php echo strtoupper($v['cons_fname'].' '.$v['cons_lname']);?></strong>
                        </td>
                      </tr>
                    <tr>
                      <td>F/H Name &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $v['cons_father_name'];?></strong>
                      </td>
                    </tr>
                    <tr>
                      <td>Gender &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $v['cons_gender'];?></strong>
                      </td>
                    </tr>
                    <tr>
                      <td>CNIC &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $v['cons_cnic'];?></strong>
                      </td>
                    </tr>
                    <tr>
                      <td>DOB &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $v['cons_dob'];?></strong>
                      </td>
                    </tr>
                     <tr>
                      <td>Current Address &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $v['cons_current_address'];?></strong>
                      </td>
                    </tr>
                     <tr>
                      <td>Permanent Address &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $v['cons_permanent_address'];?></strong>
                      </td>
                    </tr> 
                     <tr>
                      <td>Phone Number &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $v['cons_phone_number'];?></strong>
                      </td>
                    </tr>
                    <tr>
                      <td>Cell Number &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $v['cons_cell_number'];?></strong>
                      </td>
                    </tr>
                    <tr>
                      <td>Email &nbsp;&nbsp;&nbsp;</td>
                      <td>
                        <strong><?php echo $v['cons_email'];?></strong>
                      </td>
                    </tr>
                  </table>
                  </div>
                </div>
            </div>        
    <?php endforeach; ?>
     </div>
  </div>
  <?php include_once("includes/jqueryFile.php"); ?>
</body>
</html>