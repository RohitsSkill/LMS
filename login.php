<?php
	session_start();

?>
<html>
<head>
<script>
myfunc(){
	alert("wrong password");
	if(window.confirm('really go to anoter page')){

	}
}

</script>

<style>
.alert{
	padding:20px;
	background-color:#f44336;
	color:White;
	margin-bottom:15px;

}
.closebtn{
	margin-left:15px;
	color:White;
	font-weight:bold;
	float:right;
	font-size:22px;
	cursor:pointer;
	transition:0.3s;

}	
.closebtn:hover{
	color:black;
}

</style>

</head>
<body>
<?php

	$username=$_POST['username'];
	$password=$_POST['password'];
	$post=$_POST['post'];
	$_SESSION["username"]=$username;


				$host="localhost";
				$user="root";
				$pass="";
				$db="lms";
				$conn = new mysqli($host,$user,$pass,$db);
			
				if(!mysqli_connect_error()){

					$select_for_pass="SELECT * From users Where username = ? and password = ? Limit 1";
					
					$stmt=$conn->prepare($select_for_pass);
					$stmt->bind_param("ss",$username,$password);
					$stmt->execute();
					$stmt->store_result();
					$row_num=$stmt->num_rows;
					$stmt->close();

					$select_post='SELECT * FROM users WHERE username = ? Limit 1';
					$stmt=$conn->prepare($select_post);
					$stmt->bind_param("s",$username);
					$stmt->execute();
					$result=$stmt->get_result();
					$user=$result->fetch_assoc();

						$_SESSION['name']=$user['name'];
						$_SESSION['post']=$user['post'];
						$_SESSION['username']=$user['username'];
						$_SESSION['lab_no']=$user['lab_no'];
				
						if($row_num==1){
					
						$select_for_post="SELECT * From users Where username = ? and post = ? Limit 1";

							$stmt=$conn->prepare($select_for_post);
							$stmt->bind_param("ss",$username,$post);
							$stmt->execute();
							$stmt->store_result();
							$row_num=$stmt->num_rows;

							if($row_num==1){
								if($post=="hod"){	
									echo("you are hod");
									$_SESSION['login']=1;
									header("Location:h_h.php");

								}
								if($post=="admin"){
									echo("you are admin");
									$_SESSION['login']=1;
									header("Location:a_h.php");

								}
								if($post=="li"){
									echo("you are li");
									$_SESSION['login']=1;
									header("Location:li_h.php");

								}
								if($post=="NULL"){
									echo "<script>alert('You are not posted user,meet your HOD to get post.');
									window.location.href='welcome.php';</script>";								}
							}
							else{
								echo "<script>alert('Check your post else meet your HOD.');
								window.location.href='welcome.php';</script>";							}


					}
					else{
					

						echo "<script>alert('wrong password');
								window.location.href='welcome.php';</script>";
				
					}
					$stmt->close();
					$conn->close();
				}
				else{
					echo "<script>alert('Connection is not successfull!!');
					window.location.href='welcome.php';</script>";				}
	
?>
</body>
</html>
