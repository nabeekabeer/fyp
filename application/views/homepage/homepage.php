<!DOCTYPE html>
<html lang="en">

  <head>
<?php //include_once("includes/hpheader.php");
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>
<script src="<?php echo base_url('asset/jQuery/jquery.min.js')?>" ></script>
    <!-- Bootstrap core CSS -->
    <?php //echo link_tag("application/views/homepage/includes/main.css");?>
  <?php //include_once("includes/main.css") ?>
    <?= link_tag("asset/creativeHomepage/vendor/bootstrap/css/bootstrap.min.css");?>
    <?= link_tag("asset/creativeHomepage/css/creative.min.css");?>
    <?= link_tag("asset/creativeHomepage/vendor/magnific-popup/magnific-popup.css");?>
    <?= link_tag("asset/creativeHomepage/vendor/font-awesome/css/font-awesome.min.css");?>

    <!-- Custom fonts for this template -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> -->


<script  type="text/javascript">
$.noConflict();
 (function($){
$(document).ready(function(){
   // $('#myC').hide();
    $('#myCc').mouseover(function(){
     $('#myC').show();
    });
    $('#myCc').mouseout(function(){
     //$('#myC').hide();
    });

    // $('#myVideo').mouseover(function(){
    //  video.pause();
    // });
    // $('#myCc').mouseout(function(){
    //  video.play();
    // });

    
    
});
})(jQuery);
</script> 
    
  </head>

  <body id="page-top">
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-success" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">EBMS</a>
        <!-- <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span> </button> -->
        
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#page-top">home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Consumer Services</a>
            </li>
            <!-- <li class="nav-item">
               <a class="nav-link js-scroll-trigger" href="#gallery">Gallery</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a  class="nav-link js-scroll-trigger" href="#Complaint">Complaint</a>
            </li>
            <li class="nav-item">
              <a  class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <li class="nav-item" id="myCc" >
              <?php echo anchor("adminController/login","Admin Login",['class'=>'nav-link js-scroll-trigger','id'=>'myC']); ?> 
              
            </li>
          </ul>
        </div>
      </div>
    </nav>


  <style type="text/css">
    
    /* Style the video: 100% width and height to cover the entire window */
#myVideo {
    min-width: 100%; 
    min-height: 50%;
    border-radius: 15px;
}

.content1{
    background: rgba(0, 0, 0, 0.5);
    color: #f1f1f1;
    width: 100%;
    padding: 12px;
}

#myBtn {
    width: 200px;
    font-size: 18px;
    padding: 10px;
    border: none;
    background: #000;
    color: #fff;
    cursor: pointer;
}

#myBtn:hover {
    background: #ddd;
    color: black;
}
  </style>
<!-- <header class="masthead text-center text-white d-flex"> -->
     <!--  <div class="container my-auto"> -->
      
     <!--    <div style="border-radius: 15px;"> -->
           <!-- <video autoplay muted loop id="myVideo" onmouseover="this.pause()" onmouseout="this.play()">
            <source src="<?php //echo base_url('asset/videos/hydro.mp4')?>" type="video/mp4">
            Your browser does not support this video.
          </video> -->
         <!--  <div class="col-lg-10 mx-auto">
         <button id="myBtn" class="col-lg-8 mx-auto" onclick="myFunction()">Pause</button>
       </div> -->
<!-- <div class="content1">
  <h1>Heading</h1>
  <p>Lorem ipsum dolor sit amet, an his etiam torquatos. Tollit soleat phaedrum te duo, eum cu recteque expetendis neglegentur. Cu mentitum maiestatis persequeris pro, pri ponderum tractatos ei. Id qui nemore latine molestiae, ad mutat oblique delicatissimi pro.</p>
  <button id="myBtn" class="col-lg-8 mx-auto" onclick="myFunction()">Pause</button>
</div> -->

<script>
var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");
function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}
        </script>

