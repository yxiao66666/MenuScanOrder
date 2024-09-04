<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<body>
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2 class="text-center mb-4"><?= isset($user) ? 'Edit User' : 'Add User' ?></h2>
                    <form method="POST" action="<?= base_url('user_management/addedit' . (isset($user) ? '/' . $user['user_id'] : '')) ?>">
                        <div class="mb-3">
                            <label for="account_name" class="form-label">Account Name</label>
                            <input type="text" class="form-control" id="account_name" name="account_name" value="<?= isset($user) ? esc($user['account_name']) : '' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="user_email" name="user_email" value="<?= isset($user) ? esc($user['user_email']) : '' ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_role" class="form-label">User Role</label>
                            <select class="form-control" id="user_role" name="user_role" required>
                                <option value="0" <?= isset($user) && $user['user_role'] === '0' ? 'selected' : '' ?>>User</option>
                                <option value="1" <?= isset($user) && $user['user_role'] === '1' ? 'selected' : '' ?>>Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary"><?= isset($user) ? 'Update User' : 'Add User' ?></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<?= $this->endSection() ?>