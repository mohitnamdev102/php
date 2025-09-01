<?php


// <?php
// namespace App\Models;
// use CodeIgniter\Model;
// class UserModel extends Model
// {
//     protected $table = 'social';       
//     protected $primaryKey = 'id'; 
//     protected $allowedFields = ['heading', 'Notes', 'date'];
// }


namespace App\Controllers;
use App\Models\UserModel;

class About extends BaseController
{
    public function index()
    {
        return view('about');
    }

}
