<?php   
    ini_set('display_errors', 1);
	error_reporting(~0);
    session_start();
    include_once('connect.php');

    if(isset($_POST["submit"])) {

    $memo_id = $_POST["memo_id"];
	$line_token = $_POST["line_token"];
    $title = $_POST["title"];
    $name = $_POST["name"];
    $dep = $_POST["dep"];
    $memo_date = $_POST["memo_date"];
    $memo_num_officer1 = $_POST["memo_num_officer1"];
    $sign_officer1 = $_POST["sign_officer1"];
    date_default_timezone_set("Asia/Bangkok");
    $time_officer1 = date('H:i');
    $officer1_opinion = $_POST["officer1_opinion"];
    $status_edit = '';
    $comment3 = '';
    $status = '3';

    $sql = "UPDATE memo SET 
            memo_num_officer1 = ?,
            sign_officer1 = ?,
            time_officer1 = ?,
            officer1_opinion = ?,
            status_edit = ?,
            comment3 = ?,
            status = ?
			WHERE memo_id = ? ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssss',$memo_num_officer1,$sign_officer1,$time_officer1,$officer1_opinion,$status_edit,$comment3,$status,$memo_id);

    if ($stmt->execute()); 
		// Line notify
		$sToken = "$line_token";
		$sMessage = "บันทึกข้อความเรื่อง: ".$title."\n";
		$sMessage .= "สถานะ: หัวหน้าสำนักงานคณะ\n";

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
		
		// Line Token หัวหน้าสำนักงานคณะ
		$sql="SELECT * FROM member WHERE dep = 'สำนักงานคณะ' AND status = '1' AND rule = '9';";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		$line_token_head = $row["line_token"];

		// Line notify หัวหน้าสำนักงานคณะ
		$sToken = "$line_token_head";
		$sMessage = "บันทึกข้อความ: หัวหน้าสำนักงานคณะ\n";
		$sMessage .= "".$name."\n";
		$sMessage .= "".$dep."\n";
		$sMessage .= "เรื่อง: ".$title."\n";
		$sMessage .= "วันที่: ".$memo_date." เวลา ".$time_officer1." น. \n";

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
            window.location.href = "officer1-page.php";';
        echo '}, 3000 );</script>';
        }
    }
    
    if(isset($_POST["edit"])) {

    $memo_id = $_POST["memo_id"];
    $status_edit = '1';
    $comment3 = $_POST["comment3"];
    $status = '';

    $sql = "UPDATE memo SET
            status_edit = ?,
            comment3 = ?,
            status = ?
            WHERE memo_id = ? ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss',$status_edit,$comment3,$status,$memo_id);

    if ($stmt->execute()); {
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal.fire({
            title: "สำเร็จ!",
            text: "บันทึก แจ้งแก้ไข เรียบร้อย!",
            type: "success",
            icon: "success"
        });';
        echo '}, 500 );</script>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { 
            window.location.href = "officer1-page.php";';
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
