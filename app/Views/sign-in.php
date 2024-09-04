<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<body>
    <main class="form-signin w-100 m-auto">
        <div style="margin-top: 30%;margin-bottom: 30%;">
        <!-- Show success message if sign-UP successfully -->
        <!-- Please note that sign-UP unsuccessful is dealed in sign_up page -->
        <?php 
            if (session()->getFlashdata('success')) {
                ?>
                <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
                </div>
                <?php
            } elseif (session()->getFlashdata('failure')) {
                ?>
                <!-- Show failure message if sign-IN unsuccessfully -->
                <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('failure') ?>
                </div>
                <?php
            }
        ?>
        <form method="POST" action="<?= base_url('/authenticate') ?>">
            <h1 class="h3 mb-3 fw-normal" style="color: rgba(57, 99, 235, 1);">Please sign in</h1>
            <div class="form-floating">
                <input id="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input id="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            <!-- OR -->
            <div>
                <p style="text-align: center;">OR</p>
            </div>
            <a class="btn btn-primary w-100 py-2" style="margin: 0px 0px 10px;" href="<?= base_url("sign_up"); ?>">Go Sign up</a>
            <a class="btn btn-primary w-100 py-2" <?= service('router')->getMatchedRoute()[0] == 'login' ? 'active' : ''; ?>" href="<?= base_url("login"); ?>">Continue with Google</a>
        </form>
        </div>
    </main>
</body>

<?= $this->endSection() ?>


