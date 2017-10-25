<?php
include 'check_login.php';
include 'count_records.php';


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AEMWIA | POSTS</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="icon" href="../img/aem.jpg">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="#" class="logo">
      <span class="logo-mini"><b>A</b>W</span>
      <span class="logo-lg"><b>AEM</b>WIA</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
								  <?php
			  include '../includes/config.php';
			  
			  $sql = "SELECT * FROM user_info where user_id='$myusername' or email='$myusername'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
        
                while($row = $result->fetch_assoc()) {
                 $avatar = $row['avatar'];
				 $gender = $row['gender'];
				 $regid = $row['user_id'];
				 if ($avatar == null) {
					 if ($gender == "Male") {
						 print '<img src="../dist/img/avatar.png" class="user-image" alt="'.$current_user.'" title="'.$current_user.'">';
					 }else {
						 print '<img src="../dist/img/avatar3.png" class="user-image" alt="'.$current_user.'" title="'.$current_user.'">';
					 }
					 
				 }else{
					   echo '<img src="data:image/jpeg;base64,'.base64_encode($row['avatar'] ).'" class="user-image" alt="'.$current_user.'" title="'.$current_user.'"/>';
				 }
                     }
                   } else {
                
                  }
                   $conn->close();
			  
			  ?>
          
              <span class="hidden-xs"><?php echo"$current_user"; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
			  
			  <?php
			  include '../includes/config.php';
			  
			  $sql = "SELECT * FROM user_info where user_id='$myusername' or email='$myusername'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
        
                while($row = $result->fetch_assoc()) {
                 $avatar = $row['avatar'];
				 $gender = $row['gender'];
				 $regid = $row['user_id'];
				 if ($avatar == null) {
					 if ($gender == "Male") {
						 print '<img src="../dist/img/avatar.png" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
					 }else {
						 print '<img src="../dist/img/avatar3.png" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
					 }
					 
				 }else{
					  echo '<img src="data:image/jpeg;base64,'.base64_encode($row['avatar'] ).'" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
				 }
                     }
                   } else {
                 
                  }
                   $conn->close();
			  
			  ?>
                

                <p>
                  <?php echo"$current_user"; ?>
                  <small><?php echo"$regid"; ?> , Admin</small>
                </p>
              </li>
          
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
   
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
            <?php
        include '../includes/config.php';
        
        $sql = "SELECT * FROM user_info where user_id='$myusername' or email='$myusername'";
               $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
        
                while($row = $result->fetch_assoc()) {
                 $avatar = $row['avatar'];
         $gender = $row['gender'];
         $regid = $row['user_id'];
         if ($avatar == null) {
           if ($gender == "Male") {
             print '<img src="../dist/img/avatar.png" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
           }else {
             print '<img src="../dist/img/avatar3.png" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'">';
           }
           
         }else {
            echo '<img src="data:image/jpeg;base64,'.base64_encode($row['avatar'] ).'" class="img-circle" alt="'.$current_user.'" title="'.$current_user.'"/>';
         }
                     }
                   } else {
                 
                  }
                   $conn->close();
        
        ?>
      
        </div>
        <div class="pull-left info">
          <p><?php echo"$current_user"; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview active" >
          <a href="#">
            <i class="fa fa-home"></i>
            <span>Home</span>
   
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="new_member.php"><i class="fa fa-circle"></i> Register New Member</a></li>
            <li><a href="members.php"><i class="fa fa-circle-o"></i> Edit Members</a></li>
          </ul>
        </li>
       <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text"></i>
            <span>Examination</span>
   
          </a>
   <ul class="treeview-menu">
            <li><a href="results.php"><i class="fa fa-circle-o"></i> Results</a></li>
           <li><a href="examination.php"><i class="fa fa-circle-o"></i> Customize Questions</a></li>
       <li><a href="lock_exam.php"><i class="fa fa-circle-o"></i> Lock Exam</a></li>
       <li><a href="unlock_exam.php"><i class="fa fa-circle-o"></i> Unlock Exam</a></li>
          </ul>
        </li> -->
    
      <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Email</span>
   
          </a>
          <ul class="treeview-menu">
            <li><a href="email_config.php"><i class="fa fa-circle-o"></i> Configuration</a></li>
           
          </ul>
        </li>

        <!-- <li class="header">SYSTEM</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Database</span>
   
          </a>
          <ul class="treeview-menu">
            <li><a <a onclick="return confirm('Are you sure you want to delete all students ?');" href="delete_students.php"><i class="fa fa-circle-o"></i> Delete all students</a></li>
           <li><a <a onclick="return confirm('Are you sure you want to delete all results ?');" href="delete_results.php"><i class="fa fa-circle-o"></i> Delete all results</a></li>
          </ul>
        </li> -->
      </ul>
    </section>
 
  </aside>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        View Posts
      
      </h1>
      <ol class="breadcrumb">
        <li><a href="./"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Posts</li>
      </ol>
    </section>

    <section class="content">
    
      <div class="row">
        <section class="col-lg-12">

          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-file-text"></i>

              <h3 class="box-title">View Posts</h3>
		

            </div>
            <div class="box-body">
		<?php
