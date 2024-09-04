<?= $this->extend('template') ?>
<?= $this->section('content') ?>

<body>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 style="color: rgba(57, 99, 235, 1);"><?= $store['shop_name'] ?></h1>
                <p><small><?= $store['shop_address'] ?></small></p>
                <p class="lead text-body-secondary">Here is a place where you can view your current orders, edit store table and edit menu.</p>
                <p>
                    <a href="<?= base_url("my_store/edit_table"); ?>" class="btn btn-primary my-2">Edit Tables</a>
                    <a href="<?= base_url("my_store/edit_menu"); ?>" class="btn btn-secondary my-2">Edit Menu</a>
                </p>
            </div>
        </div>
        <!-- Current Orders Section -->
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <section class="py-5 text-center container">
                    <h1 style="color: rgba(57, 99, 235, 1);">Current Orders</h1>
                </section>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($incomplete_orders as $order): ?>
                        <!-- Fetch table ID associated with the order -->
                        <?php $tableId = $shopTableModel->where('order_id', $order['order_id'])->first(); ?>
                        <div class="col">
                            <!-- Card to show current orders -->
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" 
                                focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="rgba(57, 99, 235, 1)"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">
                                        <!-- Show table id -->
                                        Table <?= $tableId['table_id'] ?>
                                    </text>
                                </svg>
                                <div class="card-body">
                                    <?php foreach ($order['items'] as $item): ?>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <!-- Item name -->
                                                <p class="card-text"><?= $item['item_name'] ?></p>
                                            </div>
                                            <div>
                                                <!-- Item quantity -->
                                                <p class="card-text" style="text-align:right"><?= $item['quantity'] ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <form method="POST" action="<?= base_url('my_store/complete/' . $order['order_id']) ?>">
                                                <!-- Hidden field to spoof PUT method -->
                                                <input type="hidden" name="_method" value="PUT">
                                                <!-- Complete button to mark order as complete -->
                                                <button type="submit" class="btn btn-sm btn-outline-secondary complete-btn">Complete</button>
                                            </form>
                                            <!-- Edit button to change order item -->
                                            <button type="button" class="btn btn-sm btn-outline-secondary edit-btn" data-bs-toggle="modal" data-bs-target="#EditOrderModel<?= $order['order_id'] ?>">Edit</button>
                                        </div>
                                        <small class="text-body-secondary">$<?= $order['total_price'] ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <section class="py-5 text-center container">
                    <h1 style="color: rgba(57, 99, 235, 1);">Completed Orders</h1>
                </section>
                <!-- Completed Orders Section -->
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($completed_orders as $order): ?>
                        <!-- Fetch table ID associated with the order -->
                        <?php $tableId = $shopTableModel->where('order_id', $order['order_id'])->first(); ?>
                        <div class="col">
                            <!-- Card to show completed orders -->
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" 
                                focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="rgba(57, 99, 235, 1)"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">
                                    <!-- Show table id -->
                                    Table <?= $tableId['table_id'] ?>
                                </text></svg>
                                <div class="card-body">
                                    <?php foreach ($order['items'] as $item): ?>
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <div>
                                                <!-- Item name -->
                                                <p class="card-text"><?= $item['item_name'] ?></p>
                                            </div>
                                            <div>
                                                <!-- Item quantity -->
                                                <p class="card-text" style="text-align:right"><?= $item['quantity'] ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <!-- Recall button to recall a completed order -->
                                            <form method="POST" class="recall-form" action="<?= base_url('my_store/recall/' . $order['order_id']) ?>">
                                                <!-- Hidden field to spoof PUT method -->
                                                <input type="hidden" name="_method" value="PUT">
                                                <!-- Recall button to recall an order -->
                                                <button type="submit" class="btn btn-sm btn-outline-secondary recall-btn">Recall</button>
                                            </form>
                                        </div>
                                        <small class="text-body-secondary">$<?= $order['total_price'] ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</body>

