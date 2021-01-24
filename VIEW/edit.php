<?php
include_once 'includes/header.php';
$_SESSION['tbmember'] = 1;
?>
<?php if (isset($_SESSION['loginsuccess2'])) { ?>
    <?php


    ?>
    <div class="wrapper">
        <?php include_once 'includes/navbar.php'; ?>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link text-center">
                <span class="brand-text font-weight-light">I_POST V1.0</span>
            </a>
            <!-- Sidebar -->
            <div class='sidebar'>
                <!-- Sidebar user panel (optional) -->
                <div class='user-panel mt-3 pb-3 mb-3 d-flex'>
                    <div class='image'>
                        <img src='<?=$_SESSION['img']?>' class='img-circle elevation-2' alt='User Image' />
                    </div>
                    <div class='info'>
                        <a href='' class='d-block'><?php echo $_SESSION['MenuName'] ?> </a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class='mt-2'>
                    <ul class='nav nav-pills nav-sidebar flex-column' data-widget='treeview' role='menu' data-accordion='false'>
                        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                        <li class='nav-item '>
                            <a href='./' id='index' class='nav-link '>
                                <i class='nav-icon fas fa-book'></i>
                                <p>
                                    POST LIST
                                </p>
                            </a>
                        </li>

                        <li class='nav-item'>
                            <a href='./logout.php' class='nav-link'>
                                <i class='nav-icon fas fa-sign-out-alt'></i>
                                <p>
                                    LOGOUT
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper p-4">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->
            <!-- Modal Add Thesis-->
            <div class="modal fade show" id="find" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                        <!-- form start -->
                        <div class='modal-header'>
                            <h5 class='modal-title' id='find'>Search Parcel</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="db/query.php" method="POST" enctype="multipart/form-data">
                                <label for="basic-url">Search By No./Tel./Room.</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="Key" id="name" required>
                                </div>

                                <!-- /.modal-body -->
                                <div class="card-footer">
                                    <button type="submit" style="width: 100%;" class="btn btn-success" id="search" name="search">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade show" id="addthesis" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                        <!-- form start -->
                        <div class='modal-header'>
                            <h5 class='modal-title' id='addthesis'>Add Parcel</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="db/query.php" method="POST" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col">
                                        <label for="basic-url">No.</label>
                                        <div class="input-group mb-3">

                                            <input type="text" class="form-control" name="numPost" id="numPost" required>
                                        </div>
                                        <label for="basic-url">Name</label>
                                        <div class="input-group mb-3">

                                            <input type="text" class="form-control" name="name" id="name" required>
                                        </div>

                                        <label for="basic-url">Tel.</label>
                                        <div class="input-group mb-3">

                                            <input type="tel" class="form-control" name="tel" id="tel" required>
                                        </div>
                                        <label for="basic-url">Room</label>
                                        <div class="input-group mb-3">

                                            <input type="text" class="form-control" name="room" id="room" required>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <label for="basic-url">district</label>
                                        <div class="input-group mb-3">

                                            <input type="text" class="form-control" name="district" id="district" required>
                                        </div>

                                        <label for="basic-url">amphoe </label>
                                        <div class="input-group mb-3">

                                            <input type="text" class="form-control" name="amphoe" id="amphoe" required>
                                        </div>

                                        <label for="basic-url">province</label>
                                        <div class="input-group mb-3">

                                            <input type="text" class="form-control" name="province" id="province" required>
                                        </div>
                                        <label for="basic-url">zipcode</label>
                                        <div class="input-group mb-3">

                                            <input type="text" class="form-control" name="zipcode" id="zipcode" required>
                                        </div>
                                        <div class="alert alert-warning" role="alert">
                                            *** Suggest to use a zip code and then choose as needed.
                                        </div>
                                    </div>
                                </div>

                                <!-- /.modal-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success" id="addPost" name="addPost">summit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">

                <div class="row mb-2">
                    <div class="col-sm-6">


                        <h3 class="m-2 text-dark">Profile</h3>

                        <!-- <form action="#" method="post">
            <button type="submit" name="resetRoom" class="btn btn-success">
                <i style="color:white   " class="fas fa-redo-alt "></i>
            </button>
        </form> -->
                    </div>
                </div>

                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body " style="height: 100%;">
                        <form action="db/query.php" method="post">
                            <div class="form-group ">
                                <div class="text-center">
                                     <img src="<?=$_SESSION['img'];?>" width="200px" height="200px" class="rounded">
                                </div>
                            </div>
                          
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label for="inputEmail4">firstname</label>
                                    <input type="text" class="form-control" value="<?= $_SESSION['firstname']; ?>" name="firstname" id="firstname" required>
                                </div>
                                <div class="form-group col-md">
                                    <label for="inputEmail4">lastname</label>
                                    <input type="text" class="form-control" value="<?= $_SESSION['lastname']; ?>" name="lastname" id="lastname" required>
                                </div>
                                <div class="form-group col-md">
                                    <label for="inputEmail4">password</label>
                                    <input type="password" class="form-control" value="" name="password" id="password" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label for="inputEmail4">line</label>
                                    <input type="text" class="form-control" value="<?= $_SESSION['line']; ?>" name="line" id="line" required>
                                </div>
                                <div class="form-group col-md">
                                    <label for="inputEmail4">tel</label>
                                    <input type="text" class="form-control" value="<?= $_SESSION['tel']; ?>" name="tel" id="tel" required>
                                </div>
                                <div class="form-group col-md">
                                    <label for="inputEmail4">img</label>
                                    <input type="text" class="form-control" value="<?= $_SESSION['img']; ?>" name="img" id="img" required>
                                </div>
                            </div>

                           
                            <button type="submit" name="update" class="btn btn-warning">save</button>
                          
                        </form>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

            <!-- End Modal -->
            <!-- Main content -->
            <section class="content">
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                    </div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>

        <?php include_once 'includes/content-footer.php'; ?>
    </div>
<?php } else {
    header("Location: ../VIEW/login.php");
}


?>

<!-- ./wrapper -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
<link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
<?php
include_once 'includes/footer.php';
?>