<?php

namespace App\Controllers;

use App\Models\Role_model;


class Role extends BaseController
{

    public function index()
    {
        $model = new Role_model();

        $data = [
            'title'     => 'Dashboard User Lists',
            'users'     => $model->getRole(),
        ];

        echo view('role/index', $data);
    }
}
