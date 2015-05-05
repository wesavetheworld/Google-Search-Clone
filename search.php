<title><?php echo $_GET['q'] ?> Google Search</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<style type="text/css">
	.btn-primary {
		border-radius: 0px;
	}
	.sear {
		width: 600px;
		border-radius: 0px;
	}
	.sub {
		margin-left: -20px;
	}
	.fa-search, .fa-th-large {
		font-size: 20px;
	}
	ul
{
    list-style-type: none;
}
	.main {

		margin-left: 72x;
	}
	.neee {
		color: green;
	}
</style>
<nav class="navbar navbar-default" style="height: 20px;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://localhost/google/"><img src="images/logo.png" /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <form class="navbar-form navbar-left" role="search" action="search.php" method="GET" name="firstone">
        <div class="form-group">
          <input type="text" class="form-control sear se" name="q" value="<?php echo $_GET['q'] ?>">
        </div>
        <button type="submit" class="btn btn-primary sub"><i class="fa fa-search"></i></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="main">


<?php
$servername = "localhost";
$username = "searcha";
$password = "searcha";
$dbname = "searcha";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['q'])) {

$sql = "SELECT pagecontent, pageurl, description FROM searchengine WHERE pagecontent  LIKE '%$_GET[q]%' OR description LIKE '%$_GET[q]%'  ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='col-sm-8'><ul><li><a target='blank' href=".$row["pageurl"].">".$row["pagecontent"]."</a><br/>"."<span class='neee'>http://".$row["pageurl"]."</span><br/>".$row["description"]."</li></ul></div>";
    }
} else {
    echo "0 results";
}
}
mysqli_close($conn);
?>
</div>
