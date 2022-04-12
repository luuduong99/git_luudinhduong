<?php
    session_start();
    require('connect.php');
?>
<?php
    if (isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
       //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt
       //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
        $email = strip_tags($email);
        $email = addslashes($email);
        $password = strip_tags($password);
        $password = addslashes($password);

        $remember = isset($_POST['remember']) ? 1 : 0;
        if ($email =='' || $password == '') {
            echo "vui long nhap lai";
        } else {
            $query = "select * from users where email='$email' and password='$password'";
            if($remember == 1) {
                setcookie('username', $email , time()+ 3600,"/","",0,0);
                setcookie("password", $password, time()+3600,"/","",0,0);

            }
            $statement = executeQuery($query);
            $count = $statement->rowCount();
            if($count > 0) {
                $_SESSION["email_login"] = $_POST["email"];
                header("location: LoginSuccessPdo.php");
            } else {
                echo '<p>Tài khoản hoặc mật khẩu sai</p>';
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="panel panel-primary" id="formContent">
            <div class="panel-heading">
                <h2 class="text-center">Login</h2>
            </div>
            <form action="" method="POST" >
                    <div class="panel-body">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email'];  ?>" required> <br> <br>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'];  ?>" required>
                    </div>
                    <div class="remember">
                        <input type="checkbox"  name="remember" value=" <?php if(isset($_COOKIE['email'])) echo 'checked';  ?>">
                        <label>Remember login</label>
                    </div>
                    <button class="btn btn-success" name="submit" type="submit">Login</button>
                    <button class="btn btn-success" name="submit" type="submit"><a href="RegisterPdo.php" style="color: white;">Register</a></button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
