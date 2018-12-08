<!DOCTYPE html>
<html>
  <head>
    
    <title>Print Media - Layanan Jasa Cetak Masa Kini</title>
    <!-- All StyleSheet --> 
    <?php $this->load->view('user/include/user_stylesheet'); ?>
    <!-- All StyleSheet -->

  </head>

  <body>
    <div class="page">

      <!-- Awal Navbar-->  
        <?php $this->load->view('user/include/navbar'); ?>
      <!-- Navbar-->

      <div class="page-content d-flex align-items-stretch"> 

      <!-- Awal Sidebar-->  
        <?php $this->load->view('user/include/sidebar'); ?>
      <!-- Akhir Side Bar-->

        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
          </header>
          
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                    <div class="title"><span>Pesanan<br>Hari Ini</span></div>
                    <div class="number"><strong>-</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="icon-padnote"></i></div>
                    <div class="title"><span>Total<br>Pesanan</span></div>
                    <div class="number"><strong>-</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="icon-bill"></i></div>
                    <div class="title"><span>Pesanan<br>Sukses</span></div>
                    <div class="number"><strong>-</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="icon-check"></i></div>
                    <div class="title"><span>Pesanan<br>Gagal</span></div>
                    <div class="number"><strong>-</strong></div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <!-- Page Footer-->
          <?php $this->load->view('user/include/footer'); ?>
        </div>
      </div>
    </div>

 <!-- All Java Scripts --> 
 <?php $this->load->view('user/include/user_javascript'); ?>
  <!-- All Java Script -->

  </body>
</html>