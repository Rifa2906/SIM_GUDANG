  <!-- Sidebar -->
  <div class="sidebar sidebar-style-2">
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">

              <ul class="nav nav-primary">
                  <li class="nav-item active">
                      <a href="<?= base_url('Dashboard'); ?>">
                          <i class="fas fa-home"></i>
                          <p>Dashboard</p>

                      </a>
                  </li>
                  <li class="nav-section">
                      <span class="sidebar-mini-icon">
                          <i class="fa fa-ellipsis-h"></i>
                      </span>
                      <h4 class="text-section">Manajemen Pengguna</h4>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('Pengguna'); ?>">
                          <i class="fas fa-users"></i>
                          <p>Pengguna</p>
                      </a>
                  </li>

                  <li class="nav-section">
                      <span class="sidebar-mini-icon">
                          <i class="fa fa-ellipsis-h"></i>
                      </span>
                      <h4 class="text-section">Manajemen Barang</h4>
                  </li>

                  <li class="nav-item">
                      <a data-toggle="collapse" href="#barang_master">
                          <i class="fas fa-layer-group"></i>
                          <p>Barang Master</p>
                          <span class="caret"></span>
                      </a>
                      <div class="collapse" id="barang_master">
                          <ul class="nav nav-collapse">
                              <li>
                                  <a href="<?= base_url('Barang'); ?>">
                                      <span class="sub-item">Barang</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="<?= base_url('Rak'); ?>">
                                      <span class="sub-item">Rak</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li>

                  <li class="nav-item">
                      <a href="<?= base_url('Persediaan'); ?>">
                          <i class="fas fa-layer-group"></i>
                          <p>Persediaan</p>
                      </a>
                  </li>


                  <li class="nav-item">
                      <a href="<?= base_url('Penyimpanan'); ?>">
                          <i class="fas fa-layer-group"></i>
                          <p>Penyimpanan</p>
                      </a>
                  </li>

                  <li class="nav-section">
                      <span class="sidebar-mini-icon">
                          <i class="fa fa-ellipsis-h"></i>
                      </span>
                      <h4 class="text-section">Manajemen Transaksi</h4>
                  </li>
                  <li class="nav-item">
                      <a href="<?= base_url('Barang_masuk'); ?>">
                          <i class="fas fa-arrow-right"></i>
                          <p>Barang Masuk</p>
                      </a>
                      <a href="<?= base_url('Barang_keluar'); ?>">
                          <i class="fas fa-arrow-left"></i>
                          <p>Barang Keluar</p>
                      </a>
                  </li>

              </ul>
          </div>
      </div>
  </div>
  <!-- End Sidebar -->
  <div class="main-panel">