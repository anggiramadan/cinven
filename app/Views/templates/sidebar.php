        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Capri App <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <?php if (in_groups('admin')) : ?>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    User Management
                </div>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/admin">
                        <i class="fas fa-fw fa-user"></i>
                        <span>User Lists</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/role">
                        <i class="fas fa-fw fa-user"></i>
                        <span>User Role</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url() ?>/permission">
                        <i class="fas fa-fw fa-user"></i>
                        <span>User Permission</span></a>
                </li>
            <?php endif; ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                User Profile
            </div>

            <!-- Nav Item - my profile -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/index') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User Detail</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout'); ?>">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->