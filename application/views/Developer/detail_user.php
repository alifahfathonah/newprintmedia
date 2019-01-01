<!DOCTYPE html>
<html>
<head>
  <!-- SRC include  -->
  <?php $this->load->view('Developer/head'); ?>
  <title>PrintMedia-Admin | Detail User</title>
 
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <?php $this->load->view('Developer/navbar');?>

 <!--sidebar load  -->
 <?php $this->load->view('Developer/sidebar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php if($this->session->flashdata('success_del_jurusan')){?>
            <?php echo  '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.all.min.js"></script>';
              echo '<script>
                swal({
                      title: "Done",
                      text: "Berhasil Menghapus",
                      timer: 1500,
                      showConfirmButton: false,
                      type: "'.'success'.'"
                      });
              </script>';?>
            <?php } elseif($this->session->flashdata('error_del_jurusan')) { ?>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.all.min.js"></script>
              <?php  echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.all.min.js"></script>';
                      echo '<script>
                              swal({
                              text: "Gagal Menghapus",
                              title: "Failed",
                              timer: 2500,
                              showConfirmButton: false,
                              type: "'.'error'.'"
                              });
                            </script>'; 
                    ?>
            <?php } ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Detail User</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Detail User</h3>
            </div>
            <!-- /.card-header -->
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">1</th>
                  </tr>
                </thead>
                <?php foreach ($cek as $info) {?>
                <tbody>
                  <tr>
                    <th scope="row">Nama</th>
                    <td><?php echo $info['nama'];?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">No.Handphone</th>
                    <td><?php echo $info['nohape'];?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Gender</th>
                    <td><?php echo $info['gender'];?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Tanggal Lahir</th>
                    <td><?php echo $info['tanggal_lahir'];?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Email</th>
                    <td><?php echo $info['email'];?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Alamat</th>
                    <td><?php echo $info['alamat'];?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Detail Alamat</th>
                    <td><?php echo $info['detail_alamat'];?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Provinsi</th>
                    <td>
                    <?php                    
                      $data = array('id' => $info['provinsi']) ;
                      $provinsi = $this->db->get_where('provinces', $data);
                      $data_provinsi = $provinsi->result_array(); 
                      echo $data_provinsi[0]['name'];                          
                    ?>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Kota</th>
                    <td>
                    <?php                    
                      $data = array('id' => $info['kota']) ;
                      $kota = $this->db->get_where('regencies', $data);
                      $data_kota = $kota->result_array(); 
                      echo $data_kota[0]['name'];                          
                    ?>
                    </td>
                    <td></td> 
                  </tr>
                  <tr>
                    <th scope="row">Kecamatan</th>
                    <td>
                    <?php                    
                      $data = array('id' => $info['kecamatan']) ;
                      $kecamatan = $this->db->get_where('districts', $data);
                      $data_kecamatan = $kecamatan->result_array(); 
                      echo $data_kecamatan[0]['name'];                          
                    ?>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Kode Pos</th>
                    <td><?php echo $info['kodepos'];?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Universitas</th>
                    <td>
                    <?php                    
                      $data = array('universitas_id' => $info['universitas']) ;
                      $univ = $this->db->get_where('universitas', $data);
                      $data_univ = $univ->result_array(); 
                      echo $data_univ[0]['nama_univ'];                          
                    ?>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Jurusan</th>
                    <td>
                    <?php                    
                      $data = array('jurusan_id' => $info['jurusan']) ;
                      $jurusan = $this->db->get_where('jurusan', $data);
                      $data_jurusan = $jurusan->result_array(); 
                      echo $data_jurusan[0]['jurusan'];                          
                    ?>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Jenjang</th>
                    <td>
                    <?php                    
                      $data = array('jenjang_id' => $info['jenjang']) ;
                      $jenjang = $this->db->get_where('jenjang', $data);
                      $data_jenjang = $jenjang->result_array(); 
                      echo $data_jenjang[0]['jenjang'];                          
                    ?>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Tahun Masuk</th>
                    <td>
                    <?php                    
                      $data = array('tahun_id' => $info['tahun_masuk']) ;
                      $thn_masuk = $this->db->get_where('tahun', $data);
                      $tahun_masuk = $thn_masuk->result_array(); 
                      echo $tahun_masuk[0]['tahun'];                          
                    ?>
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Tahun Keluar</th>
                    <td>
                    <?php                    
                      $data = array('tahun_id' => $info['tahun_keluar']) ;
                      $thn_keluar = $this->db->get_where('tahun', $data);
                      $tahun_keluar = $thn_keluar->result_array(); 
                      echo $tahun_keluar[0]['tahun'];                       
                    ?>
                    </td>
                    <td></td>
                  </tr>
                </tbody>
                <?php }?>
              </table>
              <div class="card-footer">
                  <a href="<?php echo base_url('Developer/Tampil_User'); ?>" class="btn btn-primary">Back</a>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('Developer/footer'); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Script include  -->
<?php $this->load->view('Developer/script'); ?>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>

