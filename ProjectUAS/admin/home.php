<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Admin Dashboard</title>
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(to right, #4E6E81, #6D9886, #89B9AD);
        color: #fff;
        /* White text color */
    }

    .container {
        display: flex;
        justify-content: space-around;
        align-items: flex-start;
        /* Aligned to the top */
        height: 100vh;
        margin-top: 50px;
        animation: fadeIn 1s ease-in;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    h2 {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        text-align: center;
        margin: 20px 0;
        /* Adjusted margin */
    }

    .class-card {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 30px;
        /* Adjusted padding */
        width: 20%;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        /* Shadow effect */
        text-align: center;
        margin: 10px;
        /* Added margin */
        transition: transform 0.3s ease;
        /* Smooth transition for transform */
    }

    .class-card:hover {
        transform: scale(1.05);
        /* Slightly scale up when hovered */
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background: white;
        color: black;
        border-radius: 5px;
        text-decoration: none;
        transition: background 0.3s ease;
        /* Smooth transition for background */
    }

    .btn:hover {
        background: #628E90;
    }

    .icon {
        font-size: 24px;
        margin-bottom: 10px;
    }
    </style>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <h2>Dashboard</h2>
    <div class="container">
        <div class="class-card">
            <h2>Leo's Class</h2>
            <div class="online">
                <h3><i class="fas fa-users icon"></i> Data Pendaftar Kelas Leo</h3>
                <a href="datapendaftarLEO.php?class=leo&mode=online" class="btn">View Details</a>
            </div>
        </div>
        <div class="class-card">
            <h2>Tsana's Class</h2>
            <div class="online">
                <h3><i class="fas fa-users icon"></i> Data Pendaftar Kelas Tsana</h3>
                <a href="datapendaftarTSANA.php?class=tsana&mode=online" class="btn">View Details</a>
            </div>
        </div>
        <div class="class-card">
            <h2>Shihab Class</h2>
            <div class="online">
                <h3><i class="fas fa-users icon"></i> Data Pendaftar Kelas Shihab</h3>
                <a href="datapendaftarNAJ.php?class=shihab&mode=online" class="btn">View Details</a>
            </div>
        </div>
    </div>


</body>

</html>