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
                <h3 class="h4">Rincian Pemesanan</h3>
              </div>

              <div class="card-body">
              <div class="row">                  
                  <!-- Ini Sisi Kiri -->                
                  <div class="col-md-9">
                  <?php echo form_open('user/hitunghalaman', array('enctype' => 'multipart/form-data','id' => 'submit', 'class' => 'form-horizontal')); ?>

                  
                  <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Judul Dokumen</label>
                      <div class="col-sm-9">
                        <?php 
                          $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'judul_dokumen', 'id' => 'judul_dokumen', 'value' => set_value('judul_dokumen')); 
                          echo form_input($data); 
                          echo form_error('judul_dokumen', '<p class="text-danger">', '</p>');                                                     
                        ?>    
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">File</label>
                      <div class="col-sm-9">
                        <div class="custom-file mb-3">
                        <?php 
                          $data = array('type' => 'file', 'class' => 'form-control', 'name' => 'inputFile', 'id' => 'inputFile', 'value' => set_value('inputFile')); 
                          echo form_input($data);      
                          echo form_error('inputFile', '<p class="text-danger">', '</p>');                    
                        ?>    
                        </div>
                      </div>
                    </div>

                    <?php foreach ($cek as $info)  { ?>
                    <?php 
                          $data = array('type' => 'hidden', 'class' => 'form-control', 'name' => 'email_pengirim', 'id' => 'email_pengirim', 'value' => $info['pm1_user_email']); 
                          echo form_input($data);                                                      
                        ?>   
                    <?php } ?>                                                         

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="label">Nama Penerima :</label>                          
                          <?php 
                            $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'nama_penerima', 'id' => 'nama_penerima', 'value' => set_value('nama_penerima')); 
                            echo form_input($data); 
                            echo form_error('nama_penerima', '<p class="text-danger">', '</p>');
                          ?>                        
                          <label class="checkbox-inline">
                          <?php
                            $data=array('type'=>'checkbox', 'id' => 'boxnama');
                            echo form_input($data);
                          ?>
                            Samakan dengan nama Member
                          </label>
                        </div>
                      </div>                      

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="label">No.Handphone Penerima :</label>                    
                            <?php 
                              $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'nohape_penerima', 'id' => 'nohape_penerima', 'value' => set_value('nohape_penerima')); 
                              echo form_input($data);                              
                              echo form_error('nohape_penerima', '<p class="text-danger">', '</p>');
                            ?>
                          <label class="checkbox-inline">
                          <?php
                            $data=array('type'=>'checkbox', 'id' => 'boxtelepon');
                            echo form_input($data);
                          ?>
                            Samakan dengan No Handphone Member
                          </label>  
                        </div>
                      </div>
                    </div> 

                    <?php 
                      $nama=$info["pm1_user_name"]; 
                      $nohandphone=$info["pm1_user_phonenumber"]; 
                    ?>

                    <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Alamat Pengiriman : </label>
                            <div class="col-sm-9">
                            <?php
                            $data = array('class' => 'form-control', 'name' => 'alamat_penerima', 'rows' => 4, 'value' => set_value('alamat_penerima'));
                            echo form_textarea($data);
                            echo form_error('alamat_penerima', '<p class="text-danger">', '</p>');                            
                            ?>
                            <small>Misal: Perumahan Elok Permai Blok BC, RT/RW 03/09</small>
                          </div>
                          </div>                                           

                    <div class="row">
                        <div class="col md-4">
                          <div class="form-group">
                            <a href="<?php echo base_url('history'); ?>" class="btn btn-danger form-control">Batal</a>  
                          </div>              
                        </div>

                        <div class="col md-4">
                          <div class="form-group">
                            <?php echo form_reset('reset', 'Reset', array('class' => 'btn btn-warning form-control')); ?>  
                          </div>              
                        </div>

                        <div class="col md-4">
                          <div class="form-group">
                            <?php echo form_submit('submit', 'Next', array('class' => 'btn btn-primary form-control')); ?>
                          </div>                        
                        </div>
                      </div>                    
                    
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
    $(document).ready(function() {
    $('#tabelriwayat').DataTable();
    } );
  </script>

  <script>
  var namaku="<?php echo $nama ?>";
  $("#boxnama").change(function(){
    if($("#nama_penerima").val() == namaku)
    {
      $("#nama_penerima").val("");
    }

    else
    {
      $("#nama_penerima").val(namaku);
    }
  
  });
  </script>

<script>
  var nohape="<?php echo $nohandphone ?>";
  $("#boxtelepon").change(function(){
    if($("#nohape_penerima").val() == nohape)
    {
      $("#nohape_penerima").val("");
    }

    else
    {
      $("#nohape_penerima").val(nohape);
    }
  
  });
  </script>

  </body>
</html>