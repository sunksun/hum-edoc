<?php   
    ini_set('display_errors', 1);
	error_reporting(~0);
    session_start();
    include_once('connect.php');
    error_reporting(0);

    $sql="SELECT * FROM letters";
    $result = mysqli_query($conn,$sql);
	$rowcount=mysqli_num_rows($result);
    $letter_id = $rowcount + 1;
	$letter_id = "000000" . $letter_id;
	$letter_id = substr($letter_id, -4);

	if(isset($_POST["submit"])) {
    $user_id = $_SESSION['id'];
		
    $letter_date = $_POST["letter_date"];
    date_default_timezone_set("Asia/Bangkok");
    $letter_time = date('H:i');	
    $title = $_POST["title"];
    $details = $_POST["details"];
    $name = $_POST["name"];
    $position = $_POST["position"];
				        
    // save data to database
    $query1 = "INSERT INTO letters (letter_id, letter_date, letter_time, title, details, name, position) VALUES ('$letter_id', '$letter_date', '$letter_time', '$title', '$details', '$name', '$position');" ;
		
    $run1 = $conn->query($query1) or die("Error in saving image".$conn->error);

    mkdir("files/letters/$letter_date", 0777, true);
    $uploadFolder = "files/letters/$letter_date/"; 
    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
    $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
    $imageName = $_FILES['imageFile']['name'][$key];
    $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);
    $urlfile = "files/letters/$letter_date/$imageName";
    $linkdownload = "<a href='$urlfile'>$imageName</a>";
        
    // save filename to database
    $query2 = "INSERT INTO files_letter SET file_name='$imageName', letter_id='$letter_id', user_id='$user_id' " ;
    $run2 = $conn->query($query2) or die("Error in saving image".$conn->error);
		
  	$sql="SELECT * FROM files_letter WHERE letter_id = $letter_id ";
  	$query = mysqli_query($conn,$sql);
	$result_file=mysqli_fetch_array($query,MYSQLI_ASSOC);
		
	// Line notify
	//$sToken = "7iiwRLn6VPwwScDMluvTbY0794dJGdSIDeA9WryKQbQ";
	$sToken = "7iiwRLn6VPwwScDMluvTbY0794dJGdSIDeA9WryKQbQ";
	$sMessage = "มีหนังสือเวียนใหม่\n";
	$sMessage .= "เรื่อง: ".$title."\n";
	$sMessage .= "ไฟล์: ".$imageName."\n";
	$sMessage .= "https://edoc.human.lru.ac.th";

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

    //Send mail
        
    // sweetalert2
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
            window.location.href = "letter-add.php";';
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
    <title>Save Letter Page</title>
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
