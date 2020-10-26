
<?php

session_start();
if($_SESSION['post']=="li");
else
die;


	$pid=$_POST['change'];

				$host="localhost";
				$user="root";
				$password="";
				$db="lms";
				$conn = new mysqli($host,$user,$password,$db);
			
				if(!mysqli_connect_error()){

					$change="UPDATE pc_problems SET status	 = 'completed' WHERE pid = ?";

					$stmt=$conn->prepare($change);
					$stmt->bind_param("i",$pid);
					$stmt->execute();
					echo("Successfully, change the status as Completed");
					echo "<script>alert('Successfully, change the status as Completed !!');
								window.location.href='li_h.php';</script>";
					$change="UPDATE pc_problems SET solved_on = ? WHERE pid = ?";

						$date=date('y-m-d');
					$stmt=$conn->prepare($change);
					$stmt->bind_param("si",$date,$pid);
					$stmt->execute();
        
			
					}
					else{
						echo "<script>alert('Due to connection it get failled!!');
						window.location.href='li_h.php';</script>";					}

?>