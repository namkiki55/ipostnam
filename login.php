<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="" />
  <title>I-POST</title>
  <link rel="stylesheet" href="dist\css\style.css" />
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
</head>

<body >
  <?php if (isset($_SESSION['loginerror'])) {
    echo '<div class="d-none toastrDefaultError"></div>';
    session_destroy();
  } ?>



  <div class="container" id="container">
    <div class="form-container log-in-container">
      <form action="db/query.php" method="POST">
        <h1>Login</h1>
        <p>Please fill in the blank</p>

        <input type="text" id="Username" name="Username" placeholder="Username" maxlength="20" minlength="5" required />
        <input type="password" id="Password" name="Password" placeholder="Password" maxlength="20" minlength="5" required />
        <button type="submit" name="login">LOGIN</button>
      </form>
    </div>
    <div class="overlay-container" style="background-color: red;">
      <div class="overlay">
        <div class="overlay-panel overlay-right">
          <img src="https://www.frooition.com/blog/wp-content/uploads/2018/10/iStock-901093306-1-1024x680.jpg" />
        </div>
      </div>
    </div>
  </div>
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- Toastr -->
  <script src="plugins/toastr/toastr.min.js"></script>

  <script type="text/javascript">
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      $('.toastrDefaultError').show(function() {
        toastr.error('ชื่อผู้ใช้/รหัสผ่าน ไม่ถูกต้อง')
      });

    });
  </script>
</body>

</html>