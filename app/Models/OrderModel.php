<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model // Defines a new class OrderModel that extends CodeIgniter's Model class.
{
    protected $table = 'Order'; // Specifies the database table that this model should interact with.
    protected $primaryKey = 'order_id'; // Defines the primary key field of the table for CRUD operations.
    // Lists the fields that are allowed to be set using the model. This is for security and prevents mass assignment vulnerabilities.
    protected $allowedFields = ['order_id', 'total_price', 'order_status']; 
    protected $returnType = 'array'; // Sets the default return type of the results. This model will return results as arrays.
}
