<?php
include("header.php");
include("../includes/db.php");
include("verify.php");
if(isset($_POST["submit"])){
    $title = $_POST["title"];
    $description = $_POST["description"];
    $syllabus = $_POST["syllabus"];
    $requirements = $_POST["requirements"];
    $price = $_POST["price"];
    $query = "INSERT into courses VALUES(NULL,'$title','$description','$syllabus','$requirements',$price)";
    mysqli_query($conn,$query);
    header("Location: courses.php");
}
?>
 <div id="course-upload">
      <h2>Add Course</h2>
      <br />
      <form method="POST">
        <div>
          <label for="title">Course Title</label>
          <input type="text" name="title" id="title" />
        </div>
        <div>
          <label for="description">Course Description</label>
          <textarea name="description" id="description"></textarea>
        </div>
        <div>
          <label for="syllabus">Course Syllabus</label>
          <textarea name="syllabus" id="syllabus"></textarea>
        </div>
        <div>
          <label for="requirements">Course Requirements</label>
          <textarea name="requirements" id="requirements"></textarea>
        </div>
        <div>
          <label for="price">Course Price</label>
          <input type="number" name="price" id="price" />
        </div>
        <div>
          <button class="btn-block" name="submit">Submit</button>
        </div>
      </form>
    </div>
<?php
include("../includes/footer.php");
?>