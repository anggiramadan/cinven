<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table of User Roles</h6>
        </div>
        <div class="card-body">
            <div class="my-2">
                <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#addModal">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add New</span>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align:center">
                            <th>#</th>
                            <th>Role Name</th>
                            <th>Username</th>
                            <th>Email Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 0;
                        foreach ($users as $row) :
                            $no++;
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row->name; ?></td>
                                <td><?= $row->username; ?></td>
                                <td><?= $row->email; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php //echo $pager->links('users', 'staff_pagination'); 
                ?>
            </div>
        </div>

        <!-- Modal Delete Product-->
        <form action="/user/delete" method="post">
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4>Are you sure want to delete this User?</h4>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="user_id" class="user_ID">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End Modal Delete barang-->
    <script src="<?= base_url() . '/assets/jquery/jquery.min.js' ?>"></script>
    <script>
        $(document).ready(function() {

            // get Edit Product
            $('.btn-edit').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                const staff = $(this).data('staff');
                const username = $(this).data('username');
                const level = $(this).data('level');
                const status = $(this).data('status');
                // Set data to Form Edit
                $('.user_ID').val(id);
                $('.staff_id').val(staff).trigger('change');
                $('.username').val(username);
                $('.level').val(level);
                $('.status').val(status);
                // Call Modal Edit
                $('#editModal').modal('show');
            });

            // get Edit Password
            $('.btn-warning').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                const staff = $(this).data('staff');
                const username = $(this).data('username');
                const password = $(this).data('password');
                const level = $(this).data('level');
                const status = $(this).data('status');
                // Set data to Form Edit
                $('.user_ID').val(id);
                $('.staff_id').val(staff).trigger('change');
                $('.username').val(username);
                $('.password').val(password);
                $('.level').val(level);
                $('.status').val(status);
                // Call Modal Edit
                $('#editPassModal').modal('show');
            });

            // get Delete Product
            $('.btn-delete').on('click', function() {
                // get data from button edit
                const id = $(this).data('id');
                // Set data to Form Edit
                $('.user_ID').val(id);
                // Call Modal Edit
                $('#deleteModal').modal('show');
            });

        });
    </script>
    <?= $this->endSection(); ?>