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
    $dep = $row["dep"];

    $sqlnum_dep="SELECT * FROM memo WHERE memo_num_officer1 != ''; ";
    $querysqlnum_dep = mysqli_query($conn,$sqlnum_dep);
	$rowcount=mysqli_num_rows($querysqlnum_dep);
    $memo_num_officer1 = $rowcount + 1;
	$memo_num_officer1 = "มศ.00".$memo_num_officer1."/64" ;
	$memo_num_officer1 = substr($memo_num_officer1, -13);

?>

<!DOCTYPE html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>เจ้าหน้าที่ : <?php echo $dep; ?></title>

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

            <li class="nav-item font-weight-semibold d-none d-lg-block">ระบบบันทึกข้อความออนไลน์ (E-Document) : คณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยราชภัฏเลย</li>

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
        <div class="main-panel">
          <?php
              $memo_id = $_GET["memo_id"];
			  $user_id = $_GET["user_id"];
              $sql="SELECT * FROM memo, member WHERE memo.memo_id = '$memo_id' AND member.id = '$user_id';";
              $query = mysqli_query($conn,$sql);
              $rowcount=mysqli_num_rows($query);
              $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
          ?>
          <div class="content-wrapper">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">บันทึกข้อความ <?php echo $result["name"];?> <?php echo $result["dep"];?> </h4>
                    <form class="comment-form" id="commentform" method="post" action="officer1-page-update.php" enctype="multipart/form-data">
                      <input type="hidden" id="memo_id" name="memo_id" value="<?php echo $result["memo_id"];?>">
                      <input type="hidden" id="dep" name="dep" value="<?php echo $result["dep"];?>">
                      <input type="hidden" name="line_token" value="<?php echo $result["line_token"];?>">
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ส่วนราชการ</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $result["field"];?>" name="field" readonly/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ที่</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $result["memo_num_dep"];?>" name="memo_num_dep" readonly/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">วันที่</label>
                            <div class="col-sm-9">
                              <input class="form-control" value="<?php echo $result["memo_date"];?>" name="memo_date" readonly/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">เรื่อง</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $result["title"];?>" name="title" readonly />
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
                              <textarea class="form-control" id="exampleTextarea1" rows="5" name="paragraph1" readonly><?php echo $result["paragraph1"];?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ย่อหน้าที่ 2</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" id="exampleTextarea1" rows="3" name="paragraph2" readonly><?php echo $result["paragraph2"];?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ย่อหน้าที่ 3</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" id="exampleTextarea1" rows="1" name="paragraph3" readonly><?php echo $result["paragraph3"];?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ชื่อ-นามสกุล</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $result["name"];?>" name="name" readonly/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">

                        <div class="col-md-8">

                          <div class="form-group row">

                            <label class="col-sm-3 col-form-label">ตำแหน่ง</label>

                            <div class="col-sm-9">

                              <input type="text" class="form-control" value="<?php echo $result["position"];?>" name="position" readonly />

                            </div>

                          </div>

                        </div>

                      </div>
                      <?php
                      $memo_id = $_GET["memo_id"];
                      $sql="SELECT * FROM files WHERE memo_id = $memo_id AND file_name != '' ";
                      $query = mysqli_query($conn,$sql);
                      $rowcount=mysqli_num_rows($query);
                      ?>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="exampleFormControlFile1">ไฟล์แนบ</label>
                            <input type="file" name="imageFile[]" multiple class="form-control-file" id="exampleFormControlFile1">
                            <?php 
                            while($result_file=mysqli_fetch_array($query,MYSQLI_ASSOC))
                            {
                            ?>
                              <span><a href="files/upload/<?php echo $result["name"];?>/<?php echo $result["memo_date"];?>/<?php echo $result_file["file_name"]; ?>"><?php echo $result_file["file_name"]; ?></a></span><br>
                            <?php
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ที่</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $result["memo_num_dep"];?>" name="memo_num_dep" readonly/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">เลขรับบันทึกข้อความคณะ <?php echo $result["memo_num_officer1"];?></label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php
                                $t = $result["memo_num_officer1"];
                                    if ($t != '') {
                                      echo $result["memo_num_officer1"];
                                    } else {
                                      echo $memo_num_officer1;
                                    }
                                ?>" name="memo_num_officer1" readonly/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">1.การตรวจสอบธุรการภาค</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $result["comment1"];?>" name="" readonly />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">2.การตรวจสอบหัวหน้าภาค</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $result["comment2"];?>" name="" readonly />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">3.ความเห็นหัวหน้าภาค</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $result["depart_opinion"];?>" name="" readonly />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">4.ความเห็นธุรการคณะ</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $result["officer1_opinion"];?>" name="officer1_opinion" readonly />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">การตรวจสอบหัวหน้าสำนักงาน</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $result["comment4"];?>" name="" readonly />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">5.ความเห็นหัวหน้าสำนักงาน</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" id="exampleTextarea1" rows="1" name="" readonly><?php echo $result["head_officer_opinion"];?></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">การตรวจสอบคณบดี</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="<?php echo $result["comment5"];?>" name="" readonly />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">6.ข้อสั่งการคณบดี</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" id="exampleTextarea1" rows="2" name="" readonly><?php echo $result["admin_opinion"];?></textarea>
                            </div>
                          </div>
                        </div>
                     </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">เสนอความคิดเห็น</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" id="exampleTextarea4" rows="3" name="officer1_opinion"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ลงชื่อธุรการคณะ</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" value="" name="sign_officer1" required />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                              <button type="submit" class="btn btn-success mr-2" name="submit">Submit</button>
                              <button type="reset" class="btn btn-light">Cancel</button>                      
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">การตรวจสอบ</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" id="exampleTextarea1" rows="1" name="comment3"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                              <button type="submit" class="btn btn-danger mr-2" name="edit">แก้ไข</button>
                            </div>
                          </div>
                        </div>
                      </div>
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