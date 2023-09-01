<?php
include("includes/header.php");
include("includes/db.php");
?>
<?php
if(isset($_POST["submit"])){
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $number = $_POST["number"];

    $checkquery = "SELECT * FROM users where username='$username'";
    //echo $checkquery;
    $result = mysqli_query($conn,$checkquery);
    //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $row = mysqli_fetch_row($result);
    if(is_null($row)){
        $insertquery = "INSERT INTO users VALUES (NULL, '$fullname', '$username', '$password', $number)";
        //echo $insertquery;
        mysqli_query($conn,$insertquery);
     echo "Registration Successfull";
    header("Location: login.php");
    }
    else {
        echo "Username exists";
    }
   
}
?>
<?php
if(!isset($_SESSION["username"])) {
?>
 <div class="account-container">
                  <h2 style="color:#1c0854">Register</h2>
                <br>
                <form action="register.php" method="POST">
                  <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" id="fullname" name="fullname" required>
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="number" required>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn-block" name="submit">Signup</button>
                  </div>
                  <div class="form-group">
                    <br>
                    <p>Already have an account? <a href="login.php"><b>Login</b></a></p>
                  </div>
                </form>
              </div>
              <hr>
<?php } ?>
<?php
include("includes/footer.php");
?>