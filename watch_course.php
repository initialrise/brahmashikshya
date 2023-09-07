<?php
include("includes/header.php");
include("includes/db.php");
if(!isset($_SESSION["username"])){
  header("Location: login.php");
}
?>
<div id="view-video">
      <video controls width="1200px">
        <source id="vid-src" src="videos/1video.mp4" id="video-url" />
      </video>
      <div class="videos-links">
        <h2>Course Contents</h2>
<?php
$id = (int)($_GET["id"]);
$sqlquery = "SELECT video_title,video_url from videos where course_id=$id";
$video_url="";
$video_title="";
$result = mysqli_query($conn,$sqlquery);
    while($row=mysqli_fetch_assoc($result)){
      $video_title = $row["video_title"];
      $video_url = $row["video_url"];
?>

        <div class="video-link" onclick=updateLink('<?php echo $video_url; ?>')>
          <i class="fa-solid fa-circle-play icon fa-lg"></i>
          <h3><?php echo $video_title; ?></h3>
        </div>


<?php }
echo "</div></div>";
include("includes/footer.php");
?>
