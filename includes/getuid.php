<?php
$uname = $_SESSION["username"];
$getUserQuery = "SELECT uid from users where username='$uname'";
$res = mysqli_query($conn,$getUserQuery);
$row = mysqli_fetch_assoc($res);
$uid= $row['uid'];
?>