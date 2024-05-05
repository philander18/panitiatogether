<?php

namespace App\Controllers;

use Myth\Auth\Models\UserModel;

class UbahPassword extends BaseController
{
    protected $UserModel;
    protected $auth;
    protected $config;
    protected $session;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->session = service('session');
        $this->config = config('Auth');
        $this->auth   = service('authentication');
    }
    public function index()
    {
        $users = $this->UserModel;
        $user = $users->where('email', user()->email)->first();
        $user->generateResetHash();
        $users->save($user);
        $data = [
            'judul' => 'Change Password',
            'token' => $user->reset_hash
        ];
        return view('Auth/ubah', $data);
    }

    public function done()
    {
        $users = $this->UserModel;
        $users->logResetAttempt(
            (string) $this->request->getPost('email'),
            $this->request->getPost('token'),
            $this->request->getIPAddress(),
            (string) $this->request->getUserAgent()
        );
        $rules = [
            'token'        => 'required',
            'email'        => 'required|valid_email',
            'password'     => 'required',
            'pass_confirm' => 'required|matches[password]',
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $user = $users->where('email', $this->request->getPost('email'))
            ->where('reset_hash', $this->request->getPost('token'))
            ->first();
        $user->password         = $this->request->getPost('password');
        $user->reset_hash       = null;
        $user->reset_at         = date('Y-m-d H:i:s');
        $user->reset_expires    = null;
        $user->force_pass_reset = false;
        $users->save($user);
        if ($this->auth->check()) {
            $this->auth->logout();
        }
        return redirect()->route('login')->with('message', 'Password sudah diupdate');
    }
}
