<script type="text/javascript">
  // var a= confirm('Do you want to open it....!');
  // if (a) {
  //   //window.open("http://[::1]/my_fyp/index.php/myController/newConnection", "_blank", "width=200, height=100");
  // }
     // var popit = true;
     // window.onbeforeunload = function() { 
     //      if(popit == true) {
     //           popit = false;
     //           return "Are you sure you want to leave?"; 
     //      }
     // }
</script>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark  fixed-top bg-dark" id="mainNav">
   <!--img src="<?php //echo base_url();?>asset/images/uob.jpg" height="40" width="50"-->  
   <?= anchor("myController/home","&nbsp; &nbsp; Electricity Billing Management System",['class'=>'navbar-brand img-circle']); ?>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <img src='http://[::1]/my_fyp/asset/images/uob.jpg' style='border-radius:6px;' height='40' width='50'> -->
    <div class="collapse navbar-collapse" id="navbarResponsive" >
      <ul class="navbar-nav navbar-sidenav " id="exampleAccordion"  >
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Admin Dashboard">
          <?= anchor("myController/home","<i class='fa fa-fw fa-home'></i>
            <span class=' nav-link-text'><b>Dashboard</b></span>",["class"=>'nav-link']); ?>
        </li>
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
          <?= anchor("myController/home","<i class='fa fa-fw fa-home'></i>
            <span class=' nav-link-text'><b>Home</b></span>",["class"=>'nav-link']); ?>
        
        </li> -->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Main Menus">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text"><b>Main Menus</b></span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti" >
            
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2"><b>Employee</b></a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2" >
                <li>
                  <?= anchor("myController/Employees","Add New Employee"); ?>
                </li>
                <li>
                  <?= anchor("myController/meterReaderPlacement","Employee Placement"); ?>
                </li>
                <li>
                  <?= anchor("myController/showEmployees","Show Employees"); ?>
                </li>
                <li>
                  <?= anchor("myController/empType","Employee Type"); ?>
                </li>
              </ul>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti3"><b>Connection</b></a>
              <ul class="sidenav-third-level collapse" id="collapseMulti3" >
                <li>
                  <?= anchor("myController/newConnection","New Connection"); ?>
                </li>
                <li>
                 <?= anchor("myController/updateConnectionDetail","Edit Connection"); ?>
                </li>
                <li>
                  <?= anchor("myController/showAllConnection","Show All Connection"); ?>
                </li>
                <li>
                 <?= anchor("myController/addNewConnectionType","Connection Type"); ?>
                </li>
              </ul>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti4"><b>Consumer</b></a>
              <ul class="sidenav-third-level collapse" id="collapseMulti4" >
                <li>
                 <?= anchor("myController/editConsumerDetail","Consumer Detail"); ?>
                </li>
                <li>
                 <?= anchor("myController/showAllConnectionOfaConsumer","View All Connection"); ?>
                </li>
                <li>
                 <?= anchor("myController/consumerLedger","Consumer Ledger"); ?>
                </li>
              </ul>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti5"><b>Bill</b></a>
              <ul class="sidenav-third-level collapse" id="collapseMulti5" >
                <li>
                 <?= anchor("billController/newReading","Add New Reading"); ?>
                </li>
                <li>
                 <?= anchor("billController/billCollectionForm","Colloect Bill"); ?>
                </li>
                 <li>
                 <?= anchor("billController/showAllPaymentReceives","Show All Paid Bills"); ?>
                </li>
                 <li>
                 <?= anchor("billController/create_bill","View Bill"); ?>
                </li>
              </ul>
            </li>
            
            
            <!--li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
              </ul>
            </li-->
          </ul>
        </li>
        
        <!--li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Consumer Detail</span>
          </a>
        </li-->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text"><b>Components</b></span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents" >
            <!-- <li>
              <a href="reports">Reports</a>
            </li>-->
            <li>
              <?= anchor("myController/addNewArea","Add New Area"); ?>
            </li>
             <li>
              <?= anchor("myController/billRate","Bill Rate"); ?>
            </li>
            <li>
              <?= anchor("myController/addNewMeterType","Meter Types"); ?>
            </li>
           <li>
              <?= anchor("billController/collection_points","Bill Collection Points"); ?>
            </li>
             <li>
              <?= anchor("myController/charges","Charges"); ?>
            </li> 
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reading List">
              <?= anchor("androidController/viewDetailsSync",
               " <i class='fa fa-fw fa-link'></i>
                 <span class='nav-link-text'><b>Reading List</b></span>",
                 ['class'=>'nav-link']); ?>
          </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reports">
         <?= anchor("myController/reports"," <i class='fa fa-fw fa-fa charts'></i>
            <span class='nav-link-text'><b>Reports</b></span>",["class"=>'nav-link']); ?>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Complain">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents1" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text"><b>Complain</b></span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents1" >
            <!-- <li>
              <a href="reports">Reports</a>
            </li>-->
            <li>
              <?= anchor("myController/ShowAllComplaints","show complaints"); ?>
            </li>
          </ul>
        </li>
        <!--li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Consumers</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
               anchor("myController/login","Login Page");
            </li>
            <li>
              anchor("myController/newRegistration","Registration Page");
            </li>
            <li>
              anchor("myController/forgot_password","Forgot Password Page");
            </li>
            <li>
              <a href="blank">Blank Page</a>
            </li>
          </ul>
        </li-->
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Contact Us">
          
              <?= anchor("myController/contactUs", " <i class='fa fa-fw fa-link'></i>
            <span class='nav-link-text'><b>Contact Us</b></span>",['class'=>'nav-link']); ?>
          
          <!- <a class="nav-link">
            
          </a> ->
        </li> -->
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
  <ul class="navbar-nav ml-auto">
        <li class="nav-item row-md-8 text-success nav-link mr-lg-2">
         <!--  <script type="text/javascript"> -->
            <!-- <h3><?php echo date('M d,Y h:i a'); ?> </h3> -->
          <!-- </script> -->
          <h3><?php //echo date('M d,Y h:i a'); ?></h3>
         </li>

    <!-- <li class="nav-item row-md-6">
        <?php echo anchor('myController/home','<i class="fa fa-fw fa-home"></i>Home',['class'=>'nav-link mr-lg-2', 'aria-haspopup'=>"true", 'aria-expanded'=>"false"]) ?>
    </li>
  
  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-fw fa-user"></i>
          <span>Consumer</span>
      </a>
        <div class="dropdown-menu bg-dark"  >
          <?php  
          echo anchor("myController/editConsumerDetail","Consumer Detail",['class'=>'dropdown-item']); 
           ?>
          </div>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-fw fa-sitemap"></i>
          <span>Connection</span>
      </a>
        <div class="dropdown-menu bg-dark" >
          <?php echo anchor("myController/newConnection","New Connection",['class'=>'dropdown-item']);
         
          echo anchor("myController/updateConnectionDetail","Edit Connection",['class'=>'dropdown-item']); 
          echo  anchor("myController/addNewConnectionType","Connection Type",['class'=>'dropdown-item']); 
           ?>
          </div>
    </li> --><?php $name=strtoupper(@$_SESSION['login_data'][0]['emp_fname']); ?>
    <li class="nav-item row-md-6">
      <?php echo anchor('myController/editProfile','<span >
     Logged In User '.$name.'
     </span>',['class'=>'nav-link mr-lg-2 text-white', 'aria-haspopup'=>"true", 'aria-expanded'=>"false"]) ?>
    </li>
    <li class="nav-item row-md-6">
        <?php echo anchor('myController/newConnection',' <span class="fa fa-fw fa-user"></span><b>Consumer Registration</b>',['class'=>'nav-link mr-lg-2 text-white', 'aria-haspopup'=>"true", 'aria-expanded'=>"false"]) ?>
    </li>
    <li class="nav-item row-md-6">
        <?php echo anchor('billController/newReading','<i class="fa fa-fw fa-newspaper-o"></i><b>Enter New Reading</b>',['class'=>'nav-link mr-lg-2 text-white', 'aria-haspopup'=>"true", 'aria-expanded'=>"false"]) ?>
    </li>
    <li class="nav-item row-md-6">
        <?php echo anchor('billController/collect_bill',' <span class="fa fa-fw fa-table"></span><b>Bill Collection</b>',['class'=>'nav-link mr-lg-2 text-white', 'aria-haspopup'=>"true", 'aria-expanded'=>"false"]) ?>
    </li>
    <!-- <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-fw fa-table"></i>
          <span>Bill</span>
      </a>
        <div class="dropdown-menu bg-dark" >
          <?php echo anchor("billController/newReading","Scroll Reading",['class'=>'dropdown-item']);
         // echo "<hr>";
          //echo anchor("myController/addNewArea","New Area",['class'=>'dropdown-item']);
          echo anchor("billController/createBill","Show Bill",['class'=>'dropdown-item']); 
          echo  anchor("billController/collect_bill","Bill Collection",['class'=>'dropdown-item']); 
           ?>
          </div>
    </li> -->
     
     
<!--/test-->
        <!--li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">  
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Nabee</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Ringing</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. Nabee trying to contact with you.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li-->
       <!--  <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li> -->
        <li class="nav-item">

          <a class="nav-link text-white" data-toggle="modal" data-target="#confirm_logout">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Scroll to Top Button-->
    <!-- Logout Modal-->
    <div class="modal fade" id="confirm_logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <?= anchor('adminController/index','Logout',["class"=>"btn btn-primary"])?>
          </div>
        </div>
      </div>
    </div>
</div>