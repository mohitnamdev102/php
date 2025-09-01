<?php

namespace App\Models;
use CodeIgniter\Model;

class SocialModel extends Model
{
    protected $table = 'social';   
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'entrydt', 'heading', 'notes'];
}
