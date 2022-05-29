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
    <title>User Login</title>
</head>
<body>
    <?php echo isset($_SESSION["success"]) ? $_SESSION['success'] : ""; ?>
    <span style="font-weight:400; color:green; font-size:40px;">
        Chúc mừng bạn đã đăng nhập thành công !!!
    </span><br>
    <button class="btn btn-secondary" style="padding: 10px 20px; margin-top: 50px;">
        <a href='Logout.php' style="text-decoration: none; color:blue; font-size: 20px">Logout</a>
    </button>
</body>
</html>
