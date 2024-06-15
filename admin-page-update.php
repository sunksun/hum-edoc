<?php   
    ini_set('display_errors', 1);
	error_reporting(~0);
    session_start();
    include_once('connect.php');

    if(isset($_POST["submit"])) {

    $memo_id = $_POST["memo_id"];
	$line_token = $_POST["line_token"];
    $title = $_POST["title"];
    $admin_opinion = $_POST["admin_opinion"];
    $sign_admin = $_POST["sign_admin"];
    $admin_opinion = $_POST["admin_opinion"];
    date_default_timezone_set("Asia/Bangkok");
    $admin_opinion_time = date('H:i');
    $status_edit = '';
    $comment5 = '';
    $status = '5';

    $sql = "UPDATE memo SET 
            sign_admin = ?,
            admin_opinion = ?,
            admin_opinion_time = ?,
            status_edit = ?,
            comment5 = ?,
            status = ?
			WHERE memo_id = ? ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssss',$sign_admin,$admin_opinion,$admin_opinion_time,$status_edit,$comment5,$status,$memo_id);

    if ($stmt->execute()); 
		// Line notify
		$sToken = "$line_token";
		$sMessage = "บันทึกข้อความเรื่อง: ".$title."\n";
		$sMessage .= "สถานะ: คณบดี ".$admin_opinion."\n";

		$chOne = curl_init(); 
		curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
		curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
		curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt( $chOne, CURLOPT_POST, 1); 
		curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
		$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
		curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
		curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
		$result = curl_exec( $chOne ); 

		{
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
            window.location.href = "admin-page.php";';
        echo '}, 3000 );</script>';
        }
    }
    
    if(isset($_POST["edit"])) {

    $memo_id = $_POST["memo_id"];
    $status_edit = '1';
    $comment5 = $_POST["comment5"];
    $status = '';

    $sql = "UPDATE memo SET
            status_edit = ?,
            comment5 = ?,
            status = ?
            WHERE memo_id = ? ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss',$status_edit,$comment5,$status,$memo_id);

    if ($stmt->execute()); {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "บันทึกแก้ไขข้อมูลเรียบร้อย!",
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "admin-page.php";';
        echo '}, 3000 );</script>';
        }
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
    <title>Update Memo Page</title>
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
