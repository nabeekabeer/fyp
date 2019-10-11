<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<?php include_once("includes/htmlFile.php");
//Ul7fw5B9y4 ?>
<script src="<?php echo base_url('asset/jQuery/jquery.min.js')?>" ></script>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php include_once("header.php") ?>
<?php include_once("footer.php") ?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Admin Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">Total No.of Consumer is <h3><?php echo @$tc;?></h3></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#table_cons">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">145604 units consumed!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">2301450 Payment Received!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">130 Consumer Have Outstanding Greater than Rs.1000!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Area Chart Example</div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <!-- Example Bar Chart Card-->
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
          <!-- /Card Columns-->
        </div>
       </div>
     </div>
      <!-- Example DataTables Card-->

      <div class="content-wrapper">
    <div class="container-fluid">
      <div class="card mb-3 mt-4" id="table_cons">
        <div class="card-header">
          <i class="fa fa-table"></i> Consumer Data</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="btn-dark">
                <tr>
                  <th>S.No</th>
                  <th>Consumer Old Number</th>
                  <th>Consumer New Number</th>
                  <th>Consumer Name</th>
                  <!-- <th>F/H Name</th>
                  <th>Gender</th>
                  <th>Date Of Birth</th> -->
                  <th>CNIC</th>
                  <th>Phone</th>
                 <!--  <th>Cell Number</th>
                  <th>Email</th>
                  <th>Current Address</th>
                  <th>Permanent Address</th> -->
                  <th>Meter Number</th>
                  <th>Connection Date</th>
                  <th>Connection Type</th>
                  <th>Connection Area</th>
                  <th>Connection Status</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>S.No</th>
                  <th>Consumer Old Number</th>
                  <th>Consumer New Number</th>
                  <th>Consumer Name</th>
                  <!-- <th>F/H Name</th>
                  <th>Gender</th>
                  <th>Date Of Birth</th> -->
                  <th>CNIC</th>
                  <th>Phone</th>
                  <!-- <th>Cell Number</th>
                  <th>Email</th>
                  <th>Current Address</th>
                  <th>Permanent Address</th> -->
                  <th>Meter Number</th>
                  <th>Connection Date</th>
                  <th>Connection Type</th>
                  <th>Connection Area</th>
                  <th>Connection Status</th>
                </tr>
              </tfoot>
              <tbody>
                <?php $i=1; if (isset($connection_detail)): foreach($connection_detail as $v): ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $v['con_consumer_old_no'];?></td>
                  <td><?php echo $v['con_consumer_new_no'];?></td>
                  <td><?php echo $v['cons_fname']." ".$v['cons_lname'];?></td>
                  <!-- <td><?php //echo $v['cons_father_name'];?></td>
                  <td><?php //echo $v['cons_gender'];?></td>
                  <td><?php //echo $v['cons_dob'];?></td> -->
                  <td><?php echo $v['cons_cnic'];?></td>
                  <td><?php echo $v['cons_phone_number'];?></td>
                   <!-- <td><?php //echo $v['cons_cell_number'];?></td>
                  <td><?php //echo $v['cons_email'];?></td>
                  <td><?php //echo $v['cons_current_address'];?></td>
                  <td><?php //echo $v['cons_permanent_address'];?></td> -->
                  <td><?php echo $v['con_meter_number'];?></td>
                  <td><?php echo $v['con_date'];?></td>
                  <td><?php echo $v['con_type_name'];?></td>
                  <td><?php echo $v['area_name'];?></td>
                  <?php 
                      switch ($v['con_status']) {
                        case '1':
                          echo "<td>Disconnect</td>";
                          break;
                        
                        default:
                          echo "<td>Active</td>";
                          break;
                      }
                   ?>
                  
                </tr>
              <?php endforeach; endif; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
  </div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
  <?php include_once("includes/jqueryFile.php") ?>
</body>
</html>