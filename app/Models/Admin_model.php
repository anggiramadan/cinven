<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_model extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['id', 'email', 'username', 'staff_id', 'active', 'created_at', 'updated_at'];


    public function getUser()
    {
        $id = [user()->id];
        $builder = $this->db->table('users');
        $builder->select('users.id as uid, users.*, name, employee.*');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id', 'left');
        $builder->join('employee', 'employee.id = users.employee_id', 'left');
        $builder->whereNotIn('users.id', $id);
        $query = $builder->get()->getResult();
        return $query;
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

    public function getUserforAdmin($id)
    {
        $builder = $this->db->table('users');
        $builder->select('users.id as uid, users.*, name, employee.*');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id', 'left');
        $builder->join('employee', 'employee.id = users.employee_id', 'left');
        $builder->where('users.id', $id);
        return $builder->get()->getRow();
    }

    public function searchUser($keyword)
    {
        $id = [user()->id];
        $builder = $this->db->table('users');
        $builder->select('users.id as uid, users.*, name, employee.*');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id', 'left');
        $builder->join('employee', 'employee.id = users.employee_id', 'left');
        $builder->like('users.username', $keyword);
        $builder->orLike('employee.fullname', $keyword);
        $builder->orLike('users.email', $keyword);
        $builder->whereNotIn('users.id', $id);
        $query = $builder->get()->getResult();
        return $query;
    }

    public function deleteUser($id)
    {
        $query = $this->db->table('users')->delete(array('User_id' => $id));
        return $query;
    }

    public function updateForUser($data, $id)
    {
        $query = $this->db->table('users')->update($data, array('id' => $id));
        return $query;
    }

    public function updateForUserDetail($data, $id)
    {
        $query = $this->db->table('employee')->update($data, array('id' => $id));
        return $query;
    }
}
