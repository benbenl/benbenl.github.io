<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Drunken Parrot UI Kit - Bootstrap Framework Theme</title>
<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

<!-- Loading Font Awesome Icons -->
<link href="css/font-awesome.min.css" rel="stylesheet">

<!-- Loading Bootstrap -->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="bootstrap/css/prettify.css" rel="stylesheet">

<!-- Loading Drunken Parrot UI -->
<link href="css/drunken-parrot.css" rel="stylesheet">
<link href="css/docs.css" rel="stylesheet">

<!-- <link rel="shortcut icon" href="images/favicon.ico"> -->

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
	<![endif]-->
</head>

<body>
  <div class="container" style="padding-top:80px;">
    <div class="row">
      <div class=" col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="tile tile-login">
        <h3 class="logo" style="color:#fff">Knecta</h3>
          <!-- start php code -->
          <?php
          
          // Establish database connection
          mysql_connect("localhost", "admin", "admin") or die(mysql_error()); // Connect to database server(localhost) with username and password.
          mysql_select_db("registrations") or die(mysql_error()); // Select registrations database.
          
          if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
              // Verify data
              $email = mysql_escape_string($_GET['email']); // Set email variable
              $hash = mysql_escape_string($_GET['hash']); // Set hash variable
              $search = mysql_query("SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error()); 
              $match  = mysql_num_rows($search);
              
              //echo $match; // For testing use only
              
              if($match > 0){
                  // We have a match, activate the account
                  mysql_query("UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
                  echo '<div class="alert alert-success">Your email has been verified.<br> You can now login</div><a href="com.enjoyneyinc.com://" class="btn btn-block btn-primary btn-embossed">Confirm</a>';
              }else{
                  // No match -> invalid url or account has already been activated.
                  echo '<div class="alert alert-danger">Invalid approach, please use the link that has been send to your email.</div>';
              }
          }else{
              // Invalid approach
              echo '<div class="alert alert-danger">Invalid approach, please use the link that has been send to your email.</div>';
          }
    ?>
          <!-- stop php code -->
          
          
          
          
            
          
        </div>
      </div>
    </div>
  </div>
</body>
</html>