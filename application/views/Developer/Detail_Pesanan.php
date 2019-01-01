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
            <h1 class="m-0 text-dark">Daftar Detail Pemesanan</h1>
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
              <h3 class="card-title">Data Detail Pemesanan</h3>
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
                    <th scope="row">Email</th>
                    <td><?php echo $info['pm4_orders_sender_email'];?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">No.Handphone</th>
                    <td><?php echo $info['pm4_orders_document_title'];?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Jumlah Halaman</th>
                    <td><?php echo $info['pm4_orders_pagenumber'];?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Nama Penerima</th>
                    <td><?php echo $info['pm4_orders_receiver_name'];?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">No. Telp Penerima</th>
                    <td><?php echo $info['pm4_orders_receiver_phonenumber'];?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Alamat Penerima</th>
                    <td><?php echo $info['pm4_orders_receiver_address'];?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Detail Pemesanan</th>
                    <td><?php echo $info['pm4_orders_paper'];?>, <?php echo $info['pm4_orders_color']; ?></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">Harga</th>
                    <td>
                    <?php echo $info['pm4_orders_cost']; ?>
                    </td>
                    <td></td>
                  </tr>
                </tbody>
                <?php }?>
              </table>
              <div class="card-footer">
                  <a href="<?php echo base_url();?>Developer/Do_Download/<?php echo $info['pm4_orders_filename'];?>" class="btn btn-primary">Download File</a>
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

