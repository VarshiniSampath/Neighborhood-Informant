<?php
    $result = searchDBWithQuery();
	print $result;
	function searchDBWithQuery()
		{
			$queryCondition = $_GET["queryString"];
			$querySt = "select * from house_details1 where $queryCondition";
			$conn = new mysqli('sql3.freesqldatabase.com', 'sql392170', 'dE2%mJ6*','sql392170');
			$resultSet = $conn->query($querySt);
	       
			while($rs[] = mysqli_fetch_assoc($resultSet)) {
			}

			$rs=array_slice($rs,0, count($rs)-1);
			$jsonresult=json_encode($rs);
			return $jsonresult;
	}
?>