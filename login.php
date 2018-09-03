<?php

include("connection.php");

if(isset($_POST["email"]) && isset($_POST["password"]))
{

    $email=$_POST["email"];

    $password2 = $_POST['password'];

    $password = md5($password2);
    $result = mysqli_query($conn, "select * from students where email='$email' && password='$password'");

    if(mysqli_num_rows($result) > 0)
    {
       while($row=mysqli_fetch_assoc($result)){

           $output[]=$row;
       }
       print(json_encode($output));
        exit;
    }
    else
    {
        $output[]=array("id"=>"None","reg"=>"None");
        print(json_encode($output));
        exit;
    }
} else{
    $output[]=array("id"=>"None","reg"=>"None");
    print(json_encode($output));

}


?>