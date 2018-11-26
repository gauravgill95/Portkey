<?php
   include('newsession.php');

$myusername = $_SESSION['login_user'];
$new_pool_id = $_POST['varname'];

$sql = "insert into pool_connect(user_id, pool_id) values((select user_id from authentication where user_name = '$myusername'),'$new_pool_id')";
if ($db->query($sql) === TRUE) {
    echo "New record created successfully in pool_connect";
} else {
    echo "Error: " ;
}

$sql2 = "update pool set num_members = num_members + 1 where pool_id = '$new_pool_id'";
if ($db->query($sql2) === TRUE) {
    echo "New record created successfully in pool";
} else {
    echo "Error: " ;
}

header("location: pool.php");
?>

