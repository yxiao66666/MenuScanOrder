<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<body>
    <main class="form-signin w-100 m-auto">
        <div style="margin-top: 10%;margin-bottom: 10%;">
            <!-- Show failure message if sign-UP unsuccessfully -->
            <?php if (session()->getFlashdata('failure')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('failure') ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="<?= base_url('sign_up') ?>">
                <h1 class="h3 mb-3 fw-normal" style="color: rgba(57, 99, 235, 1);">Sign up here</h1>
                <div class="form-floating">
                    <input type="user_email" name="user_email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= old('user_email') ?>" required>
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="text" name="account_name" class="form-control" id="account_name" placeholder="Account Name" value="<?= old('account_name') ?>" required>
                    <label for="account_name">Account Name</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
            </form>
            <!-- OR -->
            <div>
                    <p style="text-align: center;">OR</p>
            </div>
            <a class="btn btn-primary w-100 py-2" <?= service('router')->getMatchedRoute()[0] == 'login' ? 'active' : ''; ?>" href="<?= base_url("login"); ?>">Continue with Google</a>
        </div>
    </main>
</body>

<?= $this->endSection() ?>
