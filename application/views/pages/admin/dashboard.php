
        <!-- Start Banner Area -->
        <!-- <div class="banner-wrapper-area jarallax" data-jarallax='{"speed": 0.3}'>
            <div class="container">
                <div class="banner-wrapper-content">
                    <div class="logo">
                        <img src="<?=base_url();?>assets/img/zelda.png" alt="image">
                    </div>
                    <h1>Tournaments Home</h1>
                    <span class="sub-title">Enjoy The tournament</span>
                </div>
            </div>
        </div> -->
        <!-- End Banner Area -->

<!-- Start Products Details Area -->
<section class="products-details-area ptb-100">
            <div class="">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="products-details-tabs">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description">Events</a></li>
                                <li class="nav-item"><a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews">Users</a></li>
                            </ul>
        
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="description" role="tabpanel" style="max-width:none">
                                    
                                    <!-- Start Cart Area -->
                                    <section class="cart-area ptb-50" style='padding-top:0px'>
                                        <div class="container">
                                            <div class='row' style="padding-bottom:30px">
                                                <button type="button" class="default-btn" data-toggle="modal" data-target="#addEventModal">Add Events</button>
                                            </div>
                                            <form>
                                                <div class="cart-table table-responsive">
                                                    <?php if(count($events) > 0): ?>
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">No</th>
                                                                <!-- <th scope="col">Photo</th> -->
                                                                <th scope="col">Title</th>
                                                                <th scope="col">Points</th>
                                                                <th scope="col">Deadline</th>
                                                                <th scope="col">Content</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php $i=1; foreach ($events as $event): ?>
                                                            <tr>
                                                                <td class="product-name">
                                                                    <?=$i++?>
                                                                </td>
                                                                <!-- <td class="product-thumbnail">
                                                                    <a href="#">
                                                                        <img src="assets/img/products-img1.jpg" alt="item">
                                                                    </a>
                                                                </td> -->

                                                                <td class="product-name">
                                                                    <a href=''><?=$event->event_title ?></a>
                                                                </td>

                                                                <td class="product-name">
                                                                    <?=$event->event_point ?>
                                                                </td>

                                                                <td class="product-name">
                                                                    <?=$event->event_deadline ?>
                                                                </td>

                                                                <td class="product-name">
                                                                    <?=$event->event_content ?>
                                                                </td>

                                                                <td class="product-subtotal">
                                                                    <div style='display:flex'>
                                                                        <a href="#" id='editEvent' data-toggle="modal" data-target="#addEventModal" style='padding-right:10px'><i class='bx bx-edit'></i></a>
                                                                        <a href="<?=base_url('events/delete/'.$event->event_id)?>" class=""><i class='bx bx-trash'></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                    <?php else: ?>
                                                        <h5 class='text-center'>There is no exist events</h5>
                                                    <?php endif; ?>
                                                </div>
                                                <!-- <div class="col-lg-12 col-md-12">
                                                    <div class="pagination-area text-center">
                                                        <a href="#" class="prev page-numbers"><i class="bx bx-chevrons-left"></i></a>
                                                        <span class="page-numbers current" aria-current="page">1</span>
                                                        <a href="#" class="page-numbers">2</a>
                                                        <a href="#" class="page-numbers">3</a>
                                                        <a href="#" class="page-numbers">4</a>
                                                        <a href="#" class="next page-numbers"><i class="bx bx-chevrons-right"></i></a>
                                                    </div>
                                                </div> -->

                                            </form>
                                        </div>
                                    </section>
                                            <!-- End Cart Area -->
                                </div>
        
                                <div class="tab-pane fade" id="reviews" role="tabpanel" style="max-width:none">
                                    <section class="cart-area ptb-50" style='padding-top:0px'>
                                        <div class="container">
                                            <div class='row' style="padding-bottom:30px">
                                                <button type="button" class="default-btn" data-toggle="modal" data-target="#addUserModal">Add User</button>
                                            </div>
                                            <form>
                                                <div class="cart-table table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">No</th>
                                                                <!-- <th scope="col">Photo</th> -->
                                                                <th scope="col">username</th>
                                                                <th scope="col">email</th>
                                                                <th scope="col">password</th>
                                                                <th scope="col">point</th>
                                                                <th scope="col">join date</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php $i=1; foreach ($users as $user): ?>
                                                            <tr>
                                                                <td class="product-name">
                                                                    <?=$i++?>
                                                                </td>
                                                                <!-- <td class="product-thumbnail">
                                                                    <a href="#">
                                                                        <img src="assets/img/products-img1.jpg" alt="item">
                                                                    </a>
                                                                </td> -->

                                                                <td class="product-name">
                                                                    <a href=''><?=$user->username ?></a>
                                                                </td>

                                                                <td class="product-name">
                                                                    <?=$user->email ?>
                                                                </td>

                                                                <td class="product-name">
                                                                    <?=$user->pwd_plain ?>
                                                                </td>

                                                                <td class="product-name">
                                                                    <?=$user->tickets ?>
                                                                </td>

                                                                <td class="product-name">
                                                                    <?=$user->created_at ?>
                                                                </td>

                                                                <td class="product-subtotal">
                                                                    <div style='display:flex'>
                                                                        <a href="#" class="" style='padding-right:10px'><i class='bx bx-edit'></i></a>
                                                                        <a href="#" class=""><i class='bx bx-trash'></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- <div class="col-lg-12 col-md-12">
                                                    <div class="pagination-area text-center">
                                                        <a href="#" class="prev page-numbers"><i class="bx bx-chevrons-left"></i></a>
                                                        <span class="page-numbers current" aria-current="page">1</span>
                                                        <a href="#" class="page-numbers">2</a>
                                                        <a href="#" class="page-numbers">3</a>
                                                        <a href="#" class="page-numbers">4</a>
                                                        <a href="#" class="next page-numbers"><i class="bx bx-chevrons-right"></i></a>
                                                    </div>
                                                </div> -->

                                            </form>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Products Details Area -->
        <?=$this->session->flashdata('message'); ?>

        <!-- Modal -->
        <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="addEventModalTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="background: #41155c;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEventModalTitle">Add Events</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url('events/add');?>" method='POST' enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name='event_title' placeholder="Event Title" required>
                            </div>

                            <div class="form-group">
                                <label>Points</label>
                                <input type="number" class="form-control" name='event_point' placeholder="Event Points" required>
                            </div>

                            <div class="form-group">
                                <label>Deadline</label>
                                <input type="datetime-local" class="form-control" name='event_deadline' placeholder="Event Deadline" required>
                            </div>

                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="form-control" name="event_content" cols="30" rows="5" required placeholder="Event Content"></textarea>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="background: #41155c;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalTitle">Add User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url('users/add');?>" method='POST' enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name='username' placeholder="Username" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name='email' placeholder="Email" required>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name='password' placeholder="Pasword" required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

