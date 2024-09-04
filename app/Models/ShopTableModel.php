<?php

namespace App\Models;

use CodeIgniter\Model;

class ShopTableModel extends Model // Defines a new class ShopTableModel that extends CodeIgniter's Model class.
{
    protected $table = 'ShopTable'; // Specifies the database table that this model should interact with.
    protected $primaryKey = 'table_id'; // Defines the primary key field of the table for CRUD operations.
    // Lists the fields that are allowed to be set using the model. This is for security and prevents mass assignment vulnerabilities.
    protected $allowedFields = ['table_id', 'shop_id', 'order_id']; 
    protected $returnType = 'array'; // Sets the default return type of the results. This model will return results as arrays.
}

