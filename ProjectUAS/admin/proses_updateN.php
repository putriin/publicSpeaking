<?php


include "../koneksi.php";

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$body  = $_POST;
// var_dump($body);die();


$stmt = $koneksi->prepare("UPDATE datapendaftarnajwa SET
firstname = ? ,
lastname = ? ,
gender = ? ,
email = ? ,
nohp = ?  WHERE id = ?");


$stmt->bind_param('ssssss',
    $body['firstname'],
    $body['lastname'],
    $body['gender'],
    $body['email'],
    $body['nohp'],
    $body['id']);

$stmt->execute();

//redirect
header("location:datapendaftarNAJ.php");