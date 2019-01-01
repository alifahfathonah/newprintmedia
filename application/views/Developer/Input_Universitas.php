<!DOCTYPE html>
<html>
<head>
  <!-- SRC include  -->
  <?php $this->load->view('Developer/head'); ?>
  <title>PrintMedia-Admin | Dashboard</title>
 
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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Developer');?>">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <?php if($this->session->flashdata('success_univ')||$this->session->flashdata('success_jurusan')):?>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.all.min.js"></script>
      <script>
        swal({
              title: "Done",
              text: "<?php echo $this->session->flashdata('success'); ?>",
              timer: 1500,
              showConfirmButton: false,
              type: 'success'
              });
      </script>
    <?php endif;?>
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Input Universitas</h3>
              </div>
            <div class="card-body">
            
                <form role="form" method="post" action="<?php echo base_url('Developer/Inputdb_Univ')?>" id="form1">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Nama Universitas</label>
                    <!-- <input type="text" class="form-control" placeholder="Pilih Kota"> -->
                    <?php $data1 = array('type' => 'text', 'id' => 'univ', 'name' => 'univ', 'class' => 'form-control', 'value' => set_value('univ'), 'required' => 'true', 'oninvalid' => 'this.setCustomValidity('."'Tidak Boleh Kosong'".')', 'oninput' => 'setCustomValidity('."''".')', 'autofocus' => 'true'); 
                          echo form_input($data1); 
                    ?>
                    <?php if(form_error('univ')!=NULL):?>
                    <?php  echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.all.min.js"></script>';
                      echo '<script>
                              swal({
                              text: "Mohon Lebih Teliti",
                              title: "'.form_error('univ').'",
                              showConfirmButton: true,
                              type: "'.'error'.'"
                              });
                            </script>'; 
                    ?>
                    <?php endif;?> 
                  </div>
                  <!-- select -->
                  <div class="form-group">
                  <label for="kota">Kota</label>
                   <select class="form-control select2" style="width: 100%;" name="kota">
                  <?php foreach ($data as $info) {?>
                                      <option><?php echo $info['name'];?></option>
                                <?php } ?>
                   
                  </select>
                  </div>
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
          </div>
        
        </div><!-- /.container-fluid -->
          <div class="col-md-6 col-sm-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Input Jurusan</h3>
            </div>
            <div class="card-body">
                    <form role="form" method="post" action="<?php echo base_url('Developer/Inputdb_Jurusan'); ?>">
                    <label>Nama Jurusan</label>
                    <?php $data1 = array('type' => 'text', 'id' => 'jurusan', 'name' => 'jurusan', 'class' => 'form-control mb-2 mr-sm-2', 'value' => set_value('jurusan'), 'required' => 'true', 'oninvalid' => 'this.setCustomValidity('."'Tidak Boleh Kosong'".')', 'oninput' => 'setCustomValidity('."''".')', 'autofocus' => 'true'); 
                          echo form_input($data1); 
                    ?>
                    <?php if(form_error('jurusan')!=NULL):?>
                    <?php  echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.all.min.js"></script>';
                      echo '<script>
                              swal({
                              text: "Mohon Lebih Teliti",
                              title: "'.form_error('jurusan').'",
                              timer: 2500,
                              showConfirmButton: false,
                              type: "'.'error'.'"
                              });
                            </script>'; 
                    ?>
                    <?php endif;?> 
                  <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
              </div>
              <!-- /.card-body -->
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



<?php $this->load->view('Developer/script'); ?>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker         : true,
      timePickerIncrement: 30,
      format             : 'MM/DD/YYYY h:mm A'
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
