<div class="card-body">
    <p class="login-box-msg">Login Page</p>

    <!-- notif sukses -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <!-- notif gagal -->
    <div class="flash-gagal" data-gagal="<?= $this->session->flashdata('gagal'); ?>"></div>


    <form id="authvalidation" action="<?= base_url('auth'); ?>" method="post">
        <div class="input-group mb-3">
            <input type="text" id="email1" name="email1" value="<?= set_value('email1'); ?>" class="form-control" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
    </p>
    <p class="mb-0">
        <a href="<?= base_url('auth/registration'); ?>" class="text-center">Register a new membership</a>
    </p>
</div>
<!-- /.card-body -->