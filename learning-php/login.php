<?php
	error_reporting(E_ALL);
	//include('includes/json.php');
	session_start();
	header('Content-Type: application/json');
	if(isset($_POST['email']))
	{
		$servername = "localhost";
		$username = "root";
		$password = "1403";
		$database = "user";
		
		$conn = mysqli_connect($servername, $username, $password, $database);
		if (!$conn) 
		{
		    die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT name FROM user_details WHERE `email` = '".$_POST['email']."' AND `password` = '".$_POST['password']."'";
		$result = mysqli_query($conn, $sql);
		$num_row = mysqli_num_rows($result);
		$row=mysqli_fetch_assoc($result);
		//echo "$sql";
		if( $num_row == 1 ){
			$name = $row['name'];
			$data = array('status' => 'true', 
						     'name' => $name );
			echo json_encode($data);
			$_SESSION['user'] = $row['name'];
		}
		else {
			$data = array('status' => 'false', 
						    'name' => '' );
			echo json_encode($data);
		}
		mysqli_close($conn);
	}
	else{
			$data = array('status' => 'false', 
						    'name' => '' );
			echo json_encode($data);
			header('location:index.php');
	}


/*$arr = array('a' => 1, 
			 'b' => 2, 
			 'c' => 3, 
			 'd' => 4, 
			 'e' => 5);

 echo json_encode($arr);
*/

?>
