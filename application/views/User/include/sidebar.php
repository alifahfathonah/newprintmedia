 <!-- Side Navbar -->
 <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">            
            <div class="title">
            <?php
            $email = array('email' => $this->session->userdata('email')) ;
            $cek = $this->User_model->GetWhere('user', $email);
            $cek = $cek->row_array();
            ?>
              <h1 class="h4"><?php echo $cek['nama']; ?></h1>
              <p><?php echo $this->session->userdata('email');?></p>
            </div>
          </div>

          <!-- Sidebar Navidation Menus-->         
          <ul class="list-unstyled">                      
            <li class="<?php if ( $this->uri->uri_string() == 'dashboard' ){ echo 'active'; } ?>">
                <a href="<?php echo base_url('dashboard'); ?>"> <i class="fa fa-home"></i>Dashboard</a>
            </li>

            <li class="<?php if ( $this->uri->uri_string() == 'history' ){ echo 'active'; } ?>">
                <a href="<?php echo base_url('history'); ?>"> <i class="fa fa-history"></i>RIWAYAT</a>
            </li>

            <li class="<?php if ( $this->uri->uri_string() == 'upload' ){ echo 'active'; } ?>">
                <a href="<?php echo base_url('upload'); ?>"> <i class="fa fa-upload"></i>PEMESANAN</a>
            </li>      

            <li class="<?php if ( $this->uri->uri_string() == 'myprofile' ){ echo 'active'; } ?>">
                <a href="<?php echo base_url('myprofile'); ?>"> <i class="icon-user"></i>PROFIL-KU</a>
            </li>                    
</nav>
     