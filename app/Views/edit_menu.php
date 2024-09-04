<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<body>
  <main>
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 style="color: rgba(57, 99, 235, 1);">Menu Management</h2>
            </div>
            <div class="row mb-4">
                <div class="col-md-6 mb-3 mb-lg-0">
                    <form method="GET" action="<?= base_url('my_store/edit_menu'); ?>">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." name="search">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-md-end">
                    <a class="btn btn-primary" href="<?= base_url('my_store/edit_menu/addeditMenu');?>">Add Menu</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Item Price</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($menu_items as $menu_item): ?>
                    <tr>
                    <td><?= esc($menu_item['item_id']) ?></td>
                        <td><?= esc($menu_item['item_name']) ?></td>
                        <td><?= esc($menu_item['item_price']) ?></td>
                        <td><?= esc($menu_item['description']) ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary me-2" href="<?= base_url('my_store/edit_menu/addeditMenu/'.$menu_item['item_id']);?>"><i class="bi bi-pencil-fill"></i></a>
                            <a class="btn btn-sm btn-warning me-2" href="<?= base_url('my_store/edit_menu/delete/'. $menu_item['item_id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this user?')"><i class="bi bi-dash-circle-fill"></i></a>
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