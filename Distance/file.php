<?php

echo "<h1>Screen Resolution:</h1>";
echo "Time  : ".$_GET['time']."<br>";
echo "Distance : ".$_GET['unit']."<br>";
$unit = $_GET['unit'];
$time = $_GET['time'];
$to = $_GET['to'];
echo $to;
include('/var/www/html/PortKey-master/session_bus.php');
$sql_ = "select bus_id from bus inner join user_info on user_info.user_id = bus.user_id inner join authentication on authentication.user_id = user_info.user_id where authentication.user_name = '$login_session'";
$result_=mysqli_query($db, $sql_);
$row_ = mysqli_fetch_array($result_,MYSQLI_ASSOC);
$bus_id = $row_["bus_id"];
$sql_new = "update bus set distance = '$unit', time = '$time', Destination = '$to' where bus_id = '$bus_id'";
if ($db->query($sql_new) === TRUE) {
    echo "New distance and time successfully updated.";
} else {
    echo "Error: " . $sql_new . "<br>" . $db->error;
}

echo "<script>window.close();</script>";
?>
