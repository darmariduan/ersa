<main id="main" class="main">
    <?php
    if ($this->session->flashdata('tambah_layanan')) { ?>
        <div id="layanan-tambah" data-layanan="<?= $this->session->flashdata('tambah_layanan') ?>"></div>

    <?php } ?>
    <?php
    if ($this->session->flashdata('hapus_layanan')) { ?>
        <div id="hapus-layanan" data-layanan="<?= $this->session->flashdata('hapus_layanan') ?>"></div>

    <?php } ?>
    <?php
    if ($this->session->flashdata('edit_layanan')) { ?>
        <div id="edit-layanan" data-layanan="<?= $this->session->flashdata('edit_layanan') ?>"></div>

    <?php } ?>
    <div class="pagetitle">
        <h1>Data Layanan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Master Data</li>
                <li class="breadcrumb-item active">Layanan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="card-title">Data Layanan</h5>
                            </div>
                            <div class="col-lg-6 text-end">
                                <button type="button" class="btn btn-sm btn-success mt-4 mb-3 " data-bs-toggle="modal" data-bs-target="#tambah-layanan">
                                    + Tambah Layanan
                                </button>
                            </div>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($layanan as $l) { ?>
                                    <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td><?= $l->nama_layanan ?> </td>
                                        <td>

                                            <a href="" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit-layanan<?= $l->id ?>"><i class="bi bi-pen"></i></a>
                                            <a href="<?= base_url('admin/hapus_layanan/' . $l->id) ?>" class="btn btn-sm btn-danger hapus-layanan"><i class="bi bi-trash"></i></a>


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


    <!-- Sub Layanan -->

    <?php
    if ($this->session->flashdata('tambah_sub_layanan')) { ?>
        <div id="sublayanan-tambah" data-sublayanan="<?= $this->session->flashdata('tambah_sub_layanan') ?>"></div>

    <?php } ?>
    <?php
    if ($this->session->flashdata('hapus_sub_layanan')) { ?>
        <div id="hapus-sublayanan" data-sublayanan="<?= $this->session->flashdata('hapus_sub_layanan') ?>"></div>

    <?php } ?>
    <?php
    if ($this->session->flashdata('edit_sub_layanan')) { ?>
        <div id="edit-sub-layanan" data-sublayanan="<?= $this->session->flashdata('edit_sub_layanan') ?>"></div>

    <?php } ?>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="card-title">Data Sub Layanan</h5>
                            </div>
                            <div class="col-lg-6 text-end">
                                <button type="button" class="btn btn-sm btn-success mt-4 mb-3 " data-bs-toggle="modal" data-bs-target="#tambah-sublayanan">
                                    + Tambah Sub Layanan
                                </button>
                            </div>
                        </div>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Layanan</th>
                                    <th scope="col">Jenis Layanan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($sub_layanan as $sl) { ?>
                                    <tr>
                                        <th scope="row"><?= $i++ ?></th>
                                        <td><?= $sl->nama_sub ?> </td>
                                        <td><?= $sl->nama_layanan ?> </td>
                                        <td>

                                            <a href="" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit-sublayanan<?= $sl->sub_layanan_id ?>"><i class="bi bi-pen"></i></a>
                                            <a href="<?= base_url('admin/hapus_sublayanan/' . $sl->sub_layanan_id) ?>" class="btn btn-sm btn-danger hapus-sublayanan"><i class="bi bi-trash"></i></a>


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


<!-- Modal Layanan -->

<!-- Modal Tambah -->

<div class="modal fade" id="tambah-layanan" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" action="<?= base_url('admin/tambah_layanan') ?>" method="POST" novalidate>
                    <div class="col-12">
                        <label for="nama_layanan" class="form-label">Nama Layanan <span class="text-danger">*</span></label>
                        <input type="text" name="nama_layanan" class="form-control" id="nama_layanan" autocomplete="off" autofocus required>
                        <div class="invalid-feedback">
                            Wajib diisi !
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Tambah -->


<!-- Modal Edit -->

<?php
foreach ($layanan as $l) {
    $id = $l->id;
    $nama_layanan = $l->nama_layanan;
?>

    <div class="modal fade" id="edit-layanan<?= $id ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" action="<?= base_url('admin/edit_layanan') ?>" method="POST" novalidate>
                        <div class="col-12">
                            <label for="nama_layanan" class="form-label">Nama Layanan <span class="text-danger">*</span></label>
                            <input type="hidden" value="<?= $id ?>" name="id">
                            <input type="text" name="nama_layanan" class="form-control" id="nama_layanan" value="<?= $nama_layanan ?>" autocomplete="off" autofocus required>
                            <div class="invalid-feedback">
                                Wajib diisi !
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- End Vertically centered Modal-->
<?php } ?>


<!-- End Modal Edit -->
<!-- End Modal Layanan -->







<!-- Modal Sub Layanan -->

<!-- Modal Tambah -->

<div class="modal fade" id="tambah-sublayanan" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Sub Layanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 needs-validation" action="<?= base_url('admin/tambah_sub_layanan') ?>" method="POST" novalidate>
                    <div class="col-12">
                        <label for="nama_sub_layanan" class="form-label">Nama Sub Layanan <span class="text-danger">*</span></label>
                        <input type="text" name="nama_sub_layanan" class="form-control" id="nama_sub_layanan" autocomplete="off" autofocus required>
                        <div class="invalid-feedback">
                            Wajib diisi !
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="jenis_layanan" class="form-label">Jenis Layanan <span class="text-danger">*</span></label>
                        <select name="jenis_layanan" class="form-select" id="Jenis_layanan">
                            <option value="" disabled selected>Pilih Jenis Layanan</option>
                            <?php foreach ($layanan as $l) { ?>
                                <option value="<?= $l->id ?>"><?= $l->nama_layanan ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="uraian" class="form-label">Uraian</span></label>
                        <textarea name="uraian" class="ckeditor" id="editor" cols="30" rows="10"></textarea>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Tambah -->


<!-- Modal Edit -->

<?php
foreach ($sub_layanan as $sl) {
    $id = $sl->sub_layanan_id;
    $nama_sub = $sl->nama_sub;
    $jenis_layanan = $sl->nama_layanan;
    $uraian = $sl->uraian;
    $id_jenis_layanan = $sl->id_layanan
?>

    <div class="modal fade" id="edit-sublayanan<?= $id ?>" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Sub Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3 needs-validation" action="<?= base_url('admin/edit_sub_layanan') ?>" method="POST" novalidate>
                        <div class="col-12">
                            <label for="nama_sub_layanan" class="form-label">Nama Sub Layanan <span class="text-danger">*</span></label>
                            <input type="hidden" value="<?= $id ?>" name="id">
                            <input type="text" name="nama_sub_layanan" class="form-control" id="nama_sub_layanan" value="<?= $nama_sub ?>" autocomplete="off" autofocus required>
                            <div class="invalid-feedback">
                                Wajib diisi !
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="jenis_layanan" class="form-label">Jenis Layanan <span class="text-danger">*</span></label>
                            <select name="jenis_layanan" class="form-select" id="Jenis_layanan">
                                <option value="<?= $id_jenis_layanan ?>" selected><?= $jenis_layanan ?></option>
                                <?php foreach ($layanan as $l) { ?>
                                    <option value="<?= $l->id ?>"><?= $l->nama_layanan ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="uraian" class="form-label">Uraian</span></label>
                            <textarea name="uraian" class="ckeditor" id="editor" cols="30" rows="10"><?= $uraian ?></textarea>

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>


<!-- End Modal Edit -->
<!-- End Modal Layanan -->
<script>
    $(document).ready(function() {
        $('.hapus-layanan').click(function(e) {

            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data Yang Dihapus Tidak Dapat Dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href;
                }
            })

        });


        $('.hapus-sublayanan').click(function(e) {

            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data Yang Dihapus Tidak Dapat Dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href;
                }
            })

        });
        const editSubLayanan = $('#edit-sub-layanan').data('sublayanan');
        if (editSubLayanan) {
            Swal.fire({
                icon: 'success',
                title: editSubLayanan,
                timer: 1500, // Waktu dalam milidetik sebelum SweetAlert tertutup secara otomatis
                showConfirmButton: false
            })
        }
    });

    // CK Editor
    CKEDITOR.replace('editor', {
        height: 400,
        filebrowserUploadUrl: "<?= base_url('admin/sub_layanan_upload') ?>",
        filebrowserUploadMethod: 'form'
    });
</script>