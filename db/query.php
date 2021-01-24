<?php
include_once 'condb.php';
session_start();

#addRoom
if (isset($_POST['addRoom'])) {
    $RoomNum = stripslashes($_POST['RoomNum']);
    $RoomNum = mysqli_real_escape_string($conn, $RoomNum);
    $price = stripslashes($_POST['price']);
    $price = mysqli_real_escape_string($conn, $price);
    $type = stripslashes($_POST['type']);
    $type = mysqli_real_escape_string($conn, $type);
    $floor = stripslashes($_POST['floor']);
    $floor = mysqli_real_escape_string($conn, $floor);



    $query1 = "INSERT INTO `room`(`RoomNum`, `price`, `type`,`floors`) VALUES 
        ('$RoomNum','$price','$type','$floor')";
    $result = mysqli_query($conn, $query1);

    if ($result) {
        header("Location: ../room.php");
        $_SESSION['addRoomOK'] = 1;
        unset($_POST['addPost']);
    } else {
        echo $query1;
        $_SESSION['addRoomErr'] = 1;
        unset($_POST['regis']);
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

#addPOST
if (isset($_POST['addPost'])) {
    $name = stripslashes($_POST['name']);
    $name = mysqli_real_escape_string($conn, $name);
    $tel = stripslashes($_POST['tel']);
    $tel = mysqli_real_escape_string($conn, $tel);
    $room = stripslashes($_POST['room']);
    $room = mysqli_real_escape_string($conn, $room);
    $district = stripslashes($_POST['district']);
    $district = mysqli_real_escape_string($conn, $district);
    $amphoe = stripslashes($_POST['amphoe']);
    $amphoe = mysqli_real_escape_string($conn, $amphoe);
    $province = stripslashes($_POST['province']);
    $province = mysqli_real_escape_string($conn, $province);
    $zipcode = stripslashes($_POST['zipcode']);
    $zipcode = mysqli_real_escape_string($conn, $zipcode);
    $numPost = stripslashes($_POST['numPost']);
    $numPost = mysqli_real_escape_string($conn, $numPost);


    $query1 = "INSERT INTO `post`(`name`, `tel`, `room`, `district`,`numPost`, `amphoe`, `province` ,`zipcode`) VALUES 
        ('$name','$tel','$room','$district','$numPost','$amphoe','$province','$zipcode')";
    $result = mysqli_query($conn, $query1);

    if ($result) {

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        date_default_timezone_set("Asia/Bangkok");

        $sToken = "reN5W47HHa6xEDBwlVBnPlnXC6YAYoCM6QOTvtHZJq5";
        $sMessage = "Dear tenants  " . $room . "";
        $sMessage = $sMessage . "    \nHas sent a parcel        \nparcel No." . ' ' . $numPost . "\n";
        $sMessage = $sMessage . '  ' . $name . '  ' . $room . '  ' . $tel . "";
        $sMessage = $sMessage . '  ' . $district . '  ' . $amphoe . '  ' . $province . ' ' . $zipcode . "\n";
        $sMessage = "\n".$sMessage . date("Y-m-d H:i:s") . "      \nIPOSTNam SysTem v 1.0";

        $chOne = curl_init();
        curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
        curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($chOne, CURLOPT_POST, 1);
        curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
        $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($chOne);

        //Result error 
        if (curl_error($chOne)) {
            echo 'error:' . curl_error($chOne);
        } else {
            $result_ = json_decode($result, true);
            echo "status : " . $result_['status'];
            echo "message : " . $result_['message'];
        }
        curl_close($chOne);

        header("Location: ../");
        $_SESSION['regOk'] = 1;

        unset($_POST['addPost']);
    } else {

        header("Location: ../");
        $_SESSION['regErr'] = 1;
        unset($_POST['regis']);
    }
}

if (isset($_POST['editSetting'])) {
    $n = 0;
    if ($_POST['setting_electic'] != null) {
        $query1 = "UPDATE `setting_price` SET `price_electic`='" . $_POST['setting_electic'] . "'";
        $result = mysqli_query($conn, $query1);
        if ($result) {
            $n = $n + 1;
        }
    }
    if ($_POST['setting_water'] != null) {
        $query1 = "UPDATE `setting_price` SET `price_water`='" . $_POST['setting_water'] . "'";
        $result = mysqli_query($conn, $query1);
        if ($result) {
            $n = $n + 1;
        }
    }
    if ($_POST['setting_net'] != null) {
        $query1 = "UPDATE `setting_price` SET `net`='" . $_POST['setting_net'] . "'";
        $result = mysqli_query($conn, $query1);
        if ($result) {
            $n = $n + 1;
        }
    }

    if ($n > 0) {
        $_SESSION['eiditOk'] = 1;
        header("Location: ../setting.php");
        unset($_POST['editSetting']);
    } else {
        $_SESSION['eiditErr'] = 1;
        header("Location: ../setting.php?edit=edit");
        unset($_POST['editSetting']);
    }
}
###addUnit
if (isset($_POST['unit_electicNew'])) {
    $m =  date("n");
    $Year = date("Y");
    $Year = $Year + 543;
    $RoomNum = $_POST['RoomNum'];
    $unit_electicNew = $_POST['unit_electicNew'];
    $x = $_POST['x'];
    $unit_waterNew = $_POST['unit_waterNew'];


    $query1 = "INSERT INTO `unit`(`RoomNum`, `unit_electic`, `unit_water`, `month`, `year`) VALUES ('$RoomNum','$unit_electicNew','$unit_waterNew','$m','$Year')";
    $result = mysqli_query($conn, $query1);

    if ($result) {
        header("Location: ../Unit.php");
        $m=$m-1;
        $query1 = "UPDATE `unit` SET `status`='0' where `RoomNum` ='$RoomNum' and month='$m' and year='$Year' " ;
        $result = mysqli_query($conn, $query1);
        $_SESSION['addUnitOK'] = 1;
        unset($_POST['addPost']);
    } else {

        echo $query1;
        $_SESSION['addUnitErr'] = 1;
        unset($_POST['unit_electicNew']);
    }
}
##login
if (isset($_POST['login'])) {
    $Username = stripslashes($_POST['Username']);
    $Username = mysqli_real_escape_string($conn, $Username);
    $Password = stripslashes($_POST['Password']);
    $Password = mysqli_real_escape_string($conn, $Password);
    $query = "SELECT `firstname`,`lastname`,`role`,`img` FROM `user` WHERE Username='$Username'and Password='" . md5($Password) . "'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $_SESSION['loginsuccess'] = 1;
        $_SESSION['Username'] = $Username;
        $_SESSION['MenuName'] = $row['firstname'] . ' ' . $row['lastname'];
        $_SESSION['MenuRole'] = $row['role'];
        if($_SESSION['MenuRole']!='แอดมิน'){
            
        }

        $_SESSION['img'] = $row['img'];
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
}
