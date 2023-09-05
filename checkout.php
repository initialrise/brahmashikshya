<?php
include("includes/header.php");
include("includes/db.php");
session_start();
?>
<?php
// Add or Delete TO cart Logic
if(isset($_GET["id"]) && isset($_GET["action"]))
{
    $id = (int)$_GET["id"];
    $action = $_GET["action"];
    $uname = $_SESSION["username"];
    $getUserQuery = "SELECT uid from users where username='$uname'";
    $res = mysqli_query($conn,$getUserQuery);
    $row = mysqli_fetch_assoc($res);
    $uid= (int)$row['uid'];
    if($action=="add"){
        $query = "INSERT into carts VALUES(NULL,$uid,$id)";
        mysqli_query($conn,$query);
        header("Location: checkout.php");
    }
    else if($action=="del"){
        $query = "DELETE FROM carts where user_id=$uid and course_id=$id";
        mysqli_query($conn,$query);
        header("Location: checkout.php");
    }
}
?>
<?php
if(!isset($_SESSION["username"])) {
    header("Location: login.php");
}
?>
<div class="cart">
<div class="cart-items">
<?php
// View Cart of Certain User Logic
$uname = $_SESSION["username"];
$getUserQuery = "SELECT uid from users where username='$uname'";
$res = mysqli_query($conn,$getUserQuery);
$row = mysqli_fetch_assoc($res);
$uid= $row['uid'];

$sqlquery = "SELECT courses.cid,courses.course_title,courses.course_price FROM carts INNER JOIN courses ON carts.course_id = courses.cid WHERE carts.user_id = $uid";
$net_total = 0;
$course_id="";
$course_title="";
$result = mysqli_query($conn,$sqlquery);
    while($row=mysqli_fetch_assoc($result)){
      $course_id = $row["cid"];
      $course_title = $row["course_title"];
      $course_price = $row["course_price"];
      $net_total += $course_price;
    echo '
    <div class="cart-item">
        <h2>'.$course_title.'</h2>
        <h3>Rs.'.$course_price.'</h3>
        <a href="checkout.php?id='.$course_id.'&action=del"><button class="btn-block">Remove </button></a>
      </div>
    ';
    }
?>
</div>
<?php

    $total = $net_total+100;
    $payment_id = $uid."-".$date;
    echo $payment_id;
?>
        <div id="checkout">
        <h2>Total</h2>
        <hr />
        <h3>Tax Charge: Rs 100</h3>
        <hr />
        <h3>Sub Total: Rs <?php echo $net_total; ?></h3>
        <hr />
        <h3>Final Amount: Rs <?php echo $total; ?></h3>
        <hr />
        <h3>Choose Payment Method</h3>
        <br />
        <!-- <input type="checkbox" /> -->
        <img src="img/esewa_logo.png" alt="esewa logo" /><br />
        <form action="https://uat.esewa.com.np/epay/main" method="POST">
            <input value=<?php echo $total; ?> name="tAmt" type="hidden">
            <input value=<?php echo $net_total; ?> name="amt" type="hidden">
            <input value="100" name="txAmt" type="hidden">
            <input value="0" name="psc" type="hidden">
            <input value="0" name="pdc" type="hidden">
            <input value="EPAYTEST" name="scd" type="hidden">
            <input value="paraRARARA" name="pid" type="hidden">
            <input value="http://localhost/esewa.php?q=su" type="hidden" name="su">
            <input value="http://localhost/esewa.php?q=fu" type="hidden" name="fu">
    <!-- <input value="Submit" type="submit"> -->
        <button class="btn-block">PAY</button>
    </form>
      </div>

</div>


<?php
include("includes/footer.php");
?>