<?php
require 'config.php';
ini_set('date.timezone', 'Asia/Jakarta');
$nip = $_POST['nip'];
$nm_guru = $_POST['nm_guru'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];
$email = $_POST['email'];
$id_input = $_POST['id_guru'];

$target_path = "assets/img/guru/";

$target_path = $target_path . basename( $_FILES['foto']['name']); 

if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)) {
   $id_edit = $_POST['id_edit'];
   $data[] = $nip;
   $data[] = $nm_guru; //1
   $data[] = $alamat; //2
   $data[] = $tlp; //3
   $data[] = $email; //4
   $data[] = $_FILES['foto']['name']; //5
   $data[] = $id_input; //6
   $data[] = date("Y-m-d h:i:s"); //7
   $data[] = $id_edit; //6
   $sql = 'UPDATE t_guru SET nip=?,nm_guru=?,alamat=?,tlp=?,email=?,foto=?,id_input=?,tgl_update=?
           WHERE id_guru = ?';
   $row = $config -> prepare($sql);
   $row -> execute($data);
   echo '<script>alert("Ubah Data Berhasil");window.location="guru.php";</script>';
} 
else{
   $id_edit = $_POST['id_edit'];
   $data[] = $nip;
   $data[] = $nm_guru; //1
   $data[] = $alamat; //2
   $data[] = $tlp; //3
   $data[] = $email; //4
   $data[] = $id_input; //6
   $data[] = date("Y-m-d h:i:s"); //7
   $data[] = $id_edit; //6
   $sql = 'UPDATE t_guru SET nip=?,nm_guru=?,alamat=?,tlp=?,email=?,id_input=?,tgl_update=?
           WHERE id_guru = ?';
   $row = $config -> prepare($sql);
   $row -> execute($data);
   echo '<script>alert("Ubah Data Berhasil");window.location="guru.php";</script>';
}


