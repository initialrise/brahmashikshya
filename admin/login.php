<?php
include("header.php");
include("../includes/db.php");
?>
<?php
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $checkquery = "SELECT * FROM admins where username='$username' and password='$password'";
    $result = mysqli_query($conn,$checkquery);
    $count = mysqli_num_rows($result);
    if($count>0){
        echo "Login Successful";
        $_SESSION["admin"] = $username;
        header("Location: dashboard.php");
    }
    else {

        echo "<span class='error'>Invalid username/password</span>";
    }
	}
?>

<?php
if(!isset($_SESSION["admin"])) {
?>
  <div class="account-container">
                  <h2 style="color:#1c0854">Admin Panel</h2>
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
                  </form>
                </div>
</div>
<?php } ?>
<?php
include("../includes/footer.php");
?>
