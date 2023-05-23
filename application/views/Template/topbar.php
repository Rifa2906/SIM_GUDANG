  <!-- Logo Header -->
  <div class="logo-header" data-background-color="blue">

      <a href="index.html" class="logo text-center">
          <h3 class="mt-3 text-white">Industri Hilir Teh</h3>
      </a>
      <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">
              <i class="icon-menu"></i>
          </span>
      </button>
      <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
      <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
              <i class="icon-menu"></i>
          </button>
      </div>
  </div>
  <!-- End Logo Header -->

  <!-- Navbar Header -->
  <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

      <div class="container-fluid">

          <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
              <li class="nav-item toggle-nav-search hidden-caret">
                  <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                      <i class="fa fa-search"></i>
                  </a>
              </li>

              <li class="nav-item dropdown hidden-caret">
                  <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-bell"></i>
                      <span class="notification">4</span>
                  </a>
                  <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                      <li>
                          <div class="dropdown-title">You have 4 new notification</div>
                      </li>
                      <li>
                          <div class="notif-scroll scrollbar-outer">
                              <div class="notif-center">
                                  <a href="#">
                                      <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
                                      <div class="notif-content">
                                          <span class="block">
                                              New user registered
                                          </span>
                                          <span class="time">5 minutes ago</span>
                                      </div>
                                  </a>
                                  <a href="#">
                                      <div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
                                      <div class="notif-content">
                                          <span class="block">
                                              Rahmad commented on Admin
                                          </span>
                                          <span class="time">12 minutes ago</span>
                                      </div>
                                  </a>
                                  <a href="#">
                                      <div class="notif-img">
                                          <img src="<?= base_url('assets'); ?>/assets/img/profile2.jpg" alt="Img Profile">
                                      </div>
                                      <div class="notif-content">
                                          <span class="block">
                                              Reza send messages to you
                                          </span>
                                          <span class="time">12 minutes ago</span>
                                      </div>
                                  </a>
                                  <a href="#">
                                      <div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
                                      <div class="notif-content">
                                          <span class="block">
                                              Farrah liked Admin
                                          </span>
                                          <span class="time">17 minutes ago</span>
                                      </div>
                                  </a>
                              </div>
                          </div>
                      </li>
                      <li>
                          <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item dropdown hidden-caret">
                  <span class="text-white">
                      <?= $this->session->userdata('role'); ?>
                  </span>
              </li>
              <li class="nav-item dropdown hidden-caret">
                  <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                      <div class="avatar avatar-online">
                          <img src="<?= base_url('assets'); ?>/assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                      </div>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                      <div class="dropdown-user-scroll scrollbar-outer">
                          <li>
                              <div class="user-box">
                                  <div class="avatar">
                                      <img src="<?= base_url('assets'); ?>/assets/img/profile.jpg" alt="..." class="avatar-img rounded">
                                  </div>
                                  <div class="u-text">
                                      <h4> <?= $this->session->userdata('nama'); ?></h4>
                                      <p class="text-muted"></p>
                                      <div class="row mt-5">
                                          <a href="<?= base_url('Pengguna/Profile'); ?>/<?= $this->session->userdata('id'); ?>" class="btn btn-xs btn-secondary btn-sm">Profile</a>
                                          <button data-toggle="modal" data-target="#logoutModal" class="btn btn-xs btn-danger btn-sm ml-2">Logout</button>
                                      </div>

                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="dropdown-divider"></div>

                          </li>
                      </div>
                  </ul>
              </li>
          </ul>
      </div>
  </nav>
  <!-- End Navbar -->
  </div>

  <!-- Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header no-bd">
                  <h3>Apakah kamu yakin ingin keluar aplikasi?</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-footer no-bd">
                  <a href="<?= base_url('Login/logout'); ?>" class="btn btn-primary" id="tambah">Keluar</a>
                  <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Kembali</button>
              </div>
              </form>
          </div>
      </div>
  </div>

  <script>

  </script>