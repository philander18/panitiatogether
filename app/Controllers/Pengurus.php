<?php

namespace App\Controllers;

use App\Models\TaskModel;
use DateTime;

class Pengurus extends BaseController
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
            'judul' => 'Pengurus',
            'halaman' => 'pengurus',
            'method' => 'rencana',
            'posisi' => $this->TaskModel->getposisi(user()->username),
        ];
        return view('Task/index', $data);
    }
}
