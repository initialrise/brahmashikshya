<?php
include("header.php");
include("../includes/db.php");
include("verify.php");
$t_purchases = 0;
$t_users = 0;
$t_courses = 0;
$best_seller = "";
$t_admins = "";
$t_revenue = "";

$query = "SELECT SUM(amount) AS total_revenue,COUNT(*) AS total_purchases FROM payments";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$t_purchases = $row['total_purchases'];
$t_revenue = $row['total_revenue'];

// Calculate the total users
$query = "SELECT COUNT(*) AS total_users FROM users";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$t_users = $row['total_users'];

// Calculate the total courses
$query = "SELECT COUNT(*) AS total_courses FROM courses";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$t_courses = $row['total_courses'];

// Find the best-selling course
$query = "SELECT course_id, COUNT(*) AS enroll_count FROM enrollments GROUP BY course_id ORDER BY enroll_count DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$best_seller_id = $row['course_id'];
$best_query = "SELECT course_title from courses where cid=$best_seller_id";
$result = mysqli_query($conn, $best_query);
$row = mysqli_fetch_assoc($result);
$best_seller= $row['course_title'];

// Calculate the total admins
$query = "SELECT COUNT(*) AS total_admins FROM admins";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$t_admins = $row['total_admins'];


//SELECT count(*) from users UNION SELECT count(*) from admins UNION SELECT count(*) from courses ;
//SELECT course_id FROM enrollments GROUP BY course_id ORDER BY COUNT(*) DESC LIMIT 1;
?>
<h1
      style="
        text-align: center;
        margin-top: 50px;
        font-size: 40px;
        color: #1c085d;
      "
    >
      DASHBOARD
    </h1>
    <div class="admin-stats">
      <div class="stat">
        <h3>Total Purchases</h3>
        <h1><?php echo $t_purchases; ?></h1>
      </div>

      <div class="stat">
        <h3>Total Users</h3>
        <h1><?php echo $t_users; ?></h1>
      </div>

      <div class="stat">
        <h3>Total Courses</h3>
        <h1><?php echo $t_courses; ?></h1>
      </div>
    </div>
    <div class="admin-stats">
      <div class="stat">
        <h3>Best Seller</h3>
        <h3><?php echo $best_seller; ?></h3>
      </div>

      <div class="stat">
        <h3>Total Admins</h3>
        <h1><?php echo $t_admins; ?></h1>
      </div>

      <div class="stat">
        <h3>Total Revenue</h3>
        <h2><?php echo $t_revenue; ?></h2>
      </div>
    </div>
<?php
include("../includes/footer.php");
?>