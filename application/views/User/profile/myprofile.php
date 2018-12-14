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
        
        <?php if($this->session->flashdata('success_update')== true):?>
        <script src="<?php echo base_url();?>asset/user/plugin/sweetalert/dist/sweetalert2.all.min.js"></script>
        <script>
          swal({
              title: "Done",
              text: "Data Diri Berhasil di Update",              
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
                  <h2 class="no-margin-bottom">Profil Ku</h2>    
                </div>

                <div class="col-md-5">
                  <small class="no-margin-bottom">Di sini kamu dapat melihat dan merubah Profil Pribadi dan Akademik Kamu.</small>
                </div>
              </div>
            </div>
          </header>
          
          <!-- Awalan Forms-->
          <section class="forms"> 
            <div class="container-fluid">
            <?php echo form_open('editprofile', array('class' => 'form-horizontal')); ?>
            <!-- Awal Row Form -->
              <div class="row">

                <!-- Awal Data Diri Pribadi -->
                <div class="col-lg-12">

                  <!-- Awal Card Pribadi -->
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Data Diri Pribadi</h3>
                    </div>

                    <div class="card-body">
                    <?php foreach ($cek as $info)  { ?>
                        <!-- Awal ROW 1 -->
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="label">Nama Lengkap : </label>
                              <?php                              
                                $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'nama_lengkap', 'id' => 'nama_lengkap', 'value' => $info['pm1_user_name'], 'readonly' => 'true'); 
                                echo form_input($data);                                                            
                                ?>                           
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="label">No. Handphone : </label>
                                <?php 
                                    $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'no_handphone', 'id' => 'no_handphone', 'value' => $info['pm1_user_phonenumber'], 'readonly'=>'true'); 
                                    echo form_input($data);                              
                                ?>                                                   
                            </div>   
                          </div>
                        </div>
                        <!-- AKHIR ROW 1 -->

                        <!-- AWAL ROW 2 -->
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="label">Jenis Kelamin : </label>
                                <?php 
                                    $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'jenis_kelamin', 'id' => 'no_handphone', 'value' => $info['pm1_user_gender'], 'readonly'=>'true'); 
                                    echo form_input($data);                          
                                ?>                        
                            </div>
                          </div>
                          
                          <div class="col-md-4">
                            <div class="form-group">
                              <i class="fa fa-calendar"></i>
                              <label class="label">Tanggal Lahir : </label>
                                <?php
                                    $data = array('type'=>'text', 'class' => 'form-control', 'name' => 'tanggal_lahir','value' => $info['pm1_user_birthdate'], 'readonly' => 'true');
                                    echo form_input($data);
                                ?>                                                                     
                            </div>
                          </div>
                          
                          <div class="col-md-4">
                            <div class="form-group">
                            <label class="label">Email : </label>
                            <?php
                              $data = array('type' => 'email', 'class' => 'form-control', 'name' => 'email', 'id' => 'email', 'value' => $this->session->userdata('email'), 'readonly' => 'true');
                              echo form_input($data);
                            ?>
                            </div>
                          </div>
                        </div>
                        <!-- AKHIR ROW 2 -->

                        <!-- AWAL ROW 3 -->
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Alamat Asal</label>
                            <div class="col-sm-9">
                            <?php
                                $data = array('class' => 'form-control', 'name' => 'alamat', 'value' => $info['pm1_user_address'], 'rows' => 3, 'readonly' => 'true');
                                echo form_textarea($data);
                            ?>
                                <small>Alamat asal (bukan tempat kost). Misal: Jl. Jembrana XI no 5</small>
                            </div>
                        </div>
                        <!-- AKHIR ROW 3 -->

                        <!-- AWAL ROW 4 -->
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Detail Tempat Tinggal</label>
                            <div class="col-sm-9">
                            <?php
                            $data = array('class' => 'form-control', 'name' => 'detail_alamat', 'rows' => 3,'value' => $info['pm1_user_detailaddress'], 'readonly' => 'true');
                            echo form_textarea($data);
                            ?>
                            <small>Misal: Perumahan Elok Permai Blok BC, RT/RW 03/09</small>
                          </div>
                          </div>
                        <!-- AKHIR ROW 4 -->
                        
                        <div class="row">

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="label">Provinsi : </label>
                                <?php                    
                                    $data = array('id' => $info['pm1_user_province']) ;
                                    $provinsi = $this->db->get_where('pm2_provinces', $data);
                                    $data_provinsi = $provinsi->result_array();
    
                                    $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'provinsi', 'id' => 'provinsi', 'value' => $data_provinsi[0]['name'], 'readonly'=>'true'); 
                                    echo form_input($data);                          
                                ?>
                            </div>
                          </div>
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="label">Kota/Kabupaten : </label>
                              <?php                    
                              $data = array('id' => $info['pm1_user_regency']) ;
                              $kota = $this->db->get_where('pm2_regencies', $data);
                              $data_kota = $kota->result_array();
    
                              $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'provinsi', 'id' => 'provinsi', 'value' => $data_kota[0]['name'], 'readonly'=>'true'); 
                              echo form_input($data);                          
                            ?>
                            </div>
                          </div>
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="label">Kecamatan : </label>
                              <?php                    
                              $data = array('id' => $info['pm1_user_district']) ;
                              $kecamatan = $this->db->get_where('pm2_districts', $data);
                              $data_kecamatan = $kecamatan->result_array();

                              $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'provinsi', 'id' => 'provinsi', 'value' => $data_kecamatan[0]['name'], 'readonly'=>'true'); 
                              echo form_input($data);                          
                            ?>
                            </div>
                          </div>
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="label">Kode Pos : </label>
                              <?php 
                              $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'provinsi', 'id' => 'provinsi', 'value' => $info['pm1_user_poscode'], 'readonly'=>'true'); 
                              echo form_input($data);                          
                            ?>  
                            </div>
                          </div>
                        
                        </div>
                    </div>
                    
                  </div>
                  <!-- Akhir Card Pribadi -->
                  
                </div>
                <!-- Akhir Data Diri Pribadi -->

                <!-- Awal Data Diri Akademik -->
                <div class="col-lg-12">
                  
                  <!-- Awal Card Akademik -->
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Data Diri Akademik</h3>
                    </div>

                    <!--Awal Card Body  -->
                    <div class="card-body">
                        <div class="form-group row">
                          <label class="col-sm-3 form-control-label">Universitas</label>
                          <div class="col-sm-9 select">
                          <?php                    
                              $data = array('pm3_university_id' => $info['pm1_user_university']) ;
                              $universitas = $this->db->get_where('pm3_university', $data);
                              $data_universitas = $universitas->result_array();

                              $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'universitas', 'id' => 'universitas', 'value' => $data_universitas[0]['pm3_university_name'], 'readonly'=>'true'); 
                              echo form_input($data);                          
                            ?> 
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-10">
                          <div class="form-group">
                          <label class="label">Jurusan : </label>                        
                          <?php                    
                              $data = array('pm3_major_id' => $info['pm1_user_major']) ;
                              $jurusan = $this->db->get_where('pm3_major', $data);
                              $data_jurusan = $jurusan->result_array();

                              $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'jurusan', 'id' => 'jurusan', 'value' => $data_jurusan[0]['pm3_major_name'], 'readonly'=>'true'); 
                              echo form_input($data);                          
                            ?>                        
                        </div>
                          </div>
                      
                          <div class="col-md-2">
                          <div class="form-group">
                          <label class="label">Jenjang : </label>                     
                          <?php                    
                              $data = array('pm3_degree_id' => $info['pm1_user_degree']) ;
                              $jenjang = $this->db->get_where('pm3_degree', $data);
                              $data_jenjang = $jenjang->result_array();

                              $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'jenjang', 'id' => 'jenjang', 'value' => $data_jenjang[0]['pm3_degree_name'], 'readonly'=>'true'); 
                              echo form_input($data);                          
                              ?>                     
                        </div>
                          </div>
                        </div>
                        
                        

                        
                        
                        <div class="row">                         
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="label">Tahun Masuk : </label>
                              <?php                    
                              $data = array('pm3_year_id' => $info['pm1_user_in']) ;
                              $tahun_masuk = $this->db->get_where('pm3_year', $data);
                              $data_tahunmasuk = $tahun_masuk->result_array();

                              $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'tahun_masuk', 'id' => 'tahun_masuk', 'value' => $data_tahunmasuk[0]['pm3_year_name'], 'readonly'=>'true'); 
                              echo form_input($data);                          
                              ?> 
                            </div>
                          </div>
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="label">Tahun Keluar : </label>
                              <?php                    
                              $data = array('pm3_year_id' => $info['pm1_user_out']) ;
                              $tahun_keluar = $this->db->get_where('pm3_year', $data);
                              $data_tahunkeluar = $tahun_keluar->result_array();

                              $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'tahun_keluar', 'id' => 'tahun_keluar', 'value' => $data_tahunkeluar[0]['pm3_year_name'], 'readonly'=>'true'); 
                              echo form_input($data);                          
                              ?> 
                            </div>
                          </div>
                        
                        </div>
          
                        <div class="form-group- row">
                            <div class="container">
                                <?php echo form_submit('submit', 'Edit Data Diri', array('class' => 'btn btn-primary form-control')); ?>
                            </div>                                                 
                        </div>

                        
                    </div>
                    <!-- Akhir Card Body -->
                  </div>
                  <!-- Akhir Card Akademik -->

                </div>
                <!-- Akhir Data Diri Akademik -->

                    <?php } ?>

              </div>
            <!-- Ending Row FOrm -->
            <?php echo form_close(); ?> 

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

  </body>
</html>