<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Users extends BaseController
{
    // public function index()
    // {
    //     $userModel = new UsersModel();
    //     $data['users'] = $userModel->findAll();   

    //     return view('users', $data);
    // }

    public function index()
    {
        $userModel = new UsersModel();

        // 10-10 rows दिखाने के लिए paginate(10)
        $data['users'] = $userModel->paginate(15);
        $data['pager'] = $userModel->pager; // pagination links
        return view('users', $data);
    }


    // नया यूज़र form दिखाने के लिए
    public function create()
    {
        return view('add_user');
    }

    // form से आए डेटा को save करने के लिए
    public function store()
    {
        $userModel = new UsersModel();

        $data = [
            'name'   => $this->request->getPost('name'),
            'age'    => $this->request->getPost('age'),
            'number' => $this->request->getPost('number')
        ];

        $userModel->insert($data);

        return redirect()->to('/users'); // वापस users list पर भेज देगा
    }

     // edit form दिखाने के लिए
     public function edit($id)
     {
         $userModel = new UsersModel();
         $data['user'] = $userModel->find($id);
 
         return view('edit_user', $data);
     }

     // edit form से आए डेटा को update करने के लिए
    public function update($id)
    {
        $userModel = new UsersModel();

        $data = [
            'name'   => $this->request->getPost('name'),
            'age'    => $this->request->getPost('age'),
            'number' => $this->request->getPost('number')
        ];

        $userModel->update($id, $data);

        return redirect()->to('/users');
    }
    public function delete($id)
    {
        $userModel = new UsersModel();
        $userModel->delete($id);

        return redirect()->to('/users'); // delete के बाद वापस users list पर
    }

    // public function index()
    // {
    //     $userModel = new \App\Models\UsersModel();

    //     // 10-10 rows दिखाने के लिए paginate(10)
    //     $data['users'] = $userModel->paginate(10);
    //     $data['pager'] = $userModel->pager; // pagination links

    //     return view('users_list', $data);
    // }


}
