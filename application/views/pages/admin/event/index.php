<div class='container admin-nabvar'>
    <ul class="custom-nabvar">
        <li class="nav-item active">
          <a class="nav-link" href="<?=base_url('events')?>">Event <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('users')?>">User <span class=""></span></a>
        </li>
    </ul>
</div>
<!-- Start Cart Area -->
<section class="cart-area ptb-20">
    <div class="container">
        <div class='row' style="padding-bottom:20px">
            <a class="nav-link" href="<?=base_url('events/add')?>"><button type="button" class="default-btn">Add Event</button></a>
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
                            <th scope="col">Result</th>
                            <th scope="col">Status</th>
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

                            <td class="product-name">
                                <?=$event->event_result ?>
                            </td>

                            <td class="product-name">
                                <?=$event->status == 1 ? "Active" : "Finished"  ?>
                            </td>
                            <td class="product-subtotal">
                                <div style='display:flex'>
                                    <a href="<?=base_url('events/edit/'.$event->event_id)?>" style='padding-right:10px'><i class='bx bx-edit'></i></a>
                                    <a href="<?=base_url('events/delete/'.$event->event_id)?>"><i class='bx bx-trash'></i></a>
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
        <?=$this->session->flashdata('message'); ?>
        