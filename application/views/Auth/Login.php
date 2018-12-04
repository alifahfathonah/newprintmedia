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
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="intro-kiri" style="padding-top:5px">
                    <div class="card">
                        <?php echo form_open('auth/proseslogin'); ?>
                            <div class="containerform">
                                <div class="form-top">
                                    <h4>Login</h4>
                                    <span>Belum punya akun PrintMedia? <a href="<?php echo base_url('register'); ?>">Daftar!</a></span>
                                </div>
                                <?php        
                                if($this->session->flashdata('error')):
                                    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
                                    echo '<script>
                                            swal({
                                                type: "'.'error'.'",
                                                title: "'.$this->session->flashdata('error').'",
                                                timer: 3000,
                                                customClass: "'.'animated bounceIn'.'",
                                            })
                                        </script>';
                                endif;
                                if($this->session->flashdata('errorpassword')):
                                    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
                                    echo '<script>
                                            swal({
                                                type: "'.'error'.'",
                                                title: "'.$this->session->flashdata('errorpassword').'",
                                                timer: 10000,
                                                customClass: "'.'animated bounceIn'.'",
                                            })
                                        </script>';
                                endif;
                                if($this->session->flashdata('belumaktif')):
                                    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
                                    echo '<script>
                                            swal({
                                                type: "'.'error'.'",
                                                title: "'.$this->session->flashdata('belumaktif').'",
                                                text: "'.'Akun Anda Belum Aktif'.'",
                                                timer: 10000,
                                                customClass: "'.'animated bounceIn'.'",
                                            })
                                        </script>';
                                endif;
                                ?>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email address</label>
                                    <?php 
                                    $data = array('type' => 'email', 'name' => 'email', 'class' => 'form-control', 'value' => set_value('email'), 'required' => 'true', 'oninvalid' => 'this.setCustomValidity('."'Email Tidak Boleh Kosong'".')', 'oninput' => 'setCustomValidity('."''".')', 'autofocus' => 'true'); 
                                    echo form_input($data);
                                    echo form_error('email', '<p class="text-danger">', '</p>'); 
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Password</label>
                                    <?php 
                                    $data = array('type' => 'password', 'name' => 'password', 'class' => 'form-control', 'required' => 'true', 'oninvalid' => 'this.setCustomValidity('."'Password Tidak Boleh Kosong'".')', 'oninput' => 'setCustomValidity('."''".')'); 
                                    echo form_input($data);
                                    echo form_error('password', '<p class="text-danger">', '</p>'); 
                                    ?>
                                </div>

                                <div class="clearfix">
                                    <?php echo form_submit('submit', 'Login', array('class' => 'btn btn-sign')); ?>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <img src="<?php echo base_url('asset/home/img/intro-foto.png'); ?>" alt="" class="img-fluid">
            </div>
        </div>
    </div> 
</section>

<section class="section section-auth-mobile mobile">
    <div class="container-fluid">
        <div class="header-mobile">
            <h3>Login</h3>
            <p>Belum punya akun Print Media? Silahkan <a href="<?php echo base_url('register'); ?>">Daftar</a></p>
        </div>
        <?php echo form_open('auth/proseslogin'); ?>
            <?php        
            if($this->session->flashdata('error')):
                echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.js"></script>';
                echo '<script>
                        swal({
                            type: "'.'error'.'",
                            title: "'.$this->session->flashdata('error').'",
                            text: "'.'Akun Anda Tidak Terdaftar'.'",
                            timer: 3000,
                            customClass: "'.'animated bounceIn'.'",
                        })
                    </script>';
            endif;
            ?>
            <div class="form-group">
                <label class="bmd-label-floating">Email address</label>
                <?php 
                $data = array('type' => 'email', 'name' => 'email', 'class' => 'form-control', 'value' => set_value('email')); 
                echo form_input($data);
                echo form_error('email', '<p class="text-danger">', '</p>');
                ?>
            </div>
            <div class="form-group">
                <label class="bmd-label-floating">Password</label>
                <?php 
                $data = array('type' => 'password', 'name' => 'password', 'class' => 'form-control', 'value' => set_value('password')); 
                echo form_input($data);
                echo form_error('password', '<p class="text-danger">', '</p>'); 
                ?>
            </div>
            <?php echo form_submit('submit', 'Login', array('class' => 'btn btn-sign')); ?>
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
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

</body>
</html>