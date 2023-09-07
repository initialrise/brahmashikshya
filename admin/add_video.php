<?php
include("header.php");
include("../includes/db.php");
include("verify.php");
?>
<?php
$id = (int)($_GET["id"]);
$sqlquery = "SELECT * from courses where cid=$id";
$course_title="";
$result = mysqli_query($conn,$sqlquery);
$row=mysqli_fetch_assoc($result);
$course_title = $row["course_title"];

//handle upload
if(isset($_POST["submit"])){
$filepath = $_FILES['video']['tmp_name'];
$fileSize = filesize($filepath);
$fileinfo = finfo_open(FILEINFO_MIME_TYPE);
$filetype = finfo_file($fileinfo, $filepath);
$allowedTypes = [ 'video/mp4' => 'mp4', 
            'video/webm' => 'webm'
            ];
if ($fileSize === 0) {
   die("The file is empty.");
}
if(!in_array($filetype, array_keys($allowedTypes))) {
   die("File not allowed. Only .mp4 and .webm are supported");
}
$filename = md5(date("h:i:sa")); 
$extension = $allowedTypes[$filetype];
$targetDirectory = "../videos"; 
$newFilepath = $targetDirectory . "/" . $filename . "." . $extension;
if (!copy($filepath, $newFilepath )) {    die("Can't move file.");
}
unlink($filepath);
echo "<script>alert('Uploaded Successfully');</script>";
$order_id =$_POST["order_id"];
$title=$_POST["title"];

//db entries
$vidurl = $filename.".".$extension;
$sqlquery = "INSERT into videos VALUES(NULL,'$title','$vidurl',$id,$order_id)";
mysqli_query($conn,$sqlquery);
}
?>
 <div id="video-upload">
      <h2>Upload Video</h2>
      <h3>Course Selected: <?php echo $course_title; ?></h3>
      <br />
      <form method="POST" enctype="multipart/form-data">
        <div>
          <label for="order_id">Order Id</label>
          <input type="number" name="order_id" id="order_id" />
        </div>
        <div>
          <label for="title">Video Title</label>
          <input type="text" name="title" id="title" />
        </div>
        <div>
          <label for="video" id="video-label">Upload Video</label>
          <input
            type="file"
            name="video"
            id="video"
            accept="video/*"
            onchange="updateLabel()"
          />
        </div>
        <div>
          <button name="submit" class="btn-block">Upload</button>
        </div>
      </form>
    </div>

<?php
include("../includes/footer.php");
?>