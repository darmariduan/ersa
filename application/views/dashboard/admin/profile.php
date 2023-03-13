<?php
if ($this->session->flashdata('image')) { ?>
    <div id="edit-image" data-profil="<?= $this->session->flashdata('image') ?>">
    </div>

<?php } ?>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-5">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="<?= base_url('assets/img/profile/' . $user->image) ?>" alt="Profile" class="rounded-circle">
                        <h2><?= $user->nama ?></h2>

                        <?php if ($user->status == 1) { ?>
                            <span class="badge bg-success">Active</span>
                        <?php } else { ?>
                            <span class="badge bg-danger">Not Active</span>
                        <?php } ?>


                        <!-- <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div> -->
                    </div>
                </div>

            </div>

            <div class="col-xl-7">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile Image</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Edit Profiles</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">


                                <h5 class="card-title"></h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                                    <div class="col-lg-9 col-md-8"><?= $user->nama ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Email</div>
                                    <div class="col-lg-9 col-md-8"><?= $user->email ?></div>
                                </div>





                            </div>



                            <div class="tab-pane fade pt-3" id="profile-edit">
                                <form enctype="multipart/form-data" action="<?= base_url('admin/change_photo') ?>" method="post" id="form-image">
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-5 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-7">
                                            <img src="<?= base_url('assets/img/profile/' . $user->image) ?>" width="30%" alt="Profile">
                                            <div class="pt-2">

                                                <input type="file" name="image" id="image" class="form-control" autocomplete="off">
                                                <?php if (isset($error)) {
                                                    echo '<small class="text-danger" id="image-error" >' . $error . '</small>';
                                                } ?>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>


                                </form>


                            </div>




                            <div class="tab-pane fade pt-3" id="profile-settings">

                                <!-- Settings Form -->
                                <form action="<?= base_url('admin/update_profil') ?>" method="post" id="profil-admin">

                                    <div class="row mb-3">
                                        <label for="Password" class="col-md-4 col-lg-5 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-7">
                                            <input type="text" name="email" id="email" class="form-control" value="<?= $user->email ?>" autocomplete="off">
                                            <input type="hidden" name="text" id="id" class="form-control" value="<?= $user->user_id ?>" readonly>
                                            <span class="text-danger" style="display:none; font-size:12px;" id="email_error"></span>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="password2" class="col-md-4 col-lg-5 col-form-label">Nama</label>
                                        <div class="col-md-8 col-lg-7">
                                            <input name="nama" type="text" class="form-control" id="nama" value="<?= $user->nama ?>" autocomplete="off">
                                            <span class="text-danger" style="display:none; font-size:12px;" id="nama_error"></span>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End settings Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="<?= base_url('admin/change_password') ?>" method="POST" id="change-password">



                                    <div class="row mb-3">
                                        <label for="Password" class="col-md-4 col-lg-5 col-form-label">New Password</label>
                                        <div class="col-md-8 col-lg-7">

                                            <input type="hidden" name="email" id="email" class="form-control" value="<?= $user->email ?>" readonly>
                                            <input type="hidden" name="text" id="id" class="form-control" value="<?= $user->user_id ?>" readonly>
                                            <input name="password" type="password" class="form-control" id="password">
                                            <span class="text-danger" style="display:none; font-size:12px;" id="password_error"></span>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="nama" class="col-md-4 col-lg-5 col-form-label">Repeat Password</label>
                                        <div class="col-md-8 col-lg-7">
                                            <input name="password2" type="password" class="form-control" id="password2">
                                            <span class="text-danger" style="display:none; font-size:12px;" id="password2_error"></span>
                                        </div>
                                    </div>

                                    <div class="">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->

<script>
    $(document).ready(function() {
        $('#change-password').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/change_password') ?>",
                data: $(this).serialize(),
                dataType: "JSON",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Password Berhasil Diubah',
                            showConfirmButton: true,

                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = "<?= base_url('admin/profile') ?>"
                            }
                        });

                        $('#change-password')[0].reset();
                        $("#password_error").html(response.password_error).hide();
                        $("#password2_error").html(response.password2_error).hide();
                    } else {
                        $("#password_error").html(response.password_error).show();
                        $("#password2_error").html(response.password2_error).show();
                    }

                },
                error: {
                    function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }

                }
            });

        });



        $('#profil-admin').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/update_profil') ?>",
                data: $(this).serialize(),
                dataType: "JSON",
                success: function(response) {
                    if (response.sukses) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Profil Berhasil Diubah',

                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = "<?= base_url('admin/profile') ?>"
                            }
                        });
                        $('#profil-admin')[0].reset();
                        $("#email_error").html(response.email_error).hide();
                        $("#nama_error").html(response.nama_error).hide();
                    } else {
                        $("#email_error").html(response.email_error).show();
                        $("#nama_error").html(response.nama_error).show();
                    }
                },
                error: {
                    function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }

                }
            });

        });

        $('#form-image').submit(function(e) {

            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/change_photo') ?>",
                data: new FormData(this),
                dataType: "JSON",
                success: function(response) {

                },
                error: {
                    function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }

                }
            });

        });
    });

    const profil = $('#edit-image').data('profil');

    if (profil) {
        Swal.fire({
            icon: 'success',
            title: profil,
            timer: 1500, // Waktu dalam milidetik sebelum SweetAlert tertutup secara otomatis
            showConfirmButton: false
        })
    }
</script>