<!-- Edit Order Model -->
<?php foreach ($incomplete_orders as $order): ?>
    <?php $tableId = $shopTableModel->where('order_id', $order['order_id'])->first(); ?>
    <div class="modal fade" id="EditOrderModel<?= $order['order_id'] ?>" tabindex="-1" aria-labelledby="EditOrderModalLabel<?= $order['order_id'] ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditOrderModalLabel<?= $order['order_id'] ?>">Edit Order ID: <?= $order['order_id'] ?> at Table <?= $tableId['table_id'] ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php foreach ($order['items'] as $item): ?>
                        <?php
                            // Find the corresponding menu item to get the item_id
                            $menuItem = array_filter($menu_items, function($mItem) use ($item) {
                                return $mItem['item_name'] == $item['item_name'];
                            });
                            $menuItem = reset($menuItem); // Get the first item from the filtered array
                        ?>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div style="float:left;">
                                <!-- Drop down menu to edit item -->
                                <select aria-label="Item" id="item<?= $item['item_name'] ?>" name="item">
                                    <?php foreach ($menu_items as $menu_item): ?>
                                        <option value="<?= $menu_item['item_id'] ?>" <?= ($menu_item['item_name'] == $item['item_name']) ? 'selected' : '' ?>>
                                            <?= $menu_item['item_name'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div style="float:right;">
                                <!-- Drop down menu to edit quantity -->
                                <select aria-label="Quantity" id="quantity<?= $item['quantity'] ?>" name="quantity">
                                    <?php for ($i = 1; $i <= 10; $i++): ?>
                                        <option value="<?= $i ?>" <?= ($i == $item['quantity']) ? 'selected' : '' ?>><?= $i ?></option>
                                    <?php endfor; ?>
                                </select>
                                <!-- Delete button -->
                                <form method="POST" class="delete-form" action="<?= base_url('my_store/delete/' . $order['order_id'] . '/' . $menuItem['item_id']) ?>">
                                    <!-- Hidden field to spoof DELETE method -->
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger delete-item">Delete</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="<?= base_url('my_store/save/' . $order['order_id']) ?>" class="save-form">
                        <!-- Hidden field to spoof PUT method -->
                        <input type="hidden" name="_method" value="PUT">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save-edit-order">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
// Function to show the alert message
function showAlert(message, type) {
    const alertBox = document.getElementById('orderAlert');
    const alertMessage = document.getElementById('orderAlertMessage');
    if (alertBox && alertMessage) {
        alertMessage.textContent = message;
        alertBox.style.display = 'block';

        setTimeout(function() {
            alertBox.style.display = 'none';
        }, 5000);
    }
}

// Save Edit Order Button Click
document.querySelectorAll('.save-form').forEach(form => {
    form.addEventListener('submit', function(event) {
        if (!confirm('Are you sure you want to update this order?')) {
            event.preventDefault(); // Prevent form submission if "Cancel" is clicked
            showAlert('Order update cancelled.', 'danger');
        } else {
            showAlert('Order updated successfully.', 'success');
        }
    });
});

// Delete Item Button Click
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', function(event) {
        if (!confirm('Are you sure you want to delete this item from the order?')) {
            event.preventDefault(); // Prevent form submission if "Cancel" is clicked
            showAlert('Item delete cancelled.', 'danger');
        } else {
            showAlert('Item deleted successfully.', 'success');
        }
    });
});

// Recall Order Button Click
document.querySelectorAll('.recall-form').forEach(form => {
    form.addEventListener('submit', function(event) {
        if (!confirm('Are you sure you want to recall this order?')) {
            event.preventDefault(); // Prevent form submission if "Cancel" is clicked
            showAlert('Order recall cancelled.', 'danger');
        } else {
            showAlert('Order recalled successfully.', 'success');
        }
    });
});
</script>

<?= $this->endSection() ?>