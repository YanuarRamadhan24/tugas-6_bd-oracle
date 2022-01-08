<?php
include("koneksi.php");

$act=$_GET['act'];

if ($act=='delete'){
	$id_menu=$_GET['id_menu'];
	$sql="DELETE FROM DAFTAR_MENU WHERE id_menu = '$id_menu'";
	$prepare = ociparse($koneksi, $sql);
	ociexecute($prepare);
	oci_commit($koneksi);
	header('location:DAFTAR_MENU.php');
}

elseif ($act=='input'){
	$nama = $_POST["nama"];
 	$harga = $_POST["harga"];

   $sql="insert into DAFTAR_MENU values ('','$nama','$harga') ";
   $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   

	if($prepare)
	{
	header('location:DAFTAR_MENU.php');
	}
	else {echo "gagal";}

}


elseif ($act=='update'){
	$id_menu = $_POST["id_menu"];
	$nama = $_POST["nama"];
 	$harga = $_POST["harga"];
	

	$sql = "UPDATE MENU SET NAMA_MENU='$nama', HARGA_MENU='$harga' WHERE ID_MENU='$id_menu'";

	 $prepare = ociparse($koneksi, $sql);
   ociexecute($prepare);
   oci_commit($koneksi);
   if($prepare)
	{
	header('location:DAFTAR_MENU.php');
	}
	else {echo "gagal";}
   



}
?>
