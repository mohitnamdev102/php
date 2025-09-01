<?php


// <?php
// namespace App\Models;
// use CodeIgniter\Model;
// class UserModel extends Model
// {
//     protected $table = 'user';       
//     protected $primaryKey = 'id'; 
//     protected $allowedFields = ['name', 'age', 'number', 'roll', 'password'];
// }


namespace App\Controllers;
use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->paginate(13);
        $data['pager'] = $userModel->pager; // pagination links
        return view('user', $data);
    }

    public function create() // नया यूज़र form दिखाने के लिए
    {
        return view('user_add');
    }

    public function store() // form से आए डेटा को save करने के लिए
    {
        $userModel = new UserModel();

        $data = [
            'name'   => $this->request->getPost('name'),
            'age'    => $this->request->getPost('age'),
            'number' => $this->request->getPost('number')
        ];

        $userModel->insert($data);

        return redirect()->to('user'); // वापस users list पर भेज देगा
    }

     // edit form दिखाने के लिए
     public function edit($id)
     {
         $userModel = new UserModel();
         $data['user'] = $userModel->find($id);

         return view('user_edit', $data);
     }

     // edit form से आए डेटा को update करने के लिए
    public function update($id)
    {
        $userModel = new UserModel();

        $data = [
            'name'   => $this->request->getPost('name'),
            'age'    => $this->request->getPost('age'),
            'number' => $this->request->getPost('number')
        ];

        $userModel->update($id, $data);

        return redirect()->to('user');
    }
    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);

        return redirect()->to('user'); // delete के बाद वापस users list पर
    }

}
