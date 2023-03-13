<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">

            <a class="nav-link" href="<?= base_url('admin') ?>">
                <i class="bi bi-house"></i>
                <span>Dashboard</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-server"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

                <li>
                    <a href="<?= base_url('admin/user') ?>">
                        <i class="bi bi-circle"></i><span>User</span>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/layanan') ?>">
                        <i class="bi bi-circle"></i><span>Layanan</span>
                    </a>
                </li>

            </ul>
        </li><!-- End Components Nav -->


    </ul>

</aside><!-- End Sidebar-->