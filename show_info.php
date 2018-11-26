<?php
   include('session_bus.php');
?>

<!DOCTYPE HTML>
<!--
  
-->
<html>
  <head>
    <title>PortKey</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
  </head>
  <body>
    <h1>Welcome <?php echo $login_session; ?></h1> 
          <h2><a href = "logout_bus.php">Sign Out</a></h2>
    <!-- Header -->
      <div id="header">
        <span class="logo icon fa-paper-plane-o"></span>
        <h1>Hi. Welcome to PortKey Service.</h1>
        <p>A Bus Support web portal designed by <a href="http:www.iitrpr.ac.in">heart</a>
        <br />
        and released for testing under the <a href="http:www.iitrpr.ac.in">IIT Ropar licence</a>.</p>
      </div>

    <!-- Main -->
      <div id="main">

        <header class="major container 75%">
          <h2>Save Time and Money by Checking
          <br />
           status of Buses
          <br />
           24 hour active</h2>
          <!--
          <p>Tellus erat mauris ipsum fermentum<br />
          etiam vivamus nunc nibh morbi.</p>
          -->
        </header>

        <?php
          $myusername = $_SESSION['login_user'];
          $new_bus_id = $_POST['varname'];
          $query_new = "select Destination,distance, time  from bus where bus_id = '$new_bus_id'";
          $result_new = mysqli_query($db, $query_new);
          $row_new = mysqli_fetch_array($result_new,MYSQLI_ASSOC);
          $dest = $row_new["Destination"];
          $distance = $row_new["distance"];
          $time = $row_new["time"];
          
          echo '<p>Destination: ' . $dest . '<br> Distance: ' . $distance . '<br> Time Remaining: ' . $time . '<br></p>'
          
        ?>
        

        <footer class="major container 75%">
          <h3>Want to be our partner</h3>
          <p>Join us if you want to appreciate our cause </p>
          <ul class="actions">
            <li><a href="#" class="button">Join our crew</a></li>
          </ul>
        </footer>

      </div>

    <!-- Footer -->
      <div id="footer">
        <div class="container 75%">

          <header class="major last">
            <h2>Questions or comments?</h2>
          </header>

          <p>Feel free to Provide any suggestions or Queries.</p>

          <form method="post" action="#">
            <div class="row">
              <div class="6u 12u(mobilep)">
                <input type="text" name="name" placeholder="Name" />
              </div>
              <div class="6u 12u(mobilep)">
                <input type="email" name="email" placeholder="Email" />
              </div>
            </div>
            <div class="row">
              <div class="12u">
                <textarea name="message" placeholder="Message" rows="6"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="12u">
                <ul class="actions">
                  <li><input type="submit" value="Send Message" /></li>
                </ul>
              </div>
            </div>
          </form>

          <ul class="icons">
            <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
            <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
          </ul>

          <ul class="copyright">
            <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://PortKey.net">PortKey Team</a></li>
          </ul>

        </div>
      </div>

    <!-- Scripts -->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script src="assets/js/main.js"></script>

  </body>
</html>
