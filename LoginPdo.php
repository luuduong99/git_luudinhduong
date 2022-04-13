<?php
    session_start();
    require('connect.php');

    if (isset($_POST['login']))
    {
        unset($_SESSION["errors"]);
        $error = array();

        if (empty(trim($_POST['email']))) {
            $error['email'] = 'Email không được để trống.';
        } elseif (strlen(trim($_POST['email'])) > 255) {
            $error['email'] = 'Email dài hơn 255 kí tự.';
        } elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'Email không hợp lệ.';
        }

        if (empty(trim($_POST['password']))) {
            $error['password'] = 'Password không được để trống.';
        } elseif (strlen(trim($_POST['password'])) < 6 || strlen(trim($_POST['password'])) > 100) {
            $error['password'] = 'Password không được nhỏ hơn 6 kí tự và dài hơn 100 kí tự.';
        }
        if(empty($error)) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $query = "select * from users where email='$email' and password='$password'";
            if($remember == 1) {
                setcookie('email', $email , time()+ 360,"/","",0,0);
                setcookie("password", $password, time()+360,"/","",0,0);
            }
            $statement = executeQuery($query);
            $count = $statement->rowCount();
            if ($count > 0) {
                $_SESSION["email_login"] = $_POST["email"];
                $_SESSION["success"] = "<script type='text/javascript'>alert('Đăng nhập thành công!');</script>";
                header("location: LoginSuccessPdo.php");
            } else {
                $_SESSION["errors"] = "<script type='text/javascript'>alert('Đăng nhập thất bại!');</script>";
                header("location:LoginPdo.php");
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
        <?php echo isset($_SESSION["errors"]) ? $_SESSION['errors'] : ""; ?>
        <div class="panel panel-primary" id="formContent">
            <div class="panel-heading">
                <h2 class="text-center">Login</h2>
            </div>
            <form action="" method="POST" >
                    <div class="panel-body">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email'];  ?>">
                        <?php if (isset($error['email'])): ?>
                            <p style="color: red;"><?php echo $error['email']; ?></p>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'];  ?>">
                        <?php if (isset($error['password'])): ?>
                            <p style="color: red;"><?php echo $error['password']; ?></p>
                        <?php endif ?>
                    </div>
                    <div class="remember">
                        <input type="checkbox"  name="remember" value=" <?php if(isset($_COOKIE['email'])) echo 'checked'; ?>">
                        <label>Remember login</label>
                    </div>
                    <button class="btn btn-success" name="login" type="submit">Login</button>
                    <button class="btn btn-success" name="submit" type="submit"><a href="RegisterPdo.php" style="color: white;">Register</a></button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
