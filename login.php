<?php 

    session_start();

    if (isset($_POST['username'])) {

        include('connection.php');

        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordenc = md5($password);
        

        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$passwordenc'";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['id'];
            $_SESSION['user'] = $row['firstname'];
            $_SESSION['ser'] = $row['lastname'];
            $_SESSION['job'] = $row['jobposition'];
            $_SESSION['emp'] = $row['employeecode'];
            $_SESSION['tel'] = $row['phone'];
            $_SESSION['userlevel'] = $row['userlevel'];
            

            if ($_SESSION['userlevel'] == 'm') {
                header("Location: user_page.php");
            }

            if ($_SESSION['userlevel'] == 'a') {
                header("Location: admin_page.php");
            }

            
        } else {
            echo ("User หรือ Password ไม่ถูกต้อง");
            header("Location: index.php");
            //echo "<script> alert ('User หรือ Password ไม่ถูกต้อง);</script>";
            echo ("User หรือ Password ไม่ถูกต้อง");
        }

    } else {
        header("Location: index.php");
    }


?>