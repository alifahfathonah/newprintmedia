<!DOCTYPE html>
<html>
<head>
  <!-- SRC include  -->
  <?php $this->load->view('Developer/head'); ?>
  <title>PrintMedia-Admin | Universitas</title>
 
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

 <?php $this->load->view('Developer/navbar');?>

 <!--sidebar load  -->
 <?php $this->load->view('Developer/sidebar');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('');?>" class="btn btn-danger">PDF</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('');?>" class="btn btn-success">EXCEL</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('');?>" class="btn btn-primary">SQL</a></li>
            </ol>
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
              <h3 class="card-title">Data User</h3>
            </div>
            <!-- /.card-header -->
            <?php if($this->session->flashdata('success_del_user')){?>
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
            <?php } elseif($this->session->flashdata('error_del_user')) { ?>
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
            <div class="card-body">
            <!-- <form role="form" method="post"> -->
            <?php foreach($cek as $data){ ?>
            <?php echo form_open('Developer/prosesedituser', array('enctype' => 'multipart/form-data','id' => 'submit', 'class' => 'form-horizontal')); ?>
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">User Id</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="id" value="<?php echo $data['pm1_user_id']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" value="<?php echo $data['pm1_user_name']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Handphone</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="no_handphone" value="<?php echo $data['pm1_user_phonenumber']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="detail_alamat" value="<?php echo $data['pm1_user_address']; ?>">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              <!-- </form> -->
              <?php echo form_close(); ?>  
            <?php }?> 
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
    $("#example1").DataTable({"stateSave": true});
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
