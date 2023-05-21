
<!-- Start Banner Area -->
<div class="banner-wrapper-area jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="banner-wrapper-content">
            <div class="logo">
                <img src="<?=base_url();?>assets/img/zelda.png" alt="image">
            </div>
            <h1>Tournaments Home</h1>
            <span class="sub-title">Enjoy The tournament</span>
        </div>
    </div>
</div>
<!-- End Banner Area -->

<!-- Start Products Details Area -->
<section class="products-details-area ptb-50">
    <div class="plr-50">
        <h1>Welcome <?=$this->session->zelda_user_data->username?>!</h1>
        <div class='row'>
            <div class='col-md-3'>
                <li class='profile_items'><i class="flaticon-coin"></i>  <?=$user->freebet?>Freebets</li>
            </div>
            <div class='col-md-3'>
                <li class='profile_items'><i class="flaticon-game"></i>  <?=$user->point?>Points</li>
            </div>
            <!-- <div class='col-md-3'>
                <li class='profile_items'><i class="flaticon-game-1"></i>  <?=$user->ticket?>Tickets</li>
            </div>
            <div class='col-md-3'>
                <li class='profile_items'><i class="flaticon-teamwork"></i>  <?=$user->freebet?>Freebets</li>
            </div> -->
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <div class="products-details-tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link " id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description">Account</a></li>
                        <li class="nav-item"><a class="nav-link active" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews">Membership</a></li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade" id="description" role="tabpanel">
                            <div class="login-form" style='margin-right:0px'>
                                <h2>Change Password</h2>

                                <form action="<?=base_url('user/update_password');?>" method='POST' enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <input type="password" class="form-control" name='c_pwd' placeholder="Current Password" required>
                                    </div>

                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" name='n_pwd' placeholder="New Password" required>
                                    </div>

                                    <button type="submit">Change</button>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade show active" id="reviews" role="tabpanel">
                            <div class="text-center">
                                <div class="row row-cols-1 row-cols-md-2">

                                    <div class="col mb-6">
                                        <div class="card shadow-sm bg-white rounded">
                                            <div class="card-header bg-info text-white">
                                                <h4>Free</h4>
                                            </div>
                                            <div class="card-body bg-dark text-white">
                                                <h1 class="my-0 fw-normal">Free<small class="text-muted"></small></h1>
                                                <ul class="list-unstyled mt-3 mb-4">
                                                    <li>1 Freebet Per day</li>
                                                    <li>2 GB of storage</li>
                                                    <li>Email support</li>
                                                    <li>Help center access</li>
                                                </ul>
                                                <?php if($user->plan_id == 1): ?>
                                                <button class="btn btn-info btn-lg btn-block px-5 text-white" disabled>Current Plan</button>
                                                <?php else: ?>
                                                <button class="btn btn-info btn-lg btn-block px-5 text-white"><a href='<?=base_url('users/update_membership/1')?>'>Choose Plan</a></button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col mb-6">
                                        <div class="card shadow-lg bg-white rounded">
                                            <div class="card-header bg-success text-white">
                                                <h4>Standard</h4>
                                            </div>
                                            <div class="card-body bg-dark text-white">
                                                <h1 class="my-0 fw-normal">$55.55<small class="text-muted">/mo</small></h1>
                                                <ul class="list-unstyled mt-3 mb-4">
                                                    <li>3 Freebet Per day</li>
                                                    <li>5 GB of storage</li>
                                                    <li>Email support</li>
                                                    <li>Help center access</li>
                                                </ul>
                                                <?php if($user->plan_id == 2): ?>
                                                <button class="btn btn-success btn-lg btn-block px-5 text-white" disabled>Current Plan</button>
                                                <?php else: ?>
                                                <button class="btn btn-success btn-lg btn-block px-5 text-white"><a href='<?=base_url('users/update_membership/2')?>'>Choose Plan</a></button>
                                                <?php endif; ?>
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
    </div>
</section>
<!-- End Products Details Area -->
<?=$this->session->flashdata('message'); ?>
