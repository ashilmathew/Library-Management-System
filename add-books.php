<?php

session_start();
if(isset($_SESSION['uid']))
{
    echo "";
}
else{
    header('location:login.php');
}
  
?>


<html>
<title>AddBooks</title>
<!-- CSS Style Starting-->
<style type="text/css">
html, 
body {
height: 100%;
}

body {
background-image: url(static-images/add-book.jpg);
background-repeat: no-repeat;
background-size: 100% 100%;
background-attachment: fixed;
}
.zoom {
  zoom: 80%;
}
.logo{
	position: absolute;
	top: 8px;
	left: 16px;
	font-size: 20px;
	font-family: Copperplate, Papyrus, fantasy;
	text-shadow: 0 0 3px #000000;
	}
a { color: inherit;
	text-decoration: none;} 
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #B22222;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

input[type=reset] {
  width: 100%;
  background-color: #800000;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=reset]:hover {
  background-color: #45a049;
}
.input-form {
	border-radius: 5px;
	background-color: rgba(255, 255, 255, 0.2);
	padding: 20px;
	width: 50%;
	position: absolute;
	top: 110px;
	center: 100px;
	left: 350px;
	color: #ffffff;
}
.logout{
position: absolute;
	top:20px;
	right:30px;
	font-size: 15px;
	font-family: "Lucida Handwriting", cursive;
	text-shadow: 0 0 3px #ffffff;
}
.logout-button{
	border-radius: 12px;
	opacity:50%;
	}
button:hover {
  transform: scale(1.1);
  
}
</style>
<!-- CSS Style Ending-->


<!-- Body Starting-->
<body>
	<div class="logo">
		<h1 style="color:white;"><a href="dashboard.html">Library Management System</a></h1>
	</div>
	<div class="logout">
		<button class="logout-button"> <a href="logout.php"><img src="static-images/logout.jpg" height ="30" width="30" /></a></button>
	</div>
	<div class="input-form">
		<h1 style="text-align:center;">Add Books</h1>
		<form action="add-books.php" method="post">
		<label for="isbn">ISBN</label>
		<input type="text" name="isbn" placeholder="Enter ISBN..">

		<label for="title">Title</label>
		<input type="text" name="title" placeholder="Enter Title..">
		
		<label for="author">Author</label>
		<input type="text" name="author" placeholder="Enter Author..">
		
		<label for="edition">Edition</label>
		<input type="text" name="edition" placeholder="Enter Edition..">
		
		<label for="publication">Publication</label>
		<input type="text" name="publication" placeholder="Enter Publication..">

		<input type="submit" value="Submit" name="submit">
		<input type="reset" value="Reset">
		</form>
	</div>
</body>
<!-- Ending-->

</html>

<?php

if(isset($_POST['submit'])){
    $con = mysqli_connect('localhost','root','','lms');

	if($con == false){
		echo "Connection not successful";
	}
    $isbn = $_POST['isbn'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $edition = $_POST['edition'];
    $publication = $_POST['publication'];
        
 
    
    $qry = "INSERT INTO `books`(`isbn`, `title`, `author`, `edition`, `publication`) VALUES ('{$isbn}','{$title}','{$author}','{$edition}','{$publication}')";
   
    $run = mysqli_query($con,$qry);
    
    if($run == true){
        ?>
        <script>
            alert('Data Inserted Successfully');
        </script>
        <?php
    }
	else
	{
		?>
        <script>
            alert('Error inserting data');
        </script>
        <?php
	}
    
        
}

?>

