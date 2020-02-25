<?php	

$host = '';
$dbusername = 'root';
$dbpassword = 'TwH1gUIbEUMD';
$dbname = 'task';

$name = filter_input($_POST["name"]);
$email = filter_input($_POST["email"]);
$message = filter_input($_POST["message"]);
var_dump($name ,$email,$message);
$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

if (mysqli_connect_error())
{
	die('Connect Error ('. mysqli_connect_errno() .') ' . mysqli_connect_error());
}
else
{
	$sql = "INSERT INTO emails (name, email,message)
			 values ('$name','$email','$message')";
			
		if ($conn->query($sql))
		{
			echo "New record is inserted sucessfully";
		}
		else
		{
			echo "Error: ". $sql ." ". $conn->error;
		}
	$conn->close();

}

?>
