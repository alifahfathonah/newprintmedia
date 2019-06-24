<!DOCTYPE HTML>
<html lang="en">
<head>
<title><?php echo SITE_NAME .": ". ucfirst($this->uri->segment(1)) ." - ". ucfirst($this->uri->segment(2)) ?></title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Material Design for Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/css/style.css">
<!-- Material Design for Bootstrap fonts and icons -->
<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Fredoka+One|Roboto:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>
<body id="body-tentang">

<div id="navbar">
    <?php $this->load->view('home/include/header'); ?>
</div>

<section class="section section-tentang-banner" id="mulai">
    <div class="container">
        <h4>Tentang Kami</h4>
    </div>
</section>

<section class="section-tentang">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p>
                    Print Media merupakan calon startup di Indonesia. Startup yang berfokus di bidang <b>Percetakan</b> dimana kami membantu teman-teman agar mudah dalam mencetak tugas-tugas, jurnal dan makalah. 
                    Kami hadir karena melihat kebutuhan dalam dunia percetakan sangat penting, apalagi saat ini semuanya pada sibuk dan tidak sempat untuk datang ke sebuah tempat percetakan.
                    Disinilah kami hadir dan memberikan nuansa yang berbeda, dimana kami selalu siap membantu kebutuhan-kebutuhan dalam dunia percetakan.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section section-visi-misi">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 visi">
                <h4 class="text-center">VI<span>SI</span></h4>
                <p>Sebuah karya anak bangsa Indonesia yang berfokus pada dunia percetakan. Kami hadir dengan nuansa yang beda dan membantu para pelajar agar mudah untuk belajar.</p>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <h4 class="text-center"><span>MI</span>SI</h4>
                <ul class="list-group">
                    <li class="list-group-item">Memudahkan para Mahasiswa agar mudah dalam mencetak Tugas.</li>
                    <li class="list-group-item">-</li>
                    <li class="list-group-item">-</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section section-team">
    <div class="container">
        <h4>TEAM</h4>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <img src="<?php echo base_url('asset/home/img/avatar.png'); ?>" alt="">
                <div class="team-body">
                    <h5>Wahyu Rizky</h5>
                    <span>Penggembira</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <img src="<?php echo base_url('asset/home/img/avatar.png'); ?>" alt="">
                <div class="team-body">
                    <h5>Abdiel Reyhan</h5>
                    <span>Web Developer</span>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <img src="<?php echo base_url('asset/home/img/avatar.png'); ?>" alt="">
                <div class="team-body">
                    <h5>Bugi Setiawan</h5>
                    <span>Backend Developer</span>
                </div>   
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <img src="<?php echo base_url('asset/home/img/avatarfemale.png'); ?>" alt="">
                <div class="team-body">
                    <h5>Ira Kusuma</h5>
                    <span>Frontend Developer</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="footer">
    <div class="container">
        <div class="list">
            <div class="row">
                <div class="col-lg-12">
                    <ul>
                        <li class="facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></li>
                        <li class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></li>
                        <li class="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php $this->load->view('home/include/footer'); ?>
    </div>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

</body>
</html>