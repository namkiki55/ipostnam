<?php include_once 'db/query.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>I-POST</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css" />
    <!-- Google Font: Prompt -->
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
</head>





<?php if (isset($_SESSION['addUnitOK'])) { ?>
    <div class="d-none addUnitOK"></div>
<?php unset($_SESSION['addUnitOK']);
} ?>
<?php if (isset($_SESSION['addUnitErr'])) { ?>
    <div class="d-none addUnitErr"></div>
<?php unset($_SESSION['addUnitErr']);
} ?>
<?php if (isset($_SESSION['statusOk'])) { ?>
    <div class="d-none Loginsuccess"></div>
<?php unset($_SESSION['statusOk']);
} ?>
<?php if (isset($_SESSION['regOk'])) { ?>
    <div class="d-none Regsuccess"></div>
<?php unset($_SESSION['regOk']);
} ?>
<?php if (isset($_SESSION['regErr'])) { ?>
    <div class="d-none RegError"></div>
<?php unset($_SESSION['regErr']);
} ?>
<?php if (isset($_SESSION['addRoomOK'])) { ?>
    <div class="d-none addRoomOK"></div>
<?php unset($_SESSION['addRoomOK']);
} ?>
<?php if (isset($_SESSION['addRoomErr'])) { ?>
    <div class="d-none addRoomErr"></div>
<?php unset($_SESSION['addRoomErr']);
} ?>
<?php if (isset($_SESSION['eiditOk'])) { ?>
    <div class="d-none eiditOk"></div>
<?php unset($_SESSION['eiditOk']);
} ?>
<?php if (isset($_SESSION['eiditErr'])) { ?>
    <div class="d-none eiditErr"></div>
<?php unset($_SESSION['eiditErr']);
} ?>


<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed">