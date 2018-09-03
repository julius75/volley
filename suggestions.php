<?PHP

include("connection.php");

if(isset($_POST['title']) && isset($_POST['description']))
{

    $title=$_POST["title"];
    $description=$_POST["description"];
    $user_id=$_POST["user_id"];




    $result = mysqli_query($conn, "SELECT description FROM suggestions WHERE description = '".$description."'");
    if(mysqli_num_rows($result) > 0)
    {
        echo "suggestion exist exist";
        exit;
    }
    else {
        $query = "INSERT INTO suggestions(user_id,title,description)VALUES('$user_id','$title','$description')";

        $data = mysqli_query($conn, $query);

        if ($data) {
            echo "Successfully posted your suggestion";
        } else {
            echo "Error in posting the suggestion please try again";
        }

        exit;
    }
}

