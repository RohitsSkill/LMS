<?php
	
	session_start();
	if($_SESSION['post']=="hod");
	else
	die;

	$username = $_POST['add'];

	
				$host="localhost";
				$user="root";
				$password="";
				$db="lms";
				$conn = new mysqli($host,$user,$password,$db);
			
				if(!mysqli_connect_error()){

					$add="UPDATE  users SET post = 'li' WHERE username = ?";

					$stmt=$conn->prepare($add);
					$stmt->bind_param("s",$username);
					$stmt->execute();
					echo("Successfully, Add this user as lab incharge");
					echo "<script>alert('Successfully, Add this user as Lab Incharge.');
									window.location.href='add_li1.php';</script>";
        
			
					}
					else{
						echo "<script>alert('failled due to connection.');
						window.location.href='add_li1.php';</script>";					}
?>

