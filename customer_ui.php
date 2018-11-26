<?php
   include('session_bus.php');

?>
<!DOCTYPE HTML>
<!--
	
//-->
<html>
	<head>
		<title>Bus Info</title>
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
					<h2>Save Time and Money by checking
					<br />
					 status of buses with us
					<br />
					 24 hour active</h2>
				</header>
					
					<?php
						$sql = "select count(bus_id) as total_buses from bus";					
						$result=mysqli_query($db, $sql);
						$row2 = mysqli_fetch_array($result,MYSQLI_ASSOC);
						$total_pools = $row2['total_pools'];
						if ($total_pools>0) {
							echo "There are total of " . "$total_buses" . " bus(es) exists in the Lobby.";
						}
						$sql2 = "select * from bus";
						$result2=mysqli_query($db, $sql2);
						//$row3 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
						if (mysqli_num_rows($result2) > 0) {
						    // output data of each row
							$count = 0;		
						    while($row3 = mysqli_fetch_array($result2,MYSQLI_ASSOC)) {
							
							$count = $count + 1;							
							echo '<div class="boxed">
					<section>
						<header>
							<h3>Bus ' . $count . '</h3>
						</header>
						<div class="table-wrapper">
							<table class="default">
								<thead>
									<tr>
										<th>ID</th>
										<th>Bus Number</th>
										<th>Colour</th>
										<th>Destination</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>' . $row3["bus_id"] . '</td>
										<td>' . $row3["bus_number"] . '</td>
										<td>' . $row3["colour"] . '</td>
										<td>' . $row3["Destination"] . '</td>
									</tr>
								</tbody>
							</table>
							';
							
							$new_user_id = $row3["user_id"];
							$new_bus_id = $row3["bus_id"];
							$sql3 = "select first_name,last_name from user_info where user_id = '$new_user_id'";
				
							$result3=mysqli_query($db, $sql3);
							//$row4 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
							if (mysqli_num_rows($result3) > 0) {
						    		// output data of each row
								echo '<summary>For More Information about the Bus Click Below.</summary>';
								echo '<details>';
						    		while($row4 = mysqli_fetch_array($result3,MYSQLI_ASSOC)) {
									
									  
									echo '<p> Bus Driver: ' . $row4["first_name"] . ' ' . $row4["last_name"] . '</p>';
									
									
								}
								echo '</details><!--Loop for members-->';
							}
							else{
								echo 'No bus created yet.';
							}
							 echo '
							<div class="buttonHolder">
								<form class="form" method="post" action="show_info.php">
									<input type="hidden" name="varname" value=' . $new_bus_id . '>
									<button type="submit" class="button">Track the bus</button>
								</form>
							</div>
						</div>
					</section>
					</div><br>';

						    }
						} else {
						    echo ".........No Bus Created Yet...........";
						    echo "<br>";
						    	
						}
						

					?>

					



					<br><br>
			
			</div>
			
		<!-- Footer -->
			<div id="footer">
				<div class="container 75%">

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

