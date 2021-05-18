<?php 
include 'conn.php';
include 'utils.php';

session_start();

$conn = new KoneksiDB("root", "");
$connection = $conn->getConnection();

if (!$connection) {
	$res_msg = "Kesalahan Server!";
	goto out;
}

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$query_delete = "DELETE from tb_pegawai WHERE id_pegawai = '$id'";
	$result_delete = mysqli_query($connection, $query_delete);

	if(!$result_delete){
		die("Query gagal dijalankan : " . mysqli_errno($connection) . " - " . mysqli_error($connection));
	}

	$res_msg = "Data berhasil dihapus!";
}

out:
$ret = "ok";
$_SESSION['result'] = $ret;
$_SESSION['result_msg'] = $res_msg;

header("location: search.php");
?>

