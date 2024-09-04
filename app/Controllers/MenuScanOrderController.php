<?php namespace App\Controllers;

use CodeIgniter\Controller;

class MenuScanOrderController extends BaseController
{
    public function __construct()
    {
        // Load the URL helper, it will be useful in the next steps
        // Adding this within the __construct() function will make it 
        // available to all views in the ResumeController
        helper('url'); 
   
        $this->session = session();
    }

    /**
     * Displays the landing page.
     *
     * @return View
     */
    public function index()
    {
        return view('landingpage');
    }

    /**
     * Displays the privacy policy page.
     *
     * @return View
     */
    public function privacy_policy()
    {
        return view('privacy_policy');
    }
        
    /**
     * Displays the terms of service page.
     *
     * @return View
     */
    public function terms_of_service()
    {
        return view('terms_of_service');
    }

    /**
     * Displays the sign-in page.
     *
     * @return View
     */
    public function sign_in()
    {
        return view('sign-in');
    }

    /**
     * Displays the sign-up page.
     *
     * @return View
     */
    public function sign_up()
    {
        return view('sign-up');
    }

    /**
     * Displays the edit table page and handles table updates.
     *
     * @return View|\CodeIgniter\HTTP\RedirectResponse
     */
    public function edit_table()
    {
        $userId = $this->session->get('user_id');
    
        // Retrieve the store information based on the user ID
        $myStoreModel = new \App\Models\MyStoreModel();
        $store = $myStoreModel->where('user_id', $userId)->first();
    
        if ($this->request->getMethod() === 'POST') {
            // Retrieve the submitted form data.
            $data = $this->request->getPost();
    
            // Extract shop_id from the store data
            $shopId = $store['shop_id'];
    
            if ($myStoreModel->update($shopId, $data)) {
                // If the Table No. is successfully updated, set a success message.
                $this->session->setFlashdata('success', 'Table No. updated successfully.');
            } else {
                $this->session->setFlashdata('error', 'Failed to update Table No. Please try again.');
            }
    
            // Redirect to the same page to display the updated data
            return redirect()->to(base_url('my_store/edit_table'));
        }
    
        // If the request is a GET request, load the form with existing table count data (for edit) or as blank (for add).
        $data['store'] = $store;
    
        // Display the add/edit form view, passing in the table count data if available.
        return view('edit_table', $data);
    }
        
    /**
     * Displays the QR creation page.
     *
     * @return View
     */
    public function qr_create()
    {
        $userId = $this->session->get('user_id');
    
        // Retrieve the store information based on the user ID
        $myStoreModel = new \App\Models\MyStoreModel();
        // SELECT * FROM `MyShop` WHERE `user_id` = '1325' LIMIT 1
        $store = $myStoreModel->where('user_id', $userId)->first();

        $data['store'] = $store;

        return view('qr_create', $data);
    }

    /**
     * Displays the edit menu page and handles search functionality.
     *
     * @return View
     */
    public function edit_menu()
    {
        // Creates an instance of the MenuItemModel class.
        $model = new \App\Models\MenuItemModel();

        // Get the value of the 'search' query parameter from the request
        $search = $this->request->getGet('search');

        if (!empty($search)) {
            // If the search query is not empty
            
            // Initialize an empty array to store search conditions
            $conditions = [];
            
            // Loop through each allowed field in the UserModel
            foreach ($model->allowedFields as $field) {
                // Generate a search condition for each field using LIKE operator
                $conditions[] = "$field LIKE '%$search%'";
            }
            
            // Implode the conditions array with OR operator to create a single search clause
            $whereClause = implode(' OR ', $conditions);
            
            // Retrieve users matching the search conditions, order by id in ascending order
            $menu_items = $model->where($whereClause)->orderBy('item_id', 'ASC')->findAll();
        } else {
            // If no search query is provided
            
            // Retrieve all menu_items, order by id in ascending order
            $menu_items = $model->orderBy('item_id', 'ASC')->findAll();
        }

        // Store the retrieved menu_items in the $data array
        $data['menu_items'] = $menu_items;

        return view('edit_menu', $data);
    }

