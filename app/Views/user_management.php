<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<body>
  <main>
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 style="color: rgba(57, 99, 235, 1);">User Management</h2>
            </div>
            <div class="row mb-4">
                <div class="col-md-6 mb-3 mb-lg-0">
                    <form method="GET" action="<?= base_url('user_management/'); ?>">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." name="search">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-md-end">
                    <a class="btn btn-primary" href="<?= base_url('user_management/addedit');?>">Add User</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Account Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                    <td><?= esc($user['user_id']) ?></td>
                        <td><?= esc($user['account_name']) ?></td>
                        <td><?= esc($user['user_email']) ?></td>
                        <td><?= $user['user_role'] == 0 ? 'User' : 'Admin' ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary me-2" href="<?= base_url('user_management/addedit/'.$user['user_id']);?>"><i class="bi bi-pencil-fill"></i></a>
                            <a class="btn btn-sm btn-warning me-2" href="<?= base_url('user_management/delete/'. $user['user_id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')"><i class="bi bi-dash-circle-fill"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
  </main>
</body>

<?= $this->endSection() ?>