<?php

namespace App\Controllers;

use App\Models\TaskModel;
use DateTime;

class Ketua extends BaseController
{
    protected $TaskModel;
    protected $jumlahlist = 10;
    public function __construct()
    {
        $this->TaskModel = new TaskModel();
    }
    public function index(): string
    {
        $page = 1;
        $data = [
            'judul' => 'Ketua',
            'halaman' => 'ketua',
            'method' => 'tugas'
        ];
        return view('Tugas/index', $data);
    }
}