require_once('../includes/config.php');
$result = mysql_safe_query('SELECT * FROM posts WHERE id=%s LIMIT 10', $_GET['id']);

if(!mysql_num_rows($result)) {
  echo 'Post #'.$_GET['id'].' not found';
  exit;
}

$row = mysql_fetch_assoc($result);
echo '<h2>'.$row['title'].'</h2>';
echo '<em>Posted '.date('F j<\s\up>S</\s\up>, Y', $row['date']).'</em><br/>';
echo nl2br($row['body']).'<br/>';
echo '<a href="post_edit.php?id='.$_GET['id'].'">Edit</a> | <a href="post_delete.php?id='.$_GET['id'].'">Delete</a> | <a href="index.php">View All</a>';

echo '<hr/>';
$result = mysql_safe_query('SELECT * FROM comments WHERE post_id=%s ORDER BY date ASC', $_GET['id']);
echo '<ol id="comments">';
while($row = mysql_fetch_assoc($result)) {
  echo '<li id="post-'.$row['id'].'">';
  echo (empty($row['website'])?'<strong>'.$row['name'].'</strong>':'<a href="'.$row['website'].'" target="_blank">'.$row['name'].'</a>');
  echo ' (<a href="comment_delete.php?id='.$row['id'].'&post='.$_GET['id'].'">Delete</a>)<br/>';
  echo '<small>'.date('j-M-Y g:ia', $row['date']).'</small><br/>';
  echo nl2br($row['content']);
  echo '</li>';
}
echo '</ol>';
?>
<form method="post" action="comment_add.php?id={$_GET['id']}">
  <table>
    <tr>
      <td><label for="name">Name:</label></td>
      <td><input name="name" id="name" value="{$_COOKIE['name']}"/></td>
    </tr>
    <tr>
      <td><label for="email">Email:</label></td>
      <td><input name="email" id="email" value="{$_COOKIE['email']}"/></td>
    </tr>
    <tr>
      <td><label for="website">Website:</label></td>
      <td><input name="website" id="website" value="{$_COOKIE['website']}"/></td>
    </tr>
    <tr>
      <td><label for="content">Comments:</label></td>
      <td><textarea name="content" id="content"></textarea></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="Post Comment"/></td>
    </tr>
  </table>
</form>
          </div>
      </div>

    </section>
  </div>
  <footer class="main-footer">
	  <strong>Copyright &copy; <?php echo date('Y'); ?> Developed By Brainstien</a>.</strong> All rights
    reserved.
  </footer>


  <div class="control-sidebar-bg"></div>
</div>

<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="../js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../plugins/fastclick/fastclick.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../dist/js/pages/dashboard.js"></script>
<script src="../dist/js/demo.js"></script>
</body>
</html>
