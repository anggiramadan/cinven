<?php

namespace App\Controllers;

use App\Models\Admin_model;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class Admin extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function __construct()
    {
        $this->session = service('session');
        $this->config = config('Auth');
        $this->auth = service('authentication');
    }

    public function index()
    {
        $admin  = new Admin_model();
        $data['title'] = 'Dashboard User Lists';

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $data['users'] = $admin->searchUser($keyword);
        } else {
            $data['users'] = $admin->getUser();
        }

        //untuk session user & gambar di topbar
        $id     = user()->id;
        $data['user'] = $admin->getUserDetail($id);

        echo view('admin/index', $data);
    }

    public function detailview($id = 0)
    {
        $admin = new Admin_model;
        $data['users'] = $admin->getUserDetail($id);

        //untuk session user & gambar di topbar
        $idsession = user()->id;
        $data['user'] = $admin->getUserDetail($idsession);

        if (empty($data['users'])) {
            return redirect()->to('/admin');
        }

        echo view('admin/detail', $data);
    }

    public function create()
    {
        $admin  = new Admin_model();

        $data = [
            'title'     => 'Dashboard Create New User',
        ];

        //untuk session user & gambar di topbar
        $id     = user()->id;
        $data['user'] = $admin->getUserDetail($id);

        echo view('admin/create', $data);
    }

    public function form($id)
    {
        $admin = new Admin_model();
        $idsession = user()->id;
        $data = [
            'title'     => 'Dashboard User',
        ];
        $data = [
            'users' => $admin->getUserDetail($id),
            //untuk session user & gambar di topbar
            'user'  => $admin->getUserDetail($idsession),
        ];

        return view('admin\update', $data);
    }

    public function update()
    {
        $user   = new Admin_model();
        $id     = $this->request->getPost('id');
        $data = [
            'title'     => 'Dashboard User',
        ];
        $data = [
            'email'          => $this->request->getPost('email'),
        ];

        $user->updateForUser($data, $id);

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
            // 'user_image'     => $img->getName(),
            'dept_id'        => $this->request->getPost('dept_id'),
            'phone'          => $this->request->getPost('phone'),
            'location'       => $this->request->getPost('location'),
            'address'        => $this->request->getPost('address'),
            'marital_status' => $this->request->getPost('marital_status'),
            'Religion'       => $this->request->getPost('religion'),
        ];
        $user->updateForUserDetail($data, $id2);

        return redirect()->to('/admin');
    }
}
