<?php
include_once 'condb.php';
session_start();


#search
if (isset($_POST['search'])) {
    $key = stripslashes($_POST['Key']);
    $key = mysqli_real_escape_string($conn, $key);
    $_SESSION['Key'] = $key;
    $_SESSION['Search'] = 1;

    header("Location: ../");
    unset($_POST['search']);
}

#searchRoom
if (isset($_POST['searchRoom'])) {
    $key = stripslashes($_POST['Key']);
    $key = mysqli_real_escape_string($conn, $key);
    $_SESSION['Key'] = $key;
    $_SESSION['SearchRoom'] = 1;
    header("Location: ../room.php");
    unset($_POST['searchRoom']);
}


#reset
if (isset($_POST['reset'])) {
    unset($_SESSION['Search']);
    header("Location: ../");
    unset($_POST['reset']);
}
#resetRoom
if (isset($_POST['resetRoom'])) {
    unset($_SESSION['SearchRoom']);
    header("Location: ../room.php");
    unset($_POST['resetRoom']);
}
#checked
if (isset($_POST['checked'])) {



    $query1 = "UPDATE `post` SET `status`='1' where `id` =" . $_POST['checked'];
    $result = mysqli_query($conn, $query1);
    if ($result) {

        header("Location: ../");
        $_SESSION['MeditOk'] = 1;
        unset($_POST['checked']);
    } else {
        header("Location: ../");
        $_SESSION['MeditErr'] = 1;
        unset($_POST['checked']);
    }


    unset($_POST['checked']);
}

##login
if (isset($_POST['login'])) {
    $Username = stripslashes($_POST['Username']);
    $Username = mysqli_real_escape_string($conn, $Username);
    $Password = stripslashes($_POST['Password']);
    $Password = mysqli_real_escape_string($conn, $Password);
    $query = "SELECT `firstname`,`lastname`,`role` FROM `user` WHERE Username='$Username'and Password='" . md5($Password) . "'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $_SESSION['loginsuccess2'] = 1;
        $_SESSION['Username'] = $Username;
        $_SESSION['MenuName'] = $row['firstname'] . ' ' . $row['lastname'];
        $_SESSION['MenuRole'] = $row['role'];

       
        $_SESSION['statusOk'] = 1;
    }
    if ($_SESSION['Username'] != '') {
        
        header("Location: ../");
        unset($_POST['login']);
    } else {
        header("Location: ../login.php");
        $_SESSION['loginerror'] = 1;
        unset($_POST['login']);
    }
    if( $_SESSION['MenuRole']!='แอดมิน'){
        $_SESSION['loginerror'] = 1;
    }
}