<!-- <section id="services">
      <div class="container">
        Hello........
      </div></section> -->
    <!-- <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">]]] -->

            <!-- <div class="input-group">
              <?php //echo form_input(['type'=>'text','name'=>'search','placeholder'=>'search','class'=>'form-control','title'=>'search']);?>
              <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
            </div> -->
           <!--  <h3 class="text-uppercase">
              <strong style="font-family: serif;">Powered by Billing Sub-Division Skardu Baltistan</strong>
            </h3>
            <hr>
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-5">Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>
            <!- <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>->
          </div>
        </div>
      </div>
    </header> -->
      <section class="bg-dark">

        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto text-center">
               <?php echo '<h5 class="text-white">'.@$mge.'</h5>'; ?>
              <h2 class="section-heading text-white">Home</h2>
              <hr class="light my-4">
              <p class="text-faded mb-4">Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!</p>
              <!-- <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a> -->
            </div>
          </div>
        </div>
      </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Consumer Support Services</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row text-center">
          <!-- <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-diamond text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Sturdy Templates</h3>
              <p class="text-muted mb-0">Our templates are updated regularly so they don't break.</p>
            </div>
          </div>-->
         <!--  <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-home text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Ready to Ship</h3>
              <p class="text-muted mb-0">You can use this theme as is, or you can make changes!</p>
            </div>
          </div>  -->
         <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
               
                <?php echo anchor('adminController/printBill','<i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>')?>
               <!--  <a href="printBill">
              <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
               </a> -->
              <h3 class="mb-3">See Your Billing History</h3>
              <p class="text-muted mb-0">You can print your bill</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <!--  <a href="#">
              <i class="fa fa-4x fa-table text-primary mb-3 sr-icons"></i>
               </a> -->
               <?php echo anchor('adminController/tariffs','<i class="fa fa-4x fa-table text-primary mb-3 sr-icons"></i>')?>
              <h3 class="mb-3">Tariff Guide</h3>
              <p class="text-muted mb-0">See Tariff details</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <?php echo anchor('adminController/consumerLedger','<i class="fa fa-4x fa-user text-primary mb-3 sr-icons"></i>')?>
              <h3 class="mb-3">See Your Ledger</h3>
              <p class="text-muted mb-0">View your Ledger & Connections</p>
            </div>
          </div>
        </div>
      </div>
    </section>

   <!--  <section class="p-0" id="gallery">
      <div class="container-fluid p-0">
        <div class="row no-gutters popup-gallery">
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="<?php echo base_url('asset/creativeHomepage/img/portfolio/fullsize/1.jpg')?>">
              <img class="img-fluid" src="<?php echo base_url('asset/creativeHomepage/img/portfolio/thumbnails/1.jpg')?>" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="<?php echo base_url('asset/creativeHomepage/img/portfolio/fullsize/2.jpg')?>">
              <img class="img-fluid" src="<?php echo base_url('asset/creativeHomepage/img/portfolio/thumbnails/2.jpg')?>" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="<?php echo base_url('asset/creativeHomepage/img/portfolio/fullsize/3.jpg')?>">
              <img class="img-fluid" src="<?php echo base_url('asset/creativeHomepage/img/portfolio/thumbnails/3.jpg')?>" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="<?php echo base_url('asset/creativeHomepage/img/portfolio/fullsize/4.jpg')?>">
              <img class="img-fluid" src="<?php echo base_url('asset/creativeHomepage/img/portfolio/thumbnails/4.jpg')?>" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="<?php echo base_url('asset/creativeHomepage/img/portfolio/fullsize/5.jpg')?>">
              <img class="img-fluid" src="<?php echo base_url('asset/creativeHomepage/img/portfolio/thumbnails/5.jpg')?>" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="<?php echo base_url('asset/creativeHomepage/img/portfolio/fullsize/6.jpg')?>">
              <img class="img-fluid" src="<?php echo base_url('asset/creativeHomepage/img/portfolio/thumbnails/6.jpg')?>" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="<?php echo base_url('asset/creativeHomepage/img/portfolio/fullsize/header.jpg')?>">
              <img class="img-fluid" src="<?php echo base_url('asset/creativeHomepage/img/portfolio/thumbnails/header.jpg')?>" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="<?php echo base_url('asset/creativeHomepage/img/portfolio/fullsize/nnn.jpg')?>">
              <img class="img-fluid" src="<?php echo base_url('asset/creativeHomepage/img/portfolio/thumbnails/nnn.jpg')?>" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="<?php echo base_url('asset/creativeHomepage/img/portfolio/fullsize/header.jpg')?>">
              <img class="img-fluid" src="<?php echo base_url('asset/creativeHomepage/img/portfolio/thumbnails/header.jpg')?>" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">
                    Category
                  </div>
                  <div class="project-name">
                    Project Name
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section> -->

   <section class="bg-dark" id="about">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto text-center">
              <h2 class="section-heading text-white">We've got what you need!</h2>
              <hr class="light my-4">
              <p class="text-faded mb-4">Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!</p>
              <!-- <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a> -->
            </div>
          </div>
        </div>
      </section>
      <!-- <section class="bg-dark text-white">
        <div class="container text-center">
           <h2 class="mb-4">Free Download at Start Bootstrap!</h2>
          <a class="btn btn-light btn-xl sr-button" href="">Download Now!</a> 
        </div>
      </section> -->
      <section id="Complaint" class="bg-dark text-white">
       <div class="container text-center">
        <div class="row text-center">
          <div class="col-lg-5 mx-auto text-center bg-info">        
           <h2>Complaint</h2>
            <hr class="colorgraph">
            <!-- <div id="sendmessage">Your message has been sent. Thank you!</div> -->
            <div id="errormessage"></div>
            <?php echo form_open('adminController/ShowAllComplaints',['class'=>'contactForm']); ?>
              <div class="form-group">
                <input type="text" name="name" required="true" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" name="cons_new_number" onkeypress="return (event.charCode>=48 && event.charCode<=97)" required="true" class="form-control" id="name" placeholder="Consumer New Number" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" required="true" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" required="true" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" required="true" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>

              <div class="text-center">
                <button type="submit" name="sendComp" class="btn btn-dark">Send</button>
              </div>
            
            <?php form_close(); ?>
           <!--  <hr class="colorgraph"> -->
        </div>
      </div>
    </div>
    </section>
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5"><b>If you have any complain or query so give us a call or send us an email and we will get back to you as soon as possible.</b></p>
          </div>
        </div>
        <div class="row">
          <div style="width: 40%;">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1351.054333809255!2d75.63987972306178!3d35.281359995435274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzXCsDE2JzUyLjkiTiA3NcKwMzgnMjcuNCJF!5e1!3m2!1sen!2s!4v1518788305299" title="Billing Office Skardu" width="100%" height="350" frameborder="20" style="border:30" allowfullscreen></iframe>
            </div>
          <div class="col-lg-3 ml-auto text-center" style="margin-top: 100px;">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>123-456-6789</p>
          </div>
          <div class="col-lg-3 mr-auto text-center" style="margin-top: 100px;">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:nabee.6@yahoo.com">feedback@nabee.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>
    <?php include_once("includes/hpfooter.php");?>
  </body>
</html>
