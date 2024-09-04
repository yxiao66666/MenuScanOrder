<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="text-center mb-4"><?= isset($menu_item) ? 'Edit Menu' : 'Add Menu' ?></h2>
                <form method="POST" action="<?= base_url('my_store/edit_menu/addeditMenu' . (isset($menu_item) ? '/' . $menu_item['item_id'] : '')) ?>">
                    <div class="mb-3">
                        <label for="item_name" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="item_name" name="item_name" value="<?= isset($menu_item) ? esc($menu_item['item_name']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="item_price" class="form-label">Item Price</label>
                        <input type="text" class="form-control" id="item_price" name="item_price" value="<?= isset($menu_item) ? esc($menu_item['item_price']) : '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Item Description</label>
                        <textarea class="form-control" id="description" name="description"><?= isset($menu_item) ? esc($menu_item['description']) : '' ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary"><?= isset($menu_item) ? 'Update Menu' : 'Add Menu' ?></button>
                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>