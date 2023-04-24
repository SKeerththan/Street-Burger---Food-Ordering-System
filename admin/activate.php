<?php


include("../connection/connect.php");

if (isset($_GET['id'])) {


    $u_id = $_GET['id'];

    $sql = "UPDATE `users` SET 
            `status`=1 WHERE u_id='$u_id'";

    mysqli_query($db, $sql);
}

header('location: all_users.php');
