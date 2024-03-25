<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>

    <div class="wrapper">
        <div class="container">
            <div class="box form-box">

                <?php
                include("../../koneksi.php");
                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    // verifikasi unik email

                    $verify_query = mysqli_query($koneksi, "SELECT email FROM users WHERE email='$email'");
                    if (mysqli_num_rows($verify_query) != 0) {
                        echo "<div class='message'>
                            <p>This email is used, Try another one please!</p>
                        <div><br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    } else {
                        mysqli_query($koneksi, "INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')") or die("Error Occured");

                        echo "<div class='message'>
                            <p>Registration Successfully!</p>
                        <div><br>";
                        echo "<a href='../index.php'><button class='btn'>Login Now</button>";
                    }
                } else {
                ?>
                <h2>Register</h2>
                <form action="" method="post">
                    <div class="input-box">
                        <label for="email">Username</label>
                        <input type="text" name="username" id="username" autocomplete="off" placeholder="Username"
                            required>
                    </div>
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" placeholder="Email" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" placeholder="Password"
                            required>
                    </div>
                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Register" required>
                    </div>

                    <div class="register-link">
                        Have an account? <a href="../index.php">Log in</a>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>

</body>

</html>