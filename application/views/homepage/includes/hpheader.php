
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
     <?php //include_once("htmlFile.php"); ?>
<script src="<?php echo base_url('asset/jQuery/jquery.min.js')?>" ></script>

<!-- Bootstrap core CSS -->
    <?= link_tag("asset/creativeHomepage/vendor/bootstrap/css/bootstrap.min.css");?>
    <?= link_tag("asset/creativeHomepage/css/creative.min.css");?>
    <?= link_tag("asset/creativeHomepage/vendor/magnific-popup/magnific-popup.css");?>
    <?= link_tag("asset/creativeHomepage/vendor/font-awesome/css/font-awesome.min.css");?>
       
<script  type="text/javascript">
$.noConflict();
 (function($){
$(document).ready(function(){
//clicked
//$('tr:even').css('background','#CCCCCC');
//$('tr:odd').css('background','#aaaaaa');
    $('#myC').hide();
    $('#myCc').mouseover(function(){
     $('#myC').show();
    });
    $('#myCc').mouseout(function(){
     $('#myC').hide();
     //alert('Hello..........!');
    });
    //$('#history').hide();
    $('#btnmmm').click(function(){
     $('#history').show();
    });
    $('#btnmmm').focusout(function(){
     //$('#history').hide();
    });
    //$('printeee').print();
    $('#clicked').click(function(){
     window.print(); //$('#printeee')
    });
});
})(jQuery);
</script>
</head>
 <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-success" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index?#page-top">EBMS</a>
        <!-- <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span> -->
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index">home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index?#services">Consumer Services</a>
            </li>
           <!--  <li class="nav-item">
               <a class="nav-link js-scroll-trigger" href="index?#gallery">Gallery</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index?#about">About</a>
            </li>
            <li class="nav-item">
              <a  class="nav-link js-scroll-trigger" href="index?#Complaint">Complaint</a>
            </li>
            <li class="nav-item">
              <a  class="nav-link js-scroll-trigger" href="index?#contact">Contact</a>
            </li>
            <!-- <li class="nav-item" >
              <div id="myCc" style="border: 2px solid; float: right;">
               <?php //echo anchor("myController/login","Login",['class'=>'nav-link js-scroll-trigger','id'=>'myC']); ?>
              </div>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>