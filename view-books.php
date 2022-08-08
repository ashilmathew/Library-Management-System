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
<html lang="en">
	<title>ViewBooks</title>
	<head>
		<style>
			body {
				height: 100%;
			}

			body {
				background-image: url(static-images/add-book.jpg);
				background-repeat: no-repeat;
				background-size: 100% 100%;
				background-attachment: fixed;
			}

			.container {
				position: absolute;
				top: 40%;
				left: 50%;
				transform: translate(-50%, -50%);
				height: 300px;
			}

			table {
				width: 800px;
				border-collapse: collapse;
				overflow: hidden;
				box-shadow: 0 0 20px rgba(0,0,0,0.1);
			}

			th,
			td {
				padding: 15px;
				background-color: rgba(255,255,255,0.2);
				color: #fff;
				width: 200px;
				overflow:auto;
			}

			th {
				text-align: left;
				width: 200px;
				overflow:auto;
			}

			thead {
				display:block;
				width:100%;
				th {
					background-color: #55608f;
					width:15hw;
				}
			}

			tbody {
				display:block;
				overflow:auto;
				height:400px;
				width:100%;
				tr {
					&:hover {
						background-color: rgba(255,255,255,0.3);
					}
				}	
				td {
					width: 15hw;
					position: relative;
						&:hover {
							&:before {
								content: "";
								position: absolute;
								left: 0;
								right: 0;
								top: -9999px;
								bottom: -9999px;
								background-color: rgba(255,255,255,0.2);
								z-index: -1;
							}
						}
					}
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
			opacity:35%;
			}
		button:hover {
  			transform: scale(1.1);
  
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
		</style>
	</head>
	<body>
	<div class="logout">
		<button class="logout-button"> <a href="logout.php"><img src="static-images/logout.jpg" height ="30" width="30" /></a></button>
	</div>
	<div class="logo">
		<h1 style="color:white;"><a href="dashboard.html">Library Management System</a></h1>
	</div>
<?php

    include('dbconf.php');

    $qry = "SELECT * FROM `books`";
    
    $run = mysqli_query($con,$qry);
    
    if(mysqli_num_rows($run)>0){
        $data = mysqli_fetch_assoc($run);
        ?>
		<div class="container">
			<table>
				<thead>
					<tr>
						<th>ISBN</th>
						<th>Title</th>
						<th>Author</th>
						<th>Edition</th>
						<th>Publication</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $data['isbn'] ?></td>
						<td><?php echo $data['title'] ?></td>
						<td><?php echo $data['author'] ?></td>
						<td><?php echo $data['edition'] ?></td>
						<td><?php echo $data['publication'] ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	<?php
        
        
        
        
    }
    
    else{
        echo"<script>alert('No Books Found'); </script>";
    }



?>
	</body>
</html>