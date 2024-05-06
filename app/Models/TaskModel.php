<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'task';
    protected $allowedFields = ['penyusun', 'divisi', 'topik', 'plan', 'hasil', 'approved', 'created_at', 'updated_at'];
}
