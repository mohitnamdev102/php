<?php

// <?php
// namespace App\Models;
// use CodeIgniter\Model;
// class SocialModel extends Model
// {
//     protected $table = 'social';   
//     protected $primaryKey = 'id';
//     protected $allowedFields = ['user_id', 'entrydt', 'heading', 'notes'];
// }


// // social
// $routes->get('/social', 'Social::index');
// $routes->get('/social/create', 'Social::create');
// $routes->post('/social/store', 'Social::store');
// $routes->get('/social/edit/(:num)', 'Social::edit/$1');
// $routes->post('/social/update/(:num)', 'Social::update/$1');
// $routes->post('/social/delete/(:num)', 'Social::delete/$1');


namespace App\Controllers;
use App\Models\UserModel;

class Social extends BaseController
{
    public function index()
    {
        return view('social');
    }

}
