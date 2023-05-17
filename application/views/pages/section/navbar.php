
<div class="zelda-nav">
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="index-5.html">
                <img src="<?=base_url();?>assets/img/logo.png" alt="logo">
            </a>

            <div class="collapse navbar-collapse mean-menu">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="<?=base_url();?>" class="nav-link <?php if($link == 'home') echo 'active'; ?>">Home</a></li>
                    <li class="nav-item"><a href="<?=base_url('my-bets');?>" class="nav-link <?php if($link == 'my-bets') echo 'active'; ?>">My Bets</a></li>
                    <li class="nav-item"><a href="<?=base_url('auth');?>" class="nav-link <?php if($link == 'auth') echo 'active'; ?>">Login</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>