<?php


include "../koneksi.php";

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$body  = $_POST;
// var_dump($body);die();


$stmt = $koneksi->prepare("UPDATE datapendaftartsana SET
firstName = ? ,
lastName = ? ,
gender = ? ,
email = ? ,
number = ?  WHERE id = ?");


$stmt->bind_param('ssssss',
    $body['firstName'],
    $body['lastName'],
    $body['gender'],
    $body['email'],
    $body['number'],
    $body['id']);

$stmt->execute();

//redirect
header("location:datapendaftarTSANA.php");