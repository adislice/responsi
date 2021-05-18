<?php  
include 'conn.php';
include 'utils.php';

session_start();

$result = '';
$ret = '';
$res_msg = '';

$conn = new KoneksiDB("root","");

$connection = $conn->getConnection();
if (!$connection) {
	$res_msg = "Kesalahan Server!";
	goto out;
}

if (isset($_POST['submit'])) {
	$NIK = $_POST['NIK'];
	$nama = $_POST['nama'];
	$jabatan = $_POST['jabatan'];
	$alamat = $_POST['alamat'];

	$query_nik = "SELECT nik FROM tb_pegawai WHERE nik = '" . $NIK . "'";
	$result_nik = mysqli_query($connection, $query_nik);

	if(!$result_nik){
		die("Query gagal dijalankan : " . mysqli_errno($connection) . " - " . mysqli_error($connection));
	}

	if (mysqli_num_rows($result_nik) > 0) {
		$res_msg = "Data dengan NIK " . $NIK . "sudah ada!";
		goto out;
	}

	if(!empty($_FILES['foto']['name'])) {
		try {
			$check_foto = verifyFile($_FILES,'foto');
			if ($check_foto) {
				$array = explode('.', $_FILES['foto']['name']);
				$ext = end($array);
				$fname = 'images/pp_' . $NIK . '.' . $ext;
				if (!move_uploaded_file($_FILES['foto']['tmp_name'], $fname)) {
					$res_msg = "Gagal mengunggah file!";
					goto out;
				}
				$foto_path = $fname;
			}
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			$res_msg = "Gagal mengunggah file! Reason : " . $e->getMessage();
			goto out;
		}	
	} else {
		$foto_path = "";
	}

	if ($jabatan == "Direktur") {
		$kd_jabatan = "J001";
	} else if ($jabatan == "Manager") {
		$kd_jabatan = "J002";
	} else if ($jabatan == "Operator") {
		$kd_jabatan = "J003";
	}

	$query = "INSERT INTO tb_pegawai VALUES ('NULL','$NIK', '$nama','$alamat','$kd_jabatan', '$foto_path')";
	$result = mysqli_query($connection, $query);

	if(!$result){
		$res_msg = "Gagal memasukkan data! " . mysqli_errno($connection) . " - " . mysqli_error($connection);
	}
	$res_msg = "Input data berhasil!";

}

out:
$ret = "ok";
$_SESSION['result'] = $ret;
$_SESSION['result_msg'] = $res_msg;

header("location: input.php");
?>