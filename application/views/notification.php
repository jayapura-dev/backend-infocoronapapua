<?php 
$this->load->model('dashboard/M_dashboard'); 
$odp = $this->M_dashboard->odp_notif();
$pdp = $this->M_dashboard->pdp_notif();
$suspect = $this->M_dashboard->suspect_notif();

$odp_data = $this->M_dashboard->odp_notif_data();
$pdp_data = $this->M_dashboard->pdp_notif_data();

?>

<li class="header-notification">
    <div class="dropdown-primary dropdown">
        <div class="dropdown-toggle" data-toggle="dropdown">
        <?php if($odp['odp_hari_ini'] == '0'):?>
            <i class="feather icon-user"></i>
          <?php else: ?>
            <i class="feather icon-user"></i>
            <span class="badge bg-c-yellow"><?php echo $odp['odp_hari_ini'] ?></span>
          <?php endif ?>
        </div>
        <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
            <li>
                <h6>Orang Dalam Pantauan</h6>
                <label class="label label-danger">New Hari ini</label>
            </li>
            <?php foreach($odp_data as $o){?>
            <li>
                <div class="media">
                    <img class="d-flex align-self-center img-radius" src="<?php echo base_url()?>assets\backend\images\avatar-4.jpg" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="notification-user"><?php echo $o->nama_kab ?></h5>
                        <p class="notification-msg">Ada Penambahan <strong><?php echo $o->jo ?></strong> ODP</p>
                        <span class="notification-time"><?php echo $o->date_created ?></span>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</li>

<li class="header-notification">
    <div class="dropdown-primary dropdown">
        <div class="dropdown-toggle" data-toggle="dropdown">
          <?php if($pdp['pdp_hari_ini'] == '0'):?>
            <i class="feather icon-user"></i>
          <?php else: ?>
            <i class="feather icon-user"></i>
            <span class="badge bg-c-pink"><?php echo $pdp['pdp_hari_ini'] ?></span>
          <?php endif ?>
        </div>
        <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
            <li>
                <h6>Pasien Dalam Pengawasan</h6>
                <label class="label label-danger">New</label>
            </li>
            <?php foreach($pdp_data as $pd){?>
            <li>
                <div class="media">
                    <img class="d-flex align-self-center img-radius" src="<?php echo base_url()?>assets\backend\images\avatar-4.jpg" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="notification-user"><?php echo $pd->nama_kab ?></h5>
                        <p class="notification-msg">Ada Penambahan <strong><?php echo $pd->jp ?></strong> PDP</p>
                        <span class="notification-time"><?php echo $pd->date_created ?></span>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</li>

<li class="header-notification">
    <div class="dropdown-primary dropdown">
        <div class="dropdown-toggle" data-toggle="dropdown">
          <?php if($suspect['suspect_hari_ini'] == '0'):?>
            <i class="feather icon-user"></i>
          <?php else: ?>
            <i class="feather icon-user"></i>
            <span class="badge bg-c-red"><?php echo $suspect['suspect_hari_ini'] ?></span>
          <?php endif ?>
        </div>
        <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
            <li>
                <h6>Pasien Dalam Pengawasan</h6>
                <label class="label label-danger">New</label>
            </li>
            <li>
                <div class="media">
                    <img class="d-flex align-self-center img-radius" src="..\files\assets\images\avatar-4.jpg" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="notification-user">John Doe</h5>
                        <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                        <span class="notification-time">30 minutes ago</span>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</li>