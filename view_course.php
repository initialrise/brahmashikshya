<?php
include("includes/header.php");
include("includes/db.php");
include("includes/getuid.php");
?>
<?php
$id = (int)($_GET["id"]);
$sqlquery = "SELECT * from courses where cid=$id";
$course_description="";
$course_title="";
$result = mysqli_query($conn,$sqlquery);
    while($row=mysqli_fetch_assoc($result)){
      $course_id = $row["cid"];
      $course_title = $row["course_title"];
      $course_description = $row["course_description"];
      $course_syllabus = $row["course_syllabus"];
      $course_requirements = $row["course_requirements"];
      $course_price = $row["course_price"];
    }

?>
<?php
$query = "SELECT * from enrollments where user_id=$uid and course_id=$id";
$res = mysqli_query($conn,$query);
$enrolled = false;
if(mysqli_num_rows($res)>0){
      $enrolled = true;
}
?>
<div id="course-details">
      <h1><?php echo $course_title; ?></h1>
      <h2>Course Description</h2>
      <p>
<?php echo $course_description; ?>
      </p>
      <h2>Syllabus</h2>
<pre>
<?php echo $course_syllabus; ?>
</pre>
      <h2>Requirements</h2>
<pre>
<?php echo $course_requirements; ?>
</pre
      >
      <h1>Rs <?php echo $course_price; ?></h1>
      <?php
      if($enrolled)
      echo "<a href='watch_course.php?id=$course_id'><button class='btn-block'>Watch Course</button></a>";
      else
      echo "<a href='checkout.php?id=$course_id&action=add'><button class='btn-block'>Add to Cart</button></a>";
      ?>
    </div>
<?php
include("includes/footer.php");
?>
