<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'task';
    protected $allowedFields = ['penyusun', 'divisi', 'topik', 'plan', 'hasil', 'approved', 'created_at', 'updated_at'];

    public function getposisi($username)
    {
        return $this->db->table('users')->join('auth_users_permissions', 'user_id = id')->join('auth_permissions', 'permission_id = auth_permissions.id')->select('auth_permissions.name')->where('username', $username)->get()->getResultArray()[0]['name'];
    }
}
