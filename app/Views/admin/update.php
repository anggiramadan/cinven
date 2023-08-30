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
            <h6 class="m-0 font-weight-bold text-primary">Update My Profile</h6>
        </div>
        <div class="card-body">
            <?= form_open_multipart('admin/update', ['class' => 'form']) ?>
            <div class="modal-body">
                <input type="hidden" class="form-control" name="id" value="<?= $users->uid ?>" required>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" class="form-control" name="email" value="<?= $users->email ?>" required>
                </div>
                <div class="form-group">
                    <label>Fullname</label>
                    <input type="text" class="form-control" name="fullname" value="<?= $users->fullname ?>" required>
                </div>
                <!-- <div class="form-group">
                    <label class="form-label">User Image</label><br />
                    <input type="file" name="user_image" accept=".png, .jpg, .jpeg">
                </div> -->
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupFile01">User Image</label>
                    <input type="file" name="user_image" class="form-control" id="inputGroupFile01" accept=".png, .jpg, .jpeg">
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <input type="text" class="form-control" name="dept_id" value="<?= $users->dept_id ?>" required>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" value="<?= $users->phone ?>" required>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" class="form-control" name="location" value="<?= $users->location ?>" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" value="<?= $users->address ?>" required>
                </div>
                <div class="form-group">
                    <label>Marital Status</label>
                    <input type="text" class="form-control" name="marital_status" value="<?= $users->marital_status ?>" required>
                </div>
                <div class="form-group">
                    <label>Religion</label>
                    <input type="text" class="form-control" name="religion" value="<?= $users->Religion ?>" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-close">Cancel</button>
                <button type="submit" class="btn btn-primary btn-edit">Update Data</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<script src="<?= base_url() . '/assets/jquery/jquery.min.js' ?>"></script>
<script src="<?= base_url() . '/js/bootstrap.bundle.min.js' ?>"></script>
<?= view('templates/footer'); ?>