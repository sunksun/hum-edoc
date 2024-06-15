<?php   
    ini_set('display_errors', 1);
	error_reporting(~0);
    session_start();
    include_once('connect.php');
    
    $id = $_SESSION["id"];
	$sql = "SELECT * FROM member WHERE id = ? ";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('s', $id); //   s - string, b - blob, i - int, etc
	$stmt ->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();

    $name = $row["name"];
    

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>อาจารย์ : Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="assets/images/logo.svg" alt="logo" /> </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="assets/images/logo-mini.svg" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block">ระบบบันทึกข้อความออนไลน์ (E-Document) : คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏเลย
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <?php
              $sql="SELECT * FROM memo WHERE name = '$name' ORDER BY id DESC";
              $query = mysqli_query($conn,$sql);
              $rowcount=mysqli_num_rows($query);
            ?>
            
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="assets/images/user/<?php echo $row["image"];?>" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="assets/images/user/<?php echo $row["image"];?>" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold"><?php echo $row["name"];?></p>
                  <p class="font-weight-light text-muted mb-0"><?php echo $row["email"];?></p>
                </div>
                <a class="dropdown-item">My Profile <span class="badge badge-pill badge-danger">1</span><i class="dropdown-item-icon ti-dashboard"></i></a>
                <a class="dropdown-item" href="sign-out.php">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="assets/images/user/<?php echo $row["image"];?>" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $row["name"];?></p>
                  <p class="designation"><?php echo $row["email"];?></p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">เมนูหลัก</li>
            <li class="nav-item">
              <a class="nav-link" href="pass-update-page.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">หน้าแรก</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sign-out.php">
                <i class="menu-icon typcn typcn-user-outline"></i>
                <span class="menu-title">ออกจากระบบ</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
         <?php
          $sql="SELECT * FROM memo";
            if ($result=mysqli_query($conn,$sql))
              {
              // Return the number of rows in result set
              $rowcount = mysqli_num_rows($result);
              $memo_id = $rowcount+1;
              mysqli_free_result($result);
              }  
          ?>
          <div class="content-wrapper">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <form class="comment-form" id="commentform" method="post" action="pass-save-page.php" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" value="<?php echo $row["id"];?>" name="user_id"/>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ชื่อ-นามสกุล</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $row["name"];?>" name="name" readonly/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">รหัสผ่านใหม่</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control" name="password" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-success mr-2" name="submit">Submit</button>
                      <button type="reset" class="btn btn-light">Cancel</button>                      
                    </form>
                  </div>
                </div>
              </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="assets/js/shared/off-canvas.js"></script>
    <script src="assets/js/shared/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
    <!-- End custom js for this page-->
  </body>
</html>