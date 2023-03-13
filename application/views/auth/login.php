<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('template/admin/') ?>assets/img/favicon.png" rel="icon">
    <link href="<?= base_url('template/admin/') ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- JQUERY -->
    <script src="<?= base_url('assets/jquery/dist/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/jquery/dist/jquery.min.js') ?>"></script>

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('template/admin/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('template/admin/') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('template/admin/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('template/admin/') ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url('template/admin/') ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url('template/admin/') ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('template/admin/') ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('template/admin/') ?>assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="<?= base_url('template/admin/') ?>assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">ERSA</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                                        <!-- <p class="text-center small">Enter your email & password to login</p> -->
                                    </div>
                                    <?php if ($this->session->flashdata('message')) : ?>
                                        <div class="registration" data-registration="<?= $this->session->flashdata('message'); ?>"></div>
                                    <?php endif; ?>
                                    <?php if ($this->session->flashdata('password_salah')) { ?>
                                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show">

                                            <?= $this->session->flashdata('password_salah') ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($this->session->flashdata('akun')) { ?>
                                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show">

                                            <?= $this->session->flashdata('akun') ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($this->session->flashdata('email')) { ?>
                                        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show">

                                            <?= $this->session->flashdata('email') ?>
                                        </div>
                                    <?php } ?>
                                    <form class="row g-3 needs-validation" method="POST" action="<?= base_url('auth') ?>">

                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" name="email" placeholder="Enter your email" autocomplete="off" autofocus>
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" name="password" placeholder="Enter your password" autocomplete="off">
                                        </div>

                                        <!-- <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div> -->
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>


                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a href="<?= base_url('auth/registration') ?>">Create an account</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                &copyCopyright yourwebsites.com <?= date('Y') ?>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/sweetalert/dist/') ?>sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/script/auth.js') ?>"></script>
    <script src="<?= base_url('template/admin/') ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url('template/admin/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('template/admin/') ?>assets/vendor/chart.js/chart.umd.js"></script>
    <script src="<?= base_url('template/admin/') ?>assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?= base_url('template/admin/') ?>assets/vendor/quill/quill.min.js"></script>
    <script src="<?= base_url('template/admin/') ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url('template/admin/') ?>assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url('template/admin/') ?>assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="<?= base_url('template/admin/') ?>assets/js/main.js"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>

</body>

</html>