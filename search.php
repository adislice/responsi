<!DOCTYPE html>
<html>
<head>
	<title>Search Data</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<nav>
		<ul>
			<li><a href="input.php">Tambah Data</a></li>
			<li><a href="search.php" class="selected">Search Data</a></li>
			<li><a href="delete.php">Hapus Data</a></li>
		</ul>
	</nav>
	<section class="search-data">
		<div class="form-search">
			<h2>Cari Data</h2>
			<form name="search" id="search" method="post" action="search_result.php">
				<p>Nama</p>
				<input type="text" name="nama" id="nama">
				<input type="submit" name="search" id="search" value="Cari Data">
			</form>
		</div>

	</section>
	

</body>
</html>