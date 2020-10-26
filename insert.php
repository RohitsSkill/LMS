<?php

	$name=$_POST['name'];
	$lab_no=$_POST['lab_no'];
	$username=$_POST['username'];
	$pass=$_POST['pass'];
	$cnf_pass=$_POST['cnf_pass'];

	if($name=="g p mohole"){
		$post="hod";
	}
	else{
	$post="NULL";
	}


	if(!empty($name) || !empty($lab_no) || !empty($username) || !empty($pass) || !empty($cnf_pass)){
		if($pass==$cnf_pass){

			if($lab_no>0){
				if(preg_match("/^[\sa-zA-Z]*$/",$name)){
					if(strlen($pass)>4){
						$host="localhost";
						$user="root";
						$password="";
						$db="lms";
						$conn = new mysqli($host,$user,$password,$db);
			
						if(!mysqli_connect_error()){

							$select="SELECT username From users Where username = ? Limit 1";
							$insert="INSERT Into users (name,lab_no,username,password,post) Values(?,?,?,?,?)";

							$stmt=$conn->prepare($select);
							$stmt->bind_param("s",$username);
							$stmt->execute();
							$stmt->bind_result($username);
							$stmt->store_result();
							$row_num=$stmt->num_rows;
			
							if($row_num==0){
								$stmt->close();
								$stmt=$conn->prepare($insert);
								$stmt->bind_param("sisss",$name,$lab_no,$username,$pass,$post);
								$stmt->execute();
								echo "<script>alert('Registration successfull !!');
								window.location.href='welcome.php';</script>";					
		
							}
							else{
									echo "<script>alert('Someone already registered for same username!!');
											          	window.location.href='registration.php';</script>";
							}
							$stmt->close();
							$conn->close();
						}
						else{
								echo("Connection is not successful.");
								echo mysqli_connect_error();

						}
					}
					else{
						echo "<script>alert('Password should be at least 5 charecter !');
						window.location.href='registration.php';</script>";			}
			}else{
				echo "<script>alert('Name not valid');
				window.location.href='registration.php';</script>";			}
			}
			else{
				echo "<script>alert('Lab no is not valid!!');
				window.location.href='registration.php';</script>";
			}	
		

		}
		else{
			echo "<script>alert('Password is not conform!');
			window.location.href='registration.php';</script>";		}
	}
	
	
	else{
		//<dialog><p>All field are required!!</p></dialog>
		echo "<script>alert('wrong password');
		window.location.href='registration.php';</script>";
		die();
	}

?>

