<?php
include("header.php");
include("../includes/db.php");
include("verify.php");
?>
<?php
if(isset($_POST["submit"])){
    $fullname = htmlspecialchars($_POST["fullname"]);
    $username = htmlspecialchars($_POST["username"]);
    $password = md5($_POST["password"]);
    $number = htmlspecialchars($_POST["number"]);

    $checkquery = "SELECT * FROM admins where username='$username'";
    //echo $checkquery;
    $result = mysqli_query($conn,$checkquery);
    //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $row = mysqli_fetch_row($result);
    if(is_null($row)){
        $insertquery = "INSERT INTO admins VALUES (NULL, '$fullname', '$username', '$password')";
        //echo $insertquery;
        mysqli_query($conn,$insertquery);
     echo "<script>alert('New Admin User Added')";
    header("Location: login.php");
    }
    else {
     echo "<script>alert('Username already exists')";
    }
   
}
?>
 <div class="account-container">
                  <h2 style="color:#1c0854">Add New Admin</h2>
                <br>
                <form method="POST">
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
                    <button type="submit" class="btn-block" name="submit">Signup</button>
                  </div>
                </form>
              </div>
              <hr>
<?php
include("../includes/footer.php");
?>