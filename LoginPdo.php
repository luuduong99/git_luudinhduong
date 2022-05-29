<?php
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
        if (empty($error)) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password = md5($password);
            $query = "select * from users where email='$email' and password='$password'";
            $statement = executeQuery($query);
            $count = $statement->rowCount();
            if ($count == 1) {
                $infor = $statement->fetch();
                $_SESSION["user"] = array(
                    'id' => $infor->id,
                    'email' => $infor->email
                );
                if (isset($_POST['remember'])) {
                    setcookie('email', $email, time() + 3600 * 24 * 7);
                    setcookie('password', $password, time() + 3600 * 24 * 7);
                    setcookie('userLogin', $_POST['remember'], time() + 3600 * 24 * 7);
                } else {
                    setcookie('email', $email, 30);
                    setcookie('password', $password, 30);
                }
                    echo "<script> alert('Đăng nhập thành công !');
                    window.location.href='LoginSuccessPdo.php' </script>";
            } else {
                echo "<script> alert('Đăng nhập thất bại !');
                    window.location.href='Login.php'</script>";
            }
        }
    }
?>
