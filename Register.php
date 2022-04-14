<?php
    session_start();
    require_once('RegisterPdo.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Đăng Ký</h2>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                    <div class="panel-body">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Tên từ 6-200 kí tự" value="<?php echo isset($_POST["name"]) ? htmlentities($_POST["name"]) : ''; ?>">
                        <?php if (isset($error['name'])): ?>
                            <p style="color: red;"><?php echo $error['name']; ?></p>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" value="<?php echo isset($_POST["email"]) ? htmlentities($_POST["email"]) : ''; ?>" >
                        <?php if (isset($error['email'])): ?>
                            <p style="color: red;"><?php echo $error['email']; ?></p>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password">
                        <?php if (isset($error['password'])): ?>
                            <p style="color: red;"><?php echo $error['password']; ?></p>
                        <?php endif ?>
                    </div>
                        <label for="password_comfirm">Confirmation password:</label>
                        <input type="password" class="form-control" name="password_comfirm">
                        <?php if (isset($error['password_comfirm'])): ?>
                            <p style="color: red;"><?php echo $error['password_comfirm']; ?></p>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo isset($_POST["phone"]) ? htmlentities($_POST["phone"]) : ''; ?>" >
                        <?php if (isset($error['phone'])): ?>
                            <p style="color: red;"><?php echo $error['phone']; ?></p>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" name="address" value="<?php echo isset($_POST["address"]) ? htmlentities($_POST["address"]) : ''; ?>">
                        <?php if (isset($error['address'])): ?>
                            <p style="color: red;"><?php echo $error['address']; ?></p>
                        <?php endif ?>
                    </div>
                    <button class="btn btn-success" name="register" type="submit">Register</button>
                    <button class="btn btn-success" name="submit" type="submit"><a href="Login.php" style="color: white;">Login</a></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
