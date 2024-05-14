<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "login");
if (!$con) {
    // echo "database isn't connected";
    echo mysqli_connect_error();
} else {
    // echo "connected";
}

if (isset($_POST['LoginBtn'])) {
    $username = $_POST['usernameLogin'];
    $password = $_POST['passwordLogin'];
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $stmt = $con->prepare($query);
    $stmt->execute();
    $data = $stmt->get_result();
    if ($data->num_rows == 1) {
        foreach ($data as $key => $value) {


            $_SESSION['logedIn'] = true;
            $_SESSION['username'] = $value['UserName'];
            header("Location: ./access.php");
        }
    } else {
        echo "User name or password incorrect! Please check again";
        // sleep(5);
        // header("Location: ./");
    }
}

if (isset($_POST['SignupBtn'])) {
    $username = $_POST['usernameSignup'];
    $password = $_POST['passwordSignup'];
    $passwordC = $_POST['passwordConfirmSignup'];
    if ($password != $passwordC) {
        echo 'password mismatch';
    } else {
        $query = "SELECT * FROM user WHERE username='$username'";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $data = $stmt->get_result();
        if ($data->num_rows == 1) {
            echo "User already exsists!! <a href='./'>Try Login</a> ";
        } else {
            $query = "INSERT INTO user(username,password,type) VALUES ('$username','$password','Normal')";
            $stmt = $con->prepare($query);
            if ($stmt->execute()) {
                echo "Account Created! You can <a href='./'>Try Login </a> now";
                // header("Location: ./");
            } else {
                echo $stmt->error;
            }

        }
    }

}
