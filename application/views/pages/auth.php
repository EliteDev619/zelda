
        <!-- Start Page Title Area -->
        <section class="page-title-area page-title-bg1">
            <div class="container">
                <div class="page-title-content">
                    <h1 title="MY ACCOUNT">MY ACCOUNT</h1>
                </div>
            </div>
        </section>
        <!-- End Page Title Area -->

        <!-- Start Profile Authentication Area -->
        <section class="profile-authentication-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="login-form">
                            <h2>Login</h2>

                            <form action="<?=base_url('auth/login');?>" method='POST' enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Username or email</label>
                                    <input type="text" class="form-control" name='username' placeholder="Username or email" required>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name='password' placeholder="Password" required>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6 col-sm-6 remember-me-wrap">
                                        <p>
                                            <input type="checkbox" id="test2">
                                            <label for="test2">Remember me</label>
                                        </p>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 lost-your-password-wrap">
                                        <a href="#" class="lost-your-password">Lost your password?</a>
                                    </div>
                                </div>

                                <button type="submit">Log In</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-12">
                        <div class="register-form">
                            <h2>Register</h2>

                            <form action="<?=base_url('auth/register');?>" method='POST' enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name='username' placeholder="Username or email" required>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name='email' placeholder="Username or email" required>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name='password' placeholder="Password" required>
                                </div>

                                <p class="description">The password should be at least eight characters long. To make it stronger, use upper and lower case letters, numbers, and symbols like ! " ? $ % ^ & )</p>

                                <button type="submit">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?=$this->session->flashdata('message'); ?>
        <!-- Start Profile Authentication Area -->
