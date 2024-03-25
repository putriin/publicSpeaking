<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftaran</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #638889, #89B9AD, #AAD9BB);
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .container2 {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #EFECEC;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .btn {
            display: block;
            width: 20%;
            padding: 10px;
            margin:20px;
            text-align: center;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php
    include '../koneksi.php';

    // Tangkap data dari formulir detail pendaftaran
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $kelas = $_POST['kelas'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $harga = $_POST['harga'];
    $bukti = $_POST['bukti'];

    // Proses penyimpanan data ke dalam database
    $query = "INSERT INTO datapendaftarnajwa (firstname, lastname, gender, kelas, email, nohp, harga, bukti) VALUES ('$firstname', '$lastname', '$gender', '$kelas', '$email', '$nohp', '$harga', '$bukti')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
    ?>

    <div class="container">
        <h2>Detail Pendaftaran Kelas Public Speaking</h2>
        <table>
            <tr>
                <td>First Name <b>:</b></td>
                <td><?php echo $_POST['firstname'] ?></td>
            </tr>
            <tr>
                <td>Last Name <b>:</b></td>
                <td><?php echo $_POST['lastname'] ?></td>
            </tr>
            <tr>
                <td>Gender <b>:</b></td>
                <td><?php echo $_POST['gender'] ?></td>
            </tr>
            <tr>
                <td>Kelas <b>:</b></td>
                <td><?php echo $_POST['kelas'] ?></td>
            </tr>
            <tr>
                <td>Email <b>:</b></td>
                <td><?php echo $_POST['email'] ?></td>
            </tr>
            <tr>
                <td>Phone <b>:</b></td>
                <td><?php echo $_POST['nohp'] ?></td>
            </tr>

            <tr>
                <td>Harga <b>:</b></td>
                <td><?php echo $_POST['harga'] ?></td>
            </tr>
            <tr>
                <td>Bukti <b>:</b></td>
                <td><?php echo $_POST['bukti'] ?></td>
            </tr>
</div>
        </table>
        <br>
        <br>
        <div class="container2">
        <h2>Detail Informasi Pendaftaran Kelas Public Speaking</h2>
        <?php
            echo "<h3>Mentor: Najwa Shihab</h3>";
            echo "<p>Jenis Kelas: Online & Offline</p>";
            echo "<p>Alamat: Rp. Jl.Mawar No 90 Jakarta Pusat</p>";
            echo "<p>Jadwal Kelas: Senin & Rabu</p>";
            echo "<p>Jam: 19.00 - 21.00</p>";
            echo "<p>Jika Anda Mengikuti Kelas Online Kami, Link Zoom Akan di berikan melalui email anda pada h-1 sebelum kelas di mulai,</p>";
        
        ?>
</div>
        <div>
        <a href="datapendaftarNAJ.php" class="btn btn-sm btn-info pull-right">Kembali</a><br><br>
</div>
        <!-- <table>


    </table> -->


    </div>
</body>

</html>