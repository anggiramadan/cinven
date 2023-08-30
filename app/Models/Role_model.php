<?php

namespace App\Models;

use CodeIgniter\Model;

class Role_model extends Model
{
    protected $table = 'auth_groups';
    protected $allowedFields = ['id', 'name', 'desciption'];


    public function getRole()
    {
        $builder = $this->db->table('auth_groups');
        $builder->select('*');
        $builder->join('auth_groups_users', 'auth_groups_users.group_id=auth_groups.id');
        $builder->join('users', 'auth_groups_users.user_id=users.id');
        return $builder->get()->getResult();
    }
}
