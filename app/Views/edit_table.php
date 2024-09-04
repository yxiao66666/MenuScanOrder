<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<body>
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4" style="color: rgba(57, 99, 235, 1);">Edit Tables</h2>
        </div>
        <section class="py-5">
            <div class="container">
                <!-- Show success message if table number updated successfully -->
                <?php 
                    if (session()->getFlashdata('success')) {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                        <?php
                    } elseif (session()->getFlashdata('error')) {
                        ?>
                        <!-- Show error message if table number updated unsuccessfully -->
                        <div class="alert alert-danger" role="alert">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                        <?php
                    }
                ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <form method="POST" action="<?= base_url('my_store/edit_table') ?>">
                            <div class="mb-3">
                                <label for="table_count" class="form-label">The number of tables at your establishment:</label>
                                <input type="text" class="form-control" id="table_count" name="table_count" value="<?= isset($store) ? esc($store['table_count']) : '' ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <h1 class="text-center mb-4" style="color: rgba(57, 99, 235, 1);">QR Code Creation</h1>
            <p style="text-align: center;">
            <a href="<?= base_url("my_store/qr_create"); ?>" class="btn btn-primary my-2">Create Your Table QR Code</a>
            </p>
        </div>
    </section>
</body>

<?= $this->endSection() ?>
