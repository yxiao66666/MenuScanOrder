<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuItemModel extends Model // Defines a new class MenuItemModel that extends CodeIgniter's Model class.
{
    protected $table = 'MenuItem'; // Specifies the database table that this model should interact with.
    protected $primaryKey = 'item_id '; // Defines the primary key field of the table for CRUD operations.
    // Lists the fields that are allowed to be set using the model. This is for security and prevents mass assignment vulnerabilities.
    protected $allowedFields = ['item_id', 'item_name', 'item_price', 'description']; 
    protected $returnType = 'array'; // Sets the default return type of the results. This model will return results as arrays.
}

