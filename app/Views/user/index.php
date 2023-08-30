<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard User</h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Users</h6>
        </div>
        <div class="card-body">
            <div class="row g-0">
                <div class="col-md-3">
                    <img src="<?= base_url() ?>/uploads/img/avatar/<?= $user->user_image ?>" class="img-fluid rounded-start" alt="<?= user()->username; ?>">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h3 class="card-title">My Profile</h3>
                            </li>
                            <li class="list-group-item"><?= user()->username; ?></li>
                            <li class="list-group-item"><?= user()->email; ?></li>
                            <li class="list-group-item">Created At : <?= user()->created_at; ?></li>
                            <li class="list-group-item">Updated At : <?= user()->updated_at; ?></li>
                            </br></br>
                            <li class="list-group-item">
                                <h3 class="card-title">Detail</h3>
                            </li>
                            <?php if ($user->fullname) : ?>
                                <li class="list-group-item"><?= $user->fullname; ?></li>
                            <?php endif; ?>
                            <?php if ($user->phone) : ?>
                                <li class="list-group-item"><?= $user->phone; ?></li>
                            <?php endif; ?>
                            <?php if ($user->location) : ?>
                                <li class="list-group-item"><?= $user->location; ?></li>
                            <?php endif; ?>
                            <?php if ($user->address) : ?>
                                <li class="list-group-item"><?= $user->address; ?></li>
                            <?php endif; ?>
                            <?php if ($user->marital_status) : ?>
                                <li class="list-group-item"><?= $user->marital_status; ?></li>
                            <?php endif; ?>
                            <?php if ($user->Religion) : ?>
                                <li class="list-group-item"><?= $user->Religion; ?></li>
                            <?php endif; ?>
                        </ul>
                        <a href="<?= base_url() ?>/user/form/<?= user()->id ?>" class="btn btn-info btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-user-edit"></i>
                            </span>
                            <span class="text">Update Profile</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<script src="<?= base_url() . '/assets/jquery/jquery.min.js' ?>"></script>
<script src="<?= base_url() . '/js/bootstrap.bundle.min.js' ?>"></script>
<?= view('templates/footer'); ?>