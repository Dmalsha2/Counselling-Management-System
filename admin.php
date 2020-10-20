<!DOCTYPE html>
<html>
<head>
	<title>Admin panel</title>
	<style>
		body{
			margin: 0px;
			border: 0px;
		}
		#header{
			width: 100%;
			height: 120px;
			background: black;
			color: white;
		}
		#link a{
			text-decoration: none;
			position: absolute;
			top:20px;
			right: 45px;
			font-size: 30px;
			color: white;

		}
		#link a:hover{
			color: blue;
		}
		#sidebar{
			width: 300px;
			height: 400px;
			background-color: yellow;
			float: left;
		}
		#sidebar a{
			text-decoration: none;
		}
		#data {
			height: 500px;
			background: white;
		}
		#adminlogo{
			background-color: white;
            height: 80px;
            width: 130px;
            border-radius: 60px;
		}
		ul{
             list-style: none;
		}
		ul li{
			padding: 20px;
			border-bottom: 2px solid rgba(113,118,195,0.31);

		}
		ul li:hover{
              background: rgba(113,118,195,0.31);
              color: blue;
		}

	</style>
</head>
<body>
<div id="header">
	<center><img src="image/23938578fb8d88c02bc59906d12230f3.png" alt="admin logo" id="adminlogo"></center>
	<center><p><b>WELCOME ADMIN</p></b></center>
	<div id="link">
		<a href="panel_out.php">Logout</a>
		</div>
</div>




</body>
</html>