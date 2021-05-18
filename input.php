<?php 
include 'conn.php';
include 'utils.php';

session_start();

if (isset($_SESSION['result']) || !empty($_SESSION['result'])) {
	if ($_SESSION['result'] == "ok") {
		alert($_SESSION['result_msg']);
	}
	session_destroy();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<?php 
$conn = new KoneksiDB("root","");

if (!$conn->getConnection()) {
	echo "<div class='conn-err'>Koneksi Gagal! <a href=\"javascript:window.location.reload(true)\" class='reload'>Reload</a></div>";
}

	?>
	<nav>
		<ul>
			<li><a href="input.php" class="selected">Tambah Data</a></li>
			<li><a href="search.php">Search Data</a></li>
			<li><a href="delete.php">Hapus Data</a></li>
		</ul>
	</nav>
	
	<section class="tambah-data">
		<div class="form-tambah">
			<h2 style="text-align: center;font-family: Arial">Tambah Data</h2>
			<form name="tambah" id="tambah" method="post" action="input_process.php" enctype="multipart/form-data">
				<p>NIK</p>
				<input type="text" name="NIK" id="NIK" placeholder="Nomor Induk Keluarga" required>
				<p>Nama</p>
				<input type="text" name="nama" id="nama" required>
				<p>Alamat</p>
				<input type="text" name="alamat" id="alamat" required>
				<p>Foto</p>
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
				<input type="file" name="foto" id="foto">
				<p>Jabatan</p>
				<select name="jabatan" required>
					<option value="Direktur">Direktur</option>
					<option value="Manager">Manager</option>
					<option value="Operator">Operator</option>
				</select>
				<input type="submit" name="submit" value="Tambah Data">
			</form>
		</div>
	</section>

</body>
</html>