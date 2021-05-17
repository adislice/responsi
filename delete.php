<!DOCTYPE html>
<html>
<head>
	<title>Search Data</title>
	<style type="text/css">
		body {
			margin: 0;
		}
		header {
			text-align: center;
			
			background-color: white;
		}
		nav {
			font-weight: 600;
			font-family: 'Arial';
		}
		nav ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
			background-color: #18191d;
			padding: 0 10px 0 10px;
		}
		nav ul li {
			float: left;
		}
		nav ul li a {
			display: block;
			color: white;
			text-align: center;
			padding: 20px 16px;
			text-decoration: none;
			transition: .5s ease;
		}
		nav ul li a:hover {
			background-color: #2196f3;
		}
		.selected {
			background-color: #2196f3;
		}
		.form-hapus{
			width: 96%;
			background-color: #EEEEEE;
			padding: 20px;
			margin: auto;
			border-radius: 5px;
			font-family: 'Arial';
		}
		
		h1, p, footer {
			font-family: Arial;
		}
		input {
	      	width:100%;
	      	box-sizing:border-box;
	      	border: 4px solid lightgrey;
			border-radius: 10px;
			padding: 8px;
		}
		input[type="submit"] {
			margin-top: 20px;
			height: 40px;
			background-color: #2196f3;
			color: white;
			border: 1px solid #2196f3;
			border-radius: 10px; 
		}
		p {
			margin-top: 10px;
			margin-bottom: 5px;
		}
		.hapus-data {
			width: 60%;
			margin: 0 auto;
			margin-top: 50px;
		}
	</style>
</head>
<body>
	<nav>
		<ul>
			<li><a href="input.php">Tambah Data</a></li>
			<li><a href="search.php">Search Data</a></li>
			<li><a href="delete.php" class="selected">Hapus Data</a></li>
		</ul>
	</nav>
	<section class="hapus-data">
		<div class="form-hapus">
			<h2 style="text-align: center;font-family: Arial">Hapus Data</h2>
			<form name="hapus" id="hapus" method="post" action="delete_process.php">
				<p>NIK</p>
				<input type="text" name="NIK" id="NIK" placeholder="Nomor Induk Keluarga">
				<input type="submit" name="hapus" id="hapus" value="Hapus Data">
			</form>
		</div>
		
	</section>
	

</body>
</html>