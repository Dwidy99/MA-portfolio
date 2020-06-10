    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        <h2 class="h5 text-gray-900 mb-4">Please Login!</h2>
                                    </div>
                                    <small>
                                        <p>email: admin@gmail.com</p>
                                        <p>password: 1234</p>
                                    </small>

                                    <?php if( $this->session->flashdata('flash') ) : ?>
                                    <div class="alert alert-info" role="alert">
                                        <?= $this->session->flashdata('flash'); ?>
                                    </div>
                                    <?php endif; ?>

                                    <form class="user" action="<?= base_url('auth'); ?>" method="post">

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="email"
                                                name="email" placeholder="Enter Username..."
                                                value="<?= set_value('email'); ?>">
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password"
                                                name="password" placeholder="Password"
                                                value="<?= set_value('password'); ?>">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <h4 class="h5 text-gray-900 mb-4">Find Me!</h4>
                                    </div>
                                    <div class="row justify-content-center">

                                        <div class="col-sm-7">
                                            <a href="https://www.instagram.com/xy_dwi/"
                                                class="btn btn-google btn-user btn-block" target="_blank">
                                                <i class="fab fa-instagram"></i> Instagram
                                            </a>
                                            <a href="https://www.facebook.com/dwiantoyuli/"
                                                class="btn btn-facebook btn-user btn-block" target="_blank">
                                                <i class="fab fa-facebook-f fa-fw"></i> Facebook
                                            </a>

                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row text-center justify-content-center">
                                        <div class="col-lg-3">
                                            <a href="<?= base_url('portfolio'); ?>">My Portfolio</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>