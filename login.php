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
          <!-- start php code -->
          <?php
          
          // Establish database connection
          mysql_connect("localhost", "admin", "admin") or die(mysql_error()); // Connect to database server(localhost) with username and password.
          mysql_select_db("registrations") or die(mysql_error()); // Select registrations database.

 
          if(isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['passwd']) && !empty($_POST['passwd'])){
              // Form Submited
              $email = mysql_escape_string($_POST['email']); 
              $passwd = mysql_escape_string($_POST['passwd']);
              
              //verify email format
              if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
              // Return Error - Invalid Email
              $msg = 'The email you have entered is invalid, please try again.';
              }else{
              // Return Success - Valid Email
              $msg = 'Your account has been created, <br /> please verify it by clicking the confirmation link that has been send to your email.';
              
              // Insert into database
              $hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.
              mysql_query("INSERT INTO users (email, password, hash) VALUES(
              '". mysql_escape_string($email) ."', 
              '". mysql_escape_string(md5($passwd)) ."', 
              '". mysql_escape_string($hash) ."') ") or die(mysql_error());
              
              // Send email to user
              $to      = $email; 
              $from    = "no_reply@knecta.com";
              $subject = 'Knecta Email Verification'; // Give the email a subject 
              $headers = 'From:no_reply@knecta.com' . "\r\n"; // Set from headers
              
              $message = '
               
              Thank you for signing up on Knecta. 
              To fully enjoy our app, please verify the email address on your account by clicking below.
              
              http://localhost:8888/benben/verify.php?email='.$email.'&hash='.$hash.'
               
              ';
              // Email message above including the link
             
              mail($to, $subject, $message, $headers); // Send our email
      
              }
            }else{
            }
             
?>
          <!-- stop php code -->
          
          <h3 class="logo" style="color:#fff">Knecta</h3>
          
          <?php 
              if(isset($msg)){  
                  // Check if $msg is not empty
                  echo '<div class="alert alert-primary">'.$msg.'</div>'; // Display message.
              } 
          ?>
               
          <!-- start sign up form -->
          <form action="" method="post">
            <div class="input-icon">
              <span class="fa-user fa"></span>
              <input type="text" class="form-control" placeholder="email" name="email">
            </div>
            <div class="input-icon">
              <span class="fa-lock fa"></span>
              <input type="password" class="form-control" placeholder="******" name="passwd">
            </div>
            <button type="submit" class="btn btn-block btn-primary btn-embossed" value="Sign up">Sign Up </button>
          </form>
          <!-- end sign up form -->
          
        </div>
      </div>
    </div>
  </div>
</body>
</html>