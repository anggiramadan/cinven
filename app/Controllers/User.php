<?php

namespace App\Controllers;

use App\Models\User_model;



class User extends BaseController
{
    public function __construct()
    {
        $this->session  = service('session');
        $this->config   = config('Auth');
        $this->auth     = service('authentication');
    }

    public function index()
    {
        $user   = new User_model();
        $id     = user()->id;
        $data   = [
            'title'          => 'Dashboard User Profile',
        ];
        $data['user'] = $user->getUserDetail($id);

        return view('user\index', $data);
    }

    public function form($id)
    {
        $user = new User_model();
        $id = user()->id;
        $data = [
            'title'          => 'Dashboard User Profile',
        ];
        $data['user'] = $user->getUserDetail($id);

        return view('user\update', $data);
    }

    public function update()
    {
        $user   = new User_model();
        $id     = $this->request->getPost('id');
        $data = [
            'title'          => 'Dashboard User Profile',
        ];

        $data = [
            'email'          => $this->request->getPost('email'),
        ];
        $user->updateUser($data, $id);

        $id2 = user()->employee_id;

        $img = $this->request->getFile('user_image');
        if ($img == '') {
            $img = 'default.svg';
        } else {
            $img = $this->request->getFile('user_image');
            $img->move(FCPATH . 'uploads/img/avatar');
        }
        $data = [
            'fullname'       => $this->request->getPost('fullname'),
            'user_image'     => $img->getName(),
            'dept_id'        => $this->request->getPost('dept_id'),
            'phone'          => $this->request->getPost('phone'),
            'location'       => $this->request->getPost('location'),
            'address'        => $this->request->getPost('address'),
            'marital_status' => $this->request->getPost('marital_status'),
            'Religion'       => $this->request->getPost('religion'),
        ];
        $user->updateUserDetail($data, $id2);

        return redirect()->to('/user');
    }
}
