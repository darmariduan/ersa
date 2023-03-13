<main id="main" class="main">
    <?php
    if ($this->session->flashdata('message')) { ?>
        <div id="aktivasi" data-aktivasi="<?= $this->session->flashdata('message') ?>"></div>

    <?php } ?>
    <?php
    if ($this->session->flashdata('messages')) { ?>
        <div id="nonaktif" data-nonaktif="<?= $this->session->flashdata('messages') ?>"></div>

    <?php } ?>
    <div class="pagetitle">
        <h1>Data User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item active">Data User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Data User</h5> -->
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($user as $u) { ?>
                                    <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td><?= $u->nama_instansi ?></td>
                                        <td><?= $u->email ?></td>
                                        <td><?php if ($u->status == 1) { ?>
                                                <span class="badge bg-success">Active</span>
                                            <?php } else { ?>
                                                <span class="badge bg-danger">Not Active</span>
                                            <?php  } ?>
                                        </td>
                                        <td>

                                            <a href="<?= base_url('admin/detail_user/' . $u->user_id) ?>" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                            <a href="" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                            <?php if ($u->status == 1) { ?>
                                                <a href="<?= base_url('admin/deactivated_user/' . $u->user_id) ?>" class="btn btn-sm btn-danger" id="nonaktif"><i class="bi bi-x-lg"></i></a>
                                            <?php } else { ?>
                                                <a href="<?= base_url('admin/activated_user/' . $u->user_id) ?>" class="btn btn-sm btn-success"><i class="bi bi-check-lg"></i></a>
                                            <?php  } ?>

                                        </td>
                                    </tr>
                                <?php  } ?>



                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->


<script>
    $(document).ready(function() {

        $('#nonaktif').click(function(e) {
            e.preventDefault();

            const href = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to deactive it?!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });

        // Aktivasi User Berhasil
        const aktivasi = $('#aktivasi').data('aktivasi');
        const nonaktif = $('#nonaktif').data('nonaktif');

        if (aktivasi) {
            Swal.fire({
                title: 'Aktivasi Berhasil',
                icon: 'success'
            });
        }

        if (nonaktif) {
            Swal.fire({
                title: 'Akun Telah Dinonaktifkan',
                icon: 'success'
            });


        }
    });
</script>