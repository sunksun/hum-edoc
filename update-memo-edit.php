<?php   
    ini_set('display_errors', 1);
	error_reporting(~0);
    session_start();
    include_once('connect.php');
    error_reporting(0);

    if(isset($_POST["submit"])) {
    $user_id = $_SESSION['id'];
        
    $dep = $_POST["dep"];
    $field = $_POST["field"];
    $memo_id = $_POST["memo_id"];
    $memo_date = $_POST["memo_date"];
    $title = $_POST["title"];
    $paragraph1 = $_POST["paragraph1"];
    $paragraph2 = $_POST["paragraph2"];
    $paragraph3 = $_POST["paragraph3"];
    $sign = $_POST["sign"];
    date_default_timezone_set("Asia/Bangkok");
    $time_user = date('H:i');
    $name = $_POST["name"];
    $position = $_POST["position"];
    $status_edit = '2';
        
    // update data to database
    $sql = "UPDATE memo SET 
            dep = ?,
            field = ?,
            memo_id = ?,
            memo_date = ?,
            title = ?,
            paragraph1 = ?,
            paragraph2 = ?,
            paragraph3 = ?,
            sign = ?,
            time_user = ?,
            name = ?,
            status_edit = ?,
            position = ?
			WHERE memo_id = ? ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssssssssss',$dep,$field,$memo_id,$memo_date,$title,$paragraph1,$paragraph2,$paragraph3,$sign,$time_user,$name,$status_edit,$position,$memo_id);
    $stmt->execute();
    
    mkdir("files/upload/$name/$memo_date");
    $uploadFolder = "files/upload/$name/$memo_date/"; 
    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
    $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
    $imageName = $_FILES['imageFile']['name'][$key];
    $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);
                
    // save filename to database
    $query2 = "INSERT INTO files SET file_name='$imageName', memo_id='$memo_id', user_id='$user_id' " ;
    $run2 = $conn->query($query2) or die("Error in saving image".$conn->error);

    }
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "บันทึกข้อมูลเรียบร้อย!",
            type: "success",
            icon: "success"
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
