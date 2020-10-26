

<?php

session_start();


        if($_SESSION['post']=="li");
        else
		die;
		
	$pc_no=$_POST["pc_no"];
	$desc=$_POST["desc"];
	$lab_no=$_SESSION['lab_no'];
	$name=$_SESSION['name'];
	$date=date("y-m-d");
			if(strlen($desc)<65){
				$host="localhost";
				$user="root";
				$password="";
				$db="lms";
				$conn = new mysqli($host,$user,$password,$db);
			
				if(!mysqli_connect_error()){

					$display="INSERT INTO pc_problems (lab_no,pc_no,created_by,description,create_on) values (?,?,?,?,?)";

					$stmt=$conn->prepare($display);
					$stmt->bind_param("iisss",$lab_no,$pc_no,$name,$desc,$date);
					$stmt->execute();
					$stmt->store_result();
					echo "<script>alert('Problem Successfully Added!!');
								window.location.href='add_problems1.php';</script>";


					
				//	while($row=$result->fetch_assoc()){
				//		printf("\n");
				//	}
			
					
					$conn->close();
				}
				else{
				echo("Connection is not successful.");
				}
			}
			else{
				echo "Failed to add : Description is less than 65 char";
				echo "<script>alert('Failed to add : Description is less than 65 charecter !!');
								window.location.href='add_problems1.php';</script>";
			}
?>
