<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   <title>test.tvmatches.com</title>
<!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" type="text/css" media="all" />
   <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" type="text/css" media="all" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

  </head>

  <body>
    <div class="header">
      <div class="container">
    <div class="navbar-wrapper">
      <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
          
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Matches Around Me</a></li>
                <li><a href="#">Sports Bar Opportunities</a></li>
                <li><a href="#">Highlights</a></li>
                <li><a href="#">Match Reminder</a></li>
              
              </ul>
            </div>
          </div>
        </div>

      </div>
   
    <div class="logo">
        <a href="#"><img src="<?php echo yii::app()->request->baseUrl; ?>/images/logo.jpg"></a>
    </div>
    <div class="social_media">
        <a class="facebook" href="#" target="_blank">Facebook</a>
        <a class="twitter" href="#" target="_blank">Twitter</a>
        <a class="g-plus" href="#" target="_blank">g-plus</a>
    </div>
    <div class="col-lg-12 col-xs-12">
         <div class="search_bar">
      		 <input class="search" type="text" value="" placeholder="Search for matches...">
       	</div>
    </div>
   </div>
  </div>
  <div class="clearfix"></div>
    <!-- header ======================================== -->
      <?php echo $content; ?>
<!-- FOOTER -->
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-lg-12 logo">
              <a href="#"><img src="<?php echo yii::app()->request->baseUrl; ?>/images/footer_logo.png" alt="Logo"></a>
            </div>
            <div class="footer_nav">
                 <ul class="footer_menu">
                     <li><a href="#">Go to cmarttech.com</a></li>
                     <li><a href="#">About</a></li>
                     <li><a href="#">Register Sports Bar</a></li>
                     <li><a href="#">Contact</a></li>

                 </ul>
            </div>
            <div class="clearfix"></div>
            <p>&copy; © 2014 cmarttech Ltd</p>
          </div>
      </div>
      </footer>

    <!-- /.footer -->

  </body>
</html>
