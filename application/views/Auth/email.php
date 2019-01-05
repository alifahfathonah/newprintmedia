<!DOCTYPE html>
<html lang="en">
<head>
    <title>Email</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/home/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Roboto:400,700" rel="stylesheet">
</head>
<body>

<div class="wrapper">
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-center">Aktivasi Akun PrintMedia</h3>
            </div>
            <div class="card-body">
                <?php 
                $date = date('Y-m-d');
                $now = date('d-m-Y', strtotime($date));
                echo $now. "<br><br>"; 
                ?>

                <p>Halo <?php $data['pm1_auth_email']; ?>.
                Mohon verifikasi alamat email Anda dengan cara menekan tombol di bawah. Email yang telah diverifikasi akan mempermudah kami untuk menghubungi Anda jika akun sedang mengalami masalah. Serta kami juga akan mengirimkan Anda sebuah informasi-informasi yang sesuai.</p>

                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <a href="<?php echo base_url('aktivasi/').$data['pm1_auth_token']; ?>" class="btn btn-success btn-lg btn-block active">VERIFIKASI EMAIL</a>
                    </div>
                    <div class="col-md-4"></div>
                </div>

                <p>Jika tombol diatas tidak berfungsi, mohon salin link dibawah ini ke browser Anda.</p>
                <a href="<?php echo base_url('aktivasi/').$data['pm1_auth_token']; ?>"><?php echo base_url('aktivasi/').$data['pm1_auth_token']; ?></a>

                <p>Salam, <br>
                Tim PrintMedia</p>
            </div>
            <div class="card-footer">
                <p>Mohon jangan balas pesan ini. Terima kasih</p>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
</body>
</html>