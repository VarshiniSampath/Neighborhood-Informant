<?php
    $result = registerUser();
	print $result;
	function registerUser()
	{
		$email = $_GET["email"];
		$username = $_GET["username"];
		$password = $_GET["password"];
		
		$conn = new mysqli('sql3.freesqldatabase.com', 'sql392170', 'dE2%mJ6*','sql392170');
		$querySt1 = "select * from user_details where email='$email'";
		$resultSet = $conn->query($querySt1);
	    $numRows = mysqli_num_rows($resultSet);
		
        if(!($numRows==FALSE) && !($numRows>0)){
				return 'alreadyexists';
		}	
		
		$querySt2 = "insert into user_details values('$email', '$username', '', '' , '$password')";
		if($conn->query($querySt2)==TRUE){
			$usernamePosn = strpos($username, " ");
			if($usernamePosn){
				$username = substr($username, 0, $usernamePosn); 
			}
			session_start();
			$_SESSION['username'] = $username;
			return $username;
		}
		else{
			return 'false';
		}		
	}
?>