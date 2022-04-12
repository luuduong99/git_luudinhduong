<?php
    session_start();
    require('connect.php');
?>
<?php
//lấy dũ liệu
if (isset($_POST['submit'])) {
    $name = ($_POST['name']);
    $email = ($_POST['email']);
    $phone = ($_POST['phone']);
    $password = ($_POST['password']);
    $password_comfirm = ($_POST['password_comfirm']);
    $address = ($_POST['address']);

// validate
    //name
    if ( $name === 0 && (strlen($name) > 6 && strlen($name) < 200)) {
        echo "Tên không hợp lệ. Vui lòng nhập lại";
    }

    //email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && (strlen($email) > 0 && strlen($email) < 255)) {
        echo "Email không hợp lệ. Vui lòng nhập lại";
    }

    //phone
    if (strlen($phone) < 10 && strlen($phone) > 20) {
        echo "Phone không hợp lệ. Vui lòng nhập lại";

    } elseif (!preg_match("/^[0-9]*$/", $phone)) {
        echo "Bạn chỉ được nhập giá trị số.";
    }

    //passwordword
    if (strlen($password) < 6 && strlen($password) > 100) {
        echo "passwordWord không hợp lệ. Vui lòng nhập lại";
    }

    //passwordword confirm
    if ($password_comfirm !== $password) {
        echo "passwordword confirm không hợp lệ. Vui lòng nhập lại";
    }
    //address
    if (empty($address)) {
        echo "Chưa nhập địa chỉ. Vui lòng nhập lại";
    }
    $password = md5($_POST['password']);
    $queryCheck = "select email from users where email='$email'";
	$statement = executeQuery($queryCheck);
    if($statement->rowCount() > 0)
		echo "email da ton tai";
    else {
        $query = "insert into users set email='$email', name='$name', password='$password', phone='$phone', address='$address'";
        $statement = executeQuery($query);
        header("location: LoginPdo.php");
    }
    // $query = "insert into users set email='$email', name='$name', password='$password', phone='$phone', address='$address'";
    // $statement = executeQuery($query);
    // header("location: LoginPdo.php");
}
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
                    <input required type="text" class="form-control" name="name" placeholder="Tên từ 6-200 kí tự" value="<?php echo $_POST['name']?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input required type="email" class="form-control" name="email" value="<?php echo $_POST['email']?>" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" class="form-control" name="phone" value="<?php echo $_POST['phone']?>">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input required type="password" class="form-control" name="password" value="<?php echo $_POST['password']?>">
                </div>
                    <label for="password_comfirm">Confirmation password:</label>
                    <input required type="password" class="form-control" name="password_comfirm" value="<?php echo $_POST['password_comfirm']?>">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" name="address" value="<?php echo $_POST['address']?>">
                </div>
                <button class="btn btn-success" name="submit" type="submit">Register</button>
                <button class="btn btn-success" name="submit" type="submit"><a href="LoginPdo.php" style="color: white;">Login</a></button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
