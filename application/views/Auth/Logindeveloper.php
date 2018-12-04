<!DOCTYPE html>
<html>
<head>
  <title>PrintMedia | Developer</title>
  <?php $this->load->view('Developer/head'); ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url('/'); ?>"><b>Developer Print Media</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in Developer</p>
      <?php
        if($this->session->flashdata('success'))
        { 
          echo '<div class="alert alert-success">'. $this->session->flashdata('success') .'</div>';
        }      
        if($this->session->flashdata('error'))
        {
          echo '<div class="alert alert-danger">'. $this->session->flashdata('error') .'</div>';
        }
      ?>
      <?php echo form_open('auth/prosesloginadmin'); ?>
        <div class="form-group has-feedback">
          <?php
            $data = array('type' => 'email', 'class' => 'form-control', 'id' => 'email', 'name' => 'email', 'placeholder' => 'Masukkan Email', 'value' => set_value('email'), 'required' => 'true');
            echo form_input($data);
            echo form_error('email');
          ?>
        </div>
        <div class="form-group has-feedback">
          <?php
            $data = array('type' => 'password', 'class' => 'form-control', 'id' => 'password', 'name' => 'password', 'placeholder' => 'Masukkan Email', 'value' => set_value('password'), 'required' => 'true');
            echo form_input($data);
            echo form_error('password');
          ?>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
          <?php echo form_submit('submit', 'Login', array('class' => 'btn btn-primary btn-block btn-flat')); ?>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close(); ?>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php $this->load->view('Developer/script'); ?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>
