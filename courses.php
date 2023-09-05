<?php
include("includes/header.php");
include("includes/db.php");
?>
<div class="courses">
<?php
$sqlquery = "SELECT * from courses";
$course_description="";
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
        <h3>Rs. '.$course_price.'</h3>
        <a href="view_course.php?id='.$course_id.'"><button class="btn-block">View Detail</button></a>
      </div>
    ';
    }
?>
</div>


<?php
include("includes/footer.php");
?>