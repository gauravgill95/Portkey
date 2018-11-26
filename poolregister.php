<?php

include('newsession.php');

$hostname = "localhost";
$name= "root";
$password= "12qwaszx";

$db = mysqli_connect($hostname, $name, $password, "portkey");

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully <br>";

$destination =  mysqli_real_escape_string($db,$_POST['destination']);
$source =  mysqli_real_escape_string($db,$_POST['source']);
$d_time = mysqli_real_escape_string($db,$_POST['d_time']);
$myusername = $_SESSION['login_user'];

$pool_id;
$sql = "insert into pool (destination,source,time_departure,num_members) values ('$destination', '$source' , '$d_time', '1')";
if ($db->query($sql) === TRUE) {
    echo "New record created successfully in authentication";
    $pool_id_query = "select max(pool_id) as pool_id from pool";
    echo $pool_id_query;
    $result2 = mysqli_query($db,$pool_id_query);
    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
    $active2 = $row2['active'];
    $pool_id = $row2['pool_id'];
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
$sql2 = "insert into pool_connect(user_id, pool_id) values((select user_id from authentication where user_name = '$myusername'),'$pool_id')";
if ($db->query($sql2) === TRUE) {
    echo "New record created successfully in pool_connect";
} else {
    echo "Error: " . $sql2 . "<br>" . $db->error;
}



header("location: pool.php");


?>
