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
     <h4> Area Wise Electricity Consumption Chart</h4>
    </div>
<?php include_once("includes/jqueryFile.php"); ?>
<script src="<?php //echo base_url('asset/jQuery/jquery.min.js')?>" ></script>



  <script  type="text/javascript">


$(document).ready(function(){
  $.ajax({
   //url: "http://[::1]/my_fyp/index.php/adminController/graphConsunedU",
     url: "http://[::1]/testGraph/area_wise_unit_consumption.php",
    //url: "http://localhost/my_fyp/asset/graph/data.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var consumedU = [];
      var area_name = [];

      for(var i in data) {
        consumedU.push(" " + data[i].consumedU);
        area_name.push(data[i].area_name);
      }

      var chartdata = {
        labels: area_name,
        datasets : [
          {
            label: 'Consumed Unit',
            backgroundColor: 'rgba(200, 100, 50, 0.75)',
            borderColor: 'rgba(200, 100, 50, 0.75)',
            hoverBackgroundColor: 'rgba(250, 200, 200, 1)',
            hoverBorderColor: 'rgba(250, 200, 200, 1)',
            data: consumedU
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
