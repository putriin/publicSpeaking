<?php
include '../koneksi.php';

$id= $_GET['id'];
$confirmation = isset($_GET['confirmation']) ? $_GET['confirmation'] : '';
if ($confirmation === 'yes') {
    mysqli_query($koneksi, "DELETE FROM datapendaftarleo WHERE id='$id'");
    header("location:datapendaftarLEO.php");
} else {
    header("location:delateL.php?id=$id&confirmation=yes");
}
?>