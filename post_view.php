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
                        <a class="nav-link" href="blog.php">Back to Home</a>
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
                    <h1 class="title">
                    	<?php
                            $result = mysql_safe_query('SELECT * FROM posts WHERE id=%s LIMIT 1', $_GET['id']);

if(!mysql_num_rows($result)) {
	echo 'Post #'.$_GET['id'].' not found';
	exit;
}

$row = mysql_fetch_assoc($result);
echo '<h2>'.$row['title'].'</h2>';
echo '<em>Posted '.date('F j<\s\up>S</\s\up>, Y', $row['date']).'</em><br/>';
?>
                    </h1>
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
                            $result = mysql_safe_query('SELECT * FROM posts WHERE id=%s LIMIT 1', $_GET['id']);

if(!mysql_num_rows($result)) {
	echo 'Post #'.$_GET['id'].' not found';
	exit;
}

$row = mysql_fetch_assoc($result);
echo '<h6>'.nl2br($row['body']).'</h6><br/>';


echo '<hr/>';
$result = mysql_safe_query('SELECT * FROM comments WHERE post_id=%s ORDER BY date ASC', $_GET['id']);
echo '<ol id="comments" style="list-style: none;">';
while($row = mysql_fetch_assoc($result)) {
	echo '<li id="post-'.$row['id'].'">';
	echo (empty($row['website'])?'<strong>'.$row['name'].'</strong>':'<a href="'.$row['website'].'" target="_blank">'.$row['name'].'</a>');
	echo '<br/>';
	echo '<small>'.date('j-M-Y g:ia', $row['date']).'</small><br/>';
	echo nl2br($row['content']);
	echo '</li>';
}
echo '</ol>';

echo <<<HTML
<form method="post" action="comment_add.php?id={$_GET['id']}" class="form content table-responsive">
	<table class="table table-striped">
		<tr>
			<td><label for="name">Name:</label></td>
			<td><input name="name" id="name" value="{$_COOKIE['name']}" class="form-control" placeholder="name..."/></td>
		</tr>
		<tr>
			<td><label for="email">Email:</label></td>
			<td><input name="email" id="email" value="{$_COOKIE['email']}" class="form-control" placeholder="email..."/></td>
		</tr>
		<tr>
			<td><label for="website">Website:</label></td>
			<td><input name="website" id="website" value="{$_COOKIE['website']}" class="form-control" placeholder="website..."/></td>
		</tr>
		<tr>
			<td><label for="content">Comments:</label></td>
			<td><textarea name="content" id="content" class="form-control" placeholder="comments..."></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Post Comment" class="btn btn-primary" /></td>
		</tr>
	</table>
</form>
HTML;

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
