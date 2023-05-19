<div class='container admin-nabvar'>
    <ul class="custom-nabvar">
        <li class="nav-item ">
          <a class="nav-link" href="<?=base_url('events')?>">Event <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="<?=base_url('users')?>">User <span class=""></span></a>
        </li>
    </ul>
</div>

<section class="products-details-area ptb-20">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <h3>Edit User</h3>
                <form action="<?=base_url('users/update/'.$user->user_id);?>" method='POST' enctype="multipart/form-data">
                    <div class='row'>
                        <div class="form-group col-md-4">
                            <label>Username</label>
                            <input type="text" class="form-control" name='username' value='<?=$user->username?>' placeholder="Username" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Email</label>
                            <input type="email" class="form-control" name='email' value='<?=$user->email?>' placeholder="Email" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Password</label>
                            <input type="text" class="form-control" name='pwd_plain' value='<?=$user->pwd_plain?>' placeholder="Pasword" required>
                        </div>
                    </div>

                    <div class='row'>
                        <div class="form-group col-md-6">
                            <label>Freebet</label>
                            <input type="number" class="form-control" name='freebet' value='<?=$user->freebet?>' placeholder="Freebet" >
                        </div>
                        <div class="form-group col-md-6">
                            <label>Point</label>
                            <input type="number" class="form-control" name='point' value='<?=$user->point?>' placeholder="Point" >
                        </div>
                    </div>

                    <button type="submit" class="btn default-btn float-right">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?=$this->session->flashdata('message'); ?>
