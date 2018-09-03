<?PHP

include("connection.php");

if(isset($_POST['name']) && isset($_POST['email'])&& isset($_POST['password']))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password2 = $_POST['password'];

    $password = md5($password2);

    //$password = password_hash($password2, PASSWORD_DEFAULT);

    $result = mysqli_query($conn, "SELECT email FROM users WHERE email = '".$email."'");
    if(mysqli_num_rows($result) > 0)
    {
        echo "email exist";
        exit;
    }
    else
    {
        $query="INSERT INTO users(name,email,password)VALUES('$name','$email','$password')";

        $data=mysqli_query($conn,$query);

        if($data)
        {
            echo "Successfully Signed In";
        }
        else
        {
            echo "Error Sign in please try again";
        }

        exit;
    }
}

?>