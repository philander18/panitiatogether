<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'judul' => 'Pendaftaran',
        ];
        return view('Auth/login', $data);
    }
}
