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
    $id = $row["id"];
    $dep = $row['dep'];
?>

<!DOCTYPE html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?php echo $_SESSION['name']; ?> : <?php echo $dep; ?></title>

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

            <li class="nav-item font-weight-semibold d-none d-lg-block">ระบบบันทึกข้อความออนไลน์ (E-Document) : <a href="officer1-page-dep1.php">ภาควิชามนุษยศาสตร์</a> || <a href="officer1-page-dep2.php">ภาควิชาสังคมศาสตร์</a></li>

          </ul>

          <ul class="navbar-nav ml-auto">
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
                  <img class="img-xs rounded-circle" src="assets/images/user/<?php echo $row["image"];?>" alt="Profile image"" alt="profile image">
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
              <a class="nav-link" href="officer1-page.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">หน้าแรก</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="letter-add.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">หนังสือเวียน</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user-officer-page.php">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">พิมพ์บันทึกข้อความ</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="officer1-page-dep1.php">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">ภาควิชามนุษยศาสตร์</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="officer1-page-dep2.php">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">ภาควิชาสังคมศาสตร์</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="officer1-page.php">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">บันทึกข้อความทั้งหมด</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="officer-check-email.php">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">ตรวจสอบข้อมูลอาจารย์</span>
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
        <?php
          $sql="SELECT * FROM memo ORDER BY id DESC";
          $query = mysqli_query($conn,$sql);
          $rowcount=mysqli_num_rows($query);
        ?>
        <div class="main-panel">
          <div class="content-wrapper">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $row["name"];?> เจ้าหน้าที่<?php echo $row["dep"];?></h4>
                    <table class="table-striped">
                      <thead align="center">
                        <tr>
                          <th> ลำดับ </th>
                          <th> เลขภาค </th>
                          <th> วันที่ </th>
                          <th> ชื่อเรื่อง </th>
                          <th> อาจารย์ </th>
                          <th> ภาควิชา </th>
                          <th> สถานะ </th>
                          <th> การตรวจสอบ </th>
                          <th> ดาว์นโหลด </th>
                       </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
                        {
                        ?>
                        <tr>
                          <td class="py-1"><?php echo $i;?></td>
                          <td><?php echo $result["memo_num_dep"];?></td>                     
						  <td><?php echo $result["memo_date"];?></td>
                          <td><a href="officer1-page-check.php?memo_id=<?php echo $result["memo_id"];?>&user_id=<?php echo $result["user_id"];?>"><?php echo mb_substr($result["title"],0,30,'UTF-8');?></a></td>
                          <td><?php echo str_replace("ผู้ช่วยศาสตราจารย์","ผศ.",$result["name"]);?></td>
                          <td><?php echo $result["dep"];?></td>
                          <td align="center">
                            <?php
                            $status = $result["status"];;
                            if ($status == "1") {
                              echo "<img src='assets/images/time-line1.png' alt=''/>";
                            } elseif ($status == "2") {
                              echo "<img src='assets/images/time-line2.png' alt=''/>";
                            } elseif ($status == "3") {
                              echo "<img src='assets/images/time-line3.png' alt=''/>";
                            } elseif ($status == "4") {
                              echo "<img src='assets/images/time-line4.png' alt=''/>";
                            } elseif ($status == "5") {
                              echo "<img src='assets/images/time-line5.png' alt=''/>";
                            } else {
                              echo "<img src='assets/images/time-line0.png' alt=''/>";
                            }
                            ?>
                          </td>
                          <td align="center">
                            <?php
                            $status_edit = $result["status_edit"];;
                            if ($status_edit == "1") {
                              echo "<img src='assets/images/edit-1.png' alt=''/>";
                            } elseif ($status_edit == "2") {
                              echo "<img src='assets/images/edited.png' alt=''/>";
                            } else {
                              echo "-";
                            }
                            ?>
                          </td>
                          <td align="center">
                            <?php
                            $status = $result["status"];;
                            if ($status == "5") {
                              echo "<a href='Template.php?memo_id=$result[memo_id]'><img src='assets/images/download.png' alt=''/></a>";
                            } else {
                              echo "-";
                            }
                            ?>
                          </td>
                        </tr>

                        <?php

                            $i++;

                        }

                        ?>

                      </tbody>

                    </table>

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