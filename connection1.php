<?php
if (isset($_POST['email'])){
    $servername = "sql12.freesqldatabase.com";
    $username = "sql12675493";
    $password = "7iNBbFr5Be";
    $dbname = "sql12675493";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if (!$con) {
        die("Connection to the database failed due to" . mysqli_connect_error());
    }

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $uname = $_POST['uname'];
    $password = $_POST['password'];

    $select = "SELECT * FROM `user` WHERE email = '$email'";

    $result = mysqli_query($con, $select);

    if (mysqli_num_rows($result) > 0) {
        echo "User already exists!";
    } else {
        $sql = "INSERT INTO `user` (`first_name`, `last_name`, `DOB`, `email`, `phone_no`, `user_name`, `password`) 
                VALUES ('$fname', '$lname', '$dob', '$email', '$phone', '$uname', '$password');";

        if ($con->query($sql) === true) {
            echo "You're Successfully Registered";
            header('Location: login.html'); // Redirect to login page after successful registration
        } else {
            echo "Error: $sql <br>" . $con->error;
        }
    }

    $con->close();
}
?>
