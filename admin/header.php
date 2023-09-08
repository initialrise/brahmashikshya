<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BrahmaShikshya</title>
    <link rel="stylesheet" href="../css/main.css" />
    <!-- <link rel="stylesheet" href="../css/main.css" /> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <header>
      <nav>
        <div id="logo">
          <img src="../img/lotus.png" width="100px" />
          <span>BrahmaShikshya</span>
        </div>
        <ul class="nav-links">
          <li><a class="nav-item" href="dashboard.php">Dashboard</a></li>
          <li><a class="nav-item" href="add_course.php">Add Courses</a></li>
          <li><a class="nav-item" href="courses.php">Add Videos</a></li>
          <li><a class="nav-item" href="add_user.php">Add Users</a></li>
            <?php
            if(!isset($_SESSION["admin"])){ ?>
          <li>
            <a class="nav-item" href="login.php"><button class="btn">Login</button></a>
          </li>
          <?php } else {?>
          <li>
            <a class="nav-item" href="logout.php"
              ><button class="btn-block">Logout</button></a
            >
            </li>
            <?php } ?>
        </ul>
      </nav>
    </header>
