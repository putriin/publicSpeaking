<?php
include '../koneksi.php';

$id= $_GET['id'];
$confirmation = isset($_GET['confirmation']) ? $_GET['confirmation'] : '';
if ($confirmation === 'yes') {
    mysqli_query($koneksi, "DELETE FROM datapendaftarnajwa WHERE id='$id'");
    header("location:datapendaftarNAJ.php");
} else {
    header("location:delateN.php?id=$id&confirmation=yes");
}
?>