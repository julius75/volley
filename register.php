<?php
/**
 * Created by PhpStorm.
 * User: chain
 * Date: 8/27/2018
 * Time: 8:47 AM
 */


if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password2 = $_POST['password'];

    $password = md5($password2);

    require_once 'connect.php';

    $sql = "INSERT INTO students(name, email, password) VALUES ('$name', '$email', '$password')";

    if ( mysqli_query($conn, $sql) ) {
        $result["success"] = "1";
        $result["message"] = "success";

        echo json_encode($result);
        mysqli_close($conn);

    } else {

        $result["success"] = "0";
        $result["message"] = "error";

        echo json_encode($result);
        mysqli_close($conn);
    }
}
