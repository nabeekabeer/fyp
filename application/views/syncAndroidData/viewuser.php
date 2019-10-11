<?php 
//SELECT * FROM `reading_history_table` WHERE `rh_billing_month`<='02/2018' ORDER BY `conn_rhistory_id` ASC
//
     function getAllReading(){
         $con = mysqli_connect('localhost', 'root', '');

          $db = mysqli_select_db($con,'fyp');
          $sql = "SELECT * FROM `reading_table` inner join connection_table on `reading_conn_id`=connection_id WHERE payment_status='0'";
          $result = mysqli_query($con,$sql);
          return $result;
    }
 ?>
<html>
<head><title>View Reading List</title>
  <?php include_once("htmlFile.php"); ?>
  <?php require 'header.php'; ?>
  <?php require 'footer.php'; ?>
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
<style>
body {
  font: normal medium/1.4 sans-serif;
}

tr > td {
  padding: 0.25rem;
  text-align: center;
  border: 1px solid #ccc;
}
tr:nth-child(even) {
  background: #FAE1EE;
}
tr:nth-child(odd) {
  background: #edd3ff;
}
tr#header{
background: #c1e2ff;
}
div.header{
padding: 10px;
background: #e0ffc1;
width:40%;
color: #008000;
margin:5px;
}
div.refresh{
margin-top:10px;
width: 5%;
margin-left: auto;
margin-right: auto;
}
div#norecord{
margin-top:10px;
width: 15%;
margin-left: auto;
margin-right: auto;
}
</style>
<script>
function confirmIt(){
   var c=confirm('do you want to delete this?');
   if (c) {
    return true;
   }
   else{
    return false;
   }
  }
function refreshPage(){
location.reload();
}
</script>
</head>
<body>
   <div class="content-wrapper">
    <div class="container-fluid">

      <div style="margin-top: 100; border: 1px solid; ">
        <?php echo @$mge; ?>
      <center>
      <div class="header">
          <strong>
            Reading List
          </strong>
      </div>
      </center>
      <?php

          $readings = getAllReading();
          if ($readings != false)
              $no_of_readings = mysqli_num_rows($readings);
          else
              $no_of_readings = 0;
      ?>
      <?php
          if ($no_of_readings > 0) {
      ?>
       
      
<div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" >
          <tr id="header">
            <th>Bill No</th>
            <th>Consumer New Number</th>
            <th>Last Reading</th>
            <th>New Reading</th>
            <th>Unit Consumed</th>
            <th>Action</th>
          </tr>
      <?php $TotalUnit=0;
          while ($row = mysqli_fetch_array($readings)) {
      ?> 
        <tr>
          <td><span><?php echo $row["bill_number"]; ?></span></td>
          <td><span><?php echo $row["con_consumer_new_no"]; ?></span></td>
          <td><span><?php echo $row["last_reading"]; ?></span></td>
          <td><span><?php echo $row["new_reading"]; ?></span></td>
          <td><span><?php 
                  $TotalUnit=$TotalUnit+($row["new_reading"]- $row["last_reading"]);
                  echo $row["new_reading"]- $row["last_reading"];
                   ?></span></td>
          <td><span>
                 <?php $id=$row["reading_id"]; 
                      echo anchor("billController/editBill/$id","Edit",['class'=>'btn btn-primary btn-sm']);?>
                      &nbsp;
                      <?php
                       //echo anchor("billController/deleteBill/$id","Delete",['class'=>'btn btn-danger btn-sm','onclick'=>'confirmIt()']);  ?>
                        &nbsp;<?php
                       echo anchor("billController/viewBill/$id","View Bill",['class'=>'btn btn-success btn-sm', 'target'=>'blank']);
                       //echo anchor("billController/viewBill/$id","Print Bill",['class'=>'btn btn-success btn-sm', 'target'=>'blank']);  ?>
              </span>
          </td>
        </tr>
      <?php } ?>
      <tfoot><tr><th class="text-right" colspan="4">Total Consumed Unit</th>
                <th colspan="2" style=""><?php echo @$TotalUnit ; ?></th></tr></tfoot>
      </table>
      <?php }else{ ?>
      <div id="norecord">
          No Record Found
      </div>
      <?php } ?>
      <div class="refresh">
      <button onclick="refreshPage()">Refresh</button>
      </div>
     </div>
    </div>
  </div>
</body>
</html>
<?php include_once("jqueryFile.php"); ?>