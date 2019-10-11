<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reports</title>
  <?php include_once("includes/htmlFile.php") ?>
 
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <?php include_once("header.php") ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Reports <?php //unset($_SESSION['cons_cnic']);
        // echo @$_SESSION['cons_cnic'];?></li>
      </ol>
      <h1>Reports</h1>
      <hr style="color: green;">
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5 "><h4>Total No.of Consumer is</h4> <h3><?php echo @$total_connection;?></h3></div>
            </div>
            <!-- <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a> -->
             <?= anchor("myController/showAllConsumers","<span class='float-left'>View Details</span>
              <span class='float-right'>
                <i class='fa fa-angle-right'></i>
              </span>",['class'=>'card-footer text-white clearfix small z-1']); ?> 
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-bar-chart"></i>
              </div>
              <div class="mr-5 text-white"><h4>Defualter List</h4></div>
            </div>
             <?= anchor("myController/defualterList","<span class='float-left'>View</span>
              <span class='float-right'>
                <i class='fa fa-angle-right'></i>
              </span>",['class'=>'card-footer text-white clearfix small z-1']); ?>
            </div>
        </div>
      
        <div class="col-xl-3 col-sm-6">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5 text-white"><h4>Area wise Bill</h4></div>
            </div>
             <?= anchor("myController/areaWiseBillReport","<span class='float-left'>View Details</span>
              <span class='float-right'>
                <i class='fa fa-angle-right'></i>
              </span>",['class'=>'card-footer text-white clearfix small z-1']); ?>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5 text-white"><h4>Total No Connection Closed Consumer </h4><h3><?php echo @$total_connection_closed;?></h3></div>
            </div>
             <?= anchor("myController/connectionClosed","<span class='float-left'>View Details</span>
              <span class='float-right'>
                <i class='fa fa-angle-right'></i>
              </span>",['class'=>'card-footer text-white clearfix small z-1']); ?>
            </div>
        </div>
      </div>
      <div class="row" style="margin-top: 5%;">
        <div class="col-xl-3 col-sm-6">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-area-chart"></i>
              </div>
              <div class="mr-5"><h5>Consumer wise Electricity Consumption</h5></div>
            </div>
            <?= anchor("myController/unitConsumptionGraph","<span class='float-left'>View Details</span>
              <span class='float-right'>
                <i class='fa fa-angle-right'></i>
              </span>",['class'=>'card-footer text-white clearfix small z-1']); ?>
            
          </div>
        </div>
       <!--  <div class="col-xl-3 col-sm-6">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-bar-chart"></i>
              </div>
              <div class="mr-5 text-white"><h4>Employees Detail</h4></div>
            </div>
             <?= anchor("myController/showEmployeesReports","<span class='float-left'>View</span>
              <span class='float-right'>
                <i class='fa fa-angle-right'></i>
              </span>",['class'=>'card-footer text-white clearfix small z-1']); ?>
            </div>
        </div> -->
         <div class="col-xl-3 col-sm-6">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-bar-chart"></i>
              </div>
              <div class="mr-5 text-white"><h4>Meter Reader List</h4></div>
            </div>
             <?= anchor("myController/meterReaderList","<span class='float-left'>View</span>
              <span class='float-right'>
                <i class='fa fa-angle-right'></i>
              </span>",['class'=>'card-footer text-white clearfix small z-1']); ?>
            </div>
        </div>
       <!--  <div class="col-xl-3 col-sm-6">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">Dead Meters</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> -->
      
        <div class="col-xl-3 col-sm-6">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-newspaper-o"></i>
              </div>
              <div class="mr-5 "><h4>Date wise Payment Receives</h4></div>
            </div>
            <!-- <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a> -->
             <?= anchor("myController/dateWisePaymentReceives","<span class='float-left'>View Details</span>
              <span class='float-right'>
                <i class='fa fa-angle-right'></i>
              </span>",['class'=>'card-footer text-white clearfix small z-1']); ?> 
          </div>
        </div>

        <div class="col-xl-3 col-sm-6">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-bar-chart"></i>
              </div>
              <div class="mr-5 text-white"><h4>Month Wise Electricity Consumption</h4></div>
            </div>
             <?= anchor("myController/monthWiseElectricityConsumption","<span class='float-left'>View</span>
              <span class='float-right'>
                <i class='fa fa-angle-right'></i>
              </span>",['class'=>'card-footer text-white clearfix small z-1']); ?>
            </div>
        </div>
         </div>

     <!--  <div class="row" style="margin-top: 5%;"> -->
      
        <!-- <div class="col-xl-3 col-sm-6">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5 text-white"><h4>Area wise Bill</h4></div>
            </div>
             <?php echo anchor("myController/areaWiseBillReport","<span class='float-left'>View Details</span>
              <span class='float-right'>
                <i class='fa fa-angle-right'></i>
              </span>",['class'=>'card-footer text-white clearfix small z-1']); ?>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card text-white bg-dark o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5 text-white"><h4>Total No Connection Closed Consumer </h4><h3><?php echo @$total_connection_closed;?></h3></div>
            </div>
             <?= anchor("myController/connectionClosed","<span class='float-left'>View Details</span>
              <span class='float-right'>
                <i class='fa fa-angle-right'></i>
              </span>",['class'=>'card-footer text-white clearfix small z-1']); ?>
            </div>
        </div> -->
      </div>
      <!-- <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i>&nbsp;<strong> Electricity Consumption Chart</strong></div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="40"></canvas>
        </div> 
        <div class="row">
        <div class="col-lg-12">
          <!-- Example Bar Chart Card--
        <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Bar Chart Example</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
                  <canvas id="myBarChart" width="100" height="50"></canvas>
                </div>
                <div class="col-sm-4 text-center my-auto">
                  <div class="h4 mb-0 text-primary">$34,693</div>
                  <div class="small text-muted">YTD Revenue</div>
                  <hr>
                  <div class="h4 mb-0 text-warning">$18,474</div>
                  <div class="small text-muted">YTD Expenses</div>
                  <hr>
                  <div class="h4 mb-0 text-success">$16,219</div>
                  <div class="small text-muted">YTD Margin</div>
                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
        </div>
      </div>
    </div> -->
  </div>

   
   <?php include_once("footer.php") ?>
<?php include_once("includes/jqueryFile.php") ?>
</body>
</html>
