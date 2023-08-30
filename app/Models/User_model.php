<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['id', 'email', 'username', 'staff_id', 'active', 'created_at', 'updated_at', 'fullname'];


    public function getUser()
    {
        $builder = $this->db->table('users');
        $builder->select('users.id as uid, users.*, name, employee.*');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id', 'left');
        $builder->join('employee', 'employee.id = users.employee_id', 'left');
        return $builder->get()->getResult();
    }

    public function getUserDetail($id)
    {
        $builder = $this->db->table('users');
        $builder->select('users.id as uid, users.*, name, employee.*');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id', 'left');
        $builder->join('employee', 'employee.id = users.employee_id', 'left');
        $builder->where('users.id', $id);
        return $builder->get()->getRow();
    }

    public function updateUser($data, $id)
    {
        $query = $this->db->table('users')->update($data, array('id' => $id));
        return $query;
    }

    public function updateUserDetail($data, $id)
    {
        $query = $this->db->table('employee')->update($data, array('id' => $id));
        return $query;
    }

    public function deleteUser($id)
    {
        $query = $this->db->table('users')->delete(array('User_id' => $id));
        return $query;
    }
}
