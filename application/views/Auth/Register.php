<!DOCTYPE html>
<html>
<head>
<title>Print Media | Solusi Percetakan Masa Kini</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Material Design for Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.css" />
<link href="https://fonts.googleapis.com/css?family=Fredoka+One|Roboto:400,700" rel="stylesheet">

</head>
<body>
<div id="navbar">
    <?php $this->load->view('home/inc/header'); ?>
</div>

<section class="section section-auth desktop" id="mulai">
    <div class="container">
        <!-- AWAL ROW -->
        <div class="row">
            <div class="col-lg-3"></div>
            <!-- TENGAH -->
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="intro-kiri" style="padding-top:5px">
                    <div class="card">
                        <?php echo form_open('auth/prosesregister'); ?>
                            <div class="containerform">
                                <div class="form-top">
                                    <h4>Daftar Sekarang</h4>
                                    <span>Sudah punya akun PrintMedia? <a href="<?php echo base_url('login'); ?>">Masuk!</a></span>
                                </div>
                                <?php        
                                if($this->session->flashdata('error')):
                                    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
                                    echo '<script>
                                            swal({
                                                type: "'.'error'.'",
                                                title: "'.$this->session->flashdata('error').'",
                                                text: "'.'Mohon Maaf! Hanya Email berdomain .ac.id dan .edu yang bisa Mendaftar'.'",
                                                timer: 10000,
                                                customClass: "'.'animated bounceIn'.'",
                                            })
                                        </script>';
                                endif;
                                if($this->session->flashdata('success')):
                                    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
                                    echo '<script>
                                            swal({
                                                type: "'.'success'.'",
                                                title: "'.$this->session->flashdata('success').'",
                                                text: "'.'Silahkan Cek Email Untuk Aktivasi Akun'.'",
                                                customClass: "'.'animated bounceIn'.'",
                                            })
                                        </script>';
                                endif;
                                ?>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email address</label>
                                    <?php 
                                    $data = array('type' => 'email', 'id' => 'email', 'name' => 'email', 'class' => 'form-control', 'value' => set_value('email'), 'required' => 'true', 'oninvalid' => 'this.setCustomValidity('."'Email Tidak Boleh Kosong'".')', 'oninput' => 'setCustomValidity('."''".')', 'autofocus' => 'true'); 
                                    echo form_input($data); ?>
                                    <small id="emailHelp" class="form-text text-muted">Harap saat mendaftar, menggunakan email berdomain <b>ac.id</b> atau <b>.edu</b>.</small>
                                    <?php echo form_error('email', '<p class="text-danger">', '</p>'); ?>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Password</label>
                                    <?php 
                                    $data = array('type' => 'password', 'id' => 'password', 'name' => 'password', 'class' => 'form-control', 'required' => 'true', 'oninvalid' => 'this.setCustomValidity('."'Password Tidak Boleh Kosong'".')', 'oninput' => 'setCustomValidity('."''".')'); 
                                    echo form_input($data);
                                    echo form_error('password', '<p class="text-danger">', '</p>'); 
                                    ?>
                                </div>

                                <div class="clearfix">
                                    <?php echo form_submit('submit', 'Daftar', array('class' => 'btn btn-sign')); ?>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <!-- TENGAH -->
            <div class="col-lg-3"></div>
        </div>
        <!-- AKHIR ROW -->
    </div> 
</section>

<section class="section section-auth-mobile mobile">
    <div class="container-fluid">
        <div class="header-mobile">
            <h3>Daftar</h3>
            <p>Sudah punya akun Print Media? Silahkan <a href="<?php echo base_url('login'); ?>">Login</a></p>
        </div>
        <?php echo form_open('auth/prosesregister'); ?>
            <?php        
            if($this->session->flashdata('error')):
                echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
                echo '<script>
                        swal({
                            type: "'.'error'.'",
                            title: "'.$this->session->flashdata('error').'",
                            text: "'.'Mohon Maaf! Hanya Email berdomain .ac.id dan .edu yang bisa Mendaftar'.'",
                            timer: 10000,
                            customClass: "'.'animated bounceIn'.'",
                        })
                    </script>';
            endif;
            if($this->session->flashdata('success')):
                echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
                echo '<script>
                        swal({
                            type: "'.'success'.'",
                            title: "'.$this->session->flashdata('success').'",
                            text: "'.'Silahkan Cek Email Untuk Aktivasi Akun'.'",
                            customClass: "'.'animated bounceIn'.'",
                        })
                    </script>';
            endif;
            ?>
            <div class="form-group">
                <label class="bmd-label-floating">Email address</label>
                <?php 
                $data=array('type' => 'email', 'name' => 'email', 'class' => 'form-control', 'value' => set_value('email') ); 
                echo form_input($data);
                echo form_error('email', '<p class="text-danger">', '</p>');
                ?>
            </div>
            <div class="form-group">
                <label class="bmd-label-floating">Password</label>
                <?php 
                $data=array('type' => 'password', 'name' => 'password', 'class' => 'form-control',); 
                echo form_input($data);
                echo form_error('password', '<p class="text-danger">', '</p>'); 
                ?>
            </div>
            <?php echo form_submit('submit', 'Daftar', array('class' => 'btn btn-sign')); ?>
        <?php echo form_close(); ?>
    </div>
</section>

<section class="footer">
    <?php $this->load->view('home/inc/footer'); ?>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"  crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"  crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>asset/home/js/jquery-validate.min.js"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

</body>
</html>