<?php  
include 'conn.php';
include 'utils.php';

$conn = new KoneksiDB("root","");
$connection = $conn->getConnection();

if (isset($_POST['search'])) {
	$nama = $_POST['nama'];
	$query = "SELECT id_pegawai, nama, nik, alamat, nama_jabatan, foto_path FROM tb_pegawai INNER JOIN tb_jabatan ON tb_pegawai.id_jabatan = tb_jabatan.id_jabatan WHERE INSTR(nama, '$nama') > 0";
	$result = mysqli_query($connection, $query);

	if(!$result){
		die("Query gagal dijalankan : ".mysqli_errno($connection)." - ".mysqli_error($connection));
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Hasil Pencarian</title>
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
		<div class="search-result">
			<h2>Hasil Pencarian</h2>
<?php 
	if (mysqli_num_rows($result) > 0) {
		echo "<table class='search-table'>
				<th>NIK</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Jabatan</th>
				<th>Foto</th>";
		while($data = mysqli_fetch_assoc($result)){
			$foto = $data['foto_path'];
			echo "<tr>";
			echo "<td>" . $data['nik'] . "</td>";
			echo "<td>" . $data['nama'] . "</td>";
			echo "<td>" . $data['alamat'] . "</td>";
			echo "<td>" . $data['nama_jabatan'] . "</td>";
			echo "<td style=\"text-align:center\"><img class=\"img-modal\"src='" . $foto . "'></img></td>";
			echo "</tr>";

		}
		echo "</table>";
	} else {
		echo "Data tidak ditemukan!<br>";
	}
?>
		<div id="myModal" class="modal">
			<span class="close">&times;</span>
			<img class="modal-content" id="img01"></img>
			<div id="caption"></div>
		</div>
		</div>
	</section>

</body>
<script src="js/main.js"></script>
</html>
