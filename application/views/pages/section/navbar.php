
<div class="zelda-nav">
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="<?=base_url();?>">
                <img src="<?=base_url();?>assets/img/logo.png" alt="logo">
            </a>

            <div class="collapse navbar-collapse mean-menu">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="<?=base_url();?>" class="nav-link <?php if($link == 'home') echo 'active'; ?>">Home</a></li>

                    <?php if(!is_admin()): ?>
                        <li class="nav-item"><a href="<?=base_url('my-bets');?>" class="nav-link <?php if($link == 'my-bets') echo 'active'; ?>">My Bets</a></li>
                    <?php endif; ?>

                    <?php if($this->session->zelda_user_data): ?>
                        <?php if(!is_admin()): ?>
                        <li class="nav-item"><a href="<?=base_url('profile');?>" class="nav-link <?php if($link == 'profile') echo 'active'; ?>">My Account</a></li>
                        <?php else: ?>
                        <li class="nav-item"><a href="<?=base_url('admin');?>" class="nav-link <?php if($link == 'admin') echo 'active'; ?>">Admin</a></li>
                        <?php endif; ?>

                        <li class="nav-item"><a href="<?=base_url('auth/logout');?>" class="nav-link ">Log out</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a href="<?=base_url('auth');?>" class="nav-link <?php if($link == 'auth') echo 'active'; ?>">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</div>