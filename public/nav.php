<?php
session_start();
if(isset($_GET['logout'])){
  session_unset();
  session_destroy();
  header("location:/com/admin/login.php");
}
?>



      

  <!-- ======= Header ======= -->
  
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="index.html">Regna</a></h1>-->
        <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a> -->
      </div>
      <nav id="navbar" class="navbar">
        <ul>
        <?php
              if(isset($_SESSION['admin'])):
        ?>
          <li><a class="nav-link scrollto active" href="/com/index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="/com/admin/profile.php">Your Profile</a></li>
          <li class="dropdown"><a href="#"><span>Departments</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <li><a class="dropdown-item" href="/com/department/add.php">Add Department</a></li>
            <li><a class="dropdown-item" href="/com/department/list.php">List Department</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Employees</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <li><a class="dropdown-item" href="/com/employee/add.php">Add Employee</a></li>
            <li><a class="dropdown-item" href="/com/employee/list.php">List Employee</a></li>
            </ul>
          </li>
          <?php if($_SESSION['admin']['role']==1) :?>
          <li class="dropdown"><a href="#"><span>Admins</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <li><a class="dropdown-item" href="/com/admin/add.php">Add Admin</a></li>
            <li><a class="dropdown-item" href="/com/admin/list.php">List Admin</a></li>
            </ul>
          </li>
          <?php endif; ?>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <?php endif;?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
        <div>
              <?php if(!isset($_SESSION['admin'])):?>
                <a href="/com/admin/login.php" class="btn btn-outline-success">Login</a>
                <?php else:?>
                <form action="" method="GET">
                <button name="logout" href="/com/admin/login.php" class="btn btn-outline-danger mx-1">Logout</button>
                </form>
                <?php endif?>
              </div>
      </nav>
    </div>
</header>