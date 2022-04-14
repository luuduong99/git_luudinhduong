<?php
    require('connect.php');

//lấy dũ liệu
    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $error = array();
        $query = "select * from users where email='$email'";
        $statement = executeQuery($query);
        $count = $statement->rowCount();

    // validate
        //name
        if (empty(trim($_POST['name']))) {
            $error['name'] = 'Name không được để trống.';
        } elseif (strlen(trim($_POST['name'])) < 6 || strlen(trim($_POST['name'])) > 200) {
            $error['name'] = 'Name không được nhỏ hơn 6 kí tự và dài hơn 200 kí tự.';
        }

        if (empty(trim($_POST['address']))) {
            $error['address'] = 'Address không được để trống.';
        }

        if (empty(trim($_POST['phone']))) {
            if (strlen(trim($_POST['phone'])) < 10 || strlen(trim($_POST['phone'])) > 20) {
                $error['phone'] = 'Phone không được nhỏ hơn 10 kí tự và dài hơn 20 kí tự.';
            } elseif (!preg_match("/^[0-9]*$/", $phone)) {
                echo "Vui lòng chỉ nhập giá trị số.";
            }
        }

        if (empty(trim($_POST['email']))) {
            $error['email'] = 'Email không được để trống.';
        } elseif (strlen(trim($_POST['email'])) > 255) {
            $error['email'] = 'Email dài hơn 255 kí tự.';
        } elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'Email không hợp lệ.';
        } elseif ($count == 1) {
            $error['email'] = 'Email này đã tồn tại.';
        }

        if (empty(trim($_POST['password']))) {
            $error['password'] = 'Password không được để trống.';
        } elseif (strlen(trim($_POST['password'])) < 6 || strlen(trim($_POST['password'])) > 100) {
            $error['password'] = 'Password không được nhỏ hơn 6 kí tự và dài hơn 100 kí tự.';
        } elseif (trim($_POST['password']) !== trim($_POST['password_comfirm'])) {
            $error['password_comfirm'] = 'Password confirm không khớp.';
        }

        if (empty($error)) {
            $query = "insert into users set email='$email', name='$name', password='$password', phone='$phone', address='$address'";
            $statement = executeQuery($query);
            echo "<script> alert('Đăng kí thành công !');
            window.location.href='Login.php' </script>";
        }
    }
