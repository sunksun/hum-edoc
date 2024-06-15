<?php   
    ini_set('display_errors', 1);
	error_reporting(~0);
    session_start();

    include_once('connect.php');
    
    $sql = "SELECT * FROM member WHERE email = ? AND pass = ?";
    $uname = $_POST['username'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $uname, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if ($row > 0 && $row['pass_update'] == '0') {
        $_SESSION['id'] = $row['id'];
        $_SESSION['field'] = $row['field'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['dep'] = $row['dep'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['line_token'] = $row['line_token'];
        session_write_close();
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "เข้าสู่หน้า แก้ไข รหัสผ่าน",
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "pass-update-page.php";';
        echo '}, 3000 );</script>';
    } else if ($row > 0 && $row['status'] == '1' && $row['rule'] == '7') {
        $_SESSION['id'] = $row['id'];
        $_SESSION['field'] = $row['field'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['dep'] = $row['dep'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['line_token'] = $row['line_token'];
        session_write_close();
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "เข้าสู่ระบบเรียบร้อย!",
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "officer-page.php";';
        echo '}, 3000 );</script>';
    } else if ($row > 0 && $row['status'] == '1' && $row['rule'] == '6') {
        $_SESSION['id'] = $row['id'];
        $_SESSION['field'] = $row['field'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['dep'] = $row['dep'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['line_token'] = $row['line_token'];
        session_write_close();
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "เข้าสู่ระบบเรียบร้อย!",
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "user-officer-page.php";';
        echo '}, 3000 );</script>';
    } else if ($row > 0 && $row['status'] == '1' && $row['rule'] == '8') {
        $_SESSION['id'] = $row['id'];
        $_SESSION['field'] = $row['field'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['dep'] = $row['dep'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['line_token'] = $row['line_token'];
        session_write_close();
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "เข้าสู่ระบบเรียบร้อย!",
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "officer1-page.php";';
        echo '}, 3000 );</script>';
    } else if ($row > 0 && $row['status'] == '1' && $row['rule'] == '9') {
        $_SESSION['id'] = $row['id'];
        $_SESSION['field'] = $row['field'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['dep'] = $row['dep'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['line_token'] = $row['line_token'];
        session_write_close();
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "เข้าสู่ระบบเรียบร้อย!",
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "head-officer-page.php";';
        echo '}, 3000 );</script>';
    } else if ($row > 0 && $row['status'] == '2') {
        $_SESSION['id'] = $row['id'];
        $_SESSION['field'] = $row['field'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['dep'] = $row['dep'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['line_token'] = $row['line_token'];
        session_write_close();
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "เข้าสู่ระบบเรียบร้อย!",
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "user-page.php";';
        echo '}, 3000 );</script>';
    } else if ($row > 0 && $row['status'] == '9' && $row['rule'] == '99') {
        $_SESSION['id'] = $row['id'];
        $_SESSION['field'] = $row['field'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['dep'] = $row['dep'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['line_token'] = $row['line_token'];
        session_write_close();
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "เข้าสู่ระบบเรียบร้อย!",
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "admin-page.php";';
        echo '}, 3000 );</script>';
    } else if ($row > 0 && $row['status'] == '3' && $row['rule'] == '8') {
        $_SESSION['id'] = $row['id'];
        $_SESSION['field'] = $row['field'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['dep'] = $row['dep'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['line_token'] = $row['line_token'];
        session_write_close();
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "เข้าสู่ระบบเรียบร้อย!",
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "all-memo-depart.php";';
        echo '}, 3000 );</script>';
    } else if ($row > 0 && $row['status'] == '1' && $row['rule'] == '1') {
        $_SESSION['id'] = $row['id'];
        $_SESSION['field'] = $row['field'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['dep'] = $row['dep'];
        $_SESSION['status'] = $row['status'];
        $_SESSION['line_token'] = $row['line_token'];
        session_write_close();
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "เข้าสู่ระบบเรียบร้อย!",
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "admin-science-page.php";';
        echo '}, 3000 );</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "ผิดพลาด!",
            text: "กรุณาลองใหม่!",
            type: "warning",
            icon: "error"
        });';
        echo '}, 500);</script>';
        
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
        window.location.href = "index.html";';
        echo '}, 3000 );</script>';

    }
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js">
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script src="sweetalert2/dist/sweetalert2.all.min.js">
</script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill">
</script>
<script src="sweetalert2/dist/sweetalert2.min.js">
</script>
<link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
  <head>
    <title>Login Page
    </title>
    <!--Made with love by Mutiullah Samim -->
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
  </head>
  <body>
    
  </body>
</html>
