
<html>
<head><title>complaints</title>
  <?php include_once("includes/htmlFile.php"); ?>
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
      <div style="margin-top: 100;">
      <center>
        <?php echo @$mge; ?>
      <div class="header" style="margin-top: 30;">
          <strong>
            Complain details
          </strong>
      </div>
      </center>
       
      
<div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" >
          <tr id="header">
            <th>C.No</th>
            <th>Consumer New Number</th>
            <th>Consumer Name</th>
            <th>CNIC</th>
            <th>Complaint</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
      <?php
         if (isset($complaints)): foreach ($complaints as $row):
          ?>
    
        <tr>
          <td><span><?php echo $row["comp_id"]; ?></span></td>
          <td><span><?php echo $row["con_consumer_new_no"]; ?></span></td>
          <td><span><?php echo $row["cons_fname"].' '.$row['cons_lname']; ?></span></td>
          <td><span><?php echo $row["cons_cnic"]; ?></span></td>
          <td><span><?php echo $row["comp_message"]; ?></span></td>
          <td><span><a href="mailto:"><?php echo $row["comp_email"];?></a></span></td>
          <td><span>
                 <?php $id=$row["comp_id"]; 
                   echo anchor("myController/deleteComplaint/$id","Delete",['class'=>'btn btn-danger btn-sm','onclick'=>'confirmIt()']);  ?>
                       
              </span>
          </td>
        </tr>
      <?php endforeach; endif; ?>
      </table>
      <div class="refresh">
      <button onclick="refreshPage()">Refresh</button>
      </div>
     </div>
    </div>
  </div>
</body>
</html>
<?php include_once("includes/jqueryFile.php"); ?>