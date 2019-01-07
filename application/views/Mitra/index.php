<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRINTMEDIA - MITRA</title>
    <?php $this->load->view('Mitra/include/css'); ?>
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <?php $this->load->view('Mitra/include/header'); ?>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <?php $this->load->view('Mitra/include/sidebar'); ?>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Transaksi <?php echo date('F'); ?>
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">0</div>
                      <div class="card-stats-item-label">Proses</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">0</div>
                      <div class="card-stats-item-label">Pengiriman</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">0</div>
                      <div class="card-stats-item-label">Selesai</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Transaksi</h4>
                  </div>
                  <div class="card-body">
                    0
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-chart">
                  <canvas id="balance-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Saldo</h4>
                  </div>
                  <div class="card-body">
                    Rp. <?php echo number_format(0,2,',','.'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-chart">
                  <canvas id="sales-chart" height="80"></canvas>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Transaksi</h4>
                  </div>
                  <div class="card-body">
                    0
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Transaksi Terbaru</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-danger">Lihat Selengkapnya <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tr>
                        <th>Order ID</th>
                        <th>Pelanggan</th>
                        <th>Dokumen</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87239</a></td>
                        <td class="font-weight-600">Kusnadi</td>
                        <td>July 19, 2018</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87239</a></td>
                        <td class="font-weight-600">Kusnadi</td>
                        <td>July 19, 2018</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87239</a></td>
                        <td class="font-weight-600">Kusnadi</td>
                        <td>July 19, 2018</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87239</a></td>
                        <td class="font-weight-600">Kusnadi</td>
                        <td>July 19, 2018</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87239</a></td>
                        <td class="font-weight-600">Kusnadi</td>
                        <td>July 19, 2018</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87239</a></td>
                        <td class="font-weight-600">Kusnadi</td>
                        <td>July 19, 2018</td>
                        <td><div class="badge badge-warning">Unpaid</div></td>
                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-hero">
                <div class="card-header">
                  <div class="card-icon">
                    <i class="far fa-question-circle"></i>
                  </div>
                  <h4>0</h4>
                  <div class="card-description">Review</div>
                </div>
                <div class="card-body p-0">
                  <div class="tickets-list">
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>My order hasn't arrived yet</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Laila Tazkiah</div>
                        <div class="bullet"></div>
                        <div class="text-primary">1 min ago</div>
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Please cancel my order</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Rizal Fakhri</div>
                        <div class="bullet"></div>
                        <div>2 hours ago</div>
                      </div>
                    </a>
                    <a href="#" class="ticket-item">
                      <div class="ticket-title">
                        <h4>Do you see my mother?</h4>
                      </div>
                      <div class="ticket-info">
                        <div>Syahdan Ubaidillah</div>
                        <div class="bullet"></div>
                        <div>6 hours ago</div>
                      </div>
                    </a>
                    <a href="features-tickets.html" class="ticket-item ticket-more">
                      View All <i class="fas fa-chevron-right"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <?php $this->load->view('Mitra/include/footer'); ?>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <?php $this->load->view('Mitra/include/js'); ?>
</body>
</html>