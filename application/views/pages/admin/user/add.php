<div class='container admin-nabvar'>
    <ul class="custom-nabvar">
        <li class="nav-item ">
          <a class="nav-link" href="<?=base_url('events')?>">Event <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?=base_url('users')?>">User <span class=""></span></a>
        </li>
    </ul>
</div>

<section class="products-details-area  ptb-50">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12">
                <form action="<?=base_url('events/save');?>" method='POST' enctype="multipart/form-data" id='eventFrom'>
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
                
                    <button type="submit" class="btn default-btn float-right">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?=$this->session->flashdata('message'); ?>
