<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$ID_PELANGGAN=$_GET['ID_PELANGGAN'];
	$sql="DELETE FROM PELANGGAN WHERE ID_PELANGGAN = '$ID_PELANGGAN'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:PELANGGAN.php');
}

elseif ($act=='input'){

	$nama = $_POST["nama"];
 	$alamat = $_POST["alamat"];

   $sql="insert into PELANGGAN values ('','$nama','$alamat') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:PELANGGAN.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$ID_PELANGGAN = $_POST["ID_PELANGGAN"];
	$nama = $_POST["nama"];
 	$alamat = $_POST["alamat"];

	$sql = "UPDATE PELANGGAN SET NAMA_PELANGGAN='$nama', ALAMAT='$alamat' WHERE ID_PELANGGAN='$ID_PELANGGAN'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);

	if($prepare)
	{
	header('location:PELANGGAN.php');
	}
	else {echo "gagal";}

}
?>
