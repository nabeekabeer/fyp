<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <?= link_tag("asset/creativeHomepage/vendor/bootstrap/css/bootstrap.min.css");?>
    <?= link_tag("asset/creativeHomepage/css/creative.min.css");?>
    <?= link_tag("asset/creativeHomepage/vendor/magnific-popup/magnific-popup.css");?>
    <?= link_tag("asset/creativeHomepage/vendor/font-awesome/css/font-awesome.min.css");?>
    <!-- Custom fonts for this template -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> -->

    
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">EBMS</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#page-top">home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Customer Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <!-- <li class="nav-item">
               <a class="nav-link js-scroll-trigger" href="#gallery">Gallery</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#Complaint">Complaint</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <!-- <a class="nav-link js-scroll-trigger" href="">Contact</a>
               -->
               <?php echo anchor("myController/login","Login",['class'=>'nav-link js-scroll-trigger']); ?>
            </li>
          </ul>
        </div>
      </div>
    </nav>