<?php
include("header.php");
?>
<?php
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    //$password = md5($_POST["password"]);

	/*
    $checkquery = "SELECT * FROM users where username='$username' and password='$password'";
    echo $checkquery;
    $result = mysqli_query($conn,$checkquery);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $row = mysqli_fetch_row($result);
    if(is_null($row)){
        echo "<span class='error'>Invalid username/password</span>";
    }
	 */
	if($username=="admin" && $password == "rabindra")
	{
        echo "Login Successful";
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
	}
	else
	{echo "<span class='error'>Invalid username/password</span>";}
  
   
}
?>

<?php
if(!isset($_SESSION["username"])) {
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
