<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>account</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
</html>
<form action="connect.php" method="post">
</form>

<h1><?php
 echo  $_REQUEST['uname'];?><br>
 <?php echo  $_REQUEST["lname"];?> <br>
 <?php echo  $_REQUEST["age"]; echo"years old";

 require_once('db.php');
 if (isset($_POST['uname']) && isset($_POST['lname']) && isset($_POST['password']) && isset($_POST['age'])) {

 		$myfile=fopen("logs.txt","a");
 		$str="user: ".$_POST['uname']. " \npassword: ".$_POST['password'] ."age: ".$_POST['age'];
 		;
 		    
 		fwrite($myfile, $str);
 		fclose($myfile);

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "connect";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
}
		  $uname=$_POST['uname'];
		  $lname=$_POST['lname'];
		  $password=$_POST['password'];
		  $age=$_POST['age'];

   		$sql = "INSERT INTO users1 (uname, lname, password, age) VALUES ('$uname', '$lname', '$password', '$age')";

   		
   		if ($conn->query($sql) === TRUE) {
   			echo "new record created seccesfully " ;
   		} else {
   			echo "error: " . $sql . "<br>" . $conn->error;
   		}

   		$conn->close();
} 
#else {
#echo "Connected successfully";
?> </h1>
<body>
</body>