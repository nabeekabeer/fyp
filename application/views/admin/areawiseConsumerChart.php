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
     <h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Area Wise Consumer Count Chart</h4>
    </div>
<?php include_once("includes/jqueryFile.php"); ?>
<script src="<?php //echo base_url('asset/jQuery/jquery.min.js')?>" ></script>



  <script  type="text/javascript">


$(document).ready(function(){
  $.ajax({
   //url: "http://[::1]/my_fyp/index.php/adminController/graphConsunedU",
     url: "http://[::1]/testGraph/area_wise_consumer.php",
    //url: "http://localhost/my_fyp/asset/graph/data.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var Area = [];
      var no_of_consumer = [];

      for(var i in data) {
        Area.push(" " + data[i].area_name);
        no_of_consumer.push(data[i].total_consumer);
      }

      var chartdata = {
        labels: Area,
        datasets : [
          {
            label: 'No of Consumer ',
            backgroundColor: 'rgba(120, 130, 130, 0.75)',
            borderColor: 'rgba(120, 130, 192, 0.75)',
            hoverBackgroundColor: 'rgba(150, 200, 200, 1)',
            hoverBorderColor: 'rgba(150, 200, 200, 1)',
            data: no_of_consumer
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
