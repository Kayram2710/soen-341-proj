<?php 
	include_once 'views/header.php';
	include_once 'includes/dbh.inc.php';
?>

<h1>Search results</h1>

<div>
<?php  
	if(isset($_POST['submit-search'])){
		$search = mysqli_real_escape_string($conn, $_POST['search']);
		$sql = "SELECT * FROM `user` WHERE fName LIKE '%$search%' OR lName LIKE '%$search%' OR email LIKE '%$search%';";

		$result = mysqli_query($conn, $sql);
		$queryResult = mysqli_num_rows($result);

		if($queryResult > 0){
			while($row = mysqli_fetch_assoc($result)){
				echo "<div>";
				echo "<p> User's  Name: " . $row['lName'] . "," . $row['fName'] . "</p>";
				echo "<p> User's email: " . $row['email'] . "</p>";
				echo "<p> Their role: " . $row['role'] . "</p><br>";
				//Add two buttons
				echo "</div>";
			}
		}else{
			echo "There are no search results matching your search!";
		}
	}

?>
</div>