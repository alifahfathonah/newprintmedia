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

<div id="search-engine">
    <div class="container">
        <h2>PrintMedia</h2>
        <p>Cari lokasi tempat percetakan atau nama percetakan. Cepat dan Mudah!</p>
        <!-- <form action="" method="post">
            <input type="search" class="search form-control mr-sm-2" name="search" placeholder="Cari Lokasi Percetakan...">
        </form> -->
    </div>
</div>

<div id="about" class="default-div">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <img src="<?php echo base_url('asset/home/img/layanan1.jpg'); ?>" class="img-fluid">
            </div>
            <div class="col-lg-8 col-md-6 col-sm-12">
                <div class="default-custom">
                    <h3>Menjawab Kebutuhan Anda</h3>
                </div>
                <p>Print Media merupakan calon startup di Indonesia. Startup yang berfokus di bidang Percetakan dimana kami membantu teman-teman agar mudah dalam mencetak tugas-tugas, jurnal dan makalah. Kami hadir karena melihat kebutuhan dalam dunia percetakan sangat penting, apalagi saat ini semuanya pada sibuk dan tidak sempat untuk datang ke sebuah tempat percetakan. Disinilah kami hadir dan memberikan nuansa yang berbeda, dimana kami selalu siap membantu kebutuhan-kebutuhan dalam dunia percetakan.</p>
            </div>
        </div>
    </div>
</div>

<div id="pemesanan" class="default-div">
    <div class="container">
        <div class="default-heading">
            <h3>Hanya <span class="promo">3 Langkah</span>, Bisa Dapat Barangmu!</h3>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="pemesanan-image">
                    <img src="<?php echo base_url('asset/home/img/register.png'); ?>" class="img-fluid" width="100" height="100">
                </div>
                <div class="pemesanan-text">
                    <h4>Daftar di PrintMedia</h4>
                    <p>Mahasiswa / siswa melakukan pendaftaran di Print Media dan melengkapi data-datanya. Hanya email berdomain <b>.ac.id</b> atau <b>.edu</b> yang bisa mendaftar.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="pemesanan-image">
                    <img src="<?php echo base_url('asset/home/img/upload-dokumen.png'); ?>" class="img-fluid" width="100" height="100">
                </div>
                <div class="pemesanan-text">
                    <h4>Upload Dokumen</h4>
                    <p><b>1.</b> Mahasiswa mengunggah dokumen dengan format-format yang di inginkan.</p>
                    <p><b>2.</b> Pilih jenis pembayaran dan pengiriman.</p>
                    <p><b>3.</b> Pihak Print Media akan memproses pesanan.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="pemesanan-image">
                    <img src="<?php echo base_url('asset/home/img/shipping.png'); ?>" class="img-fluid" width="100" height="100">
                </div>
                <div class="pemesanan-text">
                    <h4>Dokumen Sampai</h4>
                    <p>Dokumen akan sampai sesuai dengan waktu yang telah ditentukan. Jika dalam waktu 7 hari tidak sampai, maka akan diberikan pengembalian uang.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="mitra" class="default-div">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-6 col-sm-12">
                <div class="default-custom">
                    <h3>GABUNG MENJADI PENGGUNA KAMI</h3>
                </div>
                <p>Jika anda tertarik menjadi bagian dari pengguna kami, silahkan tekan tombol disamping.</p>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-12">
                <a href="<?php echo base_url('register'); ?>" class="btn btn-block btn-success btn-mitra">HUBUNGI KAMI</a>
            </div>
        </div>
    </div>
</div>


<div id="footer">
    <?php $this->load->view('Home/include/footer'); ?>
</div>

<!-- JavaScript -->
<?php $this->load->view('Home/include/js'); ?>

</body>
</html>