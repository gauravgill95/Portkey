<?php
   include('newsession.php');

?>
<!DOCTYPE HTML>
<!--
	
//-->
<html>
	<head>
		<title>Pool</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<h1>Welcome <?php echo $login_session; ?></h1> 
      		<h2><a href = "newlogout.php">Sign Out</a></h2>
		<!-- Header -->
			<div id="header">
				<span class="logo icon fa-paper-plane-o"></span>
				<h1>Hi. Welcome to PortKey Service.</h1>
				<p>A Cab Support web portal designed by <a href="#">heart</a>
				<br />
				and released for testing under the <a href="#">IIT Ropar licence</a>.</p>
			</div>

		<!-- Main -->
			<div id="main">

				<header class="major container 75%">
					<h2>Save Time and Money by booking
					<br />
					 your taxi with us
					<br />
					 24 hour active</h2>
				</header>
					
					<?php
						$sql = "select count(pool_id) as total_pools from pool";					
						$result=mysqli_query($db, $sql);
						$row2 = mysqli_fetch_array($result,MYSQLI_ASSOC);
						$total_pools = $row2['total_pools'];
						if ($total_pools>0) {
							echo "There are total of " . "$total_pools" . " pool(s) exists in the Lobby.";
						}
						$sql2 = "select * from pool";
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
							<h3>Pool ' . $count . '</h3>
						</header>
						<div class="table-wrapper">
							<table class="default">
								<thead>
									<tr>
										<th>ID</th>
										<th>Destination</th>
										<th>Source</th>
										<th>Departed Time</th>
										<th>Nunmber Of Members</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>' . $row3["pool_id"] . '</td>
										<td>' . $row3["destination"] . '</td>
										<td>' . $row3["source"] . '</td>
										<td>' . $row3["time_departure"] . '</td>
										<td>' . $row3["num_members"] . '</td>
									</tr>
								</tbody>
							</table>
							';
							
							$new_pool_id = $row3["pool_id"];
							$sql3 = "select first_name,last_name, year, branch from user_info inner join pool_connect on pool_connect.user_id = user_info.user_id inner join pool on pool.pool_id = pool_connect.pool_id where pool.pool_id = '$new_pool_id'";
				
							$result3=mysqli_query($db, $sql3);
							//$row4 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
							if (mysqli_num_rows($result3) > 0) {
						    		// output data of each row
								echo '<summary>For More Information about Pool Members Click Below.</summary>';
								echo '<details>';
						    		while($row4 = mysqli_fetch_array($result3,MYSQLI_ASSOC)) {
									
									  
									echo '<p>' . $row4["first_name"] . ' ' . $row4["last_name"] . ' ' . $row4["year"] . ' ' . $row4["branch"] . '</p>';
									
									
								}
								echo '</details><!--Loop for members-->';
							}
							else{
								echo 'No pool created yet.';
							}
							 echo '
							<div class="buttonHolder">
								<form class="form" method="post" action="join_pool.php">
									<input type="hidden" name="varname" value=' . $new_pool_id . '>
									<button type="submit" class="button">Join Pool</button>
								</form>
							</div>
						</div>
					</section>
					</div><br>';

						    }
						} else {
						    echo ".........No Pools Created Yet...........";
						    echo "<br>";
						    echo "....Click Create Pool to Create One.....";
						    	
						}
						

					?>

					



					<br><br>
			<div class="buttonHolder">
						<form class="form" method="post" action="createpool.php">
							<button type="submit" class="button">Create Pool</button>
						</form>
			</div>
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

