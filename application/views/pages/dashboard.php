        
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
        
        <!-- Start Popular Leagues Area -->
        <section class="popular-leagues-area pt-100 pb-70">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title">TOURNAMENTS</span>
                    <h2>Popular Leagues</h2>
                </div>
    
                <?php $remain = array(); if(count($events) > 0): ?>
                <?php foreach ($events as $event): ?>
                <div class="single-popular-leagues-box">
                    <div class="popular-leagues-box">
                        <div class="popular-leagues-image">
                            <div class="image bg1">
                                <img src="<?=base_url();?>assets/img/popular-leagues-img1.jpg" alt="image">
                            </div>
                        </div>

                        <?php 
                            $date = explode('-', $event->event_deadline); 
                            $time = explode('T', $date[2])[1];
                            $day = explode('T', $date[2])[0];
                            $hour = explode(':', $time)[0];
                            $zone = '';
                            if((int)$hour < 12){
                                $zone = 'AM';
                            } else {
                                $zone = 'PM';
                            }
                            
                            $remainTime = (int)strtotime($event->event_deadline) - (int)$server_time;
                        ?>
                        
                        <div class="popular-leagues-content">
                            <div class="content">
                                <h3><a href="#"><?=$event->event_title?></a></h3>
                                <p><?=$event->event_content?></p>
                                <ul class="info">
                                    <li><i class="flaticon-coin"></i><?=$event->event_point?></li>
                                    <!-- <li><i class="flaticon-game"></i>1v1</li> -->
                                    <!-- <li><i class="flaticon-game-1"></i>Mobile</li>
                                    <li><i class="flaticon-teamwork"></i>10 Groups</li> -->
                                </ul>
                                <?php 
                                    if($remainTime > 0 && $event->event_result == 0){
                                        if(!in_array($event->event_id, $betted_event)){
                                            echo "<a href='".base_url('dashboard/add/'.$event->event_id)."' class='join-now-btn'>bet Now</a>";
                                        } else {
                                            echo "<p class='join-now-btn'>Already bet</p>";
                                        }
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="popular-leagues-date">
                            <div class="date">
                                <div class="d-table">
                                    <div class="d-table-cell">
                                        <span><?=$date[0];?></span>
                                        <h3><?=$day;?> <?php echo DateTime::createFromFormat('!m', $date[1])->format('F'); ?></h3>
                                        <p><?=$time;?> <?=$zone;?></p>

                                        <?php 
                                            if($remainTime > 0 && $event->event_result == 0){
                                                echo "<p style='margin-top:10px; color:#22152c'>Remain time <span id='clock_".$event->event_id."'></span></p>";
                                                $remain['clock_'.$event->event_id] = $remainTime;
                                            } else {
                                                echo "<p>Finished</p>";
                                            }
                                        ?>
                                        <i class='bx bx-calendar'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                    <h5 class='text-center'>There is no exist events</h5>
                <?php endif; ?>

            </div>
        </section>
        <?php echo '<script> var remainTime = '.json_encode($remain).'</script>' ?>
        <script src='<?=base_url('assets/js/custom.js')?>'></script>
        <!-- End Popular Leagues Area -->
        <?=$this->session->flashdata('message'); ?>
