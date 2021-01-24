<?php
include_once 'condb.php';
session_start();

if (isset($_POST['reg'])) {
    $Username = stripslashes($_POST['Username']);
    $Username = mysqli_real_escape_string($conn, $Username);
    $Password = stripslashes($_POST['Password']);
    $Password = mysqli_real_escape_string($conn, $Password);
    $tel = stripslashes($_POST['tel']);
    $tel = mysqli_real_escape_string($conn, $tel);
    $query1 = "INSERT INTO `user`( `username`, `password`, `tel`,`role`,`demd`) VALUES ('$Username','" . md5($Password) . "','$tel','ผู้ใช้ทั่วไป','$Password')";
    $result = mysqli_query($conn, $query1);
    if ($result) {
        
        header("Location: ../");
        $_SESSION['regisOk'] = 1;
        unset($_POST['reg']);
    } else {
        header("Location: ../");
        $_SESSION['regisErr'] = 1;
        unset($_POST['reg']);
    }
}



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
##edit

if (isset($_POST['update'])) {

    $firstname = stripslashes($_POST['firstname']);
    $firstname = mysqli_real_escape_string($conn, $firstname);
    $lastname = stripslashes($_POST['lastname']);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);
    $line = stripslashes($_POST['line']);
    $line = mysqli_real_escape_string($conn, $line);
    $tel = stripslashes($_POST['tel']);
    $tel = mysqli_real_escape_string($conn, $tel);
    $img = stripslashes($_POST['img']);
    $img = mysqli_real_escape_string($conn, $img);
    $query = "UPDATE `user` SET `password`='".md5($password)."',`tel`='$tel',`firstname`='$firstname',`lastname`='$lastname',`line`='$line',`img`='$img',`demd`='$password' where username ='".$_SESSION['Username']."'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['img'] =$img;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] =$lastname;
        $_SESSION['tel']=$tel;
        $_SESSION['Password']=md5($password);
        $_SESSION['line']=$line;
        $_SESSION['updateOK']=1;
        header("Location: ../profile.php");
        unset($_POST['update']);
        
    } else {
        $_SESSION['updateErr']=1;
        header("Location: ../profile.php");
        unset($_POST['update']);
    }
}


##login
if (isset($_POST['login'])) {
    $Username = stripslashes($_POST['Username']);
    $Username = mysqli_real_escape_string($conn, $Username);
    $Password = stripslashes($_POST['Password']);
    $Password = mysqli_real_escape_string($conn, $Password);
    $query = "SELECT * FROM `user` WHERE Username='$Username'and Password='" . md5($Password) . "'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $_SESSION['loginsuccess2'] = 1;
        $_SESSION['Username'] = $Username;
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['MenuName'] = $row['firstname'] . ' ' . $row['lastname'];
        $_SESSION['MenuRole'] = $row['role'];
        $_SESSION['line'] = $row['line'];
        $_SESSION['tel'] = $row['tel'];
        $_SESSION['img'] = $row['img'];
        $_SESSION['Password'] = $row['password'];
        $_SESSION['id'] = $row['id'];
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
    if ($_SESSION['MenuRole'] != 'แอดมิน') {
        $_SESSION['loginerror'] = 1;
    }
}
