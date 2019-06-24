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
        <?php if($this->session->flashdata('success_input')):?>
        <script src="<?php echo base_url();?>asset/user/plugin/sweetalert/dist/sweetalert2.all.min.js"></script>
        <script>
          swal({
              title: "Done",
              text: "Selamat Bergabung Dengan Printmedia",              
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
                  <h2 class="no-margin-bottom">Upload Pemesanan</h2>    
                </div>

                <div class="col-md-5">
                  <small class="no-margin-bottom">Di sini kamu dapat mengupload dokumen untuk melakukan pemesanan.</small>
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
                <h3 class="h4">Review Pemesanan dan Estimasi Biaya</h3>
              </div>

              <div class="card-body">
              <div class="row">                  
                  <!-- Ini Sisi Kiri -->                
                  <div class="col-md-9">
                  <?php echo form_open('user/inputdatapemesanan', array('enctype' => 'multipart/form-data','id' => 'submit', 'class' => 'form-horizontal')); ?>

                  <?php foreach ($cek as $info)  { ?>
                  <div class="form-group row">
                      <label class="col-sm-3 form-control-label">File Name : </label>
                      <div class="col-sm-9">
                        <?php 
                          $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'filename', 'id' => 'filename', 'readonly' => 'true', 'value' => $info['pm4_temporders_filename']); 
                          echo form_input($data);                                                      
                        ?>    
                      </div>
                    </div>
                    
                    <?php 
                      $data = array('type' => 'hidden', 'class' => 'form-control', 'name' => 'judul_dokumen', 'id' => 'judul_dokumen', 'readonly' => 'true', 'value' => $info['pm4_temporders_document_title']); 
                      echo form_input($data);                                                      
                    ?>    
                    <?php 
                      $data = array('type' => 'hidden', 'class' => 'form-control', 'name' => 'email_pengirim', 'id' => 'email_pengirim', 'readonly' => 'true', 'value' => $info['pm4_temporders_sender_email']); 
                      echo form_input($data);                                                      
                    ?>
                    <?php 
                      $data = array('type' => 'hidden', 'class' => 'form-control', 'name' => 'nama_penerima', 'id' => 'nama_penerima', 'readonly' => 'true', 'value' => $info['pm4_temporders_receiver_name']); 
                      echo form_input($data);                                                      
                    ?>
                    <?php 
                      $data = array('type' => 'hidden', 'class' => 'form-control', 'name' => 'nohape_penerima', 'id' => 'nohape_penerima', 'readonly' => 'true', 'value' => $info['pm4_temporders_receiver_phonenumber']); 
                      echo form_input($data);                                                      
                    ?>
                    <?php 
                      $data = array('type' => 'hidden', 'class' => 'form-control', 'name' => 'alamat_penerima', 'id' => 'alamat_penerima', 'readonly' => 'true', 'value' => $info['pm4_temporders_receiver_address']); 
                      echo form_input($data);                                                      
                    ?>
                    <?php 
                      $data = array('type' => 'hidden', 'class' => 'form-control', 'name' => 'status', 'id' => 'status', 'readonly' => 'true', 'value' => 'On Process'); 
                      echo form_input($data);                                                      
                    ?>        

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="label">Jenis Kertas :</label>                          
                            <?php
                                $data = array('0' => 'Pilih Kertas','A4 HVS - 80gr' => 'A4 HVS - 80gr', 'F4 HVS - 80gr' => 'F4 HVS - 80gr');
                                echo form_dropdown('jenis_kertas', $data, set_value('jenis_kertas'), ['class' => 'form-control']);
                            ?>                           
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="label">Jenis Warna :</label>                    
                            <?php
                                $data = array('0' => 'Pilih Warna', 'Hitam - Putih' => 'Hitam - Putih', 'Berwarna' => 'Berwarna');
                                echo form_dropdown('jenis_warna', $data, set_value('jenis_warna'), ['class' => 'form-control', 'id'=>'jenis_warna']);
                            ?>   
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="label">Jumlah Halaman :</label>                          
                          <?php 
                            $data = array('type' => 'number', 'class' => 'form-control', 'name' => 'jumlah_halaman', 'id' => 'jumlah_halaman', 'value' => $info['pm4_temporders_pagenumber'], 'readonly'=>'true'); 
                            echo form_input($data);                                                      
                          ?>                           
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="label">Estimasi Biaya :</label>                    
                            <?php 
                              $data = array('type' => 'number', 'class' => 'form-control', 'name' => 'biaya', 'id' => 'biaya', 'readonly'=>'true', 'value' => set_value('biaya')); 
                              echo form_input($data);                                                      
                            ?> 
                            <small>*Tidak termasuk biaya pengantaran</small>  
                        </div>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <a class="btn btn-danger form-control" href="<?php echo base_url('user/batalpesanan'); ?>">Batal</a>
                          </div>              
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <?php echo form_reset('reset', 'Reset', array('class' => 'btn btn-warning form-control')); ?>  
                          </div>              
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <?php echo form_submit('submit', 'Pesan Sekarang', array('class' => 'btn btn-primary form-control')); ?>
                          </div>                        
                        </div>
                      </div>                                            
                    
                  <?php } ?>  
                  <?php echo form_close(); ?>
                  
                  </div> 
                  

                  <!-- Ini Sisi Kanan  -->
                  <div class="col-md-3">
                    <p><b>MOHON PERHATIAN!</b></p><hr>
                    <p>File yang di upload harus berupa <B>PDF</B>.</p><hr>
                    <p>Jangan memprotek dokumen PDF dengan Password</p><hr>
                    <p>Ukuran file PDF maksimum adalah 30mb</p><hr>                                        
                    <p>Jumlah tagihan pembayaran akan dikirim melalui Email</p><hr>
                    <p><strong>Pemesanan yang sudah dipesan TIDAK DAPAT DIBATALKAN</strong></p><hr>
                    <p>Pastikan data dan pesanan sudah <b>BENAR</b></p>                  
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
  $(document).ready(function(){ 
    $("#jenis_warna").change(function(){ // Ketika user mengganti jenis warnna            
      
      if($("#jenis_warna").val() == "Hitam - Putih")
      {
             
        return $("#biaya").val(700 * $("#jumlah_halaman").val());
      }

      else if($("#jenis_warna").val() == "Berwarna")
      {
        return $("#biaya").val(1000 * $("#jumlah_halaman").val());
      }

      else
      {
        return $("#biaya").val("");
      }
    });
  });
  </script>
    
  </body>
</html>