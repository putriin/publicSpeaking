<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php
session_start(); // Pastikan session dimulai

include "../koneksi.php";

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Check if ID parameter is present
if (isset($_GET['id'])) {
    // Get the id from the URL
    $id = $_GET['id'];

    // Get the existing data for the id
    $sql = "SELECT * FROM datapendaftartsana WHERE id=?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $row = $result->fetch_assoc();

        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $number = $_POST['number'];

            // Update the data in the database using prepared statement
            $update_sql = "UPDATE datapendaftartsana SET firstName=?, lastname=?, gender=?, email=?, number=? WHERE id=?";
            $stmt = $koneksi->prepare($update_sql);
            $stmt->bind_param('sssssi', $firstName, $lastName, $gender, $email, $number, $id);
            $stmt->execute();

            // Check the number of affected rows
            $cek = $stmt->affected_rows;

            if ($cek > 0) {
                $_SESSION['firstName'] = $firstName;
                $_SESSION['lastName'] = $lastName;
                
                $_SESSION['status'] = "simpan";
                header("location:admin/datapendaftarTSANA.php");
            } else {
                header("location:index.php?pesan=gagal");
            }
        }
    } else {
        echo "Error fetching record: " . $koneksi->error;
    }
} else {
    echo "No ID parameter provided!";
}

$koneksi->close();
?>

<form action="proses_updateT.php" method="post">
    <label for="firstName">First Name</label>
    <input type="text" name="firstName" id="firstName" value="<?php echo $row['firstName']; ?>">
    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

    <label for="lastName">Last Name</label>
    <input type="text" name="lastName" id="lastName" value="<?php echo $row['lastName']; ?>">

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>">

    <label for="number">Phone Number</label>
    <input type="text" name="number" id="number" value="<?php echo $row['number']; ?>">

    <label for="gender">Gender</label>
    <input type="text" name="gender" id="gender" value="<?php echo $row['gender']; ?>">

    <!-- Add more fields as needed -->

    <input type="submit" value="Submit">
</form>
</body>
</html>
