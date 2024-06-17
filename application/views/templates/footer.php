<footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="#">RSE St. Elisabeth Purwokerto</a>.</strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>

<script src="<?= base_url('assets'); ?>/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

<script src="<?= base_url('assets'); ?>/plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/inputmask/jquery.inputmask.min.js"></script>

<script src="<?= base_url('assets'); ?>/plugins/daterangepicker/daterangepicker.js"></script>

<script src="<?= base_url('assets'); ?>/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

<script src="<?= base_url('assets'); ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="<?= base_url('assets'); ?>/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script src="<?= base_url('assets'); ?>/plugins/bs-stepper/js/bs-stepper.min.js"></script>

<script src="<?= base_url('assets'); ?>/plugins/dropzone/min/dropzone.min.js"></script>

</body>

</html>



<!-- untuk logout -->
<script>
    $('.tombol-logout').on('click', function(e) {
        e.preventDefault();

        const href = $(this).attr('href');

        Swal.fire({
            title: 'Logout',
            text: 'Are you sure you want to Logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    });
</script>
<!-- untuk hapus -->
<script>
    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault();

        const href = $(this).attr('href');

        Swal.fire({
            title: 'Delete',
            text: 'Are you sure you want to delete ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    });
</script>

<!-- utk datatable -->
<script>
    $(function() {
        $("#datatable1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#datatable1_wrapper .col-md-6:eq(0)');
        $('#datatable2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<!-- untuk validasi form  -->
<script>
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
                $(form).submit();
            }
        });
        $('#validation').validate({
            rules: {
                image: {
                    accept: "image/*",

                },

                menu: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "<?= base_url('admin/check_email_exists'); ?>",
                        type: "post",
                        data: {
                            email: function() {
                                return $("#email").val();
                            }
                        }
                    }
                },
            },
            messages: {
                menu: {
                    required: "Please enter menu",
                },
                image: {
                    accept: "Please enter valid image format",
                },
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a valid email address",
                    remote: 'Email already used. Log in to your existing account.'
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

<!-- untuk notifikasi -->
<script>
    $(function() {
        const flashData = $('.flash-data').data('flashdata');
        if (flashData) {
            toastr.success('Congratulation! ' + flashData)
        }
    });
    $(function() {
        const flashData = $('.flash-gagal').data('gagal');
        if (flashData) {
            toastr.error(flashData)
        }
    });
</script>



<script>
    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });
</script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>

<script>
    function imagePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);

        }
    }

    $("#image").change(function() {
        imagePreview(this);
    });
</script>