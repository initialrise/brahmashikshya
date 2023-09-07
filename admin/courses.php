<?php
include("header.php");
include("../includes/db.php");
?>
    <h1 style="margin: 50px 100px">Courses We Offer</h1>
<div class="courses">
<?php
$sqlquery = "SELECT * from courses";
$course_description="";
$course_title="";
$result = mysqli_query($conn,$sqlquery);
    while($row=mysqli_fetch_assoc($result)){
      $course_id = $row["cid"];
      $course_title = $row["course_title"];
    //   $course_description = $row["course_description"];
    echo '
    <div class="course-item">
        <h2>'.$course_title.'</h2>
        <a href="add_video.php?id='.$course_id.'"><button class="btn-block">Add Video to Course</button></a>
      </div>
    ';
    }
?>
</div>
<?php
include("../includes/footer.php");
?>