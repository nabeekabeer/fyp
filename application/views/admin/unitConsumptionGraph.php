<!DOCTYPE html>
<html lang="en">
<?php //session_start();?>
<head>
  <title>unitConsumptionGraph</title>
  
  <?php include_once("includes/htmlFile.php"); ?>
  <?php //include_once("./home.php");?>
  <style type="text/css">
      #chart-container {
        width: 640px;
        height: auto;
      }
    </style>
</head>
<body >
  <?php require 'header.php'; ?>
  <?php require 'footer.php'; ?>
   
<?php //print json_encode($mess);
?><div class="content-wrapper">
 <div class="container-fluid">

    <div style="margin-top: 10%;">
      <?php //print_r(@$mess);
 ?>
    <div id="chart-container">
      <canvas id="mycanvasName"></canvas>
    </div>
    <div id="chart-container">
     <h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Consumer Wise Electricity Consumption Chart</h4>
    </div>
<?php include_once("includes/jqueryFile.php"); ?>
<script src="<?php //echo base_url('asset/jQuery/jquery.min.js')?>" ></script>



  <script  type="text/javascript">


$(document).ready(function(){
  $.ajax({
   //url: "http://[::1]/my_fyp/index.php/adminController/graphConsunedU",
     url: "http://[::1]/testGraph/data.php",
    //url: "http://localhost/my_fyp/asset/graph/data.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var Consumer = [];
      var Reading = [];

      for(var i in data) {
        Consumer.push(" " + data[i].con_consumer_new_no);
        Reading.push(data[i].new_reading);
      }

      var chartdata = {
        labels: Consumer,
        datasets : [
          {
            label: 'Consumed Unit',
            backgroundColor: 'rgba(30, 130, 130, 0.75)',
            borderColor: 'rgba(10, 130, 192, 0.75)',
            hoverBackgroundColor: 'rgba(250, 200, 200, 1)',
            hoverBorderColor: 'rgba(250, 200, 200, 1)',
            data: Reading
          }
        ]
      };

      var ctx = $("#mycanvasName");

      var barGraph = new Chart(ctx, {
        type: 'bar',
        data: chartdata
      });
    },
    error: function(data) {
      console.log(data);
    }
  });
});

</script>
</body>
</html>
