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
        <?php if($this->session->flashdata('success_order')):?>
        <script src="<?php echo base_url();?>asset/user/plugin/sweetalert/dist/sweetalert2.all.min.js"></script>
        <script>
          swal({
              title: "Done",
              text: "Pesanan Anda Berhasil, Mohon Menunggu",              
              showConfirmButton: true,
              type: 'success'
              });
        </script>
        <?php endif;?>

          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-7">
                  <h2 class="no-margin-bottom">Riwayat Pemesanan</h2>    
                </div>

                <div class="col-md-5">
                  <small class="no-margin-bottom">Di sini kamu dapat melihat status pemesanan kamu.</small>
                </div>
              </div>
            </div>
          </header>
          
          <!-- Awalan Forms-->
          <section class="forms"> 
            <div class="container-fluid">
            
            <!-- Awal Card -->
            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h3 class="h4">Striped table with hover effect</h3>
              </div>

              <div class="card-body">
                      <div class="table-responsive">                       
                        <table class="table table-striped table-hover" id="tabelriwayat">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Judul Dokumen</th>
                              <th width="300">Status</th>                              
                            </tr>
                          </thead>
                          <tbody>
                          <?php 
                          $no=1;
                          foreach ($cek as $info)  { ?>
                            <tr>
                              <th scope="row"><?php echo $no++; ?></th>
                              <td><?php echo $info['pm4_orders_document_title'] ?></td>
                              <td>
                                <?php  if ($info['pm4_orders_status']=='1') {?>
                                    Pesanan Diterima
                                <?php } if ($info['pm4_orders_status']=='2') { ?>
                                    Pesanan Dalam Proses
                                <?php } if ($info['pm4_orders_status']=='3') { ?>
                                    Pesanan Dalam Pengiriman
                                <?php } if ($info['pm4_orders_status']=='4') { ?>
                                    Pesanan Telah Diterima
                                <?php } if ($info['pm4_orders_status']=='5') { ?>
                                    Pesanan Gagal
                                <?php } ?>
                              </td>                              
                            </tr>
                          <?php } ?>                           
                          </tbody>
                        </table>
                      </div>
                    </div>
            </div>
            <!-- Akhir Card -->

            </div>
          </section>
          <!-- Akhiran Form -->

          <!-- Awla Page Footer-->
            <?php $this->load->view('user/include/footer'); ?>
          <!-- Akhir Page Footer-->

        </div> <!-- Akhir Div Content Inner -->
      </div> <!-- Akhir Div Page Content -->
    </div> <!-- Akhir Div Page -->


  <!-- All Java Scripts --> 
    <?php $this->load->view('user/include/user_javascript'); ?>
  <!-- All Java Script -->

   <script>
    $(document).ready(function() {
    $('#tabelriwayat').DataTable();
    } );
  </script>

  </body>
</html>