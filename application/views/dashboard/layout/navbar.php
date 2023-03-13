 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

     <div class="d-flex align-items-center justify-content-between">
         <a href="index.html" class="logo d-flex align-items-center">
             <img src="<?= base_url('template/admin/') ?>assets/img/logo.png" alt="">
             <span class="d-none d-lg-block">NiceAdmin</span>
         </a>
         <i class="bi bi-list toggle-sidebar-btn"></i>
     </div><!-- End Logo -->


     <nav class="header-nav ms-auto">
         <ul class="d-flex align-items-center">





             <li class="nav-item dropdown pe-3">
                 <?php
                    $get_admin = $this->db->get_where('admin', ['user_id' => $this->session->userdata('id_user')])->row_array();
                    $get_instansi = $this->db->get_where('instansi', ['user_id' => $this->session->userdata('id_user')])->row_array();
                    $get_user = $this->db->get_where('user', ['id' => $this->session->userdata('id_user')])->row();

                    ?>

                 <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                     <img src="<?= base_url('assets/img/profile/' . $get_user->image) ?>" alt="Profile" class="rounded-circle">
                     <?php if (
                            $this->session->userdata('role_id') == '1'
                        ) { ?>
                         <span class="ms-1 d-none d-sm-inline"><?= $get_admin['nama'] ?></span>
                     <?php   } elseif ($this->session->userdata('role_id') == '2') { ?>
                         <span class="ms-1 d-none d-sm-inline"><?= $get_instansi['nama_instansi'] ?></span>
                     <?php    } ?>

                 </a><!-- End Profile Iamge Icon -->

                 <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                     <li class="dropdown-header">
                         <?php if (
                                $this->session->userdata('role_id') == '1'
                            ) { ?>
                             <h6><?= $get_admin['nama'] ?></h6>
                         <?php   } elseif ($this->session->userdata('role_id') == '2') { ?>
                             <h6><?= $get_instansi['nama_instansi'] ?></h6>
                         <?php } ?>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li>
                         <a class="dropdown-item d-flex align-items-center" href="<?= base_url('admin/profile') ?>">
                             <i class="bi bi-person"></i>
                             <span>My Profile</span>
                         </a>
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>


                     <li>
                         <hr class="dropdown-divider">
                     </li>
                     <li>
                         <hr class="dropdown-divider">
                     </li>

                     <li>
                         <a class="dropdown-item d-flex align-items-center" href="<?= base_url('auth/logout') ?>">
                             <i class="bi bi-box-arrow-right"></i>
                             <span>Sign Out</span>
                         </a>
                     </li>

                 </ul><!-- End Profile Dropdown Items -->
             </li><!-- End Profile Nav -->

         </ul>
     </nav><!-- End Icons Navigation -->

 </header><!-- End Header -->