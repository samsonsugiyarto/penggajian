<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Access Blocked</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body>
    <section class="content mt-5">
        <div class="error-page">
            <h2 class="headline text-danger">403</h2>
            <div class="error-content">
                <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Website Bloked!.</h3>
                <p>
                    The request page is blocked by a web filter
                    <a href="<?= base_url('user'); ?>"> <br> Back to user page</a>
                </p>
            </div>
        </div>

    </section>



    <script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>

    <script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js?v=3.2.0"></script>

</body>

</html>