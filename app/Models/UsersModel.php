<?php

namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';       // आपकी DB टेबल का नाम
    protected $primaryKey = 'id';     // Primary key
    protected $allowedFields = ['name', 'age', 'number'];  // टेबल के fields
}
