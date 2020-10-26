
<?php
        if($_SESSION['post']=="hod");
        else
        die;
?>
<html>
<body>
<?php


				$host="localhost";
				$user="root";
				$password="";
				$db="lms";
				$conn = new mysqli($host,$user,$password,$db);
			
				if(!mysqli_connect_error()){

					$adddata = 'SELECT * FROM users WHERE  post != "hod"';
					$stmt = $conn->prepare($adddata);
				//	$stmt->bind_param("s",$_SESSION['post']);
					$stmt->execute();
					$result=$stmt->get_result();
				
					echo("<form action='unmake_post.php' method='POST'>");
					echo("<table border='1'>");
					echo ("<td><h3>Select</td>    <td><h3>Name</td>    <td><h3>Username</td>    <td><h3>Lab_No    <td><h3>Post</td>");


					while($row = $result->fetch_assoc()){
						echo("<tr>");
						$var=$row['username'];
						echo ("<td><input type='radio' name='remove' value = $var></td>");
						echo ("<td>".$row['name']."</td>    <td>".$row['username']."</td>    <td>".$row['lab_no']."    <td>".$row['post']."</td>");
					//	echo(" ".$row['name']."  username : ".$row['username']."  lab no : ".$row['lab_no']."  post : ".$row['post']);
						echo("<tr>");
					//	$meals[] = $row['name'];
					//	sort($meals);
					}

					echo("<tr style='text-align:center'><td><button type='submit'>remove</button></td></tr>");
					echo("</table>");
					echo("</form>");

					$conn->close();
				}
				else{
				echo("Connection is not successful.");
				}
?>
</html>
</body>
