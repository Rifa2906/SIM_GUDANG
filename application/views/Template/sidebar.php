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
                      <a href="<?= base_url('Barang'); ?>">
                          <i class="fas fa-layer-group"></i>
                          <p>Produk</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a data-toggle="collapse" href="#barang_master">
                          <i class="fas fa-layer-group"></i>
                          <p>Data Master</p>
                          <span class="caret"></span>
                      </a>
                      <div class="collapse" id="barang_master">
                          <ul class="nav nav-collapse">
                              <li>
                                  <a href="<?= base_url('Rak'); ?>">
                                      <span class="sub-item">Rak</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="<?= base_url('Lantai'); ?>">
                                      <span class="sub-item">Lantai</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="<?= base_url('Papan'); ?>">
                                      <span class="sub-item">Papan</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li>

                  <li class="nav-item">
                      <a data-toggle="collapse" href="#stok">
                          <i class="fas fa-layer-group"></i>
                          <p>Stok Penyimpanan</p>
                          <span class="caret"></span>
                      </a>
                      <div class="collapse" id="stok">
                          <ul class="nav nav-collapse">
                              <li>
                                  <a href="<?= base_url('Stok_lantai'); ?>">
                                      <span class="sub-item">Stok Lantai</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="<?= base_url('Stok_papan'); ?>">
                                      <span class="sub-item">Stok Papan</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li>

                  <li class="nav-item">
                      <a href="<?= base_url('Persediaan'); ?>">
                          <i class="fas fa-layer-group"></i>
                          <p>Gudang</p>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a href="<?= base_url('Persetujuan'); ?>">
                          <i class="fas fa-layer-group"></i>
                          <p>Persetujuan</p>
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
                          <p>Produk Masuk</p>
                      </a>
                      <a href="<?= base_url('Barang_keluar'); ?>">
                          <i class="fas fa-arrow-left"></i>
                          <p>Produk Keluar</p>
                      </a>
                  </li>
                  <!-- 
                  <li class="nav-section">
                      <span class="sidebar-mini-icon">
                          <i class="fa fa-ellipsis-h"></i>
                      </span>
                      <h4 class="text-section">Laporan</h4>
                  </li> -->


                  <!-- <li class="nav-item">
                      <a data-toggle="collapse" href="#laporan">
                          <i class="fas fa-layer-group"></i>
                          <p>Laporan</p>
                          <span class="caret"></span>
                      </a>
                      <div class="collapse" id="laporan">
                          <ul class="nav nav-collapse">
                              <li>
                                  <a href="<?= base_url('Laporan'); ?>">
                                      <span class="sub-item">Laporan Masuk</span>
                                  </a>
                              </li>
                              <li>
                                  <a href="<?= base_url('Laporan/laporan_keluar'); ?>">
                                      <span class="sub-item">Laporan Keluar</span>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </li> -->


              </ul>
          </div>
      </div>
  </div>
  <!-- End Sidebar -->
  <div class="main-panel">