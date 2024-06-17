            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form id="authvalidation" action="<?= base_url('auth/registration'); ?>" method="post">
                    <div class="input-group ">
                        <input type="text" id="name" name="name" class="form-control" placeholder="Full name" value="<?= set_value('name'); ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mt-3">
                        <input type="text" remote="cek" id="email" name="email" class="form-control 
                        <?php if (form_error('email')) : ?>
                            is-invalid
                            <?php endif; ?>                      
                        " placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('email', '<small   class="text-danger">', '</small>'); ?>
                    <div class="input-group mt-3">
                        <input type="password" id="password1" name="password1" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mt-3">
                        <input type="password" id="password2" name="password2" class="form-control" placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block ">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <a href="<?= base_url('auth'); ?>" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->