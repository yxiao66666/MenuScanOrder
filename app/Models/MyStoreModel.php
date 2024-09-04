<?php

namespace App\Models;

use CodeIgniter\Model;

class MyStoreModel extends Model // Defines a new class MyStoreModel that extends CodeIgniter's Model class.
{
    protected $table = 'MyShop'; // Specifies the database table that this model should interact with.
    protected $primaryKey = 'shop_id '; // Defines the primary key field of the table for CRUD operations.
    // Lists the fields that are allowed to be set using the model. This is for security and prevents mass assignment vulnerabilities.
    protected $allowedFields = ['shop_id', 'user_id', 'shop_name', 'shop_address', 'table_count']; 
    protected $returnType = 'array'; // Sets the default return type of the results. This model will return results as arrays.
}

