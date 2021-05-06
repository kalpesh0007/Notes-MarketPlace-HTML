<?php
session_start();

include 'connection.php';

if(isset($_GET['token'])){
	$token = $_GET['token'];

	$updatequery = "UPDATE users SET IsEmailVerified = 1 WHERE Token = '$token'";
	$query = mysqli_query($connection, $updatequery);

	if($query){
		header('Location:../include/login.php');
	}
	else{
		?>
		<script>
			alert("Your email is not verified pls try again to register your email");
		</script>
		<?php
	}
}

?>