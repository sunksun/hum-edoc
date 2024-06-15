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

    function DateThai($strDate)
    {
        $strYear = date("Y",strtotime($strDate))+543;
        $strMonth= date("n",strtotime($strDate));
        $strDay= date("j",strtotime($strDate));
        $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
        $strMonthThai=$strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }
    $strDate = date("Y-m-d");    

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>อาจารย์ : <?php echo $_SESSION['name']; ?></title>
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
            <img src="assets/images/logo-human.png" alt="logo" /> </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="assets/images/logo-human-mini.png" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block">แจ้งปัญหารการใช้งาน : 098-103-2797</li>
          </ul>
          <form class="ml-auto search-form d-none d-md-block" action="#">
            <div class="form-group">
              <input type="search" class="form-control" placeholder="ค้นหาบันทึกข้อความ">
            </div>
          </form>
          <ul class="navbar-nav ml-auto">
            <?php
              $sql="SELECT * FROM memo WHERE name = '$name' ORDER BY id DESC";
              $query = mysqli_query($conn,$sql);
              $rowcount=mysqli_num_rows($query);
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count">7</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                <a class="dropdown-item py-3">
                  <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                  <span class="badge badge-pill badge-primary float-right">View all</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-email-outline"></i>
                <span class="count bg-success">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                <a class="dropdown-item py-3 border-bottom">
                  <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                  <span class="badge badge-pill badge-primary float-right">View all</span>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-alert m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal text-dark mb-1">Application Error</h6>
                    <p class="font-weight-light small-text mb-0"> Just now </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-settings m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal text-dark mb-1">Settings</h6>
                    <p class="font-weight-light small-text mb-0"> Private message </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-airballoon m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal text-dark mb-1">New user registration</h6>
                    <p class="font-weight-light small-text mb-0"> 2 days ago </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="assets/images/user/<?php echo $row["image"];?>" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="assets/images/user/<?php echo $row["image"];?>" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold"><?php echo $row["name"];?></p>
                  <p class="font-weight-light text-muted mb-0"><?php echo $row["email"];?></p>
                </div>
                <a class="dropdown-item" href="profile-user.php">แก้ไขข้อมูลส่วนตัว <i class="dropdown-item-icon ti-dashboard"></i></a>
                <a class="dropdown-item" href="all-memo-user.php">บันทึกข้อความทั้งหมด <span class="badge badge-pill badge-danger"><?php echo "$rowcount"; ?></span><i class="dropdown-item-icon ti-dashboard"></i></a>
                <a class="dropdown-item" href="sign-out.php">ออกจากระบบ<i class="dropdown-item-icon ti-power-off"></i></a>
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
              <a class="nav-link" href="user-page.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">หน้าแรก</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="all-memo-user.php">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">บันทึกข้อความทั้งหมด <span class="badge badge-pill badge-danger"><?php echo "$rowcount"; ?></span></span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="letter-all.php">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">หนังสือเวียน</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="line-token.php">
                <i class="menu-icon typcn typcn-user-outline"></i>
                <span class="menu-title">Line token</span>
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
          <div class="content-wrapper">
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                    <ul class="quick-links">
                      <li><a href="#"><?php echo $row["name"];?></a></li>
                      <li><a href="#"><?php echo $row["dep"];?></a></li>
                      <li><a href="#">คณะมนุษยศาสตร์และสังคมศาสตร์</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <form class="comment-form" id="commentform" method="post" action="save-memo.php" enctype="multipart/form-data">
                      <input type="hidden" id="dep" name="dep" value="<?php echo $row["dep"];?>">
                      <input type="hidden" class="form-control" value="<?php echo "$memo_id"?>" name="memo_id"/>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ส่วนราชการ</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $row["field"];?>" name="field" readonly/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">วันที่</label>
                            <div class="col-sm-9">
                              <input class="form-control" value="<?php echo DateThai($strDate); ?>" name="memo_date" readonly/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">เรื่อง</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="title" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">เรียน</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" placeholder="คณบดีคณะมนุษยศาสตร์และสังคมศาสตร์" name="memo_to" readonly/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ย่อหน้าที่ 1</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" id="exampleTextarea1" rows="10" placeholder="ตามที่/ด้วยสาขาวิชา..." name="paragraph1" required></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ย่อหน้าที่ 2</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" id="exampleTextarea1" rows="5" name="paragraph2"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ย่อหน้าที่ 3</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" id="exampleTextarea1" rows="1" placeholder="จึงเรียนมาเพื่อ..." name="paragraph3" required></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ลงชื่ออาจารย์</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="sign" required />
                            </div>
                          </div>
                        </div>
                      </div>
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
                            <label class="col-sm-3 col-form-label">ตำแหน่ง</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="position" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="exampleFormControlFile1">ไฟล์แนบ</label>
                            <input type="file" name="imageFile[]" multiple class="form-control-file" id="exampleFormControlFile1">
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-success mr-2" name="submit">บันทึก</button>
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