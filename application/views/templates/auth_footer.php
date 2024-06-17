</div>
<!-- /.card -->
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js?v=3.2.0"></script>
<script src="<?= base_url('assets'); ?>/plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
</body>

</html>
<!-- untuk validasi form di auth -->
<script>
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
                $(form).submit();
            }
        });
        $('#authvalidation').validate({
            rules: {
                name: {
                    required: true,
                },
                email1: {
                    required: true,
                    email: true
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "<?= base_url('auth/check_email_exists'); ?>",
                        type: "post",
                        data: {
                            email: function() {
                                return $("#email").val();
                            }
                        }
                    }
                },
                password: {
                    required: true,
                    minlength: 5
                },
                password1: {
                    required: true,
                    minlength: 5
                },
                password2: {
                    required: true,
                    minlength: 5,
                    equalTo: '#password1'
                },
                terms: {
                    required: true
                },
            },
            messages: {
                name: {
                    required: "Please enter full name",
                },
                email1: {
                    required: "Please enter a email address",
                    email: "Please enter a valid email address",
                },
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a valid email address",
                    remote: 'Email already used. Log in to your existing account.'
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                password1: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                password2: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.input-group').append(error);
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