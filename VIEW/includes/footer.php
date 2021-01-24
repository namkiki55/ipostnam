    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
    <!-- Font -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
    <script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>

    <script>
        $.Thailand({
            $district: $('#district'), // input ของตำบล
            $amphoe: $('#amphoe'), // input ของอำเภอ
            $province: $('#province'), // input ของจังหวัด
            $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
        });
    </script>
    <script type="text/javascript">
        $(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            $('.Loginsuccess').show(function() {
                toastr.success('ยินดีต้อนรับ :' + ' ' + '<?php echo $_SESSION["Username"]; ?>')
            });
            $('.Regsuccess').show(function() {
                toastr.success('เพิ่มพัสดุเรียบร้อย ! ')
            });
            $('.RegError').show(function() {
                toastr.error('เพิ่มพัสดุไม่สำเร็จ โปรดลองใหม่อีกครั้ง!!')
            });

            $('.addRoomOK').show(function() {
                toastr.success('เพิ่มห้องพักสำเร็จ ! ')
            });
            $('.addRoomErr').show(function() {
                toastr.error('เพิ่มห้องพักไม่สำเร็จ โปรดลองใหม่อีกครั้ง!!')
            });
            $('.eiditOk').show(function() {
                toastr.success('อัพเดทการตั้งค่าสำเร็จ')
            });
            $('.eiditErr').show(function() {
                toastr.error('กรุณากรอกค่าให้เรียบร้อย')
            });
            $('.addUnitOK').show(function() {
                toastr.success('บันทึกสำเร็จ ! ')
            });
            $('.addUnitErr').show(function() {
                toastr.error('บันทึกไม่สำเร็จ ! ')
            });
            $('.updateOK').show(function() {
                toastr.success('บันทึกสำเร็จ ! ')
            });
            $('.updateErr').show(function() {
                toastr.error('บันทึกไม่สำเร็จ ! ')
            });


        

            $('.toastrDefaultInfo').show(function() {
                toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultError').show(function() {
                toastr.error('Lorem ipsum dolor sit amets, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultWarning').show(function() {
                toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
        });


        function chkpass(str) {
            const pass = document.getElementById('password').value;
            const confpass = document.getElementById('confirm-password').value;
            const err = document.getElementById('err');
            if (pass != '') {
                if (confpass !== str) {
                    err.innerHTML = 'รหัสผ่านไม่ตรงกัน';
                } else {
                    err.innerHTML = '';
                }
            }
        }

        function chkConfirmPass(str) {
            const pass = document.getElementById('password').value;
            const confpass = document.getElementById('confirm-password').value;
            const err = document.getElementById('err');
            if (pass != '') {
                if (pass !== str) {
                    err.innerHTML = 'รหัสผ่านไม่ตรงกัน';
                } else {
                    err.innerHTML = '';
                }
            }
        }
        let i = 1;

        function add() {
            if (i < 3) {
                i++;
                $('#input-n').append(`<div class='input-group mb-3' id=${i}>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' id='tline'><i class='fas fa-user'></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="tname" name="name${i}" placeholder="ชื่อ นามสกุล" maxlength="25" minlength="3" required>
                                        <button class="btn btn-success px-4" onclick="add()" id="plus"><i class="fas fa-plus"></i></button>
                                        <button class="btn btn-danger px-4" id="minus" onclick="del()"><i class="fas fa-minus"></i></button>
                                    </div>`);

            }
        }

        function del() {

            if (i > 1) {
                $(`#${i}`).remove();
                i--;
            }

        }

        let j = 1;

        function addT() {
            if (j < 3) {
                j++;
                console.log(j)
                $('#input-t').append(`<div class='input-group mb-3' id='teacher${j}'>
                                        <div class='input-group-prepend'>
                                            <span class='input-group-text' id='tline'><i class='fas fa-user-graduate'></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="co_advisor" name="co_advisor${j}" placeholder="ปรึกษาร่วม" maxlength="255" minlength="10">
                                        <button class="btn btn-success px-4" onclick="addT()" id="plus"><i class="fas fa-plus"></i></button>
                                        <button class="btn btn-danger px-4" id="minus" onclick="delT()"><i class="fas fa-minus"></i></button>
                                    </div>`);

            }
        }


        function delT() {
            if (j > 1) {
                $(`#teacher${j}`).remove();
                j--;
            }

        }

        let k = 3;

        function addKey() {
            if (k < 6) {
                k++;

                $('#input-Key').append(`<div class='input-group mb-3' id="key${k}">
                                    <div class='input-group-prepend'>
                                        <span class='input-group-text' id='tline'><i class='fas fa-bookmark'></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="book_keyword1" name="book_keyword_${k}" placeholder="ระบุคำสำคัญ" maxlength="255" minlength="5" required><br>
                                     <button class="btn btn-success px-4" onclick="addKey()" id="plus"><i class="fas fa-plus"></i></button>
                                    <button class="btn btn-danger px-4" id="minus" onclick="delKey()"><i class="fas fa-minus"></i></button>
                                </div>`);

            }
        }


        function delKey() {
            if (k > 3) {
                $(`#key${k}`).remove();
                k--;
            }

        }
    </script>
    <style>

    </style>
    </body>

    </html>