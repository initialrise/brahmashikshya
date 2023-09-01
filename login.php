<?php
include("includes/header.php");
?>
<?php
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $checkquery = "SELECT * FROM users where username='$username' and password='$password'";
   // echo $checkquery;
    $result = mysqli_query($conn,$checkquery);
    //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $row = mysqli_fetch_row($result);
    if(is_null($row)){
        echo "Invalid username/password";
    }
    else {
        echo "Login Successful";
        $_SESSION["username"] = $username;
        header("Location: index.php");
}
  
   
}
?>

<?php
if(!isset($_SESSION["username"])) {
?>
  <div class="account-container">
                  <h2 style="color:#1c0854">Login</h2>
                  <br>
    <form method="POST" action="login.php">
                    <div>
                      <label for="username">Username</label>
                      <input type="text" id="username" name="username" required>
                    </div>
                    <div>
                      <label for="password">Password</label>
                      <input type="password" id="password" name="password" required>
                    </div>
                    <div> 
                      <button class="btn-block" type="submit" name="submit">Login</button>
                    </div>
                    <br>
                    <div>
                        <p>Don't have an account? <a href="register.php"><b>Sign up</b></a></p>
                    </div>
                  </form>
                </div>
</div>
<?php } ?>
<?php
include("includes/footer.php");
?>