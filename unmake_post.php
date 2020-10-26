<?php
        session_start();
        if($_SESSION['post']=="hod");
        else
        die;

  $username = $_POST['remove'];

	
				$host="localhost";
				$user="root";
				$password="";
				$db="lms";
				$conn = new mysqli($host,$user,$password,$db);
			
				if(!mysqli_connect_error()){

					$remove="UPDATE  users SET post = 'NULL' WHERE username = ?";

					$stmt=$conn->prepare($remove);
					$stmt->bind_param("s",$username);
					$stmt->execute();

					echo "<script>alert('Successfully, Remove the post for selected user.');
									window.location.href='remove_post1.php';</script>";
        
			
					}
					else{
						echo("due to connection it get failled!!");
					}
?>