    /**
     * Handles the addition or update of a menu item.
     *
     * @param int|null $id
     * @return View|\CodeIgniter\HTTP\RedirectResponse
     */
    public function addeditMenu($id = null)
    {   
        // Instantiate the MenuItemModel to interact with the database.
        $model = new \App\Models\MenuItemModel();
    
        // Check if the request is a POST request (form submission).
        if ($this->request->getMethod() === 'POST') {
            // Retrieve the submitted form data.
            $data = $this->request->getPost();
    
            // If no ID is provided, it's an add operation.
            if ($id === null) {
                if ($model->insert($data)) {
                    // If the menu item is successfully added, set a success message.
                    $this->session->setFlashdata('success', 'Menu item added successfully.');
                } else {
                    // If the addition fails, set an error message.
                    $this->session->setFlashdata('error', 'Failed to add menu item. Please try again.');
                }
            } else {
                // If an ID is provided, it's an edit operation.
                if ($model->update($id, $data)) {
                    // If the menu item is successfully updated, set a success message.
                    $this->session->setFlashdata('success', 'Menu updated successfully.');
                } else {
                    // If the update fails, set an error message.
                    $this->session->setFlashdata('error', 'Failed to update menu item. Please try again.');
                }
            }
    
            // Redirect back to the user_management page after the operation.
            return redirect()->to('my_store/edit_menu');
        }
    
        // If the request is a GET request, load the form with existing menu_item data (for edit) or as blank (for add).
        $data['menu_item'] = ($id === null) ? null : $model->find($id);
    
        // Display the add/edit form view, passing in the menu_items data if available.
        return view('addeditMenu', $data);
    }

    /**
     * Deletes a menu item.
     *
     * @param int $id
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function deleteMenu($id)
    {
        // Instantiate the MenuItemModel to interact with the database.
        $model = new \App\Models\MenuItemModel();
    
        // Attempt to delete the user with the provided ID.
        if ($model->delete($id)) {
            // If the deletion is successful, set a success message in the session flashdata.
            $this->session->setFlashdata('success', 'menu item deleted successfully.');
        } else {
            // If the deletion fails, set an error message in the session flashdata.
            $this->session->setFlashdata('error', 'Failed to delete menu item. Please try again.');
        }
    
        // Redirect back to the user_management page after the operation.
        return redirect()->to('my_store/edit_menu');
    }

    /**
     * Displays the user management page and handles search functionality.
     *
     * @return View
     */
    public function user_management()
    {
        // Create an instance of the UserModel
        $model = new \App\Models\UserModel();
        
        // Get the value of the 'search' query parameter from the request
        $search = $this->request->getGet('search');
        
        if (!empty($search)) {
            // If the search query is not empty
            
            // Initialize an empty array to store search conditions
            $conditions = [];
            
            // Loop through each allowed field in the UserModel
            foreach ($model->allowedFields as $field) {
                // Generate a search condition for each field using LIKE operator
                $conditions[] = "$field LIKE '%$search%'";
            }
            
            // Implode the conditions array with OR operator to create a single search clause
            $whereClause = implode(' OR ', $conditions);
            
            // Retrieve users matching the search conditions, order by id in ascending order
            $users = $model->where($whereClause)->orderBy('user_id', 'ASC')->findAll();
        } else {
            // If no search query is provided
            // Retrieve all users, order by id in ascending order
            $users = $model->orderBy('user_id', 'ASC')->findAll();
        }
        
        // Store the retrieved users in the $data array
        $data['users'] = $users;
        
        return view('user_management', $data);
    }

