<?php
if (isset($_POST['uname'])) {
    $servername = "sql12.freesqldatabase.com";
    $username = "sql12675493";
    $password = "7iNBbFr5Be";
    $dbname = "sql12675493";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if (!$con) {
        die("Connection to the database failed due to" . mysqli_connect_error());
    }

    $uname = $_POST['uname'];
    $password = $_POST['password'];

    $select = "SELECT * FROM `user` WHERE user_name = '$uname' AND password = '$password' ";

    $result = mysqli_query($con, $select);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            header('Location: Home/home.html'); // Redirect to a welcome page upon successful login
            exit();
        } else {
            echo "Invalid Email/Username or Password";
        }
    } else {
        echo "Query execution failed: " . mysqli_error($con);
    }

    $con->close();
}
?>
