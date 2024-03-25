<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <?php
include("../koneksi.php");
              if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($koneksi,$_POST['email']);
                $password = mysqli_real_escape_string($koneksi,$_POST['password']);

                $result = mysqli_query($koneksi,"SELECT * FROM users WHERE email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['email'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['id'] = $row['id'];
                }else{
                    echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                   echo "<a href='index.php'><button class='btn'>Go Back</button>";
         
                }
                if(isset($_SESSION['valid'])){
                    header("Location: home.php");
                }
              }else{

            
            ?>
    <div class="wrapper">
        <h2>Sign In</h2>
        <form action="" method="post">
            <div class="input-box">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" autocomplete="off" placeholder="Email" required>
            </div>

            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="off" placeholder="Password" required>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
            </div>
            <div class="field">
                <input type="submit" class="btn" name="submit" value="Login" required>
            </div>

            <div class="register-link">
                Don't have account? <a href="access/register.php">Sign Up Now</a>
            </div>
        </form>
    </div>
    </div>
    <?php } ?>
    </div>
</body>

</html>
</body>

</html>