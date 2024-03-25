<?php
include '../koneksi.php';

$id= $_GET['id'];
$confirmation = isset($_GET['confirmation']) ? $_GET['confirmation'] : '';
if ($confirmation === 'yes') {
    mysqli_query($koneksi, "DELETE FROM datapendaftartsana WHERE id='$id'");
    header("location:datapendaftarTSANA.php");
} else {
    header("location:delateT.php?id=$id&confirmation=yes");
}
?>