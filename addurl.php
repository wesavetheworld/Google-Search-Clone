<form action="addurl.php" method="POST" name="firstone">
	<input type="text" name="content" placeholder="content" />
	<input type="text" name="url" placeholder="url"/>
	<input type="textarea" name="description" placeholder="description"/>
	<button type="submit" name="submit" value="cont">Submit Data</button>
</form>
<?php
$servername = "localhost";
$username = "searcha";
$password = "searcha";
$dbname = "searcha";

$urlofmine = $_POST['url'];
$conofmine = $_POST['content'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['submit'])) {
$sql = "INSERT INTO searchengine (pageurl, pagecontent, description)
		VALUES ('$_POST[url]', '$_POST[content]', '$_POST[description]')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>
