<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>PrintMedia Percetakan Online di Indonesia Kelas Mahasiswa</title>
    <?php $this->load->view('Home/include/css'); ?>
</head>
<body>

<div id="header">
    <?php $this->load->view('Home/include/header'); ?>
</div>

<div id="auth">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <h4 class="text-center">Register</h4>
                    <?php
                    if($this->session->flashdata('error'))
                    {
                        echo '<script src="'.base_url('asset/home/js/sweetalert2.min.js').'"></script>';
                        echo '<script>
                                Swal({
                                    type: "error",
                                    title: "'.$this->session->flashdata('error').'",
                                })
                            </script>';
                    }
                    if($this->session->flashdata('sukses'))
                    {
                        echo '<script src="'.base_url('asset/home/js/sweetalert2.min.js').'"></script>';
                        echo '<script>
                                Swal({
                                    type: "success",
                                    title: "'.$this->session->flashdata('sukses').'",
                                })
                            </script>';
                    }
                    if($this->session->flashdata('belum_aktif'))
                    {
                        echo '<script src="'.base_url('asset/home/js/sweetalert2.min.js').'"></script>';
                        echo '<script>
                                Swal({
                                    type: "error",
                                    title: "'.$this->session->flashdata('belum_aktif').'",
                                })
                            </script>';
                    }
                    if($this->session->flashdata('blokir'))
                    {
                        echo '<script src="'.base_url('asset/home/js/sweetalert2.min.js').'"></script>';
                        echo '<script>
                                Swal({
                                    type: "error",
                                    title: "'.$this->session->flashdata('blokir').'",
                                })
                            </script>';
                    }
                    if($this->session->flashdata('password_salah'))
                    {
                        echo '<script src="'.base_url('asset/home/js/sweetalert2.min.js').'"></script>';
                        echo '<script>
                                Swal({
                                    type: "error",
                                    title: "'.$this->session->flashdata('password_salah').'",
                                })
                            </script>';
                    }
                    if($this->session->flashdata('tidak_ada'))
                    {
                        echo '<script src="'.base_url('asset/home/js/sweetalert2.min.js').'"></script>';
                        echo '<script>
                                Swal({
                                    type: "error",
                                    title: "'.$this->session->flashdata('tidak_ada').'",
                                })
                            </script>';
                    }
                    ?>
                    <?php echo form_open('auth/prosesregister', array('class' => 'needs-validation')); ?>
                        <div class="form-group">
                            <label>Email</label>
                            <?php
                            if(form_error('email'))
                            {
                                echo '<input type="email" class="form-control is-invalid" name="email" value="'.set_value('email').'" autofocus>';
                            }
                            else
                            {
                                echo '<input type="email" class="form-control" name="email" placeholder="Masukkan Email" autofocus>';
                            }
                            ?>
                            <small class="form-text text-muted">Harap saat mendaftar, menggunakan email berdomain <b>ac.id</b> atau <b>.edu.</b></small>
                            <?php echo form_error('email', '<p class="text-danger">', '</p>'); ?>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kata Sandi</label>
                                    <?php
                                    if(form_error('password'))
                                    {
                                        echo '<input type="password" class="form-control is-invalid" name="password">';
                                    }
                                    else
                                    {
                                        echo '<input type="password" class="form-control" name="password" placeholder="Masukkan Kata Sandi">';
                                    }
                                    ?>
                                    <?php echo form_error('password', '<p class="text-danger">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Konfirmasi Kata Sandi</label>
                                    <?php
                                    if(form_error('password'))
                                    {
                                        echo '<input type="password" class="form-control is-invalid" name="konfirmasi_password">';
                                    }
                                    else
                                    {
                                        echo '<input type="password" class="form-control" name="konfirmasi_password" placeholder="Konfirmasi Kata Sandi">';
                                    }
                                    ?>
                                    <?php echo form_error('konfirmasi_password', '<p class="text-danger">', '</p>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="validasi" checked>
                            <label class="form-check-label" for="exampleCheck1">Saya menyetujui <a href="">Kebijakan Privasi PrintMedia</a></label>
                            <?php echo form_error('validasi', '<p class="text-danger">', '</p>'); ?>
                        </div>
                        <button type="submit" class="btn btn-auth">REGISTER</button>
                    <?php echo form_close(); ?>
                    <p class="tambahan">Sudah punya akun?<a href="<?php echo base_url('login') ?>" class="ml-auto"> Login Sekarang</a></p> 
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="auth-footer">
            <div class="garis"></div>
            <p>© <?php echo date('Y'); ?> - PT Print Media | Time: {elapsed_time} | {memory_usage} </p>
        </div>
    </div>
</div>

<!-- JavaScript -->
<?php $this->load->view('Home/include/js'); ?>

</body>
</html>