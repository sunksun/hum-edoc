<?php   
    ini_set('display_errors', 1);
	error_reporting(~0);
    session_start();
    include_once('connect.php');
    error_reporting(0);

    $user_id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $memo_id = $_SESSION['memo_id'];
    $memo_date = $_SESSION['memo_date'];

    $id = $_GET["id"];
    $filename = $_GET["file_name"];
    $uploadFolder = "files/upload/$name/$memo_date";
    $filepath = $uploadFolder.'/'.$filename;

    $fileDelete = unlink("$filepath"); 

    if($fileDelete) {
    // Delete filename to database
    $sql = "DELETE FROM files WHERE id = ? ";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('s', $id); //   s - string, b - blob, i - int, etc
	$stmt ->execute();
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "ลบไฟล์เรียบร้อย!",
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "user-page-edit.php?memo_id='.$memo_id.'";';
        echo '}, 3000 );</script>';
    } else {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "ไม่สำเร็จ!",
            text: "ไม่สามารถลบไฟล์ได้!",
            type: "warning",
            icon: "error"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "user-page.php";';
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
    <title>Save Memo Page</title>
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
