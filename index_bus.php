<?php
//include('newlogin.php'); // Includes Login Script
session_start();
if(isset($_SESSION['login_user'])){
  header("location: profile_bus.php");
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="register_bus.php" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" name = "first_name" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text" name = "last_name"required autocomplete="off"/>
            </div>
          </div>

      <div class="field-wrap">
            <select name="Role" class="sel">
                <option value="customer">customer</option>
                <option value="driver">driver</option>
            </select>
          </div>

      <div class="field-wrap">
              <label>
                Bus Number(Only for driver)<span class="req">*</span>
              </label>
              <input type="text" name = "number" autocomplete="off"/>
            </div>
      <div class="field-wrap">
              <label>
                Bus Color(Only for driver)<span class="req">*</span>
              </label>
              <input type="text" name = "color" autocomplete="off"/>
            </div>
      
      <div class="field-wrap">
              <label>
                User Name<span class="req">*</span>
              </label>
              <input type="text" name = "user_name" required autocomplete="off"/>
            </div>
  <!--  
          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off"/>
          </div>
       -->   
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password" name = "pass_word" required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block"/>Get Started</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action= "login_bus.php" method="post">
          
            <div class="field-wrap">
            <label>
              User Name<span class="req">*</span>
            </label>
            <input type="text" name = "username" required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" name = "password" required autocomplete="off"/>
          </div>
          
          <!--<p class="forgot"><a href="#">Forgot Password?</a></p>
          -->
    <input type = "submit" name = "submit" value = " Submit "/><br />
          <!-- <button type = "submit" name = "submit" class="button button-block"/>Log In</button> -->
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
