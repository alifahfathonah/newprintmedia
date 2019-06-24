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
                <section class="section section-sukses" id="mulai">
                    <div class="container">
                        <div class="jumbotron text-black">
                            <h1 class="display-4">Akun Anda Aktif!</h1>
                            <p class="lead">
                                Terima kasih <b><?php echo $view[0]['pm1_auth_email']; ?></b> telah melakukan aktivasi.<br> Silahkan <a class="btn btn-primary" href="<?php echo base_url('login'); ?>" class="text-dark">LOGIN!</a>
                            </p>
                        </div>
                    </div>
                </section>
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