    /**
     * Handles the addition or update of a user.
     *
     * @param int|null $id
     * @return View|\CodeIgniter\HTTP\RedirectResponse
     */
    public function addedit($id = null)
    {
        $model = new \App\Models\UserModel();
    
        // Check if the request is a POST request (form submission).
        if ($this->request->getMethod() === 'POST') {
            // Retrieve the submitted form data.
            $data = $this->request->getPost();
    
            // If no ID is provided, it's an add operation.
            if ($id === null) {
                if ($model->insert($data)) {
                    $this->session->setFlashdata('success', 'User added successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to add user. Please try again.');
                }
            } else {
                // If an ID is provided, it's an edit operation.
                if ($model->update($id, $data)) {
                    $this->session->setFlashdata('success', 'User updated successfully.');
                } else {
                    $this->session->setFlashdata('error', 'Failed to update user. Please try again.');
                }
            }

            // Redirect back to the user_management page after the operation.
            return redirect()->to(base_url('/user_management'));
        }
    
        // If the request is a GET request, load the form with existing user data (for edit) or as blank (for add).
        $data['user'] = ($id === null) ? null : $model->find($id);
    
        // Display the add/edit form view, passing in the user data if available.
        return view('addedit', $data);
    }

    /**
     * Deletes a user.
     *
     * @param int $id
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function deleteUser($id)
    {
        $model = new \App\Models\UserModel();
    
        // Attempt to delete the user with the provided ID.
        if ($model->delete($id)) {
            $this->session->setFlashdata('success', 'User deleted successfully.');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete user. Please try again.');
        }
    
        // Redirect back to the user_management page after the operation.
        return redirect()->to('/user_management');
    }

    /**
     * Handles user authentication. If admin redirect to user_manager, if user redirect to my_store. 
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function authenticate()
    {
        // Retrieve email and password from the form
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Check if the user exists in the database
        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('user_email', $email)->first();
    
        // Check if the user with the provided email exists
        if (!$user) {
            // User not found, redirect with error message
            session()->setFlashdata('failure', '<strong>User not exists. </strong>Please try again. ');
            return redirect()->to('/sign_in')->with('error', 'Invalid email ');
        }

        // Verify the password
        if ($password != $user['password']) {
            // Password does not match, redirect with error message
            session()->setFlashdata('failure', '<strong>Invalid password. </strong>Please try again. ');
            return redirect()->to('/sign_in')->with('error', 'Invalid password');
        }

        // If is admin
        if ($user['user_role'] == 1) {
            // Authentication successful
            // Set session data
            $this->session->set('user_role', 1);
            $this->session->set('user_id', $user['user_id']);
            $this->session->set('isLoggedIn', TRUE);
            return redirect()->to('/user_management');
        }

        // Authentication successful
        // Set session data
        $this->session->set('user_id', $user['user_id']);
        $this->session->set('isLoggedIn', TRUE);

        // Redirect to the desired page after successful authentication
        return redirect()->to('/my_store');
    }

    /**
     * Handles user sign-up process.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function signUp()
    {
        // Retrieve user input
        $email = $this->request->getPost('user_email');
        $accountName = $this->request->getPost('account_name');
        $password = $this->request->getPost('password');

        // Validation
        $email_validation =  \Config\Services::validation();
        $account_name_validation =  \Config\Services::validation();
        $password_validation =  \Config\Services::validation();

        $email_validation->setRules([
            'user_email' => 'required|valid_email|is_unique[Users.user_email]', 

        ]);
        
        if (!$email_validation->withRequest($this->request)->run()) {
            // Set failure flash message
            session()->setFlashdata('failure', '<strong>Invalid email address. </strong>Please try again. ');

            // Validation failed, redirect back to sign-up page with error messages
            return redirect()->to('/sign_up')->withInput()->with('email_validation', $email_validation);
        }

        $account_name_validation->setRules([
            'account_name' => 'required|min_length[2]|max_length[50]', // Minimum length 2 characters and maximum length 50 characters
        ]);
        
        if (!$account_name_validation->withRequest($this->request)->run()) {
            // Set failure flash message
            session()->setFlashdata('failure', 'Please note that your account name must have at <strong>least 2 characters. </strong>Please try again. ');

            // Validation failed, redirect back to sign-up page with error messages
            return redirect()->to('/sign_up')->withInput()->with('account_name_validation', $account_name_validation);
        }

        $password_validation->setRules([
            'password' => 'required|min_length[2]'  // Minimum password length 2 characters
        ]);
        
        if (!$password_validation->withRequest($this->request)->run()) {
            // Set failure flash message
            session()->setFlashdata('failure', 'Please note that your password must have at <strong>least 2 characters. </strong>Please try again. ');

            // Validation failed, redirect back to sign-up page with error messages
            return redirect()->to('/sign_up')->withInput()->with('password_validation', $password_validation);
        }

        // Save the user to the database
        $userModel = new \App\Models\UserModel();
        $userData = [
            'user_email' => $email,
            'account_name' => $accountName,
            'password' => $password
        ];
        $userModel->insert($userData);

        // Set success flash message
        $this->session->setFlashdata('success', '<strong>Success!</strong> Sign up successful.');

        // Redirect to sign in page
        return redirect()->to('/sign_in');
    }

    /**
     * Displays the user's store page with orders and menu items.
     *
     * @return View|\CodeIgniter\HTTP\RedirectResponse
     */
    public function my_store()
    {
        $userId = $this->session->get('user_id');
    
        // Retrieve the store information based on the user ID
        $myStoreModel = new \App\Models\MyStoreModel();
        // SELECT * FROM `MyShop` WHERE `user_id` = '1325' LIMIT 1	
        $store = $myStoreModel->where('user_id', $userId)->first();
        $menuitemModel = new \App\Models\MenuItemModel();
        $shopTableModel = new \App\Models\ShopTableModel();
        $orderModel = new \App\Models\OrderModel();
        $orderitemModel = new \App\Models\OrderItemModel();
    
        if (!$store) {
            // Handle the case where no store is found for the user
            return redirect()->back()->with('error', 'Store not found.');
        }
    
        // Retrieve the table ID associated with the shop ID
        // SELECT * FROM `ShopTable` WHERE `shop_id` = '5'	
        $tableIds = $shopTableModel->where('shop_id', $store['shop_id'])->findAll();
    
        // Extract order IDs associated with the table IDs
        $orderIds = [];
        foreach ($tableIds as $tableId) {
            $orderIds[] = $tableId['order_id'];
        }

        // SELECT * FROM `Order` WHERE `order_id` IN ('13','14')
        $orders = $orderModel->whereIn('order_id', $orderIds)->findAll();

        // Get orders with items
        $ordersWithItems = $this->getOrdersWithItems($orderIds, $orderModel, $orderitemModel, $menuitemModel);
    
        // Separate orders based on status
        $incompleteOrders = [];
        $completedOrders = [];
        foreach ($ordersWithItems as $orderId => $orderDetails) {
            if ($orderDetails['order_status'] == 0) {
                $incompleteOrders[] = $orderDetails;
            } else {
                $completedOrders[] = $orderDetails;
            }
        }
    
        // Pass data to the view
        $data['shopTableModel'] = $shopTableModel;
        $data['incomplete_orders'] = $incompleteOrders;
        $data['completed_orders'] = $completedOrders;
        $data['store'] = $store;
        $data['menu_items'] = $menuitemModel->findAll();
    
        // Load the view with data
        return view('my_store', $data);
    }

