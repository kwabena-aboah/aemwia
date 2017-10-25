<?php
require_once('includes/config.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../img/aem.jpg">
    <link rel="icon" type="image/jpg" href="../img/aem.jpg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>AEMWIA (Blog)</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="./assets/font-awesome.css" />
    <!-- CSS Files -->
    <link href="./assets/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/now-ui-kit.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="./assets/animate.css">
    <link rel="stylesheet" type="text/css" href="./assets/style.css">
</head>
<body class="landing-page">
<!-- Navbar -->
<nav class="navbar navbar-toggleable-md bg-primary fixed-top navbar-transparent " color-on-scroll="500">
    <div class="container">
        <div class="navbar-translate">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
            
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav" style="background: #8e173d;">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Back to Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-placement="bottom" href="#" target="_blank">
                        <i class="fa fa-twitter"></i>
                        <p class="hidden-lg-up">Twitter</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-placement="bottom" href="#" target="_blank">
                        <i class="fa fa-facebook-square"></i>
                        <p class="hidden-lg-up">Facebook</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-placement="bottom" href="#" target="_blank">
                        <i class="fa fa-instagram"></i>
                        <p class="hidden-lg-up">Instagram</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="wrapper">
    <div class="page-header page-header-small">
        <div class="page-header-image" data-parallax="true" style="background-image: url('./img/gallery/cap4.jpg');">
        </div>
        <div class="container">
            <div class="content-center">
                <h1 class="title">Alliance Enfants Du Monde</h1>
                <div class="text-center">
                    <!-- <button class="btn btn-primary btn-round">Donate Now</button> -->
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="section section-about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <?php
                        $result = mysql_safe_query('SELECT * FROM posts ORDER BY date DESC');
                        if(!mysql_num_rows($result)) {
                            echo '<h2>No posts yet.</h2>';
                        } else {
                            while($row = mysql_fetch_assoc($result)) {
                                echo '<h2>'.$row['title'].'</h2>';
                                $body = substr($row['body'], 0, 300);
                                echo nl2br($body).'...<br/>';
                                echo '<a href="post_view.php?id='.$row['id'].'">Read More</a> | ';
                                echo '<a href="post_view.php?id='.$row['id'].'#comments">'.$row['num_comments'].' comments</a>';    
                                echo '<hr/>';
                            }
                        }
                      ?>
                </div>
            </div>
          </div>
        </div> 

<!-- Footer here -->
<footer class="footer footer-default">
    <div class="container">
        <nav>
            <ul>
                <li>
                    <a href="index.php">
                        Alliance Enfants Du Monde
                    </a>
                </li>
                <li>
                    <a href="./admin/login.php">
                        Team Member Login
                    </a>
                </li>
                <!-- <li>
                    <a href="#">
                        Donate Now
                    </a>
                </li> -->
            </ul>
        </nav>
        <div class="copyright">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, Designed by
            <a href="#" target="_blank">MIWDs</a>. Coded by
            <a href="#" target="_blank">Brianstien</a>.
        </div>
    </div>
</footer>
<!-- end footer -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-81510511-1', 'auto');
  ga('send', 'pageview');

</script>
    
</body>
<!--   Core JS Files   -->
<script src="./js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="./js/bootstrap.min.js" type="text/javascript"></script>
<script src="./js/nouislider.min.js" type="text/javascript"></script>
<script src="./js/now-ui-kit.js" type="text/javascript"></script>

</html>