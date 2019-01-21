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
              <div class="row">
                <div class="col-md-7">
                  <h2 class="no-margin-bottom">Ubah Data Diri</h2>    
                </div>

                <div class="col-md-5">
                  <small class="no-margin-bottom">Selamat Datang di Print Media, Silahkan Edit Form Data Diri Pribdadi dan Akademik.</small>
                </div>
              </div>
            </div>
          </header>
          
          <!-- Awalan Forms-->
          <section class="forms"> 
            <div class="container-fluid">
            <?php echo form_open('user/updatedataprofile', array('class' => 'form-horizontal')); ?>
            <!-- Awal Row Form -->
              <div class="row">

                <!-- Awal Data Diri Pribadi -->
                <div class="col-lg-12">

                  <!-- Awal Card -->
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
                                $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'nama_lengkap', 'id' => 'nama_lengkap', 'value' => $info['pm1_user_name']); 
                                echo form_input($data);
                                echo form_error('nama_lengkap', '<p class="text-danger">', '</p>');
                              ?>                            
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="label">No. Handphone : </label>
                              <?php 
                              $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'no_handphone', 'id' => 'no_handphone', 'value' => $info['pm1_user_phonenumber']); 
                              echo form_input($data);
                              echo form_error('no_handphone', '<p class="text-danger">', '</p>');
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
                                $data = array('Laki - Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan');
                                echo form_dropdown('jenis_kelamin', $data, set_value('jenis_kelamin'), ['class' => 'form-control', 'value' => $info['pm1_user_gender']]);
                              ?>                          
                            </div>
                          </div>
                          
                          <div class="col-md-4">
                            <div class="form-group">
                              <i class="fa fa-calendar"></i>
                              <label class="label">Tanggal Lahir : </label>
                                <div class="input-group date">
                                  <div class="input-group-addon"></div>                              
                                  <?php
                                    $data = array('type'=>'text', 'class' => 'form-control', 'name' => 'tanggal_lahir','id'=>'tanggal_lahir','value' => $info['pm1_user_birthdate']);
                                    echo form_input($data);
                                  ?>     
                                </div>                                                                  
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
                            $data = array('class' => 'form-control', 'name' => 'alamat', 'rows' => 3, 'value'=>$info['pm1_user_address']);
                            echo form_textarea($data);
                            echo form_error('alamat', '<p class="text-danger">', '</p>');
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
                            $data = array('class' => 'form-control', 'name' => 'detail_alamat', 'rows' => 3,'value'=>$info['pm1_user_detailaddress']);
                            echo form_textarea($data);
                            echo form_error('detail_alamat', '<p class="text-danger">', '</p>');
                            ?>
                            <small>Misal: Perumahan Elok Permai Blok BC, RT/RW 03/09</small>
                          </div>
                          </div>
                        <!-- AKHIR ROW 4 -->
                        
                        <div class="row">

                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="label">Provinsi : </label>
                              <select name="provinsi" class="form-control" id="provinsi">
                                <?php                                                          
                                $this->db->from('pm2_provinces');                
                                $provinsi = $this->db->get();
                                $data_provinsi = $provinsi->result_array();
                                foreach($data_provinsi as $row) {
                                ?>
                                <option value="<?php echo $row['id']; ?>" <?php echo set_select('id', $row['id'], ($row['id'] == $info['pm1_user_province'])? true : false ); ?>><?php echo $row['name']; ?></option>
                                <?php } ?>                                                                
                              </select>
                            </div>
                          </div>
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="label">Kota/Kabupaten : </label>
                              <div class="select">
                                <select name="kota" class="form-control" id="kota">
                                  <option value="" ></option>
                                </select>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="label">Kecamatan : </label>
                              <div class="select">
                                <select name="kecamatan" class="form-control" id="kecamatan">
                                  <option value=""></option>
                                </select>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-md-3">
                            <div class="form-group">
                              <label class="label">Kode Pos : </label>
                              <?php 
                              $data = array('type' => 'text', 'class' => 'form-control', 'name' => 'kodepos', 'id' => 'kodepos', 'value' => $info['pm1_user_poscode']); 
                              echo form_input($data);
                              echo form_error('kodepos', '<p class="text-danger">', '</p>');                       
                              ?>      
                            </div>
                          </div>
                        
                        </div>
                    </div>
                    
                  </div>
                  <!-- Akhir Card -->
                  
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
                            <select name="universitas" class="form-control" id="universitas">
                            <?php
                              $this->db->from('pm3_university');
                              $universitas = $this->db->get();
                              $data_universitas = $universitas->result_array();
                              foreach($data_universitas as $row) {
                            ?>                              
                              <option value="<?php echo $row['pm3_university_id']; ?>" <?php echo set_select('pm3_university_name', $row['pm3_university_id'], ($row['pm3_university_id'] == $info['pm1_user_university'])? true : false ); ?>><?php echo $row['pm3_university_name']; ?></option>
                            <?php } ?>                                                                  
                        </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-10">
                            <div class="form-group">
                              <label class="label">Jurusan : </label>                          
                              <select name="jurusan" class="form-control" id="jurusan">
                              <?php
                                $this->db->from('pm3_major');
                                $jurusan = $this->db->get();
                                $data_jurusan = $jurusan->result_array();
                                foreach($data_jurusan as $row) {
                              ?>
                                <option value="<?php echo $row['pm3_major_id']; ?>" <?php echo set_select('pm3_major_name', $row['pm3_major_id'], ($row['pm3_major_id'] == $info['pm1_user_major'])? true : false ); ?>><?php echo $row['pm3_major_name']; ?></option>
                              <?php } ?>                                                                  
                              </select>                          
                            </div> 
                          </div>

                          <div class="col-md-2">
                            <div class="form-group">
                              <label class="label">Jenjang : </label>                  
                              <select name="jenjang" class="form-control" id="jurusan">
                              <?php
                                $this->db->from('pm3_degree');
                                $jenjang = $this->db->get();
                                $data_jenjang = $jenjang->result_array();
                                foreach($data_jenjang as $row) {
                              ?>
                                <option value="<?php echo $row['pm3_degree_id']; ?>" <?php echo set_select('pm3_degree_name', $row['pm3_degree_id'], ($row['pm3_degree_id'] == $info['pm1_user_degree'])? true : false ); ?>><?php echo $row['pm3_degree_name']; ?></option>
                              <?php } ?>                                                                  
                              </select>               
                              </div>
                          </div>
                        </div>
                        
                       

                       
                        
                        <div class="row">                         
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="label">Tahun Masuk : </label>
                                <select name="tahun_masuk" class="form-control" id="tahun_masuk">
                                <?php
                                  $this->db->from('pm3_year');
                                  $this->db->limit(10);
                                  $tahun = $this->db->get();                        
                                  $data_tahun = $tahun->result_array();
                                  foreach($data_tahun as $row) {
                                ?>
                                  <option value="<?php echo $row['pm3_year_id']; ?>" <?php echo set_select('pm3_year_name', $row['pm3_year_id'], ($row['pm3_year_id'] == $info['pm1_user_in'])? true : false ); ?>><?php echo $row['pm3_year_name']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                          </div>
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="label">Tahun Keluar : </label>
                                <select name="tahun_keluar" class="form-control" id="tahun_keluar">                                  
                                <?php
                                  $this->db->from('pm3_year');
                                  $tahun = $this->db->get();
                                  $data_tahun = $tahun->result_array();
                                  foreach($data_tahun as $row) {
                                  ?>
                                  <option value="<?php echo $row['pm3_year_id']; ?>" <?php echo set_select('pm3_year_name', $row['pm3_year_id'], ($row['pm3_year_id'] == $info['pm1_user_out'])? true : false ); ?>><?php echo $row['pm3_year_name']; ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                        
                        </div>
          
                        <div class="row">
                          <div class="col md-6">
                            <div class="form-group">
                              <?php echo form_reset('reset', 'Reset', array('class' => 'btn btn-danger form-control')); ?>  
                            </div>              
                          </div>

                          <div class="col md-6">
                            <div class="form-group">
                              <?php echo form_submit('submit', 'Submit', array('class' => 'btn btn-primary form-control')); ?>
                            </div>                        
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


  <!-- All StyleSheet --> 
    <?php $this->load->view('user/include/user_javascript'); ?>
  <!-- All StyleSheet -->

  <!-- Datepicker -->
  <script>
    $(document).ready(function () {
      $('#tanggal_lahir').datepicker({
        format: "yyyy-mm-dd",
        autoclose:true
      });
    });
  </script>

  <!-- Untuk Provinsi, Kota dan kecamatan -->
  <script>
  $(document).ready(function(){ 
    $("#provinsi").change(function(){ // Ketika user mengganti atau memilih data provinsi
      $("#kota").hide(); // Sembunyikan dulu combobox kota nya
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("user/listkota"); ?>", // Isi dengan url/path file php yang dituju
        data: {province_id : $("#provinsi").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#kota").html(response.list_kota).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });

  $(document).ready(function(){ 
    $("#kota").change(function(){ // Ketika user mengganti atau memilih data provinsi
      $("#kecamatan").hide(); // Sembunyikan dulu combobox kota nya
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("user/listkecamatan"); ?>", // Isi dengan url/path file php yang dituju
        data: {regency_id : $("#kota").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#kecamatan").html(response.list_kota).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>

  </body>
</html>