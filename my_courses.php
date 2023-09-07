<?php
include("includes/header.php");
include("includes/db.php");
if(!isset($_SESSION["username"])){
  header("Location: login.php");
}
?>
    <h1 style="margin: 50px 100px">Your E-Learning Courses</h1>
<div class="courses">
<?php
 $uname = $_SESSION["username"];
    $getUserQuery = "SELECT uid from users where username='$uname'";
    $res = mysqli_query($conn,$getUserQuery);
    $row = mysqli_fetch_assoc($res);
    $uid= (int)$row['uid'];
$sqlquery = "SELECT courses.* FROM courses INNER JOIN enrollments ON courses.cid = enrollments.course_id WHERE enrollments.user_id = $uid";
$course_id="";
$course_title="";
$result = mysqli_query($conn,$sqlquery);
    while($row=mysqli_fetch_assoc($result)){
      $course_id = $row["cid"];
      $course_title = $row["course_title"];
      $course_price = $row["course_price"];
    //   $course_description = $row["course_description"];
    echo '
    <div class="course-item">
        <h2>'.$course_title.'</h2>
        <!-- <h3>Rs. '.$course_price.'</h3> -->
        <a href="watch_course.php?id='.$course_id.'"><button class="btn-block">Watch Course </button></a>
      </div>
    ';
    }
?>
</div>


<?php
include("includes/footer.php");
?>