    /**
     * Retrieves orders with their associated items. Works as a Model that joins three models together
     *
     * @param array $orderIds
     * @param \App\Models\OrderModel $orderModel
     * @param \App\Models\OrderItemModel $orderItemModel
     * @param \App\Models\MenuItemModel $menuItemModel
     * @return array
     */
    public function getOrdersWithItems($orderIds, $orderModel, $orderItemModel, $menuItemModel)
    {
        // Fetch orders with associated items
        $orders = [];
    
        // Fetch order items for the given order IDs
        $orderItems = $orderItemModel->whereIn('order_id', $orderIds)->findAll();
    
        // Loop through order items
        foreach ($orderItems as $orderItem) {
            $orderId = $orderItem['order_id'];
    
            // Retrieve item details from MenuItemModel
            $itemDetails = $menuItemModel->find($orderItem['item_id']);
    
            // Retrieve order details from OrderModel
            $orderDetails = $orderModel->find($orderId);
    
            // Check if the order ID is in the provided order IDs array
            if (in_array($orderId, $orderIds)) {
                if (!isset($orders[$orderId])) {
                    $orders[$orderId] = [
                        'order_id' => $orderId,
                        'total_price' => 0,
                        'order_status' => $orderDetails['order_status'],
                        'items' => []
                    ];
                }
    
                // Calculate subtotal for the current item
                $subtotal = $itemDetails['item_price'] * $orderItem['quantity'];
    
                // Add item details to the order array
                $orders[$orderId]['items'][] = [
                    'item_name' => $itemDetails['item_name'],
                    'quantity' => $orderItem['quantity'],
                    'order_status' => $orderDetails['order_status']
                ];
    
                // Add subtotal to the total price of the order
                $orders[$orderId]['total_price'] += $subtotal;
            }
        }
        return $orders;
    }
        
