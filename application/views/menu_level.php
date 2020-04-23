<?php if ($this->session->userdata('level')=='1') {?>
        <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar main-menu">
                <div class="pcoded-navigatio-lavel">Admin</div>
                <ul class="pcoded-item pcoded-left-item">
                    
                    <li class="">
                        <a href="<?php echo base_url()?>dashboard">
                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                            <span class="pcoded-mtext">Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="pcoded-hasmenu">
                        <a href="javascript:void(0)">
                            <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                            <span class="pcoded-mtext">Data Master</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href="<?php echo base_url()?>Kabupaten">
                                    <span class="pcoded-mtext">Kabupaten/Kota</span>
                                </a>
                            </li>
                            <li class=" ">
                                <a href="<?php echo base_url()?>Rumahsakit">
                                    <span class="pcoded-mtext">Rumah Sakit</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
                <div class="pcoded-navigatio-lavel">BASE DATA</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class=" ">
                        <a href="<?php echo base_url()?>Odp/data_odp">
                            <span class="pcoded-micon"><i class="feather icon-users"></i><b>A</b></span>
                            <span class="pcoded-mtext">ODP</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="<?php echo base_url()?>Pdp/data_pdp">
                            <span class="pcoded-micon"><i class="feather icon-users"></i><b>A</b></span>
                            <span class="pcoded-mtext">PDP</span>
                        </a>
                    </li>
                    <li class=" ">
                        <a href="<?php echo base_url()?>Suspect/data_suspect">
                            <span class="pcoded-micon"><i class="feather icon-users"></i><b>A</b></span>
                            <span class="pcoded-mtext">SUSPECT</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
<?php }
?>
