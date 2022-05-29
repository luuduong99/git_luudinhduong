<?php
    session_start();
    require_once('LoginPdo.php');
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
                        <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
                        <?php if (isset($error['email'])): ?>
                            <p style="color: red;"><?php echo $error['email']; ?></p>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                        <?php if (isset($error['password'])): ?>
                            <p style="color: red;"><?php echo $error['password']; ?></p>
                        <?php endif ?>
                    </div>
                    <div class="remember">
                        <input type="checkbox"  name="remember" value="<?php echo isset($_COOKIE['userLogin']) ? $_COOKIE['userLogin'] : ''; ?>">
                        <label>Remember login</label>
                    </div>
                    <button class="btn btn-success" name="login" type="submit">Login</button>
                    <button class="btn btn-success" name="submit" type="submit"><a href="Register.php" style="color: white;">Register</a></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
