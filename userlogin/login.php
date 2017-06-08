<?php
    $result = validateLogin();
	print $result;
	function validateLogin(){
			$username = $_GET["username"];
			$password = $_GET["password"];
			$querySt = "select * from user_details where email='$username' AND password='$password'";
			$conn = new mysqli('sql3.freesqldatabase.com', 'sql392170', 'dE2%mJ6*','sql392170');
			$resultSet = $conn->query($querySt);
	        
			if(!$resultSet){
				return 'false';
			}
			while($row = mysqli_fetch_row($resultSet)) {
				    $firstname = $row[1];
					$firstnamePosn = strpos($firstname, " ");
					if($firstnamePosn){
						$firstname = substr($firstname, 0, $firstnamePosn); 
					}
					session_start();
					$_SESSION['username'] = $firstname;
					
					return $firstname;
			}
	}
?>