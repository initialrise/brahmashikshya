<?php
session_start();
include("includes/db.php");
include("includes/getuid.php");
$status = $_GET["q"];

if($status=="su"){
$url = "https://uat.esewa.com.np/epay/transrec";
$oid = $_GET["oid"];
$amt = $_GET["amt"];
$refId = $_GET["refId"];
$data =[
    'amt'=> $amt,
    'rid'=> $refId, 
    'pid'=> $oid,
    'scd'=> 'EPAYTEST'
];
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    echo $response;
    curl_close($curl);
    if(strpos($response, "Success") !== false){
        
        //insert courses into enrollments
        $query = "INSERT INTO enrollments (user_id, course_id) SELECT carts.user_id, carts.course_id FROM carts WHERE carts.user_id = $uid";
        mysqli_query($conn,$query);
        //insert into payments
        $query="INSERT into payments VALUES('$oid','$amt',$uid)";
        mysqli_query($conn,$query);
        //delete cart
        $query = "DELETE FROM carts where user_id=$uid";
        mysqli_query($conn,$query);
        header("Location: my_courses.php");
    }
}
else if($status=="fu"){
echo "<a href='checkout.php'>Go back to cart</a>";
echo "Payment Fraud Detected";
}
?>