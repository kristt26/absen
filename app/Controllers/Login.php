<?php

namespace App\Controllers;
class Login extends BaseController
{
    public function index()
    {
        $user = new \App\Models\UserModel();
        if ($user->countAllResults() == 0) {
            $user->insert(['username' => 'Administrator', 'password' => password_hash('Administrator#1', PASSWORD_DEFAULT)]);
        }

        $validation =  \Config\Services::validation();
        $validation->setRules(['username' => 'required', 'password' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid){
            $data = $this->request->getPost();
            $q = $user->where('username', $data['username'])->first();
            if ($q) {
                if (password_verify($data['password'], $q->password)) {
                    session()->set(['nama' => 'Administrator', 'isRole' => true]);
                    return redirect()->to(base_url());
                }
            } else return $this->fail("Username tidak ditemukan");
        }
        return view('login');
    }

    public function login()
    {
        $user = new \App\Models\UserModel();
        
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth'));
    }
}
