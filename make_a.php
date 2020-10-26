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

					$add="UPDATE  users SET post = 'admin' WHERE username = ?";

					$stmt=$conn->prepare($add);
					$stmt->bind_param("s",$username);
					$stmt->execute();
					echo "<script>alert('Successfully, Add this user as Admin.');
									window.location.href='add_a1.php';</script>";			
					}
					else{
						echo "<script>alert('Failled due to connection.');
						window.location.href='add_a1.php';</script>";					}
?>