    /**
     * Marks an order as completed.
     *
     * @param int $orderId
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function completeOrder($orderId)
    {
        $orderModel = new \App\Models\OrderModel();
        $data = ['order_status' => '1'];

        if ($orderModel->update($orderId, $data)) {
            $this->response->setJSON(['success' => true]);
            return redirect()->to('/my_store');
        } else {
            $this->response->setJSON(['success' => false]);
            return redirect()->to('/my_store');
        }
    }

    /**
     * Recalls an order (marks as incomplete).
     *
     * @param int $orderId
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function recallOrder($orderId)
    {
        $orderModel = new \App\Models\OrderModel();
        $data = ['order_status' => '0'];

        if ($orderModel->update($orderId, $data)) {
            $this->response->setJSON(['success' => true]);
            return redirect()->to('/my_store');
        } else {
            $this->response->setJSON(['success' => false]);
            return redirect()->to('/my_store');
        }
    }
    
    /**
     * Saves updates to an order.
     *
     * @param int $orderId
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function saveOrder($orderId)
    {
        $orderModel = new \App\Models\OrderModel();
        $orderItemModel = new \App\Models\OrderItemModel();
        $data = $this->request->getPost();
    
        // Process the items for the order
        $items = $data['items'] ?? [];
    
        if (!empty($items)) {
            foreach ($items as $itemId => $itemData) {
                // Prepare data for updating order items
                $updateData = [
                    'item_id' => $itemData['item'],
                    'quantity' => $itemData['quantity'],
                ];
    
                // Update each item in the order
                $orderItemModel->where('order_id', $orderId)->where('item_id', $itemId)->set($updateData)->update();
            }
    
            if ($orderModel->update($orderId, $orderUpdateData)) {
                $this->response->setJSON(['success' => true]);
                return redirect()->to('/my_store');
            } else {
                $this->response->setJSON(['success' => false]);
                return redirect()->to('/my_store');
            }
        } else {
            $this->response->setJSON(['success' => false]);
            return redirect()->to('/my_store');
        }
    }
    
    /**
     * Deletes an item from an order.
     *
     * @param int $orderId
     * @param int $itemId
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function deleteItem($orderId, $itemId)
    {
        $orderItemModel = new \App\Models\OrderItemModel();

        // Delete the specific item from the order
        if ($orderItemModel->where('order_id', $orderId)->where('item_id', $itemId)->delete()) {
            $this->response->setJSON(['success' => true]);
            return redirect()->to('/my_store');
        } else {
            $this->response->setJSON(['success' => false]);
            return redirect()->to('/my_store');
        }
    }
    


}
