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
                  <h2 class="no-margin-bottom">Upload Dokumen</h2>    
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
                <h3 class="h4">Striped table with hover effect</h3>
              </div>

              <div class="card-body">
              <div class="row">                  
                  <!-- Ini Sisi Kiri -->                
                  <div class="col-md-9">
                  <?php echo form_open('user/inputdatapemesanan', array('enctype' => 'multipart/form-data', 'class' => 'form-horizontal')); ?>
                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Judul Dokumen</label>
                      <div class="col-sm-9">
                      <input id="inputHorizontalSuccess" type="text" class="form-control form-control-success">
                      <small class="form-text">Isikan judul dokumen, misal: Interaksi Manusia dan Komputer.</small>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">File</label>
                      <div class="col-sm-9">
                        <div class="custom-file mb-3">
                         <input type="file" class="custom-file-input" id="customFile" name="upload_file">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                         </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Nama Penerima</label>
                      <div class="col-sm-9">
                      <input type="text" class="form-control form-control-success" disabled="">
                      <small class="form-text">Disesuaikan dengan nama yang terdaftar.</small>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">No Handphone Penerima</label>
                      <div class="col-sm-9">
                      <input type="text" class="form-control form-control-success" disabled="">
                      <small class="form-text">Disesuaikan dengan nomor handphone yang telah terdaftar.</small>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Alamat Pengiriman</label>
                      <div class="col-sm-9">
                      <textarea class="form-control" rows="3"></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Catatan Tambahan</label>
                      <div class="col-sm-9">
                      <textarea class="form-control" rows="3"></textarea>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 form-control-label">Jenis Layanan</label>
                      <div class="col-sm-9">
                        <select class="form-control">
                              <option>Print Standar</option>
                              <option>Print + Jilid Biasa</option>
                              <option>Print + Jilid Spiral</option>                            
                        </select>
                      </div>
                    </div>

                    <div class="form-group row">
                      <button class="btn btn-primary form-control" type="submit">Upload</button>
                    </div>
                    
                    
                  </form> 
                  
                  </div> 
                  

                  <!-- Ini Sisi Kanan  -->
                  <div class="col-md-3">
                    <p><b>MOHON PERHATIAN!</b></p><hr>
                    <p>File yang di upload harus berupa <B>PDF</B>.</p><hr>
                    <p>Jangan memprotek dokumen PDF dengan Password</p><hr>
                    <p>Ukuran file PDF maksimum adalah 30mb</p><hr>
                    <p>Dokumen PDF Maksimum berisi 120  Halaman</p><hr>
                    <p>Waktu Pengantaran Maksimal 7 Hari Kerja</p><hr>
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

  </body>
</html>