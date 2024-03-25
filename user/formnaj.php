<!DOCTYPE html>
<html>

<head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #638889, #89B9AD, #AAD9BB);
        }

        .container {
            width: 50%;
            margin: auto;
            margin-top: 50px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        .panel {
            border: 1px solid #e9ecef;
            border-radius: 10px;
        }

        .panel-heading {
            padding: 15px;
            background-color: #92C7CF;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .panel-body {
            padding: 20px;
        }

        h1 {
            color: #444;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            color: #555;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="email"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .form-group .radio-inline {
            display: inline-block;
            margin-right: 15px;
            color: #555;
        }

        .btn-primary,
        .btn-danger {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition-duration: 0.4s;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .file-input-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            top: 0;
            right: 0;
            opacity: 0;
        }

        .file-input-wrapper .btn {
            border: 1px solid #ced4da;
            border-radius: 5px;
            display: inline-block;
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition-duration: 0.4s;
        }

        .file-input-wrapper .btn:hover {
            background-color: #0056b3;
        }

        .file-input-text {
            margin-left: 10px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <h1>Registration Form</h1>
            </div>
            <div class="panel-body">
                <form action="detailN.php" method="post">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required />
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required />
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <div>
                            <label for="male" class="radio-inline"><input type="radio" name="gender" value="m" id="male" required />Male</label>
                            <label for="female" class="radio-inline"><input type="radio" name="gender" value="f" id="female" required />Female</label>
                            <label for="others" class="radio-inline"><input type="radio" name="gender" value="o" id="others" required />Others</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <div>
                            <label for="offline" class="radio-inline"><input type="radio" name="kelas" value="Offline" id="offline" required />Offline</label>
                            <label for="online" class="radio-inline"><input type="radio" name="kelas" value="Online" id="online" required />Online</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required />
                    </div>
                    <div class="form-group">
                        <label for="nohp">Phone Number</label>
                        <input type="nohp" class="form-control" id="nohp" name="nohp" required />
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode (Bank)</label>
                        <input type="text" class="form-control" id="kode" name="kode" value="<?php echo '' . time(); ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label for="bukti">Bukti</label>
                        <div class="file-input-wrapper">
                            <button class="btn">Choose a file</button>
                            <input type="file" id="bukti" name="bukti" accept="image/*" required />
                            <span class="file-input-text"></span>
                        </div>
                    </div>
                    <input type="hidden" id="harga" name="harga" value="250000" />
                    <input type="submit" class="btn btn-primary" />
                    <a href="home.php" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('bukti').addEventListener('change', function () {
            var fileName = this.value.split("\\").pop();
            document.querySelector('.file-input-text').innerText = fileName;
        });

        $('input[name="kelas"]').change(function () {
            var selectedKelas = $('input[name="kelas"]:checked').val();
            var harga;
            if (selectedKelas === 'Online') {
                harga = 260000;
            } else {
                harga = 250000;
            }
            $('#harga').val(harga);
        });

        function formatRupiah(angka) {
            var reverse = angka.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan;
        }
    </script>
</body>

</html>
